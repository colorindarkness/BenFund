<?php
session_start();
if (!isset($_SESSION[valid_client])){
	$_SESSION['error'] = "This script sucks. <br>Please try again<br>";
     header('Location:../login.php');
}
$page_title = "Payment Manager";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
require($ROOT."functions/user_info.php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<script type="text/javascript" src="https://www.benfund.com/includes/js/tabs.js"></script>
<script type="text/javascript">womOn();</script>
<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."/includes/header.php"); ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."/includes/left.php"); ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."/includes/pathway.php"); ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<?php m_menu3(); ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle"><?php echo $page_title ?></span><p>
<div class="hr"></div>

<?php
//Overdue Sum
$past = future_past("-", "721");
benfund_connect();
$odquery = "SELECT SUM(total) AS paytotal FROM invoice WHERE date <= $past AND to_id='$cid' AND status='0'";    
$odresult = mysql_query($odquery) or die(mysql_error());
$odrow = mysql_fetch_array($odresult);
$odnum_pend = mysql_num_rows($odresult);
$overdue = (integer)$odrow['paytotal'];
//echo 'This '.$balance.' is the Total Payments.'

//Current
$to_now = future_past("-", "720");
benfund_connect();
$curquery = "SELECT SUM(total) AS paytotal FROM invoice WHERE date >= $to_now AND to_id='$cid' AND status='0'";    
$curresult = mysql_query($curquery) or die(mysql_error());
$currow = mysql_fetch_array($curresult);
$curnum_pend = mysql_num_rows($curresult);
$curbalance = (integer)$currow['paytotal'];

?>

<?php
$userquery = "SELECT name, contact_name, goal FROM merchant WHERE id='$mid'";    
$userresult = mysql_query($userquery) or die(mysql_error());
$userrow = mysql_fetch_row($userresult);
$mname = $userrow[0];
$c_name = $userrow[1];
$total = (integer)$userrow[2];
	
?>
<?php
$invtotal = $odnum_pend+$curnum_pend;
$paytotal = $overdue+$curbalance;
?>
<table width="100%">
	<tr>
		<td valign="top">

<table width="290" class="adminlist" style="width: 290px !important;">
<thead>
<tr>
<th colspan="3"><span class="large darkred">Account Balance Status</span></th>
</tr>
</thead>
<tbody>
<tr class="row0">
<td ><span class="medium bold">Total Balance Due:</span></td><td ><span class="medium bold">$<?php echo $paytotal; ?></span></td><td >Pay</td>
</tr>
<tr class="bgpink">
<td ><span class="medium red bold">Balance OverDue:</span></td><td ><span class="medium bold red">$<?php echo $overdue; ?></span></td><td >Pay</td>
</tr>
<tr class="row0">
<td ><span class="medium bold">New Charges:</span></td><td ><span class="medium bold">$<?php echo $curbalance; ?></span></td><td >Pay</td>
</tr>
</tbody>
</table>


</td>
<!--//*<span class="xlarge blue">Total Payments Due: <?php echo $invtotal; ?> Invoices at $<?php echo $paytotal; ?></span><p>*/-->
<td valign="top">

<div style="border: 1px solid #0000A0; background: #E6E6FA url(https://www.benfund.com/images/elements/icons/med/search.png) no-repeat top right; padding: 4px; width: 300px; height: auto; min-height: 109px;">
<span class="subtitle">Search Transactions</span>
<form name="search_payments" method="post" action="https://www.benfund.com/client/payment_manager/search.php">
<span class="large">Search by:</span>
<select name="srch_type" class="inputmed">
<option value="kw">Keyword(s)</option>
<option value="inv">Invoice # </option>
</select>
<br>
<input type="text" class="nice" id="srch_field" name="srch_field" size="23" maxlength="23"><input type="submit" class="large" value="Search">
<div id="simple_srch" style="display: block;">
<a href="#" onclick="getElementById('adv_options').style.display = 'block'; getElementById('simple_srch').style.display = 'none'">Advanced Search</a>
</div>
<div id="adv_options" style="display: none;">
<a href="#" onclick="getElementById('simple_srch').style.display = 'block'; getElementById('adv_options').style.display = 'none';">Simple Search</a><br>
<div style="position: absolute; border: 1px solid #0000A0; background: #F2F2FD; padding: 4px; height: auto !important; max-width: 320px;">
<span class="red bold">The following options are to refine your results and are not required.</span>
<table border="0" width="100%" cellpadding="4" style="border: 1px solid #A3A3A3; padding: 4px; border-collapse: collapse;"><tr>
	<td valign="top"  style="border: 1px solid #A3A3A3;">
		<span class="medium bold">Category:</span><br>
		<select class="bold" name="srch_cat">
			<option value="all">All</option>
			<option value="inv">Invoice</option>
			<option value="pay">Payment</option>
			<option value="cred">Credit</option>
		</select><br>
		<input type="radio" name="srch_stat" value="all" checked>All<br>
		<input type="radio" name="srch_stat" value="paid">Paid<br>
		<input type="radio" name="srch_stat" value="unpaid">Unpaid<br>
		<input type="checkbox" name="srch_dispute">Disputed<br>
	</td>
	<td valign="top"  style="border: 1px solid #A3A3A3;">
		<span class="medium bold">Date Filter:</span><br>
			<table>
				<tr><td colspan="3"><span class="bold">From</span></td></tr>
				<tr><td><?php dateSelect(1,06,05,1) ?></td></tr>
				<tr><td colspan="3"><span class="bold">To</span></td></tr>
				<tr><td><?php dateSelect(2,06,05,1) ?></td></tr>
			</table>
<!--
<td valign="top"  style="border: 1px solid #A3A3A3;">
<span class="large bold">Transaction Status:</span><br>
<input type="radio" name="stat">Paid<br>
<input type="radio" name="stat">Unpaid<br>
<input type="checkbox">Disputed<br>
-->
</td></tr></table>
</div>
</div>
</form>
</div>
</td>
</tr>
</table>
<br>
<ul id="maintab" class="shadetabs">
<li class="selected"><a href="#default" rel="ajaxcontentarea">Recent Transactions</a></li>
<li><a href="payment_manager/payments.php" rel="ajaxcontentarea">Payments</a></li>
<li><a href="payment_manager/credits.php" rel="ajaxcontentarea">Credits</a></li>
<li><a href="payment_manager/all.php" rel="ajaxcontentarea">All Transactions</a></li>
</ul>

<div id="ajaxcontentarea" class="contentstyle">
<?php include('payment_manager/recent.php'); ?>
<p><b><a href="javascript: expandtab('maintab', 2)">Select 3rd tab of "maintab"</a></b></p>
</div>

<script type="text/javascript">
//Start Ajax tabs script for UL with id="maintab" Separate multiple ids each with a comma.
startajaxtabs("maintab")
</script>

	</div>
	</div>
	</td>
  </tr>
  <!--MAINBODY END-->
  <!--FOOTER START-->
  <tr>
    <td colspan="2">
      <font color="#FEFFC1">
      <?php include ($ROOT."/includes/footer.php"); ?>
	  </font></td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>

</body>
</html>
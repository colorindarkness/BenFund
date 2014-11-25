<?php
session_start();
if (!isset($_SESSION[valid_client])){
	$_SESSION['error'] = "This script sucks. <br>Please try again<br>";
     header('Location:../login.php');
}
$page_title = "Account History";
require ("../includes/globals.php"); 
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
require($ROOT."functions/user_info.php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';

//Calculate Total Payments
benfund_connect();
$payquery = "SELECT SUM(total) AS paytotal FROM transactions WHERE type='1' AND from_id='$cid' AND status='1'";    
$payresult = mysql_query($payquery) or die(mysql_error());
$payrow = mysql_fetch_array($payresult);
$balance = (integer)$payrow['paytotal'];

//Calculate Total Charges
benfund_connect();
$chrgquery = "SELECT SUM(total) AS chargetotal FROM transactions WHERE type='2' AND to_id='$cid' AND status='1'";    
$chrgresult = mysql_query($chrgquery) or die(mysql_error());
$chrgrow = mysql_fetch_array($chrgresult);
$charges = (integer)$chrgrow['chargetotal'];

//Calculate Total Credits
benfund_connect();
$credquery = "SELECT SUM(total) AS credtotal FROM transactions WHERE type='3' AND to_id='$cid' AND status='1'";    
$credresult = mysql_query($credquery) or die(mysql_error());
$credrow = mysql_fetch_array($credresult);
$credit = (integer)$credrow['credtotal'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<script type="text/javascript" src="https://www.benfund.com/includes/js/tabs.js"></script>
<script type="text/javascript" src="https://www.benfund.com/includes/js/jquery.highlightFade.js"></script>
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
<span class="pagetitle">Account History</span><p>
<div class="hr"></div>
<table width="100%">
	<tr>
		<td valign="top">
		
<table width="300" class="adminlist" style="width: 300px; min-height: 109px;">
<thead>
<tr>
<th colspan="3"><span class="large darkred">Account Overview</span></th>
</tr>
</thead>
<tbody>
<tr class="row0">
<td ><span class="medium bold">Payments made to date:</span></td><td ><span class="bold">$<?php echo $balance; ?></span></td><td valign="top"><a href="javascript: expandtab('maintab', 2)" onclick="$('#tabcontainer').highlightFade({color:'rgb(255, 233, 0)',speed:2000,iterator:'sinusoidal'});"><img src="https://www.benfund.com/images/elements/icons/sm/view.png" border="0" /></a></td>
</tr>
<tr class="row1">
<td ><span class="medium bold">Charges incurred to date:</span></td><td ><span class="bold">$<?php echo $charges; ?></span></td><td valign="top"><a href="javascript: expandtab('maintab', 1)" onclick="$('#tabcontainer').highlightFade({color:'rgb(255, 233, 0)',speed:2000,iterator:'sinusoidal'});"><img src="https://www.benfund.com/images/elements/icons/sm/view.png" border="0" /></a></td>
</tr>
<tr class="row0">
<td ><span class="medium bold">Credits given to date:</span></td><td ><span class="bold">$<?php echo $credit; ?></span></td><td valign="top"><a href="javascript: expandtab('maintab', 3)" onclick="$('#tabcontainer').highlightFade({color:'rgb(255, 233, 0)',speed:2000,iterator:'sinusoidal'});"><img src="https://www.benfund.com/images/elements/icons/sm/view.png" border="0" /></a></td>
</tr>
</tbody>
</table>

</td>
<td valign="top">

<div style="border: 1px solid #0000A0; background: #E6E6FA url(https://www.benfund.com/images/elements/icons/med/search.png) no-repeat top right; padding: 4px; width: 300px; height: auto; min-height: 109px;">
<span class="subtitle">Search History</span>
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
</td></tr></table>
</div>
</div>
</form>
</div>
</td>
</tr>
</table>
<br>

This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><p><p>

<div id="tabcontainer" style="padding: 8px; padding-right: 20px; min-height: auto; min-width: 600px;">
<ul id="maintab" class="shadetabs">
<li class="selected"><a href="#default" rel="ajaxcontentarea">Recent Transactions</a></li>
<li><a href="account_history/invoices.php" rel="ajaxcontentarea">Invoices</a></li>
<li><a href="account_history/payments.php" rel="ajaxcontentarea">Payments</a></li>
<li><a href="account_history/credits.php" rel="ajaxcontentarea">Credits</a></li>
<li><a href="account_history/all.php" rel="ajaxcontentarea">All Transactions</a></li>
</ul>

<div id="ajaxcontentarea" class="contentstyle">
<?php include('account_history/recent.php'); ?>
<p><b><a href="javascript: expandtab('maintab', 2)">Select 3rd tab of "maintab"</a></b></p>
</div>

<script type="text/javascript">
//Start Ajax tabs script for UL with id="maintab" Separate multiple ids each with a comma.
startajaxtabs("maintab")
</script>
</div>

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
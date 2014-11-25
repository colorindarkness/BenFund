<?php
session_start();
if (!isset($_SESSION[valid_user])){
	$_SESSION['error'] = "This script sucks. <br>Please try again<br>";
     header('Location:../login.php');
}
$page_title = "Finance Manager";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
$mid = $_SESSION['valid_user'];
$pw = $_SESSION['pw'];
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
	<?php if($m_type == 1){ m_menu1(); } if($m_type == 2){ m_menu2(); } ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle"><?php echo _ACCT_SUM ?></span><p>
<div class="hr"></div>
<?php if($m_type == 1){ ?>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/acct/donations.php"><img src="https://www.benfund.com/images/elements/icons/donations.png" border="0"/><br />Donations</a></td>
</tr></table>
</td></tr></table>
<?php } if($m_type == 2){ ?>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/acct/client_manager.php"><img src="https://www.benfund.com/images/elements/icons/clients.png" border="0"/><br />Clients</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/invoice_manager.php"><img src="https://www.benfund.com/images/elements/icons/invoice.png" border="0"/><br />Invoices</a></td>
</tr></table>
</td></tr></table>
<?php } ?>

<?php
benfund_connect();
$sumquery = "SELECT SUM(amount) AS paytotal FROM payments WHERE to_id='$mid'";    
$sumresult = mysql_query($sumquery) or die(mysql_error());
$sumrow = mysql_fetch_array($sumresult);
$balance = (integer)$sumrow['paytotal'];

$userquery = "SELECT name, contact_name, goal FROM merchant WHERE id='$mid'";    
$userresult = mysql_query($userquery) or die(mysql_error());
$userrow = mysql_fetch_row($userresult);
$mname = $userrow[0];
$c_name = $userrow[1];
$total = (integer)$userrow[2];

//Calculate Total Payments
benfund_connect();
$payquery = "SELECT SUM(total) AS paytotal FROM transactions WHERE type='1' AND from_id='$cid' AND status='1'";    
$payresult = mysql_query($payquery) or die(mysql_error());
$payrow = mysql_fetch_array($payresult);
$balance0 = (integer)$payrow['paytotal'];

//Calculate Total Charges
benfund_connect();
$chrgquery = "SELECT SUM(total) AS pendtotal FROM transactions WHERE type='2' AND from_id='$mid' AND status='0'";    
$chrgresult = mysql_query($chrgquery) or die(mysql_error());
$chrgrow = mysql_fetch_array($chrgresult);
$totalpending = (integer)$chrgrow['pendtotal'];

//Calculate Total Charges
benfund_connect();
$chrgttlquery = "SELECT SUM(total) AS chargetotal FROM transactions WHERE type='2' AND from_id='$mid'";    
$chrgttlresult = mysql_query($chrgttlquery) or die(mysql_error());
$chrgttlrow = mysql_fetch_array($chrgttlresult);
$charges = (integer)$chrgttlrow['chargetotal'];

//Calculate Total Credits
benfund_connect();
$credquery = "SELECT SUM(total) AS credtotal FROM transactions WHERE type='3' AND to_id='$cid' AND status='1'";    
$credresult = mysql_query($credquery) or die(mysql_error());
$credrow = mysql_fetch_array($credresult);
$credit = (integer)$credrow['credtotal'];	
?>
This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><p><p>
<table width="100%" border="0">
	<tr>
		<td>
			<table width="300" class="adminlist" style="width: 300px; min-height: 109px;">
			<thead>
			<tr>
			<th colspan="3"><span class="large darkred">Account Overview</span></th>
			</tr>
			</thead>
			<tbody>
			<tr class="row0">
			<td ><span class="medium bold red">Total Payments due to you now:</span></td><td ><span class="bold red">$<?php echo $totalpending; ?></span></td><td valign="top"><a href="javascript: expandtab('maintab', 2)"><img src="https://www.benfund.com/images/elements/icons/sm/view.png" border="0" /></a></td>
			</tr>
			<tr class="row1">
			<td ><span class="medium bold">Charges you have given to date:</span></td><td ><span class="bold">$<?php echo $charges; ?></span></td><td valign="top"><a href="javascript: expandtab('maintab', 1)"><img src="https://www.benfund.com/images/elements/icons/sm/view.png" border="0" /></a></td>
			</tr>
			<tr class="row0">
			<td ><span class="medium bold">Credits you have given to date:</span></td><td ><span class="bold">$<?php echo $credit; ?></span></td><td valign="top"><a href="javascript: expandtab('maintab', 3)"><img src="https://www.benfund.com/images/elements/icons/sm/view.png" border="0" /></a></td>
			</tr>
			</tbody>
			</table>
		</td>
		<td>
			<!--<img src="finance_manager/monthly.php">--><img src="total.php?balance=<?php echo $balance;?>&total=<?php echo $total;?>&class=<?php echo $m_type;?>"  border="0">
		<td>
	</tr>
</table>
<p>
<table width="100%"><tr>
<td valign="top">
</td>
<td valign="top">
<span class="emphasis">Charges Due</span>
<ul id="maintab" class="shadetabs">
<li class="selected"><a href="finance_manager/recent.php" class="selected" rel="#default">Recent</a></li>
<li><a href="finance_manager/30out.php" rel="ajaxcontentarea">30 Days Out</a></li>
<li><a href="finance_manager/60out.php" rel="ajaxcontentarea">60 Days</a></li>
<li><a href="finance_manager/90out.php" rel="ajaxcontentarea">90 Days</a></li>
</ul>

<div id="ajaxcontentarea" class="contentstyle">
<?php include('finance_manager/recent.php'); ?>
</div>

<script type="text/javascript">
var invmantabs=new ddajaxtabs("maintab", "ajaxcontentarea")
invmantabs.setpersist(true)
invmantabs.setselectedClassTarget("link") //"link" or "linkparent"
invmantabs.init()
</script>
</td>
</tr></table>
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
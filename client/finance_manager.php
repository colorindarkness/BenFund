<?php
session_start();
if (!isset($_SESSION[valid_client])){
	$_SESSION['error'] = "This script sucks. <br>Please try again<br>";
     header('Location:../login.php');
}
$page_title = "Finance Manager";
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
<script type="text/javascript">
		womAdd('sfHover()');
		womOn();
	</script>
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
<span class="pagetitle"><?php echo _FINANCE_MAN ?></span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/client_manager.php"><img src="https://www.benfund.com/images/elements/icons/clients.png" border="0"/><br />Clients</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/invoice_manager.php"><img src="https://www.benfund.com/images/elements/icons/invoice.png" border="0"/><br />Invoices</a></td>

</tr></table>
</td></tr></table>
<?php
benfund_connect();
$sumquery = "SELECT SUM(amount) AS paytotal FROM payments WHERE mid='$mid'";    
$sumresult = mysql_query($sumquery) or die(mysql_error());
$sumrow = mysql_fetch_array($sumresult);
$balance = (integer)$sumrow['paytotal'];
echo 'This '.$balance.' is the Total Payments.'
?>

<?php
$userquery = "SELECT name, contact_name, goal FROM merchant WHERE id='$mid'";    
$userresult = mysql_query($userquery) or die(mysql_error());
$userrow = mysql_fetch_row($userresult);
$mname = $userrow[0];
$c_name = $userrow[1];
$total = (integer)$userrow[2];
	
?>

This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><p><p><p>
<table width="100%"><tr>
<td valign="top">
<img src="total.php?balance=<?php echo $balance;?>&total=<?php echo $total;?>&class=<?php echo $m_type;?>"  border="0">
</td><td>
<span class="emphasis">Charges Due</span>
<ul id="maintab" class="shadetabs">
<li class="selected"><a href="#default" rel="ajaxcontentarea">30 Days Out</a></li>
<li><a href="finance_manager/60out.php" rel="ajaxcontentarea">60 Days</a></li>
<li><a href="finance_manager/90out.php" rel="ajaxcontentarea">90 Days</a></li>
<li><a href="finance_manager/30out.php" rel="ajaxcontentarea">Recent</a></li>
</ul>

<div id="ajaxcontentarea" class="contentstyle">
<?php include('finance_manager/30out.php'); ?>
<p><b><a href="javascript: expandtab('maintab', 2)">Select 3rd tab of "maintab"</a></b></p>
</div>

<script type="text/javascript">
//Start Ajax tabs script for UL with id="maintab" Separate multiple ids each with a comma.
startajaxtabs("maintab")
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
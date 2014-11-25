<?php
session_start();
if (!isset($_SESSION[valid_user])){
	$_SESSION['error'] = "This script sucks. <br>Please try again<br>";
     header('Location:../login.php');
}
$page_title = "Invoice Manager";
require ("../includes/globals.php"); 
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
$ping = "pong";
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
<span class="pagetitle">Invoice Manager</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/new_invoice.php"><img src="https://www.benfund.com/images/elements/icons/new-invoice.png" border="0"/><br />New Invoice</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/invoices.php"><img src="https://www.benfund.com/images/elements/icons/invoice.png" border="0"/><br />Invoice Batch</a></td>
</tr></table>
</td></tr></table>

This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><p><p>

<ul id="maintab" class="shadetabs">
<li class="selected"><a href="#default" rel="ajaxcontentarea" rev="https://www.benfund.com/includes/js/tablesort.js">Recent</a></li>
<li><a href="invoice_manager/30.php" rel="ajaxcontentarea" rev="https://www.benfund.com/includes/js/tablesort.js">30-59 days out</a></li>
<li><a href="invoice_manager/60.php" rel="ajaxcontentarea" rev="https://www.benfund.com/includes/js/tablesort.js">60-89 days out</a></li>
<li><a href="invoice_manager/90.php" rel="ajaxcontentarea" rev="https://www.benfund.com/includes/js/tablesort.js">90-119 days out</a></li>
<li><a href="invoice_manager/recent.php" rel="ajaxcontentarea" rev="https://www.benfund.com/includes/js/tablesort.js">120+ days out</a></li>
<!--<li><a href="external4.htm" rel="ajaxcontentarea">Paid</a></li>-->
</ul>

<div id="ajaxcontentarea" class="contentstyle">
<?php include_once("invoice_manager/recent.php"); ?>
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
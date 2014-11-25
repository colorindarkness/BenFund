<?php
session_start();
if (!isset($_SESSION[valid_client])){
     header('Location:../login.php');
}else{
$page_title = "View Invoice";
require ("../../includes/globals.php");
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
require($ROOT."functions/user_info.php");
$iid = $_GET['iid'];
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<script type="text/javascript" src="https://www.benfund.com/includes/js/tabs.js"></script>
<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=800,left = 340,top = 112');");
}
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
	<?php if($m_type == 1){ m_menu1(); } if($m_type == 2){ m_menu2(); } ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">View Invoice</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="#" onclick="document.inv_data.submit();"><img src="https://www.benfund.com/images/elements/icons/clients.png" border="0"/><br />Pay this<br>Invoice</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/payment_manager.php"><img src="https://www.benfund.com/images/elements/icons/quote.png" border="0"/><br />Payment Center</a></td>
</tr></table>
</td></tr></table>
<?php include('invoice.php');?>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="#" onclick="document.inv_data.submit();"><img src="https://www.benfund.com/images/elements/icons/clients.png" border="0"/><br />Pay this<br>Invoice</a></td>
<td align="center"><a class="toolbar" href="javascript:popUp('https://www.benfund.com/client/payment_manager/print_invoice.php?iid=<?php echo $iid; ?>')"><img src="https://www.benfund.com/images/elements/icons/print.png" border="0"/><br />Print Invoice</a></td>
</tr></table>
</td></tr></table>
<form name="inv_data" id="inv_data" action="https://www.benfund.com/client/payment_manager/payment.php" method="post">
<input type="hidden" name="inv_id" id="inv_id" value="<?php echo $id;?>">
<input type="hidden" name="inv_payee" id="inv_payee" value="<?php echo $m_name;?>">
<input type="hidden" name="inv_payee_id" id="inv_payee_id" value="<?php echo $mid;?>">
<input type="hidden" name="inv_num" id="inv_num" value="<?php echo $inv;?>">
<input type="hidden" name="amount" id="amount" value="<?php echo $balance ;?>">
</form>
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
<?php
}
?>
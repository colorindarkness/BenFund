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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
	<script src="https://www.benfund.com/includes/js/jquery.livequery.js" type="text/javascript"></script>
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

<?php
	if($_GET['cmd']=='new'){
		if(!$niinvnum){
			$niinvnum = rand(0001, 9999);
		}else{
			$niinvnum = $_POST['invnum'];
		}
		$niclient = $_POST['client'];
		$nidate = datetime();
		$nithetotal = $_POST['thetotal'];
		$nigrandtotal = $_POST['grandtotal'];
		$nitotalshipping = $_POST['shippingtotal'];
		$nitotaltax = $_POST['totaltax'];
		$ninotes = $_POST['notes'];
		$niterms = $_POST['terms'];
		
		$nisubtotal = $_POST['subtotal'];
		$niaddtax = $_POST['addtax'];
		$niaddship = $_POST['addship'];	
		
		$print = $_POST['print'];
		$send = $_POST['send'];
				
		benfund_connect();
		$newiq = "01 INTO invoice (inv, to_id, from_id, date, desc, total, shipping, tax, notes, terms) VALUES('$niinvnum', '$niclient', '$mid', '$nidate', '$nithetotal', '$nigrandtotal', '$nitotalshipping', '$nitotaltax', '$ninotes', '$niterms')";
		echo $newiq;
		mysql_query($newiq) or die(mysql_error());
		
		
		if (isset($send)){
		$to = $email;
		$recipient = $email;
		$from = 'notification@benfund.com';
		$from_name = 'BenFund New Invoice Notification';
		$subject = 'Your have a new invoice.';
		$html_message_text = '<span style="font-size: 20pt; color: #484848; text-decoration: none; font-weight: bolder; text-align: left; clear: both;">New Account Information</span><hr>With BenFund you can begin paying your account online with three simple steps.<p><span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 1.</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Go to </span><span style="font-size: 14pt; color: #0000CC; text-decoration: none; font-weight: bold;">www.BenFund.com</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Click on the "Login" link in the orange box on the left.</span><p><span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 2.</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Login with the Following Information:</span><br><br><div style="margin-left: 10px; padding: 6px; border: 1px solid #2C2C2C; background: #E8E8E8; width: 200px;"><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Client Number:</span><br><span style="font-size: 14pt; color: #0000CC; text-decoration: none; font-weight: bold;">'. $mid . '-' . $cid . '</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Password:</span><br><span style="font-size: 14pt; color: #0000CC; text-decoration: none; font-weight: bold;">' . $password . '</span><p></div><br><span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 3.</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Complete our Simple Online Registration.</span><p>';
		$text_message_text = 'New Invoice Information\n=======================\nWith BenFund you can begin paying your account online with three simple steps.\n\nStep 1.\nGo to www.BenFund.com\nClick on the "Login" link in the orange box on the left.\n\nStep 2.\nLogin as a Client with the Following Information:\nClient Number: '. $mid . '-' . $cid . '\nPassword: ' . $password . '\n\nStep 3.\nComplete our Simple Online Registration.\n\nWhen your registration is complete you will have access to your account.';
		$text_message = text_email($text_message_text);
		$html_message = html_email($html_message_text);
		// Send
		require_once($ROOT."/functions/mail.php");
}
?>		
<div class="action">
	<span class="actionmsg">Invoice Submitted Successfully!</span><img src="https://www.benfund.com/images/elements/blank.gif" <?php if($print){?>onload="javascript:popUp('https://www.benfund.com/acct/invoice_manager/print_invoice.php?inv=<?php echo $niinv; ?>')"<?php } ?>>
	<?php if($send){?>
		<br><span class="orange bold">Email sent to new client.</span>
	<?php } ?>
</div>
<p>
<?php	} ?>

This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><p><p>

<ul id="maintab" class="shadetabs">
<li><a href="invoice_manager/recent.php" class="selected" rel="#iframe" id="recent">Recent</a></li>
<li><a href="client_manager/pastdue.php" rel="ajaxcontentarea" id="30">30-59 days out</a></li>
<li><a href="invoice_manager/60.php" rel="ajaxcontentarea">60-89 days out</a></li>
<li><a href="invoice_manager/90.php" rel="ajaxcontentarea">90-119 days out</a></li>
<li><a href="invoice_manager/recent.php" rel="ajaxcontentarea">Archive</a></li>
</ul>

<div id="ajaxcontentarea" class="contentstyle">
<?php include_once("invoice_manager/recent.php"); ?>
</div>

<script type="text/javascript">
var invmantabs=new ddajaxtabs("maintab", "ajaxcontentarea")
invmantabs.setpersist(true)
invmantabs.setselectedClassTarget("link") //"link" or "linkparent"
invmantabs.init()
</script>

	</div>
	<p><a href="javascript: maintab.expandit('recent')">Select Tab with ID "favorite"</a></p>
<p><a href="javascript: maintab.expandit('30')">Select Tab with ID "30"</a></p>

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
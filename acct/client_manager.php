<?php
session_start();
if (!isset($_SESSION[valid_user])){
	$_SESSION['error'] = "This script sucks. <br>Please try again<br>";
     header('Location:../login.php');
}
require ("../includes/globals.php");
$page_title = "Client Manager";
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
//require($ROOT."functions/user_info.php");
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
<!--<script type="text/javascript">womOn();</script>-->
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
<?php include ($ROOT."/includes/pathway.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<?php if($m_type == 1){ m_menu1(); } if($m_type == 2){ m_menu2(); } ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">Client Manager</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/add_client.php"><img src="https://www.benfund.com/images/elements/icons/add-client.png" border="0"/><br />Add Client</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/quick_add.php"><img src="https://www.benfund.com/images/elements/icons/quick-add.png" border="0"/><br />Quick Add</a></td>
</tr></table>
</td></tr></table>
<?php
if($_GET["cmd"]=="edit")
{
$first_name = $_POST['first_name'];
$m_i = $_POST['m_i'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$phone = "$p1-$p2-$p3";
$pa1 = $_POST['pa1'];
$pa2 = $_POST['pa2'];
$pa3 = $_POST['pa3'];
$phone2 = "$pa1-$pa2-$pa3";
$email = $_POST['email'];
$balance = $_POST['balance'];
$status = $_POST['status'];
$cid = $_POST['cid'];
benfund_connect();
$query0 = "UPDATE client SET first_name='$first_name', m_i='$m_i', last_name='$last_name', address='$address', address2='$address2', city='$city', state='$state', zip='$zip', phone='$phone', alt_phone='$phone2', email='$email', activated='$status' WHERE cid='$cid' AND mid='$mid'";
mysql_query($query0) or die(mysql_error());
echo '<div class="action"><span class="actionmsg">Client Updated!</span></div><p>';
}

if($_GET["cmd"]=="create"){
$first_name = $_POST['first_name'];
$m_i = $_POST['m_i'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$phone = "$p1-$p2-$p3";
$pa1 = $_POST['pa1'];
$pa2 = $_POST['pa2'];
$pa3 = $_POST['pa3'];
$phone2 = "$pa1-$pa2-$pa3";
$email = $_POST['email'];
$password = chaos(7);
$balance = $_POST['balance'];
$status = $_POST['status'];
if ($_POST['cid']){
	$cid = $_POST['cid'];
} else {
	$cid = rand(1000, 9999);
}
$print = $_POST['print'];
$send = $_POST['send'];
if (isset($send)){
$to = $email;
$recipient = $email;
$from = 'registration@benfund.com';
$from_name = 'BenFund Registration Service';
$subject = 'Your New BenFund Account Information.';
$html_message_text = '<span style="font-size: 20pt; color: #484848; text-decoration: none; font-weight: bolder; text-align: left; clear: both;">New Account Information</span><hr>With BenFund you can begin paying your account online with three simple steps.<p><span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 1.</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Go to </span><span style="font-size: 14pt; color: #0000CC; text-decoration: none; font-weight: bold;">www.BenFund.com</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Click on the "Login" link in the orange box on the left.</span><p><span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 2.</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Login with the Following Information:</span><br><br><div style="margin-left: 10px; padding: 6px; border: 1px solid #2C2C2C; background: #E8E8E8; width: 200px;"><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Client Number:</span><br><span style="font-size: 14pt; color: #0000CC; text-decoration: none; font-weight: bold;">'. $mid . '-' . $cid . '</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Password:</span><br><span style="font-size: 14pt; color: #0000CC; text-decoration: none; font-weight: bold;">' . $password . '</span><p></div><br><span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 3.</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Complete our Simple Online Registration.</span><p>';
$text_message_text = 'New Account Information\n=======================\nWith BenFund you can begin paying your account online with three simple steps.\n\nStep 1.\nGo to www.BenFund.com\nClick on the "Login" link in the orange box on the left.\n\nStep 2.\nLogin as a Client with the Following Information:\nClient Number: '. $mid . '-' . $cid . '\nPassword: ' . $password . '\n\nStep 3.\nComplete our Simple Online Registration.\n\nWhen your registration is complete you will have access to your account.';
$text_message = text_email($text_message_text);
$html_message = html_email($html_message_text);
// Send
require_once($ROOT."/functions/mail.php");
}
benfund_connect();
$query0 = "INSERT INTO client (cid, mid, first_name, m_i, last_name, address, address2, city, state, zip, phone, alt_phone, email, password, balance) VALUES('$cid', '$mid', '$first_name', '$m_i', '$last_name', '$address', '$address2', '$city', '$state', '$zip', '$phone', '$alt_phone', '$email', '$password', '$balance')";
mysql_query($query0) or die(mysql_error());
$lastid = mysql_insert_id();
?>
<div class="action"><span class="actionmsg">Client Added!</span><img src="https://www.benfund.com/images/elements/blank.gif" <?php if($print){?>onload="javascript:popUp('https://www.benfund.com/acct/client_manager/print_client.php?cid=<?php echo $cid; ?>&hash=<?php echo $password ?>')"<?php } ?>>
<?php if($send){?><br><span class="orange bold">Message sent to new client.</span><?php } ?>
</div><p>
<?php
}
if($_GET["cmd"]=="quickadd"){
$first_name = $_POST['first_name'];
$m_i = $_POST['m_i'];
$last_name = $_POST['last_name'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$phone = "$p1-$p2-$p3";
$email = $_POST['email'];
$password = chaos(7);
$balance = $_POST['balance'];
if ($_POST['cid']){
	$cid = $_POST['cid'];
} else {
	$cid = rand(1000, 9999);
}
$print = $_POST['print'];
$send = $_POST['send'];
if ($send){
$to = $email;
$recipient = $email;
$from = 'registration@benfund.com';
$from_name = 'BenFund Registration Service';
$subject = 'Your New BenFund Account Information.';
$html_message_text = '<span style="font-size: 20pt; color: #484848; text-decoration: none; font-weight: bolder; text-align: left; clear: both;">New Account Information</span><hr>With BenFund you can begin paying your account online with three simple steps.<p><span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 1.</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Go to </span><span style="font-size: 14pt; color: #0000CC; text-decoration: none; font-weight: bold;">www.BenFund.com</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Click on the "Login" link in the orange box on the left.</span><p><span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 2.</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Login with the Following Information:</span><br><br><div style="margin-left: 10px; padding: 6px; border: 1px solid #2C2C2C; background: #E8E8E8; width: 200px;"><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Client Number:</span><br><span style="font-size: 14pt; color: #0000CC; text-decoration: none; font-weight: bold;">'. $mid . '-' . $cid . '</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Password:</span><br><span style="font-size: 14pt; color: #0000CC; text-decoration: none; font-weight: bold;">' . $password . '</span><p></div><br><span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 3.</span><br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Complete our Simple Online Registration.</span><p>';
$text_message_text = 'New Account Information\n=======================\nWith BenFund you can begin paying your account online with three simple steps.\n\nStep 1.\nGo to www.BenFund.com\nClick on the "Login" link in the orange box on the left.\n\nStep 2.\nLogin as a Client with the Following Information:\nClient Number: '. $mid . '-' . $cid . '\nPassword: ' . $password . '\n\nStep 3.\nComplete our Simple Online Registration.\n\nWhen your registration is complete you will have access to your account.';
$text_message = text_email($text_message_text);
$html_message = html_email($html_message_text);
// Send
require_once($ROOT."/functions/mail.php");
}
benfund_connect();
$query0 = "INSERT INTO client (cid, mid, first_name, m_i, last_name, phone, email, password, balance) VALUES('$cid', '$mid', '$first_name', '$m_i', '$last_name', '$phone', '$email', '$password', '$balance')";
mysql_query($query0) or die(mysql_error());
$lastid = mysql_insert_id();
?>
<div class="action"><span class="actionmsg">Client Added!</span><img src="https://www.benfund.com/images/elements/blank.gif" <?php if($send){?>onload="javascript:popUp('https://www.benfund.com/acct/client_manager/print_client.php?cid=<?php echo $cid; ?>&hash=<?php echo $password ?>')"<?php }?>></div><p>
<?php
}
?>
<ul id="maintab" class="shadetabs">
<li class="selected"><a href="client_manager/active.php" class="selected" rel="#default">Active Clients</a></li>
<li><a href="client_manager/pastdue.php" rel="ajaxcontentarea">Past Due Clients</a></li>
<li><a href="client_manager/inactive.php" rel="ajaxcontentarea">Inactive Clients</a></li>
<li><a href="client_manager/all.php" rel="ajaxcontentarea">All Clients</a></li>
</ul>

<div id="ajaxcontentarea" class="contentstyle">
<?php include_once("client_manager/active.php"); ?>
</div>

<script type="text/javascript">
var invmantabs=new ddajaxtabs("maintab", "ajaxcontentarea")
invmantabs.setpersist(true)
invmantabs.setselectedClassTarget("link") //"link" or "linkparent"
invmantabs.init()
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
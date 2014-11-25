<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../login.php');
}else{
$page_title = "Message Center";	
require ("../includes/globals.php");
require ($ROOT."/functions/common.php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
$cmd = $_GET['cmd'];
$msg_id = $_POST['msg_id'];
$cid = $_GET['cid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Merchant Contol Panel</title>
<?php include ($ROOT."/includes/head.php") ?>
<script type="text/javascript" src="https://www.benfund.com/includes/js/tabs.js"></script>
<script src="https://www.benfund.com/acct/livesearch.js"></script>
<script type="text/javascript">
function Append(letter)
{
var recepient = letter
document.compose_new.livesearch.value = letter;
}
</script>
<script type="text/javascript">womOn();</script>

<body onload=liveSearchInit()>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."/includes/header.php") ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."/includes/left.php") ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top" valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."/includes/pathway.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<?php if($m_type == 1){ m_menu1(); } if($m_type == 2){ m_menu2(); } ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">Message Center</span>
<div class="hr"></div>

<?php
if($_GET["cmd"]=="delete")
{
benfund_connect();
$sql = "UPDATE messages SET deleted = '1' WHERE id = '$msg_id' AND to_mid = '$mid'";
mysql_query($sql) or die(mysql_error());
echo '<div class="action"><span class="actionmsg2">Message Deleted!</span></div><p>';
}

if($_GET["cmd"]=="send")
{
$send_to = $_POST['send_to'];
$send_subject = $_POST['send_subject'];
$send_content = $_POST['send_content'];
benfund_connect();
$query0 = "INSERT INTO messages (from_mid, to_mid, subject, content, date, new, reply, deleted) VALUES('$mid', '$send_to', '$send_subject', '$send_content', NOW(), '0', '0', '0')";
mysql_query($query0) or die(mysql_error());
echo '<div class="action"><span class="actionmsg">Message Sent!</span></div><p>';
}

if($_GET["cmd"]=="forward")
{
benfund_connect();
$msg_id = $_POST['msg_id'];
$forward_to = $_POST['forward_to'];
$forward_to_name = $_POST['forward_to_name'];
$forward_date = $_POST['forward_date'];
$forward_subject = $_POST['forward_subject'];
$forward_content = $_POST['forward_content'];
$query0 = "INSERT INTO messages (from_mid, to_mid, subject, content, date, new, reply, deleted) VALUES('$mid', '$to_mid', '$subject', '$content', NOW(), '0', '0', '0')";
mysql_query($query0) or die(mysql_error());
benfund_connect();
$query1 = "UPDATE messages SET reply='2' WHERE id='$msg_id'";
mysql_query($query1) or die(mysql_error());
echo '<div class="action"><span class="actionmsg">Message Forwarded!</span></div><p>';
}

if($_GET["cmd"]=="reply")
{
$msg_id = $_POST['msg_id'];
$reply_to = $_POST['reply_to'];
$reply_to_name = $_POST['reply_to_name'];
$reply_date = $_POST['reply_date'];
$reply_subject = $_POST['reply_subject'];
$reply_content = $_POST['reply_content'];
benfund_connect();
$query0 = "INSERT INTO messages (from_mid, to_mid, subject, content, date, new, reply, deleted) VALUES('$mid', '$reply_to', '$reply_subject', '$reply_content', NOW(), '0', '0', '0')";
mysql_query($query0) or die(mysql_error());
benfund_connect();
$query1 = "UPDATE messages SET reply='1' WHERE id='$msg_id'";
mysql_query($query1) or die(mysql_error());
echo '<div class="action"><span class="actionmsg">Reply Sent!</span></div>';
}
if($_GET['view']=='outbox'){
$tabclass1 = '';
$tablink1 = 'message_center/inbox.php';
$tabclass2 = 'class="selected"';
$tablink2 = '#default';
$tabclass3 = '';
$tablink3 = 'message_center.php?view=compose';
$loadpage = 'message_center/outbox.php';
}
if($_GET['view']=='compose'){
$tabclass1 = '';
$tablink1 = 'message_center/inbox.php';
$tabclass2 = '';
$tablink2 = 'message_center/outbox.php';
$tabclass3 = 'class="selected"';
$tablink3 = 'message_center.php?view=compose';
$loadpage = 'message_center/compose.php';
 }else{ 
$tabclass1 = 'class="selected"';
$tablink1 = '#default';
$tabclass2 = '';
$tablink2 = 'message_center/outbox.php';
$tabclass3 = '';
$tablink3 = 'message_center.php?view=compose';
$loadpage = 'message_center/inbox.php';
} ?>
<ul id="maintab" class="shadetabs">
<li <?php echo $tabclass1; ?>><a href="<?php echo $tablink1; ?>" rel="ajaxcontentarea">Inbox</a></li>
<li <?php echo $tabclass2; ?>><a href="<?php echo $tablink2; ?>" rel="ajaxcontentarea">Sent Items</a></li>
<li <?php echo $tabclass3; ?>><a href="<?php echo $tablink3; ?>">Compose Message</a></li>
</ul>

<div id="ajaxcontentarea" class="contentstyle">
<?php include($loadpage); ?>
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
<?php include ($ROOT."/includes/footer.php") ?>
	</td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
<?php
}
?>

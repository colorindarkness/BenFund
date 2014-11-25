<?php
session_start();
if (!isset($_SESSION[valid_client])){
     header('Location:../login.php');
}else{
$cmd = $_GET['cmd'];
$msg_id = $_POST['msg_id'];
$reply_to = $_POST['reply_to'];
$reply_to_name = $_POST['reply_to_name'];
$reply_date = $_POST['reply_date'];
$reply_subject = $_POST['reply_subject'];
$reply_content = $_POST['reply_content'];
$forward_to = $_POST['forward_to'];
$forward_to_name = $_POST['forward_to_name'];
$forward_date = $_POST['forward_date'];
$forward_subject = $_POST['forward_subject'];
$forward_content = $_POST['forward_content'];
$cid = $_GET['cid'];
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
require ($ROOT."/functions/editor.php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Merchant Contol Panel</title>
<?php include ($ROOT."/includes/head.php") ?>
<?php simple_editor(); ?>
<script src="https://www.benfund.com/client/livesearch.js"></script>
<script type="text/javascript">
function Append(letter)
{
var recepient = letter
document.compose_new.send_to.value = letter;
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
<?php if ($cmd == 'view'){	
$msg_id = $_GET['msg_id'];
?>
		<?php m_menu3(); ?>
	<div class="content_outer">
	<div class="content_inner">
	<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php"><img src="https://www.benfund.com/images/elements/icons/med/msg-cntr.png" border="0"height="32" width="32" /></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/admin/delete_page.php"><img src="https://www.benfund.com/images/elements/icons/med/mail-compose.png" border="0"height="32" width="32" /></td>
</tr>
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php">Message Center</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/admin/delete_page.php">Compose Message</a></td>
</tr>
</table>
<span class="pagetitle">View Message</span>
<div class="hr"></div>
<?php
benfund_connect();
$msgresult = mysql_query("SELECT * FROM messages WHERE to_mid='$mid' AND id ='$msg_id'");
$msg_row = mysql_fetch_array($msgresult);
$msg_id = $msg_row[0];
$msg_from = $msg_row[1];
benfund_connect();
$from_result = mysql_query("SELECT name FROM merchant WHERE id='$msg_from'");
$from_row = mysql_fetch_array($from_result)or die(mysql_error());
$msg_from_name = $from_row['name'];
$msg_to = $msg_row[2];
$msg_subject = $msg_row[3];
$msg_content = $msg_row[4];
$msg_date = $msg_row[5];
$msg_read = $msg_row[6];
$msg_reply = $msg_row[7];
$msg_deleted = $msg_row[8];
$msg_content_encoded = htmlspecialchars($msg_content);
$msg_content_enc_slash = addslashes($msg_content_encoded);
benfund_connect();
mysql_query("UPDATE messages SET new='1' WHERE id='$msg_id' AND to_mid='$mid'");
?>
<table width="100%">
<tr><td><span class="emphasis">From:</span></td><td><span class="emphasis"><?php echo $msg_from_name; ?></span></td></tr>
<tr><td><span class="emphasis">Date:</span></td><td><span class="emphasis"><?php echo $msg_date; ?></span></td></tr>
<tr><td colspan="2"><span class="subtitle"><?php echo $msg_subject; ?></span></td></tr>
<tr><td colspan="2">
<table class="clear">
<tr><td>
<table class="toolbar" align="left">
<tr><td align="center">
<form name="reply" id="reply" action="https://www.benfund.com/client/message.php?cmd=reply" method="post">
<input type="hidden" id="msg_id" name="msg_id" value="<?php echo $msg_id; ?>">
<input type="hidden" id="reply_to" name="reply_to" value="<?php echo $msg_from; ?>">
<input type="hidden" id="reply_to_name" name="reply_to_name" value="<?php echo $msg_from_name; ?>">
<input type="hidden" id="reply_subject" name="reply_subject" value="<?php echo $msg_subject; ?>">
<input type="hidden" id="reply_date" name="reply_date" value="<?php echo $msg_date; ?>">
<input type="hidden" id="reply_content" name="reply_content" value='<?php echo $msg_content_encoded; ?>'>
<a href="javascript:document.reply.submit();"><img src="https://www.benfund.com/images/elements/icons/mail-reply.png" border="0"/></a>
</form></td>
<td align="center">
<form name="forward" id="forward" action="https://www.benfund.com/client/message.php?cmd=forward" method="post">
<input type="hidden" id="msg_id" name="msg_id" value="<?php echo $msg_id; ?>">
<input type="hidden" id="forward_to" name="forward_to" value="<?php echo $msg_from; ?>">
<input type="hidden" id="forward_to_name" name="forward_to_name" value="<?php echo $msg_from_name; ?>">
<input type="hidden" id="forward_subject" name="forward_subject" value="<?php echo $msg_subject; ?>">
<input type="hidden" id="forward_date" name="forward_date" value="<?php echo $msg_date; ?>">
<input type="hidden" id="forward_content" name="forward_content" value='<?php echo $msg_content_encoded; ?>'>
<a href="javascript:document.forward.submit();">
<img src="https://www.benfund.com/images/elements/icons/mail-forward.png" border="0"/></a></td>
<td align="center"><form name="delete_msg" id="delete_msg" action="https://www.benfund.com/client/message_center.php?cmd=delete" method="post">
<input type="hidden" id="msg_id" name="msg_id" value="<?php echo $msg_id; ?>">
<a class="toolbar" href="javascript:document.delete_msg.submit();"><img src="https://www.benfund.com/images/elements/icons/delete_page.gif" border="0"/></a></form></td>
</tr>
<tr><td align="center"><a href="javascript:document.reply.submit();">Reply</a></td>
<td align="center"><a class="toolbar" href="javascript:document.forward.submit();">Forward</a></td>
<td align="center">
<a class="toolbar" href="javascript:document.delete_msg.submit();">Delete</a></td>
</tr>
</table>
</td></tr></table>
</td></tr>
<tr><td colspan="2">
<div class="message">
<?php echo $msg_content; ?>
</div>
</td></tr>
</table>


<?php } if ($cmd == 'compose'){ ?>	
	<div class="content_outer">
	<div class="content_inner">
<form  name="searchform" id="searchform" onsubmit="return liveSearchSubmit()" action="https://www.benfund.com/client/message_center.php?cmd=send" method="post">
	<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php"><img src="https://www.benfund.com/images/elements/icons/med/msg-cntr.png" border="0"height="32" width="32" /></td>
</tr>
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php">Message Center</a></td>
</tr>
</table>
<span class="pagetitle">Compose Message</span>
<div class="hr"></div>
<table width="100%">
<tr><td width="270"><span class="subtitle">To:</span></td><td rowspan="4">!!!!!<div id="LSResult" style="display: none;"><div id="LSShadow"></div></div>????</td></tr>
<tr><td width="270"><input type="text" class="big" size="30" id="livesearch" name="q" onkeypress="liveSearchStart()" onchange="liveSearchStart()" value="<?php echo $cid ?>"></td></tr>
<tr><td width="270"><span class="subtitle">Subject:</span></td></tr>
<tr><td width="270"><input type="text" class="big" size="30" id="send_subject" name="send_subject"></td></tr>
<tr><td colspan="2">
<textarea id="send_content" name="send_content" rows="15" cols="80" style="width: 100%">
<?php echo $content ?>
</textarea>
</td></tr>
<tr><td colspan="2">
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="javascript:document.compose_new.submit();"><img src="https://www.benfund.com/images/elements/icons/mail-reply.png" border="0"/></a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php"><img src="https://www.benfund.com/images/elements/icons/delete_page.gif" border="0"/></a></td>
</tr>
<tr><td align="center"><a class="toolbar" href="javascript:document.compose_new.submit();">Send</a></form></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php">Cancel</a></td>
</tr>
</table>
</td></tr></table>
</td></tr>
</table>


<?php } if ($cmd == 'reply'){ ?>
		<?php m_menu3(); ?>
	<div class="content_outer">
	<div class="content_inner">
<form name="reply_send" id="reply_send" action="https://www.benfund.com/client/message_center.php?cmd=reply" method="post">
	<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php"><img src="https://www.benfund.com/images/elements/icons/med/msg-cntr.png" border="0"height="32" width="32" /></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message.php?cmd=compose"><img src="https://www.benfund.com/images/elements/icons/med/mail-compose.png" border="0"height="32" width="32" /></td>
</tr>
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php">Message Center</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message.php?cmd=compose">Compose Message</a></td>
</tr>
</table>
<span class="pagetitle">Reply to Message</span>
<div class="hr"></div>
<?php
$stripped_reply_content = stripslashes($reply_content);
$decoded_reply_content = htmlspecialchars_decode($stripped_reply_content);
 ?>
<table width="100%">
<tr><td colspan="2"><span class="subtitle">To:</span></td></tr>
<tr><td colspan="2"><input type="text" class="big" size="30" id="reply_to" name="reply_to" value="<?php echo $reply_to; ?>"></td></tr>
<tr><td colspan="2"><span class="subtitle">Subject:</span></td></tr>
<tr><td colspan="2"><input type="text" class="big" size="30" id="reply_subject" name="reply_subject" value="RE:<?php echo $reply_subject; ?>"></td></tr>
<tr><td colspan="2">
<textarea id="reply_content" name="reply_content" rows="15" cols="80" style="width: 100%">
<p><br><p><br>
<hr>
Replied Message<br>
From: <?php echo $reply_to_name; ?>(<?php echo $reply_to; ?>)<br>
Originally Sent: <?php echo $reply_date; ?>
<p>
<div style="background-color: #EAEAEA; border: 1px solid #B5B5B5">
<?php echo $decoded_reply_content; ?>
</div>
</textarea>
<input type="hidden" id="msg_id" name="msg_id" value="<?php echo $msg_id; ?>">
<input type="hidden" id="reply_to" name="reply_to" value="<?php echo $reply_to; ?>">
<input type="hidden" id="reply_date" name="reply_date" value="<?php echo $reply_date; ?>">
</td></tr>
<tr><td colspan="2">
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="javascript:document.reply_send.submit();"><img src="https://www.benfund.com/images/elements/icons/mail-reply.png" border="0"/></a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php"><img src="https://www.benfund.com/images/elements/icons/delete_page.gif" border="0"/></a></td>
</tr>
<tr><td align="center">
<input type="hidden" id="reply_date" name="reply_date" value="<?php echo $reply_date; ?>">
<a class="toolbar" href="javascript:document.reply_send.submit();">Send</a></form></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php">Cancel</a></td>
</tr>
</table>
</td></tr></table>
</td></tr>
</table>
<?php } if ($cmd == 'forward'){ ?>
		<?php m_menu3(); ?>
	<div class="content_outer">
	<div class="content_inner">
<form name="forward_send" id="forward_send" action="https://www.benfund.com/client/message_center.php?cmd=forward" method="post">
	<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php"><img src="https://www.benfund.com/images/elements/icons/med/msg-cntr.png" border="0"height="32" width="32" /></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message.php?cmd=compose"><img src="https://www.benfund.com/images/elements/icons/med/mail-compose.png" border="0"height="32" width="32" /></td>
</tr>
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php">Message Center</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message.php?cmd=compose">Compose Message</a></td>
</tr>
</table>
<span class="pagetitle">forward to Message</span>
<div class="hr"></div>
<?php
$stripped_forward_content = stripslashes($forward_content);
$decoded_forward_content = htmlspecialchars_decode($stripped_forward_content);
 ?>
<table width="100%">
<tr><td colspan="2"><span class="subtitle">To:</span></td></tr>
<tr><td colspan="2"><input type="text" class="big" size="30" id="forward_to" name="forward_to" value=""></td></tr>
<tr><td colspan="2"><span class="subtitle">Subject:</span></td></tr>
<tr><td colspan="2"><input type="text" class="big" size="30" id="forward_subject" name="forward_subject" value="FW:<?php echo $forward_subject; ?>"></td></tr>
<tr><td colspan="2">
<textarea id="forward_content" name="forward_content" rows="15" cols="80" style="width: 100%">
<p><br><p><br>
<hr>
Forwared Message<br>
Originally From: <?php echo $forward_to_name; ?>(<?php echo $forward_to; ?>)<br>
Originally Sent: <?php echo $forward_date; ?>
<p>
<div style="background-color: #EAEAEA; border: 1px solid #B5B5B5">
<?php echo $decoded_forward_content; ?>
</div>
</textarea>
<input type="hidden" id="msg_id" name="msg_id" value="<?php echo $msg_id; ?>">
<input type="hidden" id="forward_to" name="forward_to" value="<?php echo $forward_to; ?>">
<input type="hidden" id="forward_date" name="forward_date" value="<?php echo $forward_date; ?>">
</td></tr>
<tr><td colspan="2">
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="javascript:document.forward_send.submit();"><img src="https://www.benfund.com/images/elements/icons/mail-forward.png" border="0"/></a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php"><img src="https://www.benfund.com/images/elements/icons/delete_page.gif" border="0"/></a></td>
</tr>
<tr><td align="center">
<input type="hidden" id="forward_date" name="forward_date" value="<?php echo $forward_date; ?>">
<a class="toolbar" href="javascript:document.forward_send.submit();">Send</a></form></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php">Cancel</a></td>
</tr>
</table>
</td></tr></table>
</td></tr>
</table>
<?php } ?>
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

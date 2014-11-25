<?php
session_start();
if (!isset($_SESSION[valid_client])){
     header('Location:../login.php');
}else{
$cmd = $_GET['cmd'];
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
$msg_id = $_GET['msg_id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Merchant Contol Panel</title>
<?php include ($ROOT."/includes/head.php") ?>
<script type="text/javascript">womOn();</script>

<body>
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
$msg_from = $from_row['name'];
$msg_to = $msg_row[2];
$msg_subject = $msg_row[3];
$msg_content = $msg_row[4];
$msg_date = $msg_row[5];
$msg_read = $msg_row[6];
$msg_reply = $msg_row[7];
$msg_deleted = $msg_row[8];
benfund_connect();
mysql_query("UPDATE messages SET new='1' WHERE id='$msg_id' AND to_mid='$mid'");
?>
<table width="100%">
<tr><td><span class="emphasis">From:</span></td><td><span class="emphasis"><?php echo $msg_from; ?></span></td></tr>
<tr><td><span class="emphasis">Date:</span></td><td><span class="emphasis"><?php echo $msg_date; ?></span></td></tr>
<tr><td colspan="2"><span class="subtitle"><?php echo $msg_subject; ?></span></td></tr>
<tr><td colspan="2">
<table class="clear">
<tr><td>
<table class="toolbar" align="left">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php"><img src="https://www.benfund.com/images/elements/icons/mail-reply.png" border="0"/></a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php"><img src="https://www.benfund.com/images/elements/icons/mail-forward.png" border="0"/></a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/admin/delete_page.php"><img src="https://www.benfund.com/images/elements/icons/delete_page.gif" border="0"/></a></td>
</tr>
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php">Reply</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message_center.php">Forward</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/admin/delete_page.php">Delete</a></td>
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

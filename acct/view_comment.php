<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../login.php');
}else{
$cmd = $_GET['cmd'];
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
$com_id = $_GET['com_id'];
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
		<?php if($m_type == 1){ m_menu1(); } if($m_type == 2){ m_menu2(); } ?>
	<div class="content_outer">
	<div class="content_inner">
	<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/acct/comments.php"><img src="https://www.benfund.com/images/elements/icons/med/comment.png" border="0"height="32" width="32" /><br>
<a class="toolbar" href="https://www.benfund.com/acct/comments.php">Comments
</a>
</td>
</tr>
</table>
<span class="pagetitle">View Comment</span>
<div class="hr"></div>
<?php
benfund_connect();
$comresult = mysql_query("SELECT * FROM comments WHERE mid='$mid' AND id='$com_id'");
$com_row = mysql_fetch_array($comresult);
$com_id = $com_row[0];
$com_from = $com_row[2];;
$com_subject = $com_row[3];
$com_location = $com_row[4];
$com_content = $com_row[5];
$com_amount = $com_row[6];
$com_date = $com_row[7];
$com_private = $com_row[8];
$com_status = $com_row[9];
?>
<table width="100%">
<tr><td><span class="emphasis">From:</span></td><td><span class="emphasis"><?php echo $com_from; ?></span></td></tr>
<tr><td><span class="emphasis">Date:</span></td><td><span class="emphasis"><?php echo $com_date; ?></span></td></tr>
<tr><td colspan="2"><span class="subject"><?php echo $com_subject; ?></span></td></tr>
<tr><td colspan="2">
<hr>
<div class="message">
<?php echo $com_content; ?>
</div>
<hr>
</td></tr>
<tr><td colspan="2">
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<?php if($com_status == 0){ ?>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/comment.php?cmd=approve?com_id=<?php echo $com_id; ?>"><img src="https://www.benfund.com/images/elements/icons/approve_comment.png" border="0"/><br>Approve</a></td>
<?php } ?>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/comment.php?cmd=private<?php echo $com_id; ?>"><img src="https://www.benfund.com/images/elements/icons/private_comment.png" border="0"/><br>Private</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/comment.php?cmd=delete<?php echo $com_id; ?>"><img src="https://www.benfund.com/images/elements/icons/delete_comment.png" border="0"/><br>Delete</a></td>
</tr>
</table>
</td></tr></table>
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

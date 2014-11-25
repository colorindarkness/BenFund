<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../login.php');
}else{
$page_title = "Comments Center";	
require ("../includes/globals.php");
require ($ROOT."/functions/common.php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
$cmd = $_GET['cmd'];
$comment_id = $_GET['com_id'];
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
<script type="text/javascript">womOn();</script>

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
<span class="pagetitle">Comments</span>
<div class="hr"></div>

<?php
if($_GET["cmd"]=="approve")
{
benfund_connect();
$sql = "UPDATE comments SET approved = '1' WHERE id = '$comment_id' AND mid = '$mid'";
mysql_query($sql) or die(mysql_error());
echo '<div class="action"><span class="actionmsg2">Comment Approved!</span></div><p>';
}

if($_GET["cmd"]=="delete")
{
benfund_connect();
$sql = "DELETE FROM comments WHERE id = '$comment_id' AND mid = '$mid'";
mysql_query($sql) or die(mysql_error());
echo '<div class="action"><span class="actionmsg2">Message Deleted!</span></div><p>';
}

if($_GET["cmd"]=="private")
{
benfund_connect();
$sql = "UPDATE comments SET comment_private = '1' WHERE id = '$comment_id' AND mid = '$mid'";
mysql_query($sql) or die(mysql_error());
echo '<div class="action"><span class="actionmsg2">Message Deleted!</span></div><p>';
}

if($_GET['view']=='public'){
$tabclass1 = '';
$tablink1 = 'comments/inbox.php';
$tabclass2 = 'class="selected"';
$tablink2 = '#default';
$tabclass3 = '';
$tablink3 = 'comments/private.php';
$loadpage = 'comments/public.php';
}
if($_GET['view']=='private'){
$tabclass1 = '';
$tablink1 = 'comments/inbox.php';
$tabclass2 = '';
$tablink2 = 'comments/public.php';
$tabclass3 = 'class="selected"';
$tablink3 = 'comments/private.php';
$loadpage = 'comments/private.php';
 }else{ 
$tabclass1 = 'class="selected"';
$tablink1 = '#default';
$tabclass2 = '';
$tablink2 = 'comments/public.php';
$tabclass3 = '';
$tablink3 = 'comments/private.php';
$loadpage = 'comments/inbox.php';
}
?>

<ul id="maintab" class="shadetabs">
<li <?php echo $tabclass1; ?>><a href="<?php echo $tablink1; ?>" rel="ajaxcontentarea">New Comments</a></li>
<li <?php echo $tabclass2; ?>><a href="<?php echo $tablink2; ?>" rel="ajaxcontentarea">View Public Comments</a></li>
<li <?php echo $tabclass3; ?>><a href="<?php echo $tablink3; ?>" rel="ajaxcontentarea">View Private Comments</a></li>
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

<?php
session_start();
if (!isset($_SESSION[valid_client])){
     header('Location:../login.php');
}else{
$page_title = "Edit Template";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
require ($ROOT."/client/mdata.php");
require ($ROOT."/functions/editor.php");
$mid = $_SESSION['valid_user'];
$pw = $_SESSION['pw'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<?php simple_editor(); ?>
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
<span class="pagetitle">Edit Template</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/index.php"><img src="https://www.benfund.com/images/elements/icons/cancel.gif" border="0"/><br />Cancel</a></td>
</tr></table>
</td></tr></table>
<?php
if($_GET["cmd"]=="edit")
{
$newtitle = $_POST['title'];
$newheader = $_POST['header'];
$newfooter = $_POST['footer'];
$newmeta = $_POST['meta'];
$newdate = $_POST['date'];
$mid = $_POST['mid'];
benfund_connect();
$query0 = "UPDATE mtemplates SET title='$newtitle', header='$newheader', footer='$newfooter', meta='$newmeta', date='$newdate' WHERE mid='$mid'";
mysql_query($query0) or die(mysql_error());
echo '<div class="action"><span class="actionmsg">Account Updated!</span></div><p>';
}
?>
Use the editors below to customize how your Benfund template will appear to visitors.<br /><br />
<form method="post" action="https://www.benfund.com/client/template_manager.php?cmd=edit">
	<span class="subtitle" >Template Title:</span><br />This phrase will display as part of the all your page titles. We recommend using your Fund Name.<br />
	<input type="text" id="title" name="title" value="<?php echo $mtitle; ?>" class="big" size="50"/><p>

	<span class="subtitle" >Header:</span><br /> This is the header of the template that will replace the above Benfund logo on your pages. You will certainly want to have your fund name here.<br />
	<input type="text" id="title" name="title" value="<?php echo $header; ?>" class="big" size="50"/><p>
<span class="subtitle" >Footer:</span><br />You can put your contact information here of feelfree to do something original like a slogan, phrase or quote.<br />
    <input type="text" id="title" name="title" value="<?php echo $footer; ?>" class="big" size="50"/><p>
	<span class="subtitle" >Keywords:</span><br>These are descriptive words that search engines will use to clasify your pages. You can use single words or phrases. Separate with commas.<br />
	<input type="text" id="meta" name="meta" value="<?php echo $meta ?>" class="big" size="75">
<input type="hidden" id="date" name="date" value="<?php echo date("m/d/y g:i a"); ?>" class="big"/>
<input type="hidden" id="mid" name="mid" value="<?php echo $mid; ?>" class="big"/>
	<br />
	<input type="submit" name="save" value="Submit" />
	<input type="reset" name="reset" value="Reset" />
</form>
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
<?php unset($loggedout, $error, $foo3); ?>
</body>
</html>
<?php
}
?>
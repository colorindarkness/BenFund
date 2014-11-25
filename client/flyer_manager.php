<?php
session_start();
if (!isset($_SESSION[valid_client])){
     header('Location:../login.php');
}else{
$page_title = "Flyer Manager";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Flyer Manager</title>
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
<span class="pagetitle">Flyer Manager</span>
<div class="hr"></div>
<?php m_menu3(); ?>

With your new Benfund account you have the freedom to customize how your Benfund is displayed. Whether you want it simple or rich we make it easy with our template editors. Select one of the options below to begin. 
<p>
<table width="535" align="center" cellpadding="0" cellspacing="0">
<tr><td width="535" height="20" class="buttonwhitetop"></td></tr>
<tr><td width="535" class="buttonwhitemiddle">
<span class="subtitle">Simple Flyer Editor</span><br />
<div class="hrinline"></div>
Customize your Benfund template quick and easy with our simple template editor, just answer a few quick questions and your ready to go! 
<br />
<a href="flyer_manager_simple.php"><div class="buttongreen">Go!</div></a></div>
</td></tr>
<tr><td width="535" height="20" class="buttonwhitebottom"></td></tr>
</table>
<p>
<table width="535" align="center" cellpadding="0" cellspacing="0">
<tr><td width="535" height="20" class="buttonwhitetop"></td></tr>
<tr><td width="535" class="buttonwhitemiddle">
<span class="subtitle">Advanced Flyer Editor</span>
<div class="hrinline"></div>
If you want advanced design control over how your Benfund displays to potential donors use our advanced template editor to modify fonts and colors.
<br />
<a href="flyer_manager_adv.php"><div class="buttongreen">Go!</div></a></div>
</td></tr>
<tr><td width="535" height="20" class="buttonwhitebottom"></td></tr>
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

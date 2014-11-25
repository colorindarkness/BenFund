<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../login.php');
}else{
$page_title = "Flyer Manager";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
include($ROOT."/includes/lang/".$m_type.".php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Account Setup</title>
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
	
<span class="pagetitle"><?php echo _ACCT_TYPE ;?> Setup</span>
<div class="hr"></div>
Below are several features to enable you to modify how your Benfund websites are displayed to visitors.
<p>
<div style="border: 3px solid #9609FF; background: #FFFFE0; width: 350px; padding: 6px; min-height: 90px;">
	<a href="wizard.php">
	<img src="https://www.benfund.com/images/elements/icons/wizard.gif" border="0" align="left" hspace="4"></a>
	<span class="emphasis">BenFund Setup Wizard</span><br>
	Quickly and Easily setup up your account Template, Pages and Promotional Materials<p>
	<a href="wizard.php">Launch the BenFund Setup Wizard</a>
	</div>
	<p>

<table width="100%" align="center"><tr><td valign="top">
<table width="290" align="center" cellpadding="0" cellspacing="0">
<tr><td width="290" height="20" class="buttonwhitetop"></td></tr>
<tr><td width="290" class="buttonwhitemiddle">
<span class="subtitle">Manage Your Pages</span>
<div class="hrinline"></div>
Quickly and easily create or modify your web pages content.
<br />
<a href="page_manager.php"><div class="buttongreen">Go!</div></a></div>
</td></tr>
<tr><td width="535" height="20" class="buttonwhitebottom"></td></tr>
</table>
</td><td valign="top">
<table width="290" align="center" cellpadding="0" cellspacing="0">
<tr><td width="290" height="20" class="buttonwhitetop"></td></tr>
<tr><td width="290" class="buttonwhitemiddle">
<span class="subtitle">Manage Your Template</span>
<div class="hrinline"></div>
Change the way your website looks.  
<br /><p><br />
<a href="template_manager.php"><div class="buttongreen">Go!</div></a></div>
</td></tr>
<tr><td width="250" height="20" class="buttonwhitebottom"></td></tr>
</table></td></tr></table>

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

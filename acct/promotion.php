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
<?php if($m_type == 1){ m_menu1(); } if($m_type == 2){ m_menu2(); } ?>

	<div class="content_outer">
	<div class="content_inner">
	
<span class="pagetitle">Manage Your Promotions</span>
<div class="hr"></div>

BenFund further empowers you by providing a medium from which to promote your services. Whether youre a beginner or a pro with the following tools you can easily let everyone know about your service while still having full control over how your promotion campaign looks and feels.  
<p>

<div style="postion: relative; float: right; background-color: #F7F7F7; border: 1px solid #E1E1E1; width: 240px; padding: 4px; clear: none;">
<center>
<span class="emphasis2">Current Flier Design</span><br>
<a href=""><img src="https://www.benfund.com/images/acct/promo/<?php echo $mid ;?>_thumb.jpg" border="0"></a>
<br>
<a href="">View</a> | <a href="">Print</a> | <a href="">Edit</a>
</center>
</div>
<span class="subtitle">Print Promotions</span>
<div class="hrinline"></div>
Create, design and print your printable promotional materials.
<img src="https://www.benfund.com/images/elements/icons/flier.png" align="left" hspace="6" style="float: left; padding-top: 6px; padding-right: 12px;">
<ul>
<li><a href="https://www.benfund.com/acct/edit_fliers.php">Promotional Fliers</a></li>
<li><a href="https://www.benfund.com/acct/edit_fliers.php">Promotional Business Cards</a></li>
</ul>
<p>&nbsp;<p>
<span class="subtitle">Email Promotions</span>
<div class="hrinline"></div>
Send email promotions to one or many people.
<img src="https://www.benfund.com/images/elements/icons/mail-compose.png" align="left" hspace="6" style="float: left; padding-top: 6px; padding-right: 12px;">
<ul>
<li><a href="https://www.benfund.com/acct/edit_fliers.php">Design Email Promotions</a></li>
<li><a href="https://www.benfund.com/acct/edit_fliers.php">Send Email Promotions</a></li>
</ul>
<p>
<!--
<table width="100%" align="center"><tr><td valign="top">
<table width="290" align="center" cellpadding="0" cellspacing="0">
<tr><td width="290" height="20" class="buttonwhitetop"></td></tr>
<tr><td width="290" class="buttonwhitemiddle">
<span class="subtitle">Manage Print Promotions</span>
<div class="hrinline"></div>
Create, design and print your printable promotional materials.
<ul>
<li><a href="https://www.benfund.com/acct/edit_fliers.php">Promotional Fliers</a></li>
<li><a href="https://www.benfund.com/acct/edit_fliers.php">Promotional Business Cards</a></li>
</ul>
<br />
<a href="page_manager.php"><div class="buttongreen">Go!</div></a></div>
</td></tr>
<tr><td width="535" height="20" class="buttonwhitebottom"></td></tr>
</table>
</td><td valign="top">
<table width="290" align="center" cellpadding="0" cellspacing="0">
<tr><td width="290" height="20" class="buttonwhitetop"></td></tr>
<tr><td width="290" class="buttonwhitemiddle">
<span class="subtitle">Manage Email Promotions</span>
<div class="hrinline"></div>
Send email promotions to one or many people.
<br />
<a href="template_manager.php"><div class="buttongreen">Go!</div></a></div>
</td></tr>
<tr><td width="250" height="20" class="buttonwhitebottom"></td></tr>
</table></td></tr></table>

<table width="535" align="center" cellpadding="0" cellspacing="0">
<tr><td width="535" height="20" class="buttonwhitetop2"></td></tr>
<tr><td width="535" class="buttonwhitemiddle2">
<span class="subtitle">Manage Printable Promotions</span><br />
<div class="hrinline"></div>
Customize your Benfund template quick and easy with our simple template editor, just answer a few quick questions and your ready to go! 
<br />
<a href="page_manager.php"><div class="buttongreen">Go!</div></a></div>
</td></tr>
<tr><td width="535" height="20" class="buttonwhitebottom2"></td></tr>
</table>
<p>
<table width="535" align="center" cellpadding="0" cellspacing="0">
<tr><td width="535" height="20" class="buttonwhitetop2"></td></tr>
<tr><td width="535" class="buttonwhitemiddle2">
<span class="subtitle">Manage Email Promotions</span>
<div class="hrinline"></div>
If you want advanced design control over how your Benfund displays to potential donors use our advanced template editor to modify fonts and colors.
<br />
<a href="template_manager.php"><div class="buttongreen">Go!</div></a></div>
</td></tr>
<tr><td width="535" height="20" class="buttonwhitebottom2"></td></tr>
</table>
-->

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

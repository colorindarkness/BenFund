<?php
session_start();
$page_title = "Start a Fund";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."includes/head.php") ?>
</head>

<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."includes/header.php") ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."includes/left.php") ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."includes/pathway.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">

<span class="pagetitle">Start a BenFund</span>
<div class="hr"></div>
<!--<table width="535" align="center" cellpadding="0" cellspacing="0">
<tr><td width="535" height="20" class="buttonwhitetop"></td></tr>
<tr><td width="535" class="buttonwhitemiddle">
<span class="subtitle">Product Layaway Service</span><br />
<div class="hrinline"></div>
<span class="attention2">Now Available!</span><br />
Whether you operate belong to a small organization with a few people or a larger entity with many
members and affiliates, a BenFund can simplify the collecting of the payments your organization
relies on to operate. Our automated, secured systems are easy to set-up and easy to use. 
<br />
<p align="right"><a href="info.php?sid=3"><img src="https://www.benfund.com/images/elements/learn_more.png" border="0"></a><a href="agreement.php?sid=2"><img src="https://www.benfund.com/images/elements/sign_up.png" border="0"></a></p>
</td></tr>
<tr><td width="535" height="20" class="buttonwhitebottom"></td></tr>
</table>
<p>-->
<table width="100%" align="center"><tr><td valign="top">
<table width="290" align="center" cellpadding="0" cellspacing="0">
<tr><td width="290" height="20" class="buttonwhitetop"></td></tr>
<tr><td width="290" class="buttonwhitemiddle">
<span class="subtitle">Benefit Fundraiser</span>
<div class="hrinline"></div>
<span class="attention">Coming Soon!</span><br />
Whether you operate belong to a small organization with a few people or a larger entity with many
members and affiliates, a BenFund can simplify the collecting of the payments your organization
relies on to operate. Our automated, secured systems are easy to set-up and easy to use. 
<br />
<p align="right"><a href="https://www.benfund.com/info.php?sid=1"><img src="https://www.benfund.com/images/elements/learn_more.gif" border="0"></a><a href="https://www.benfund.com/register/begin.php?sid=1"><img src="https://www.benfund.com/images/elements/sign_up.gif" border="0"></a></p>
</td></tr>
<tr><td width="535" height="20" class="buttonwhitebottom"></td></tr>
</table>
</td><td valign="top">
<table width="290" align="center" cellpadding="0" cellspacing="0">
<tr><td width="290" height="20" class="buttonwhitetop"></td></tr>
<tr><td width="290" class="buttonwhitemiddle">
<span class="subtitle">Accounts Receivable</span>
<div class="hrinline"></div>
<span class="attention">Coming Soon!</span><br />
Whether you operate a business or organization a BenFund can simplify the collecting of the payments your organization relies on to operate. Our low cost, automated, & secured systems are easy to set-up and use.  
<br /><br />
<p align="right"><a href="https://www.benfund.com/info.php?sid=2"><img src="https://www.benfund.com/images/elements/learn_more.gif" border="0"></a><a href="https://www.benfund.com/register/begin.php?sid=2"><img src="https://www.benfund.com/images/elements/sign_up.gif" border="0"></a></p>
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
<?php include ($ROOT."includes/footer.php") ?>
	</td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
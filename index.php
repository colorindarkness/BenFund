<?php require("D:\benfund.com\includes\globals.php");
require($ROOT."/functions/common.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Home</title>
<script type="text/javascript" src="https://www.benfund.com/includes/js/xfade2.js"></script>
<?php include ($ROOT."includes/head.php"); ?>
</head>

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
    <td valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."/includes/pathway2.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">
	<div id="rotator">
	<img
	 src="https://www.benfund.com/images/splash1.jpg" 
 />
	 <img
	 src="https://www.benfund.com/images/splash2.jpg" 
	 />
	 <img
	 src="https://www.benfund.com/images/splash3.jpg" 
	 />
	 <img
	 src="https://www.benfund.com/images/splash4.jpg" 
	 />
	</div>
	<span class="title">
	<p>Mission</p>
	<hr align="left">
	</span>
	<span class="splashtext">
The primary Mission of BenFund Payment Sysytems is to provide a secure, intuitive, and cost effective suite of online resources which can enable organizations and individuals to open capital accounts and collect funds. The types of accounts we offer our clients include fundraising, retail and wholesale layaway, and receivables management. BenFund's easy to use payment systems allow our clients to better achieve their financial objectives through organized capital accumulation and retention.
	</span>
    </div>
	</div>
	</td>
  </tr>
  <tr>
    <td colspan="2">
<?php include ($ROOT."/includes/footer.php") ?>
	</td>
  </tr>
</table>
</div>
</body>
</html>

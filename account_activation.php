<?php
$page_title = "Registration Complete";
require("D:\benfund.com\includes\globals.php");
require($ROOT."/functions/common.php");
$mid_encrypt = $_GET['mid'];
$mid = $_GET['mid2'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Account Activation</title>
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
<?php
if(!isset ($mid)){
	echo '<span class="medium bold red">There has been an error in processing this transaction. Please try again.<p>If this problem persists please contact BenFund Technical Support at 1-800-982-6966.</span>';
	}
if(!isset ($mid_encrypt)){
	echo '<span class="medium bold red">There has been an error in processing this transaction. Please try again.<p>If this problem persists please contact BenFund Technical Support at 1-800-982-6966.</span>';
	}

benfund_connect();
$query = "SELECT * FROM merchant WHERE id = '$mid'";
$results = mysql_query($query) or die(mysql_error());
$num_rows = mysql_num_rows($results);
$row = mysql_fetch_row($results);
$remote_mid = $row[0];
$login = "https://www.benfund.com/login.php";
$query = "UPDATE merchant SET activated = '1' where id ='$mid'";
if ($mid_encrypt != sha1($remote_mid)){
	echo '<span class="medium bold red">There has been an error in processing this transaction. Please try again.<p>If this problem persists please contact BenFund Technical Support at 1-800-982-6966.</span>';
	}
if ($num_rows >= 1){
$results = mysql_query($query) or die(mysql_error()); ?>
	<center><img src="https://www.benfund.com/images/elements/progress-100.gif"></center><p>
	<span class="pagetitle">Account Activated.</span>
	<div class="hr"></div><p>
	<span class="large bold">Your new BenFund Account has now been activated and you now have completed the registration process.<p>
	To begin using taking advantage of all that BenFund offers please proceed to the <a href="https://www.benfund.com/login.php">Login Page</a> and login <span class="orange"><u>using the "BenFund Login" form</u>.</span></span><p>&nbsp;<p>&nbsp;<p>&nbsp;<p>&nbsp;<p>&nbsp;
<?php
	}else{
	echo '<span class="medium bold red">There has been an error in processing this transaction. Please try again.<p>If this problem persists please contact BenFund Technical Support at 1-800-982-6966.</span>';
}
?>
	
	
	
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
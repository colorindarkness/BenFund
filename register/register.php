<?php
session_start();
$page_title = "Register";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
require($ROOT."/functions/valid_email.php");
require($ROOT."/functions/var_check.php");
$m_type = $_POST['m_type'];
$name = $_POST['name'];
$c_name = $_POST['c_name'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$pa1 = $_POST['pa1'];
$pa2 = $_POST['pa2'];
$pa3 = $_POST['pa3'];
$email = $_POST['email'];
$goal = $_POST['goal'];
$ssn1 = $_POST['ssn1'];
$ssn2 = $_POST['ssn2'];
$ssn3 = $_POST['ssn3'];
$ssn = "$ssn1$ssn2$ssn3";
$tax1 = $_POST['tax1'];
$tax2 = $_POST['tax2'];
$tax = "$tax1$tax2";
$password = $_POST['password'];
$pwconfirm = $_POST['pwconfirm'];
$pin = $_POST['pin'];
$status = $_POST['status'];
$reset = $_POST['reset'];
$g_name = $_POST['g_name'];
$mid = $_POST['mid'];
$phone = "($p1) $p2 - $p3";
$alt_phone = "($pa1) $pa2 - $pa3";

if (get_magic_quotes_gpc())
{
	$group = stripslashes($group);
	$name = stripslashes($name);
	$c_name = stripslashes($c_name);
	$address1 = stripslashes($address1);
	$address2 = stripslashes($address2);
	$city = stripslashes($city);
	$state = stripslashes($state);
	$zip = stripslashes($zip);
	$p1 = stripslashes($p1);
	$p2 = stripslashes($p2);
	$p3 = stripslashes($p3);
	$ssn = stripslashes($ssn);
	$email = stripslashes($email);
	$pwconfirm = stripslashes($pwconfirm);
	$pw = stripslashes($pw);
	$pin = stripslashes($pin);
	$pa1 = stripslashes($pa1);
	$pa2 = stripslashes($pa2);
	$pa3 = stripslashes($pa3);
	$tax = stripslashes($tax);
}

if(empty($mid)) {
		$mid = rand(100000,999999);	
	}

/*
do{
	if(empty($mid)) {
		$mid = rand(100000,999999);	
	}
	benfund_connect();
	$chkquery = "SELECT id FROM merchant WHERE id = '$mid'";
	$chkresults = mysql_query($chkquery) or die(mysql_error());
	$chknum_rows = mysql_num_rows($chkresults);
	if($chknum_rows = 1){
		$mid = '';
	}
}while ($chknum_rows = 1);
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."includes/head.php") ?>
<script type="text/javascript" src="https://www.benfund.com/includes/js/pwd_strength.js"></script> 
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
    <td valign="top" valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."includes/pathway.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">
<?php
if ($_POST['accept'] != 'set'){
	echo '<div class="error2"><span class="errormsg2 large bold">You must accept the User Agreement and Privacy Policy to register for an account</span></div><p><div align="center"><a href="http://www.benfund.com/register" ><img src="https://www.benfund.com/images/elements/back.gif" border="0" alt="Back"></a><a href="https://www.benfund.com" ><img src="https://www.benfund.com/images/elements/cancel.gif" border="0"></a></div>';
}else{
		if($_POST['submit'] == 'Next'){
			require($ROOT."/includes/register/validate.php");
			if($_GET['act'] == 'review'){
				include($ROOT."/includes/register/revise.php");
			}else{
				if($err){
					include($ROOT."/includes/register/error.php");
				}else{
					include($ROOT."/includes/register/review.php");	
				}
			}		
	 }else{ 
 		include($ROOT."/includes/register/default.php");
	 }
}
?>
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
<?php require ("../includes/globals.php");
session_start();
$page_title = "Register";
require($ROOT."/functions/benfund_connect.php");
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
$ssn = $_POST['ssn'];
$tax = $_POST['tax'];
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

if (empty($mid)) {
$mid = rand(100000,999999);	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."includes/head.php") ?>
<script type="text/javascript">womOn();</script>

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
	die("<h1>You must accept the User Agreement and Privacy Policy to register for an account</h1>");
} else {
?>
		<?php if ($_POST['submit'] == Next){ ?>
		<?php require ($ROOT."/includes/register/validate.php"); ?>
			<?php if (isset($err)){ ?>
				<?php include ($ROOT."/includes/register/error.php"); ?>
				<?php } else { ?>
						<?php include ($ROOT."/includes/register/review.php"); ?>	
				<?php } ?>		
	<?php } else { ?>
	<?php include ($ROOT."/includes/register/default.php"); ?>
	<?php } ?>
<?php } ?>
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
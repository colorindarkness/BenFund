<?php
session_start();
$page_title = "Register";
require ("../../includes/globals.php");
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
require($ROOT."/functions/valid_email.php");
require($ROOT."/functions/var_check.php");
$m_type = $_POST['m_type'];
$name = $_POST['name'];
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
$mid = $_POST['mid'];
$mid_encrypt = sha1($mid);
//$phone = "$p1$p2$p3";
//$alt_phone = "$pa1$pa2$pa3";
$phone = "$p1-$p2-$p3";
$alt_phone = "$pa1-$pa2-$pa3";

$tax1 = substr($tax, 0, 2);
$tax2 = substr($tax, 2, 7);

$ssn1 = substr($ssn, 0, 5);
$ssn2 = substr($ssn, 5, 4);



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
    <td valign="top" valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."includes/pathway.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">
	<center><img src="https://www.benfund.com/images/elements/progress-75.gif"></center><p>
<?php
benfund_connect();
$query0 = "INSERT INTO merchant (cid, mid, first_name, m_i, last_name, address, address2, city, state, zip, phone, alt_phone, email, password, activated) VALUES('$cid', '$mid', '$first_name', '$m_i', '$last_name', '$address1',"; 
$address2 = trim ($address2);
if (empty ($address2))
{
$query0.="NULL, '$city', '$state', '$zip', '$phone', '$alt_phone', '$email',";
}
else
{
$query0.="'$address2', '$city', '$state', '$zip', '$phone', '$alt_phone', '$email',";
}
$query0.="'$password', '1')";
mysql_query($query0) or die(mysql_error());

if (get_magic_quotes_gpc())
{
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
?>
<table width="100%" border="0" align="left" bordercolor="#000000">
  <tr> 
    <td><span class="emphasis">Your Benfund #:</span></td>
    <td><em> 
      <?php  echo $mid ?>
      <font size="-1"> (Note: you will use this to login to your account) </font></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">First Name:</span></td>
    <td><?php echo $first_name; ?></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Middle Initial:</span></td>
    <td><?php echo $name; ?></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Last Name:</span></td>
    <td><?php echo $last_name; ?></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Address:</span></td>
    <td><em> <?php echo $address1 ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Address 2 (optional):</span></td>
    <td><em> <?php echo $address2 ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">City:</span></td>
    <td><em> <?php echo $city ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">State:</span></td>
    <td><em> <?php echo $state ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Zip:</span></td>
    <td><em> <?php echo $zip ?></em></td>
  </tr>
  <tr> 
    <td height="25"><span class="emphasis">Phone:</span></td>
    <td><em> <?php echo $phone2 ?></em></td>
  </tr>
  <tr> 
    <td height="25"><span class="emphasis">Alternate Phone:</span></td>
    <td><em> <?php echo $alt_phone2 ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">E-mail Address</span></td>
    <td><em><?php echo $email ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Password:</span></td>
    <td><em><?php echo $password ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">PIN:</span></td>
    <td><em><?php echo $pin ?> </em></td>
  </tr>
</table>
<p align="center"><em><a href="https://www.benfund.com/login.php"><font size="+1"><strong>Login</strong></font></a></em></p>

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
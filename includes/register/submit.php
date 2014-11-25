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
	<span class="pagetitle">Application Submitted</span>
	<div class="hr"></div>
<?php
if ($m_type == 1){
benfund_connect();
$query0 = "INSERT INTO merchant (id, m_type, name, contact_name, address, address2, city, state, zip, phone, alt_phone, email, ssn2, tax2, password, pin) VALUES('$mid', '$m_type', '$name', '$c_name', '$address1',"; 
$address2 = trim ($address2);
if (empty ($address2))
{
$query0.="NULL, '$city', '$state', '$zip', '$phone', '$alt_phone', '$email',";
}
else
{
$query0.="'$address2', '$city', '$state', '$zip', '$phone', '$alt_phone', '$email',";
}
$ssn = trim($ssn);
if (empty ($ssn))
{
$query0.="NULL, '$tax2', '$password')";
}
else
{
$query0.="'$ssn2', NULL, '$password')";
}
mysql_query($query0) or die(mysql_error());
$now = date("m/d/y g:i a");
benfund_connect();
$query1 = "INSERT INTO mpages (mid, pid, title, content, date) VALUES('$mid', '1', 'Home', 'This is your Benfund Home Page. Make this an introductory page', '$now')";
mysql_query($query1) or die(mysql_error());
benfund_connect();
$query2 = "INSERT INTO mpages (mid, pid, title, content, date) VALUES('$mid', '2', 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '$now')";
mysql_query($query2) or die(mysql_error());
benfund_connect();
$query3 = "INSERT INTO mpages (mid, pid, title, content, date) VALUES('$mid', '3', 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '$now')";
mysql_query($query3) or die(mysql_error());
benfund_connect();
$query4 = "INSERT INTO mtemplates (mid, title, meta, header, menu, info, footer, date) VALUES('$mid', '$name', '$name', '$name', '$name', '$name', '$name', '$now')";
mysql_query($query4) or die(mysql_error());
}

if ($m_type == 2){
benfund_connect();
$query0 = "INSERT INTO merchant (id, m_type, name, contact_name, address, address2, city, state, zip, phone, alt_phone, email, ssn2, tax2, password) VALUES('$mid', '$m_type', '$name', '$c_name', '$address1',"; 
$address2 = trim ($address2);
if (empty ($address2))
{
$query0.="NULL, '$city', '$state', '$zip', '$phone', '$alt_phone', '$email',";
}
else
{
$query0.="'$address2', '$city', '$state', '$zip', '$phone', '$alt_phone', '$email',";
}
$ssn = trim($ssn);
if (empty ($ssn))
{
$query0.="NULL, '$tax2', '$password')";
}
else
{
$query0.="'$ssn2', NULL, '$password')";
}
mysql_query($query0) or die(mysql_error());
$now = date("m/d/y g:i a");
benfund_connect();
$query1 = "INSERT INTO mpages (mid, pid, title, content, date) VALUES('$mid', '1', 'Home', 'This is your Benfund Home Page. Make this an introductory page', '$now')";
mysql_query($query1) or die(mysql_error());
benfund_connect();
$query2 = "INSERT INTO mpages (mid, pid, title, content, date) VALUES('$mid', '2', 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '$now')";
mysql_query($query2) or die(mysql_error());
benfund_connect();
$query3 = "INSERT INTO mpages (mid, pid, title, content, date) VALUES('$mid', '3', 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '$now')";
mysql_query($query3) or die(mysql_error());
benfund_connect();
$query4 = "INSERT INTO mtemplates (mid, title, meta, header, menu, info, footer, date) VALUES('$mid', '$name', '$name', '$name', '$name', '$name', '$name', '$now')";
mysql_query($query4) or die(mysql_error());
}

if ($m_type == 3){
benfund_connect();
$query0 = "INSERT INTO merchant (id, m_type, name, contact_name, address, address2, city, state, zip, phone, alt_phone, email, ssn2, tax2, password) VALUES('$mid', '$m_type', '$name', '$c_name', '$address1',"; 
$address2 = trim ($address2);
if (empty ($address2))
{
$query0.="NULL, '$city', '$state', '$zip', '$phone', '$alt_phone', '$email'";
}
else
{
$query0.="'$address2', '$city', '$state', '$zip', '$phone', '$alt_phone', '$email'";
}
$ssn = trim($ssn);
if (empty ($ssn))
{
$query0.="NULL, '$tax2', '$password')";
}
else
{
$query0.="'$ssn2', NULL, '$password')";
}
mysql_query($query0) or die(mysql_error());
$now = date("m/d/y g:i a");
benfund_connect();
$query1 = "INSERT INTO mpages (mid, pid, title, content, date) VALUES('$mid', '1', 'Home', 'This is your Benfund Home Page. Make this an introductory page', '$now')";
mysql_query($query1) or die(mysql_error());
benfund_connect();
$query2 = "INSERT INTO mpages (mid, pid, title, content, date) VALUES('$mid', '2', 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '$now')";
mysql_query($query2) or die(mysql_error());
benfund_connect();
$query3 = "INSERT INTO mpages (mid, pid, title, content, date) VALUES('$mid', '3', 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '$now')";
mysql_query($query3) or die(mysql_error());
benfund_connect();
$query4 = "INSERT INTO mtemplates (mid, title, meta, header, menu, info, footer, date) VALUES('$mid', '$name', '$name', '$name', '$name', '$name', '$name', '$now')";
mysql_query($query4) or die(mysql_error());
}
$now = datetime();
$welcomsg = 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ';
benfund_connect();
$welcomequery = "INSERT INTO messages (from_mid, to_mid, subject, content, date, new) VALUES('000001', '$mid', 'Welcome to BenFund!', '$welcomsg', '$now', '1')";
mysql_query($welcomequery) or die(mysql_error());


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
<table class="clear">
  <tbody>
    <tr>
      <td>
      <table style="width: 194px; height: 50px;" class="toolbar" align="right">
        <tbody>
          <tr>
            <td align="center">
            	<a class="toolbar" href="#" onclick="print()"><img src="https://www.benfund.com/images/elements/icons/sm/print.gif" border="0"><br>Print Page</a>
            </td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
  </tbody>
</table>
<span class="medium bold blue">You have now completed the application process and are almost finished with your registration. Please consider printing this page for your records.</span>
<div style="padding: 6px; border: 1px solid #6CD136; background-color: #E2F7D2;">
<table border="0" width="100%">
  <tbody>
    <tr>
      <td><span class="emphasis">Your Benfund #:</span></td>
      <td><span class="bold large orange"><?php echo $mid ?></span> <span class="italic red medium"> (Note: you will use this to login to your account) </span></td>
    </tr>
    <tr>
      <td><span class="emphasis">Account Name:</span></td>
      <td><span class="bold large blue"><?php echo $name; ?></span></td>
    </tr>
    <tr>
      <td width="50%">
      	<span class="emphasis">Contact Name:</span>
      </td>
      <td width="50%">
      	<span class="bold large blue"><?php echo $c_name ?></span>
      </td>
    </tr>
  </tbody>
</table>
</div>
<p>
</p>
<div style="padding: 6px; border: 1px solid #0000FF; background-color: #E6E6FA;">
<table border="0" width="100%">
  <tbody>
    <tr>
      <td><span class="emphasis">Address:</span></td>
      <td><span class="bold large blue"><?php echo $address1 ?> </span></td>
    </tr>
    <?php if($address2){ ?>
    <tr>
      <td><span class="emphasis">Address 2 (optional):</span></td>
      <td><span class="bold large blue"><?php echo $address2 ?> </span></td>
    </tr>
    <?php } ?>
    <tr>
      <td><span class="emphasis">City:</span></td>
      <td><span class="bold large blue"><?php echo $city ?> </span></td>
    </tr>
    <tr>
      <td><span class="emphasis">State:</span></td>
      <td><span class="bold large blue"><?php echo $state ?> </span></td>
    </tr>
    <tr>
      <td><span class="emphasis">Zip:</span></td>
      <td><span class="bold large blue"><?php echo $zip ?> </span></td>
    </tr>
    <tr>
      <td height="25"><span class="emphasis">Phone:</span></td>
      <td><span class="bold large blue"><?php echo $phone2 ?> </span></td>
    </tr>
    <tr>
      <td height="25"><span class="emphasis">Alternate Phone:</span></td>
      <td><span class="bold large blue"><?php echo $alt_phone2 ?> </span></td>
    </tr>
  </tbody>
</table>
</div>
<p>
</p>
<div style="padding: 6px; border: 1px solid #800000; background-color: #FFFFF0;">
<table border="0" width="100%">
  <tbody>
    <tr>
      <td><span class="emphasis">E-mail Address</span></td>
      <td><span class="bold large blue"><?php echo $email ?></span></td>
    </tr>
    <tr>
      <td>
      	<span class="emphasis"><?php if(empty($ssn)){echo "Federal Tax ID:";} else{echo "Social Security Number:";} ?></span>
      </td>
      <td>
      	<span class="bold large blue"><?php if(empty($ssn)){echo "$tax1-$tax2";} else{echo "xxx-xx-$ssn2";} ?></span>
			</td>
    </tr>
  </tbody>
</table>
</div>
<center>
<span class="medium red bold">You will need to check your email and click on the link provided in the BenFund Acccount Activation email to activate your account.</span>
<p><span class="medium bold italic"><a href="https://www.benfund.com/login.php">Login to your BenFund Account.</a></span>
</center>
<?php
$message = "
$id
$name
$address1
$address2
$city, $state $zip
$phone
$email
";



$subject = "New Benfund Account $id";

mail("registration@benfund.com", "$subject", "$message", "From: registration@benfund.com");

$recipient = $email;
$from = 'registration@benfund.com';
$from_name = 'BenFund Registration Service';
$subject = "Activate your new BenFund account";
$url = "https://www.benfund.com/account_activation.php?mid=$mid_encrypt&mid2=$mid&Submit=Submit";
$text_message_text = "Thank you for registering your account with BenFund. Please click the link below to activate your account.  Your benfund #: $mid.
$url
(If the Link does not work copy the url and paste it into your web browser's address bar)

Please do not reply to this email it is from an unmonitored account";

$html_message_text = "Thank you for registering your account with BenFund. Please click the link below to activate your account.<p><span style='font-size: 14px; font-weight: bold; color: blue;'>Your benfund #: $mid.</span><p><a href='$url'>$url</a><p>If the Link does not work copy the url and paste it into your web browser's address bar<p>Please do not reply to this email it is from an unmonitored account";

$text_message = text_email($text_message_text);
$html_message = html_email($html_message_text);
//echo $recipient;
require_once($ROOT."/functions/mail.php");
//mail("$email", "$subject", "$message", "From: no-reply@benfund.com");
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
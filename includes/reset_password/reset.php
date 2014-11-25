<?php
if (!isset($m_type)){
	benfund_connect();
	$query = "SELECT id, email FROM merchant WHERE id = '$mid' OR email = '$email'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_row($result);
	$mid = $row[0];
	$email = $row[1];
		
	include ($ROOT."/functions/randpass.php");
		
	benfund_connect();
	$reset_query = "UPDATE merchant SET password='$randpass' WHERE id='$mid'";
	mysql_query($reset_query) or die(mysql_error());
	

	$from = "customerservice@benfund.com";
	$from_name = "BenFund Customer Service";
	$recipient = $email;
	$subject = "BenFund Account Password Reset";
	$text_message = 
"You have requested that the password for your BenFund Account# $mid be reset. Your new password is below.

Your New Password: $randpass


To Login please use the following link:

https://www.benfund.com/login.php

(If the Link does not work, copy the url and paste it into your web browser's address bar)

For more security We strongly recommend that you change your password once you haved logged in.

If you did not request your password be reset please contact us immediately.
.
Please do not reply to this email it is from an unmonitored account";

$html_message = "You have requested that the password for your BenFund Account# $mid be reset. Your new password is below.<p>
<i>Your New Password:</i> <b>$randpass</b><p>
To Login please use the following link:<p>
<a href='https://www.benfund.com/login.php'>https://www.benfund.com/login.php</a><p>
(If the Link does not work, copy the url and paste it into your web browser's address bar)<p>
For more security We strongly recommend that you change your password once you haved logged in.<p>
If you did not request your password be reset please contact us immediately.<p>
Please do not reply to this email it is from an unmonitored account";

require ($ROOT."/functions/mail.php");	
	
}
elseif($m_type == '3'){
	benfund_connect();
	$query = "SELECT mid, cid, email FROM client WHERE cid = '$cid' AND mid = '$mid' OR email = '$email'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_row($result);
	$mid = $row[0];
	$cid = $row[1];
	$email = $row[2];
		
include ($ROOT."/functions/randpass.php");
		
	benfund_connect();
	$reset_query = "UPDATE client SET password='$randpass' WHERE mid='$mid' AND cid='$cid'";
	mysql_query($reset_query) or die(mysql_error());
	

$from = "customerservice@benfund.com";
$from_name = "BenFund Customer Service";
$recipient = $email;
$subject = "BenFund Account Password Reset";
$text_message = 
"You have requested that the password for your BenFund Account# $mid - $cid be reset. Your new password is below.

Your New Password: $randpass


To Login please use the following link:

https://www.benfund.com/login.php

(If the Link does not work, copy the url and paste it into your web browser's address bar)

For more security We strongly recommend that you change your password once you haved logged in.

If you did not request your password be reset please contact us immediately.
.
Please do not reply to this email it is from an unmonitored account";

$html_message = "You have requested that the password for your BenFund Account# $mid be reset. Your new password is below.<p>
<i>Your New Password:</i> <b>$randpass</b><p>
To Login please use the following link:<p>
<a href='https://www.benfund.com/login.php'>https://www.benfund.com/login.php</a><p>
(If the Link does not work, copy the url and paste it into your web browser's address bar)<p>
For more security We strongly recommend that you change your password once you haved logged in.<p>
If you did not request your password be reset please contact us immediately.<p>
Please do not reply to this email it is from an unmonitored account";

 require ($ROOT."/functions/mail.php");
}				
?>
<span class="pagetitle">Password Reset Complete</span><p>
<div class="hr"></div><p>

Your Password has been successfully reset. You will be receiving an email containing your new password in the email account you specified when registering.<p>

Please allow <b>up to one hour</b> for the email to arrive. If you do not receive the email after an hour please contact BenFund Customer Service at 1800-BENFUND.
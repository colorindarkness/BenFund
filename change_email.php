<?php
require ("functions/session_info.php");
require ("functions/benfund_connect.php");
require ("functions/valid_email.php");
$pw = sha1($_POST['pw']);
$pin = sha1($_POST['pin']);
$email = $_POST['email'];

if (!check_email_address($email))
{
$error = "<font color='blue'><em>New Email must be a valid email address. Email was not changed</em></font>";
$_SESSION['error2'] = $error;
die (header('location:new_email.php'));
}

benfund_connect();
$result = mysql_query("select * from user where id = '$id' && password = '$pw' && pin = '$pin'")or die(mysql_error());
$num_rows = mysql_num_rows($result);


if ($num_rows > 0)
{mysql_query("update user set email = '$email' where id = '$id'") or die(mysql_error());

$_SESSION['changed'] = "<font color='blue'><h3>Your email address was successfully changed.</h3></font>";
header('Location:cust_admin.php');}
//Returns error if password or pin do not match the database
else
{
$error = "<font color='blue'><em>Password or PIN did not match the database.  Password was not changed</em></font>";
$_SESSION['error2'] = $error;
die (header('location:new_email.php'));
}

?>
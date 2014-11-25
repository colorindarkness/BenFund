<?php
require ("functions/session_info.php");
require ("functions/benfund_connect.php");
$old_pw = sha1($_POST['old_pw']);
$pin = sha1($_POST['pin']);
$pw = $_POST['new_pw'];
$confirm_pw = $_POST['confirm_pw'];

//Checks if new password and confirmation are the same
if ($pw != $confirm_pw)
{ 
$error = "<font color='blue'><em>New Password and Confirm Password must match</em></font>";
$_SESSION['error2'] = $error;
die (header('location:password.php'));
}
if(strlen($pw) < 6 )
{ 
$error = "<font color='blue'><em>Your password must be at least 6 characters</em></font>";
$_SESSION['error2'] = $error;
die (header('location:password.php'));
}
benfund_connect();
$result = mysql_query("select * from user where id = '$id' && password = '$old_pw' && pin = '$pin'")or die(mysql_error());
$num_rows = mysql_num_rows($result);

//Returns error if password or pin do not match the database
if ($num_rows > 0)
{mysql_query("update user set password = sha1('$pw') where id = '$id'") or die(mysql_error());

$_SESSION['changed'] = "<font color='blue'><h3>Your password was successfully changed.</h3></font>";
$_SESSION['pw'] = sha1($pw);
header('Location:cust_admin.php');}
else
{
$error = "<font color='blue'><em>Old password or PIN did not match the database.  Password was not changed</em></font>";
$_SESSION['error2'] = $error;
die (header('location:password.php'));
}

?>
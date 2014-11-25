<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
require('functions/benufund_connect.php');
session_start();
$_SESSION = array();
session_destroy();
$id = $_POST['id'];
$id_encrypt = sha1($id);
benfund_connect();
$query = "Select email from user where id='$id'";
$results = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_row($results) or die(mysql_error());
$email = $row[0];
$subject = "Activate Your Benfund Account";
$url = "https://www.benfund.com/account_activation.php?id=$id_encrypt&id2=$id&Submit=Submit";
$message = 
"Thank you for registering. Please click the link below to activate your account.
$url
(If the Link does not work copy the url and paste it into your web browser's address bar)

Please do not reply to this email";
mail("$email", "$subject", "$message", "From: accounts@benfund.com");
?>
<h3 align="center"><font color="#000000">The message has been sent. Please check 
  you email and click the link provided to activate your accout. <br>
  <a href="https://www.benfund.com/login.php">Go Back to Login</a> </font></h3>
</body>
</html>

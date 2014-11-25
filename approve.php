<?php
$approve = $_GET['approve'];
$id = $_GET['id'];
require("functions/benfund_connect.php");
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
if(!empty($approve))
{echo "<h1>Image Approved</h1>";
copy ("images/$id.jpg", "images/approved/$id.jpg");
unlink ("images/$id.jpg");
benfund_connect();
$query = "Select email, name from user where id='$id'";
$results = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_row($results) or die(mysql_error());
$email = $row[0];
$name = $row[1];
$subject = "Image Approved";
$message ="
$name

The Image you submitted has been been approved.
This is the image that will be used on all of your benfund flyers.
Please login to your account to print your flyers.

Thank You
Benfund Management";

mail("$email", "$subject", "$message", "From: accounts@benfund.com");

}
if(empty($approve))
{echo "<h1>Image Deleted</h1>";
unlink ("images/$id.jpg");
benfund_connect();
$query = "Select email, name from user where id='$id'";
$results = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_row($results) or die(mysql_error());
$email = $row[0];
$name = $row[1];
$subject = "Innapropriate Image";
$message ="
$name
The Image you submitted has been considered inappropriate and was deleted.
Please do not upload innapropriate images to our servers.
If this continues your account will be deleted without notice.

Thank You
Benfund Management";

mail("$email", "$subject", "$message", "From: accounts@benfund.com");
}

?>


</body>
</html>

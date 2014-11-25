<?php
$to  = "tim@websweeper.com, jason@fidesdesign.com";

// subject
$subject = "Benfund Image Approval";

// message
$message = "
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body>
<p>Benfund Account: <em>$id</em></p>
<p><img src='https://www.benfund.com/images/$id.jpg'> </p>
<h2><a href='https://www.benfund.com/approve.php?approve=1&id=$id&submit=submit'>Approve</a> 
    <a href='https://www.benfund.com/approve.php?approve=&id=$id&submit=submit'>Deny</a></h2>
<p>&nbsp;</p>
</body>
</html>
";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: Benfund Image Approval <accounts@benfund.com>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
?> 
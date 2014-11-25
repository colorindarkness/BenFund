<?php
session_start();
$id = $_SESSION['id'];
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center">
  <h3><font color="#0000FF">Sorry we could not log you in, your account has not 
    been activated. You must actvate your account to login. To activate your account 
    click the link in the email that has been sent to you. Be sure to add benfund.com 
    to your safe senders list.</font></h3>
  <h3><font color="#0000FF">Click here to resend the email if it was lost.</font></h3>
  <form name="form1" method="post" action="email.php">
    <input name="id" type="hidden" id="id" value="<?php echo $id ?>">
    <input type="submit" name="Submit" value="Resend Email">
  </form>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</body>
</html>

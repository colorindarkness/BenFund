<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
   setcookie(session_name(), '', time()-42000, '/');
   unset ($_SESSION['error'], $_SESSION['valid_user'], $_SESSION['pw']);
}
session_destroy();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Ameri-Brand Admin Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center"><img src="site-logo-index.gif" width="411" height="32"> </div>
<form name="login" method="post" action="pellet_lookup.php">
  <table width="auto" border="0" align="center" cellpadding="0">
    <tr> 
      <td>User:</td>
      <td><input name="user" type="text" id="user" size="20" maxlength="12"></td>
    </tr>
    <tr> 
      <td>Password:</td>
      <td><input name="pw" type="password" id="pw" size="20" maxlength="15"></td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <div align="center">
          <input type="submit" name="Submit" value="Submit">
          <input type="reset" name="Submit2" value="Reset">
        </div></td>
    </tr>
  </table>
</form>
</body>
</html>

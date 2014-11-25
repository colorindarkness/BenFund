<?php
function logout()
{
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
   setcookie(session_name(), '', time()-42000, '/');
   unset ($_SESSION['error'], $_SESSION['valid_user'], $_SESSION['pw']);
}
session_destroy();
}
?>
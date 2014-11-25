<?php
session_start();
require ("functions/logout.php");
logout();
header('Location:login.php');
?>
<?php
session_start();
$id = $_SESSION['valid_user'];
$pw = $_SESSION['pw'];
require('D:/benfund.com/functions/update_totals.php');
require('D:/benfund.com/functions/user_info.php');
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
?>
<?php
$mid = $_POST['mid'];
$anonymous = $_POST['anonymous'];
$hide_location = $_POST['hide_location'];
$hide_amount = $_POST['hide_amount'];
$private = $_POST['private'];

if (isset($anonymous)){
	$comment_name = "Anonymous";
	}else{
	$comment_name = $_POST['comment_name'];
	}
	
if (isset($hide_location)){
	$comment_location = null;
	}else{
	$comment_location = $_POST['comment_location'];
	}
	
if (isset($hide_amount)){
	$comment_amount = null;
	}else{
	$comment_amount = $_POST['amount2'];
	}
	
if (isset($private)){
	$comment_private = 1;
	}else{
	$comment_private = null;
	}
	
$comment_title = $_POST['comment_title'];
$comment_text = $_POST['comment_text'];
$comment_time = date('l, F jS Y');
benfund_connect();
$query0 = "INSERT INTO comments (mid, comment_name, comment_title, comment_location, comment_text, comment_amount, comment_time, comment_private) VALUES('$mid', '$comment_name', '$comment_title', '$comment_location', '$comment_text', '$comment_amount', '$comment_time', '$comment_private')";
$comment_result = mysql_query($query0) or die(mysql_error());
?>
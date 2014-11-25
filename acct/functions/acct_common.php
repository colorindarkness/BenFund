<?php
benfund_connect();
$pid = $_GET['pid'];
$mid = $_SESSION['mid'];
$mpage_query = "SELECT title, content, date FROM mpages WHERE mid = '$mid' AND pid = '$pid' LIMIT 1";
$mpage_results = mysql_query($mpage_query) or die(mysql_error());
$mpage_row = mysql_fetch_row($mpage_results) or die(mysql_error());
$ptitle = $mpage_row[0];
$pcontent = $mpage_row[1];
$pdate = $mpage_row[2];
echo $ptitle;

?>
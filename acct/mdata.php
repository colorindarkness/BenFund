<?php
benfund_connect();
$query = "SELECT title, meta, header, menu, info, footer, date FROM mtemplates WHERE mid = '$mid'";
$results = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_row($results) or die(mysql_error());

$mtitle = $row[0];
$meta = $row[1];
$header = $row[2];
$menu = $row[3];
$info = $row[4];
$footer = $row[5];
$date = $row[6];
?>
<?php
session_start();
$tmid = $_GET['mid'];
$tpid = $_GET['pid'];

benfund_connect();
$m_typequery = "SELECT m_type FROM merchant WHERE id = '$tmid'";
$m_typeresults = mysql_query($m_typequery) or die(mysql_error());
$m_typerow = mysql_fetch_row($m_typeresults) or die(mysql_error());

$m_type = $m_typerow[0];
include($ROOT.'includes/lang/'.$m_type.'.php');

benfund_connect();
$mtempquery = "SELECT title, meta, header, menu, info, footer, date FROM mtemplates WHERE mid = '$tmid'";
$mtempresult = mysql_query($mtempquery) or die(mysql_error());
if (!mysql_num_rows($mtempresult)){
	header( 'Location: https://www.benfund.com/404.php' );
}
$mtemprow = mysql_fetch_row($mtempresult) or die(mysql_error());

$mtitle = $mtemprow[0];
$meta = $mtemprow[1];
$header = $mtemprow[2];
$menu = $mtemprow[3];
$info = $mtemprow[4];
$footer = $mtemprow[5];
$date = $mtemprow[6];

benfund_connect();
$mpagequery = "SELECT mid, pid, title, content FROM mpages WHERE mid = '$tmid' AND pid = '$tpid'";
$mpageresult = mysql_query($mpagequery) or die(mysql_error());
$mpagerow = mysql_fetch_row($mpageresult) or die(mysql_error());

$mid = $mpagerow[0];
$pid = $mpagerow[1];
$ptitle = $mpagerow[2];
$content = $mpagerow[3];
?>
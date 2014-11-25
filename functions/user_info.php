<?php
function user_info($mid, $pw)
{
benfund_connect();
$query = "select * from merchant where id = '$mid' && password = '$pw'";
$results = mysql_query($query) or die(mysql_error());
global $row;
$row = mysql_fetch_array($results);
mysql_close();
}
?>
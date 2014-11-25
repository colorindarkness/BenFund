<?php
function benfund_connect() {
	mysql_connect("localhost", "benfund", "pr0m3th3u$") or die(mysql_error());
	mysql_select_db("benfund") or die(mysql_error());
}
?>
<?php
$receipt[13] = addslashes("$receipt[13]");
$receipt[14] = addslashes("$receipt[14]");
$receipt[16] = addslashes("$receipt[16]");
$receipt[17] = addslashes("$receipt[17]");
$receipt[18] = addslashes("$receipt[18]");
$receipt[19] = addslashes("$receipt[19]");
	
$timestamp = microtime(true);
$ip = $REMOTE_ADDR;
benfund_connect();
if (!empty($cid)){
$query0 = "INSERT INTO payments (mid, amount, date, method, valid, ip) VALUES ('$mid', '$receipt[9]', '$timestamp', 'ccard', '1', '$ip')";
mysql_query($query0) or die(mysql_error());
$query1 = "SELECT id FROM payments WHERE mid='$mid' AND date='$timestamp'";
$results1 = mysql_query($query1) or die(mysql_error());
$row1 = mysql_fetch_array($results1);
$id = $row1['id'];
$query1 = "INSERT INTO payment_data (payment_id, first_name, last_name, address1, city, state, zip, method, cc_num, exp_date) VALUES ('$id', '$receipt[13]', '$receipt[14]', '$receipt[16]', '$receipt[17]', '$receipt[18]', '$receipt[19]', 'ccard', '$ccnum2', '$exp_date')";		
mysql_query($query1) or die(mysql_error());
}
else{
$query0 = "INSERT INTO payments (mid, cid, amount, date, method, valid, ip) VALUES ('$mid', '$cid', '$receipt[9]', '$timestamp', 'ccard', '1', '$ip')";
mysql_query($query0) or die(mysql_error());
$query1 = "SELECT id FROM payments WHERE mid='$mid' AND date='$timestamp'";
$results1 = mysql_query($query1) or die(mysql_error());
$row1 = mysql_fetch_array($results1);
$id = $row1['id'];
$query1 = "INSERT INTO payment_data (payment_id, first_name, last_name, address1, city, state, zip, method, cc_num, exp_date) VALUES ('$id', '$receipt[13]', '$receipt[14]', '$receipt[16]', '$receipt[17]', '$receipt[18]', '$receipt[19]', 'ccard', '$ccnum2', '$exp_date')";		
mysql_query($query1) or die(mysql_error());
}
?>
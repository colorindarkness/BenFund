<?php
$mid = $_GET['mid'];
require($ROOT."/functions/benfund_connect.php");

benfund_connect();
$query = "SELECT id, m_type, name, contact_name, address, address2, city, state, zip, phone, alt_phone, email, ssn2, tax2, password, pin, goal, activated, settings FROM merchant WHERE id = '$mid' ";
$results = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_row($results) or die(mysql_error());

$mid = $row[0];
$m_type = $row[1];
$name = $row[2];
$c_name = $row[3];
$address = $row[4];
$address2 = $row[5];
$city = $row[6];
$state = $row[7];
$zip = $row[8];
$phone = $row[9];
$alt_phone = $row[10];
$email = $row[11];
$ssn2 = $row[12];
$tax2 = $row[13];
$password = $row[14];
$pin = $row[15];
$goal = $row[16];
$status = $row[17];
$reset = $row[18];
?>
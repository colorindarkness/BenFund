<?php
function update_totals($id)
{
mysql_connect("localhost", "benfund", "oro5591ville") or die(mysql_error());
mysql_select_db("benfund") or die(mysql_error());
$result = mysql_query("Select SUM(ammount) from account_balance Where id='$id'");
global $sum;
$sum = mysql_result($result, 0);
mysql_query("REPLACE INTO totals (id, ammount) VALUES ('$id', '$sum')");
mysql_close();
}
?>
<?php
session_start();
echo $mid;
?>
<div class="clear">
<table width="95%" align="center" border="0" cellspacing="0" cellpadding="4"  class="sortable" id="omfug">
<tr>
<th valign="top" width="20" class="tablehead"><b>Date</b></th><th valign="top" width="20" class="tablehead"><b>Name</b></th><th valign="top" class="tablehead"><b>Amount</b></th><th valign="top" class="tablehead"><b>Method</b></th><th valign="top" class="tablehead"><b>Status</b></th>
</tr>
<?php
benfund_connect();
$result = mysql_query("SELECT id, amount, date, method, valid FROM payments WHERE mid='$mid'");
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
while ($row = mysql_fetch_array($result)) {
	 $payid = $row['id'];
	 $amount = $row['amount'];
   $timestamp = $row["date"];
   $year = substr($timestamp, 0, 4);
   $month = substr($timestamp, 5, 2);
   $day = substr($timestamp, 8, 2);
   $date = "$month/$day/$year";
   $method = $row['method'];
   $active = $row['valid'];
   benfund_connect();
	 $result2 = mysql_query("SELECT first_name, last_name FROM payment_data WHERE id='$payid'");
	 $row2 = mysql_fetch_row($result2);
	 $first_name = $row2[0];
	 $last_name = $row2[1];
   if ($active==1){
	$status = '<span class="true">Cleared</span>';
} else {
	$status = '<span class="false">Pending</span>';
}
   $row_color = ($row_count % 2) ? $color1 : $color2;
?>
<tr class="<?php echo $row_color; ?>"><td valign="top" width="20"><?php echo $date; ?></td><td valign="top" width="250"><a href="view_payment.php?payid=<?php echo $payid; ?>"><?php echo $first_name; ?> <?php echo $last_name; ?></a></td><td valign="top" width="250"><a href="view_payment.php?payid=<?php echo $payid; ?>"><?php echo $amount; ?></a></td><td valign="top"><?php echo $method; ?></td><td valign="top"><?php echo $status; ?></td></tr>
<?php
$row_count++;
 } ?>
</table>
</div>
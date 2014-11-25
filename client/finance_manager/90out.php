<?php
session_start();
require_once('../../functions/common.php');
?>
<table class="sortable" id="omfug" align="center" border="0" cellpadding="4" cellspacing="0" width="95%">
<tr>
<th valign="top" width="90"><b>Invoice #</b></th>
<th valign="top" width="200"><b>Client</b></th>
<th valign="top"  width="75"><b>Amount</b></th>
<th valign="top"><b>Date</b></th>
<th valign="top">Status</th>
</tr>
<?php
benfund_connect();
$result = mysql_query("SELECT * FROM invoice WHERE date BETWEEN DATE_SUB(CURDATE(),INTERVAL 90 DAY) AND DATE_SUB(CURDATE(),INTERVAL 61 DAY) AND from_id='$mid' ORDER BY id DESC");
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
while ($row = mysql_fetch_array($result)) {
$id = $row[0];
$inv = $row[1];
$to = $row[2];
$total = $row['total'];
benfund_connect();
$c_result = mysql_query("SELECT first_name, last_name FROM client WHERE cid='$to'");
$c_row = mysql_fetch_array($c_result)or die(mysql_error());
$cname = $c_row['first_name'];
$cname2 = $c_row['last_name'];
$timestamp = $row[4];
$year = substr($timestamp, 0, 4);
$month = substr($timestamp, 5, 2);
$day = substr($timestamp, 8, 2);
$date = "$month/$day/$year";
$desc = $row[5];
$notes = $row[6];
$terms = $row[7];
$status = $row[8];
$dispute = $row[9];
$row_color = ($row_count % 2) ? $color1 : $color2;
?>
<tr class="<?php echo $row_color; ?>">
<td valign="top"><a href="https://www.benfund.com/client/view_invoice.php?iid=<?php echo $inv ?>"><?php echo $inv ?></a></td>
<td valign="top"><?php echo $cname; ?> <?php echo $cname2; ?></td>
<td valign="top" width="250"><a href="https://www.benfund.com/client/view_invoice.php?iid=<?php echo $inv ?>"><?php echo $total; ?></a></td>
<td valign="top"><?php echo $date; ?></td><td valign="top"><a onclick="return confirmDelete()" href="acct_manager.php?cmd=del&mid=<?php echo $mid; ?>"><img src="https://www.benfund.com/images/elements/icons/sm/delete.gif" border="0" /></a></td></tr>
<?php
$row_count++;
 } ?>
 </table>
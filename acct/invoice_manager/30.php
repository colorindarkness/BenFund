<?php
session_start();
require ("D:/benfund.com/includes/globals.php"); 
require_once($ROOT."/functions/common.php");
$sortit = 'invman30';
include ($ROOT."/includes/js/tablesort.php");
?>
The following are invoices from 30 to 59 days ago.
<table class="tablesorter" id="invman30" align="center" border="0" cellpadding="4" cellspacing="0" width="95%">
<thead>
<tr>
<th valign="top" width="50" ><a href="#"><b>Inv#</b></a></th>
<th valign="top" width="400" ><a href="#"><b>Client</b></a></th>
<th valign="top" width="40" ><a href="#"><b>Amount</b></a></th>
<th valign="top" width="50" ><a href="#"><b>Date</b></a></th>
<th valign="top" width="30" ><a href="#"><b>Status</b></a></th>
</tr>
</thead>
<tbody>
<?php
benfund_connect();
$back = future_past("-", 1140);
$front = future_past("-", 720);
$query = "SELECT * FROM invoice WHERE date BETWEEN $back AND $front AND from_id='$mid' ORDER BY id DESC";
$result = mysql_query($query);
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
while ($row = mysql_fetch_array($result)) {
	if($row){
$id = $row[0];
$inv = $row[1];
$to = $row[2];
$total = $row['total'];
$status = $row['status'];
	if($status == 0){ $condition = '<span class="true">Paid</span>'; }
	if($status == 1){ $condition = '<span class="false">Pending</span>'; }
benfund_connect();
$c_result = mysql_query("SELECT first_name, last_name FROM client WHERE cid='$to'");
$c_row = mysql_fetch_array($c_result)or die(mysql_error());
$cname = $c_row['first_name'];
$cname2 = $c_row['last_name'];
$timestamp = $row[4];
$time = chronos($timestamp, 0);
$desc = $row[5];
$notes = $row[6];
$terms = $row[7];
$status = $row[8];
$dispute = $row[9];
?>
<tr onclick="document.location.href = 'https://www.benfund.com/acct/view_invoice.php?iid=<?php echo $inv ?>';">
<td valign="top"><a href="https://www.benfund.com/acct/view_invoice.php?iid=<?php echo $inv ?>"><?php echo $inv ?></a></td>
<td valign="top"><a href="https://www.benfund.com/acct/view_invoice.php?iid=<?php echo $inv ?>"><?php echo $cname; ?> <?php echo $cname2; ?></a></td>
<td valign="top" width="250"><a href="https://www.benfund.com/acct/view_invoice.php?iid=<?php echo $inv ?>">$<?php echo $total; ?></a></td>
<td valign="top"><?php echo $time; ?></td><td valign="top"><?php echo $condition; ?></td></tr>
<?php
}else{
	?>
	No records found.
	<tr>
		<td valign="top" colspan="5">No records found.</td>
	</tr>
	No records found.
<?php
	}
 } ?>
 </table>
 <?php tablesortpager(); ?>
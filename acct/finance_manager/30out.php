<?php
session_start();
require ("D:/benfund.com/includes/globals.php"); 
require_once($ROOT."/functions/common.php");
$sortit = 'finman30';
include_once($ROOT."/includes/js/tablesort.php");
?>
The following are invoices from 30 to 59 days ago.

<table class="tablesorter" id="finman30" align="center" border="0" cellpadding="4" cellspacing="0" width="95%">
	<thead>
	<tr>
		<th valign="top" width="50"><b>Inv#</b></th>
		<th valign="top" width="50"><b>Type</b></th>
		<th valign="top" width="400"><b>Client</b></th>
		<th valign="top" width="60"><b>Amount</b></th>
		<th valign="top" width="50"><b>Date</b></th>
		<th valign="top" width="20">Status</th>
	</tr>
	</thead>
<tbody>
<?php
benfund_connect();
$past = future_past("-", 1140);
$now = future_past("-", 720);
$query = "SELECT * FROM transactions WHERE date BETWEEN $past AND $now AND from_id='$mid' OR to_id='$mid' ORDER BY id DESC";
echo $query;
$result = mysql_query($query);
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
while ($row = mysql_fetch_array($result)) {
	if($result){
$iid = $row[0];
$type = $row[1];
	if($type == 1){
		$type = '<span class="bold red">Payment</span>';
	}elseif($type == 2){
		$type = '<span class="bold blue">Invoice</span>';
	}elseif($type == 3){
		$type = '<span class="bold green">Credit</span>';
	}
$inv = $row[2];
$from = $row[3];
$to = $row[4];
$total = $row[5];
benfund_connect();
$c_result = mysql_query("SELECT first_name, last_name FROM client WHERE cid='$to'");
$c_row = mysql_fetch_array($c_result)or die(mysql_error());
$cname = $c_row['first_name'];
$cname2 = $c_row['last_name'];
$timestamp = $row[6];
$time = chronos($timestamp, 0);
$status = $row[7];
	if($status == '0'){
		$status = '<span class="bold red">Pending</span>';
	}elseif($status == '1'){
		$status = '<span class="bold green">Cleared</span>';
	}
?>
<tr onclick="document.location.href = 'https://www.benfund.com/acct/view_invoice.php?iid=<?php echo $inv ?>';">
<td valign="top"><a href="https://www.benfund.com/acct/view_invoice.php?iid=<?php echo $inv ?>"><?php echo $inv ?></a></td>
<td valign="top"><?php echo $type; ?></td>
<td valign="top"><?php echo $cname; ?> <?php echo $cname2; ?></td>
<td valign="top" width="250"><a href="https://www.benfund.com/acct/view_invoice.php?iid=<?php echo $inv ?>"><?php echo $total; ?></a></td>
<td valign="top"><?php echo $time; ?></td>
<td valign="top"><?php echo $status; ?></td>
</tr>
<?php
}else{
	?>
	<tr>
		<td valign="top" colspan="5">No records found.</td>
	</tr>
<?php
	}
 } ?>
 </tbody>
 </table>
 <?php tablesortpager(); ?>
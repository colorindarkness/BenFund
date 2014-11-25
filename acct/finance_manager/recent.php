<?php
session_start();
require ("D:/benfund.com/includes/globals.php"); 
require_once($ROOT."/functions/common.php");
$sortit = 'finmanrec';
include_once($ROOT."/includes/js/tablesort.php");
?>
The following are invoices from 30 to 59 days ago.

<table class="tablesorter" id="finmanrec" align="center" border="0" cellpadding="4" cellspacing="0" width="95%">
<thead>
<tr>
<th valign="top" width="50"><b>#</b></th>
<th valign="top" width="70"><b>Type</b></th>
<th valign="top" width="400"><b>Client</b></th>
<th valign="top" width="60"><b>Amount</b></th>
<th valign="top" width="50"><b>Date</b></th>
<th valign="top" width="20">Status</th>
<th valign="top" width="20">View</th>
</tr>
</thead>
<tbody>
<?php
benfund_connect();
$past = future_past("-", "720");
$now = datetime();
$query = "SELECT * FROM transactions WHERE date >= $past AND from_id='$mid' OR to_id='$mid' ORDER BY id DESC";
//echo $query;
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
$to = $row[3];
$from = $row[4];
$amount = $row[5];
benfund_connect();
$c_query = "SELECT first_name, last_name FROM client WHERE cid='$to'";
//echo $c_query;
$c_result = mysql_query($c_query);
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
<tr class="<?php echo $row_color; ?>">
<td valign="top"><a href="https://www.benfund.com/acct/view_invoice.php?iid=<?php echo $inv ?>"><?php echo $inv ?></a></td>
<td valign="top"><?php echo $type; ?></td>
<td valign="top"><?php echo $cname; ?> <?php echo $cname2; ?></td>
<td valign="top" width="250"><a href="https://www.benfund.com/acct/view_invoice.php?iid=<?php echo $inv ?>"><?php echo $amount; ?></a></td>
<td valign="top"><?php echo $time; ?></td>
<td valign="top"><?php echo $status; ?></td>
<td valign="top"><?php if ($row[1] == 1){?><a href="https://www.benfund.com/acct/finance_manager/view_payment.php?iid=<?php echo $iid; ?>"><?php } if ($row[1] == 2){?><a href="https://www.benfund.com/acct/invoice_manager/view_invoice.php?iid=<?php echo $iid; ?>"><?php } if ($row[1] == 3){?><a href="https://www.benfund.com/acct/finance_manager/view_credit.php?iid=<?php echo $iid; ?>"><?php } ?><img src="https://www.benfund.com/images/elements/icons/sm/view.png" border="0" /></a></td>
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
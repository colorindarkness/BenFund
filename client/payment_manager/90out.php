<?php
session_start();
require_once('../../functions/common.php');
?>
<table width="95%" border="0">
	<tr>
		<td valign="top">
			The following are invoices from 30 to 59 days ago.
		</td>
		<td valign="top">
			<div style="text-align: right; display: block;">
			Records per Page:<br />
			<select class="nice" onchange="rowsDisplayed(document.getElementById('jukejoint'), document.getElementById('jukejoint').className, this.value); Repaginate()">
  			<option value="5">5</option>
  			<option value="10">10</option>
  			<option value="20">20</option>
  			<option value="30">30</option>
  			<option value="40">40</option>
  			<option value="50">50</option>
  		</select>  
	</div>  
		</td>   
	</tr>
</table>
<div id="datatable">
<table class="sortable-onload-1-reverse no-arrow paginate-5" id="jukejoint" align="center" border="0" cellpadding="4" cellspacing="0" width="95%">
<tr>
<th valign="top" width="50" class="sortable"><b>Inv#</b></th>
<th valign="top" width="400" class="sortable"><b>Client</b></th>
<th valign="top" width="60" class="sortable"><b>Amount</b></th>
<th valign="top" width="50" class="sortable"><b>Date</b></th>
<th valign="top" width="20" class="sortable">Status</th>
</tr>
<?php
$back = future_past("-", 2880);
$front = future_past("-", 2161);
benfund_connect();
$result = mysql_query("SELECT * FROM invoice WHERE date BETWEEN $back AND $front AND to_id='$cid' ORDER BY id DESC");
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
$time = chronos($timestamp, 0);
$desc = $row[5];
$notes = $row[6];
$terms = $row[7];
$status = $row[8];
$dispute = $row[9];
$row_color = ($row_count % 2) ? $color1 : $color2;
?>
<tr class="<?php echo $row_color; ?>">
<td valign="top"><a href="https://www.benfund.com/client/payment_manager/view_invoice.php?iid=<?php echo $inv ?>"><?php echo $inv ?></a></td>
<td valign="top"><?php echo $cname; ?> <?php echo $cname2; ?></td>
<td valign="top" width="250"><a href="https://www.benfund.com/client/payment_manager/view_invoice.php?iid=<?php echo $inv ?>"><?php echo $total; ?></a></td>
<td valign="top"><?php echo $time; ?></td><td valign="top"><a onclick="return confirmDelete()" href="acct_manager.php?cmd=del&mid=<?php echo $mid; ?>"><img src="https://www.benfund.com/images/elements/icons/sm/delete.gif" border="0" /></a></td></tr>
<?php
$row_count++;
 } ?>
 </table>
</div>
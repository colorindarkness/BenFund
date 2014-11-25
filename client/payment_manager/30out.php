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
benfund_connect();
$past = future_past("-", 1140);
$now = future_past("-", 720);
$query = "SELECT * FROM payments WHERE cid='$cid' ORDER BY id DESC";
$result = mysql_query($query);
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
while ($row = mysql_fetch_array($result)) {
$id = $row[0];
$to = $row[1];
$amount = $row[3];
$timestamp = $row[4];
$time = chronos($timestamp, 0);
$method = $row[5];
$status = $row[6];
$row_color = ($row_count % 2) ? $color1 : $color2;
?>
<tr class="<?php echo $row_color; ?>">
<td valign="top"><a href="https://www.benfund.com/client/payment_manager/view_invoice.php?iid=<?php echo $inv ?>"><?php echo $id ?></a></td>
<td valign="top"><?php echo $to; ?></td>
<td valign="top" width="250"><a href="https://www.benfund.com/client/payment_manager/view_invoice.php?iid=<?php echo $inv ?>"><?php echo $amount; ?></a></td>
<td valign="top"><?php echo $time; ?></td>
<td valign="top"><a onclick="return confirmDelete()" href="acct_manager.php?cmd=del&mid=<?php echo $mid; ?>"><img src="https://www.benfund.com/images/elements/icons/sm/delete.gif" border="0" /></a></td></tr>
<?php
$row_count++;
 } ?>
 </table>
</div>
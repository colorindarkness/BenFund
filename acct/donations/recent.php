<?php
session_start();
require ("D:/benfund.com/includes/globals.php"); 
require_once($ROOT."/functions/common.php");
$sortid = 'kmfdm';
include_once($ROOT."/includes/js/tablesort.php");
?>
<table width="95%" border="0" onload="Repaginate()">
	<tr>
		<td valign="top">
			The following are the most recent invoices from today to 29 days ago.
		</td>
		<td valign="top">
		<div style="text-align: right; display: block;">
			Records per Page:<br />
			<select class="nice" onchange="rowsDisplayed(document.getElementById('kmfdm'), document.getElementById('kmfdm').className, this.value); Repaginate()">
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
<table class="sortable-onload-1-reverse no-arrow paginate-5" id="kmfdm" align="center" border="0" cellpadding="4" cellspacing="0" width="95%">
<thead>
<tr>
<th valign="top" width="50" class="sortable"><a href="#"><b>Inv#</b></a></th>
<th valign="top" width="400" class="sortable"><a href="#"><b>Client</b></a></th>
<th valign="top" width="60" class="sortable"><a href="#"><b>Amount</b></a></th>
<th valign="top" width="50" class="sortable"><a href="#"><b>Date</b></a></th>
<th valign="top" width="20" class="sortable"><a href="#"><b>Status</b></a></th>
</tr>
</thead>
<tbody>
<?php
benfund_connect();
$back = future_past("-", 720);
$front = datetime();
$query = "SELECT * FROM donations WHERE to_id='$mid' ORDER BY id DESC";
//$query = "SELECT * FROM donations WHERE date BETWEEN $back AND $front AND from_id='$mid' ORDER BY id DESC";
$result = mysql_query($query);
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
while ($row = mysql_fetch_array($result)) {
$id = $row[0];
$did = $row[1];
$to = $row[2];
$from = $row[3];
$total = $row['total'];
$status = $row['status'];
	if($status == 0){ $condition = '<span class="true">Cleared</span>'; }
	if($status == 1){ $condition = '<span class="false">Pending</span>'; }

$timestamp = $row[4];
$time = chronos($timestamp, 0);
$desc = $row[5];
$notes = $row[6];
$dispute = $row[8];
$row_color = ($row_count % 2) ? $color1 : $color2;
?>
<tr class="<?php echo $row_color; ?>" onclick="document.location.href = 'https://www.benfund.com/acct/donations/view_donation.php?did=<?php echo $did ?>';">
<td valign="top"><a href="https://www.benfund.com/acct/donations/view_donation.php?did=<?php echo $did ?>"><?php echo $did ?></a></td>
<td valign="top"><a href="https://www.benfund.com/acct/donations/view_donation.php?did=<?php echo $did ?>"><?php echo $from; ?></a></td>
<td valign="top" width="250"><a href="https://www.benfund.com/acct/donations/view_donation.php?did=<?php echo $did ?>">$<?php echo $total; ?></a></td>
<td valign="top"><?php echo $time; ?></td><td valign="top"><?php echo $condition; ?></td></tr>
<?php
$row_count++;
 } ?>
 </tbody>
 </table>
</div>
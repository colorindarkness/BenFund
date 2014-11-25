<?php
session_start();
require ("D:/benfund.com/includes/globals.php"); 
require_once($ROOT."/functions/common.php");
//require_once('../../functions/common.php');
//$mid = '617428';
$sortid = 'omfug';
include_once($ROOT."/includes/js/tablesort.php");
?>
<table width="95%" border="0" onload="Repaginate()">
	<tr>
		<td valign="top">
			The following are invoices from 90 to 120 days ago. To view invoices older than 120 days click on the 'Archive' tab.
		</td>
		<td valign="top">
			<div style="text-align: right; display: block;">
			Records per Page:<br />
			<select class="nice" onchange="rowsDisplayed(document.getElementById('omfug'), document.getElementById('omfug').className, this.value); Repaginate()">
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
<table class="sortable-onload-1-reverse no-arrow paginate-5" id="omfug" align="center" border="0" cellpadding="4" cellspacing="0" width="95%">
<tr>
<th valign="top" width="50" class="sortable"><b>Inv#</b></th>
<th valign="top" width="400" class="sortable"><b>Client</b></th>
<th valign="top" width="60" class="sortable"><b>Amount</b></th>
<th valign="top" width="50" class="sortable"><b>Date</b></th>
<th valign="top" width="20" class="sortable">Status</th>
</tr>
<?php
benfund_connect();
$back = future_past("-", 2880);
$front = future_past("-", 2161);
$query = "SELECT * FROM donations WHERE date BETWEEN $back AND $front AND to_id='$mid' ORDER BY id DESC";
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
$status = $row[7];
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
 </table>
</div>
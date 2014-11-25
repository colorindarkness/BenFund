<?php
session_start();
require ("D:/benfund.com/includes/globals.php"); 
require_once($ROOT."/functions/common.php");
$sortit = 'climanall';
include ($ROOT."/includes/js/tablesort.php");
?>
The following are invoices from 30 to 59 days ago.
<table class="tablesorter" id="climanall" align="center" border="0" cellpadding="4" cellspacing="0" width="95%">
<thead>
<tr>
<th valign="top" width="75"><b>Client #</b></th>
<th valign="top" width="20"><b>Name</b></th>
<th valign="top"><b>Amount</b></th>
<th valign="top"><b>Status</b></th>
</tr>
</thead>
<tbody>
<?php
benfund_connect();
$result = mysql_query("SELECT cid, first_name, m_i, last_name, balance, activated FROM client WHERE mid = '$mid' AND deleted = '0' ORDER BY last_name");
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
while ($row = mysql_fetch_row($result)) {
	if($result){
	 $cid = $row[0];
	 $first_name = $row[1];
	 $m_i = $row[2];
	 $last_name = $row[3];
	 $balance = $row[4];
   $active = $row[5];
/*   $year = substr($timestamp, 0, 4);
   $month = substr($timestamp, 5, 2);
   $day = substr($timestamp, 8, 2);
   $date = "$month/$day/$year";
   $method = $row['method'];
   $active = $row['valid'];
   benfund_connect();
	 $result2 = mysql_query("SELECT first_name, last_name FROM payment_data WHERE id='$payid'");
	 $row2 = mysql_fetch_row($result2);
	 */
   if ($active==1){
	$status = '<span class="true">Active</span>';
} else {
	$status = '<span class="false">Inactive</span>';
}
?>
<tr onclick="document.location.href = 'https://www.benfund.com/acct/client.php?cid=<?php echo $cid ?>';">
		<td valign="top" width="20"><a href="https://www.benfund.com/acct/client.php?cid=<?php echo $cid; ?>"><?php echo $cid; ?></a></td>
		<td valign="top" width="250"><a href="https://www.benfund.com/acct/client.php?cid=<?php echo $cid; ?>"><?php echo $last_name; ?>, <?php echo $first_name; ?> </a></td>
		<td valign="top" width="250"><a href="https://www.benfund.com/acct/client.php?cid=<?php echo $cid; ?>"><?php echo $balance; ?></a></td>
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
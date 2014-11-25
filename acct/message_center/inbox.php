<?php
session_start();
if ($_GET['view'] == 'outbox'){
require_once('D:\benfund.com\functions\benfund_connect.php');
}
if ($_GET['view'] == 'compose'){
require_once('D:\benfund.com\functions\benfund_connect.php');
}
?>
<span class="subtitle">Inbox</span>
<div class="hr"></div>
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
<th valign="top" class="sortable"width="5" class="tablehead"><input name="toggle" value="" onclick="checkAll(50);" type="checkbox"></th>
<th valign="top" class="sortable">&nbsp;</th>
<th valign="top" class="sortable"width="100" class="tablehead"><b>From</b></th>
<th valign="top" class="sortable"><b>Subject</b></th>
<th valign="top" class="sortable"><b>Date</b></th>
<th valign="top" class="sortable">&nbsp;</th>
</tr>
<?php
benfund_connect();
$msgresult = mysql_query("SELECT * FROM messages WHERE to_mid='$mid' AND deleted ='0' ORDER BY new ASC, date DESC");
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
while ($msg_row = mysql_fetch_array($msgresult)) {
$msg_id = $msg_row[0];
$msg_from = $msg_row[1];
benfund_connect();
$from_result = mysql_query("SELECT name FROM merchant WHERE id='$msg_from'");
$from_row = mysql_fetch_array($from_result)or die(mysql_error());
$msg_from = $from_row['name'];
$msg_to = $msg_row[2];
$msg_subject = $msg_row[3];
$msg_content = $msg_row[4];
$msg_date = $msg_row[5];
$msg_read = $msg_row['new'];
$msg_reply = $msg_row['reply'];
$msg_deleted = $msg_row[8];
$row_color = ($row_count % 2) ? $color1 : $color2;
if ($msg_read == 0){
	$fresh = '<img src=https://www.benfund.com/images/elements/icons/sm/mail-new.png>';
}
if ($msg_read == 1){
	$fresh = '<img src=https://www.benfund.com/images/elements/icons/sm/mail-open.png>';
}
if ($msg_reply == 1){
	$fresh = '<img src=https://www.benfund.com/images/elements/icons/sm/mail-reply.png>';
}
if ($msg_reply == 2){
	$fresh = '<img src=https://www.benfund.com/images/elements/icons/sm/mail-forward.png>';
}
?>
<tr class="<?php echo $row_color; ?>"><td valign="top" width="20"><input id="cb0" name="cid[]" value="<?php echo $mid; ?>" onclick="isChecked(this.checked);" type="checkbox"></td><td valign="top"><?php echo $fresh ?></td><td valign="top" width="20"><?php echo $msg_from; ?></td><td valign="top" width="250"><a href="message.php?cmd=view&msg_id=<?php echo $msg_id?>"><?php echo $msg_subject; ?></a></td><td valign="top"><?php echo $msg_date; ?></td><td valign="top"><a onclick="return confirmDelete()" href="acct_manager.php?cmd=del&mid=<?php echo $mid; ?>"><img src="https://www.benfund.com/images/elements/icons/sm/delete.gif" border="0" /></a></td></tr>
<?php
$row_count++;
 } ?>
 </table>
</div>
 <table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/admin/delete_page.php"><img src="https://www.benfund.com/images/elements/icons/delete_page.gif" border="0"/></a><br /><a class="toolbar" href="https://www.benfund.com/admin/delete_page.php">Delete Selected</a></td>
</tr>
</table>
</td></tr></table>
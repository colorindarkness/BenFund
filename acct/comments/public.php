<?php
session_start();
require ("D:/benfund.com/includes/globals.php"); 
require_once($ROOT."/functions/common.php");
$sortid = 'jukejoint';
include_once($ROOT."/includes/js/tablesort.php");
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
<th valign="top" width="5" class="tablehead"><input name="toggle" value="" onclick="checkAll(50);" type="checkbox"></th>
<th valign="top" class="sortable">&nbsp;</th>
<th valign="top" class="sortable" width="100" class="tablehead"><b>From</b></th>
<th valign="top" class="sortable"><b>Subject</b></th>
<th valign="top" class="sortable"><b>Date</b></th>
<th valign="top" >Private</th>
<th valign="top" >Delete</th>
</tr>
<?php
benfund_connect();
$comment_result = mysql_query("SELECT id, comment_name, comment_title, comment_text, comment_time FROM comments WHERE mid='$mid' AND approved ='1' AND comment_private='0'");
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
while ($comment_row = mysql_fetch_array($comment_result)) {
$comment_id = $comment_row[0];
$comment_from = $comment_row[1];
$comment_title = $comment_row[2];
//$comment_text = $comment_row[3];
$comment_text = substr($comment_row[3], 0, 40);
$comment_text = substr($comment_row[3], 0, strrpos($comment_text, " "));
$comment_date = chronos($comment_row[4], 0);
$row_color = ($row_count % 2) ? $color1 : $color2;
if ($comment_read == 0){
	$fresh = '<img src=https://www.benfund.com/images/elements/icons/sm/mail-new.png>';
}
if ($comment_read == 1){
	$fresh = '<img src=https://www.benfund.com/images/elements/icons/sm/mail-open.png>';
}
if ($comment_reply == 1){
	$fresh = '<img src=https://www.benfund.com/images/elements/icons/sm/mail-reply.png>';
}
if ($comment_reply == 2){
	$fresh = '<img src=https://www.benfund.com/images/elements/icons/sm/mail-forward.png>';
}

?>
<tr class="<?php echo $row_color; ?>" onclick="document.location.href = 'https://www.benfund.com/acct/comments/view_comment.php?com_id=<?php echo $comment_id ?>';">
<td valign="top" width="20"><input id="cb0" name="cid[]" value="<?php echo $mid; ?>" onclick="isChecked(this.checked);" type="checkbox"></td>
<td valign="top"><?php echo $fresh ?></td>
<td valign="top" width="20"><?php echo $comment_from; ?></td>
<td valign="top" width="250"><a href="comments/view_comment.php?com_id=<?php echo $comment_id?>"><?php echo $comment_title; ?></a><br><?php echo $comment_text ;?>...</td>
<td valign="top"><?php echo $comment_date; ?></td>
<td valign="top"><a href="https://www.benfund.com/acct/comments.php?cmd=private&comment_id=<?php echo $comment_id; ?>"><img src="https://www.benfund.com/images/elements/icons/sm/private.gif" border="0" /></a></td>
<td valign="top"><a onclick="return confirmDelete()" href="https://www.benfund.com/acct/comments.php?cmd=delete&com_id=<?php echo $comment_id; ?>"><img src="https://www.benfund.com/images/elements/icons/sm/delete.gif" border="0" /></a></td>
</tr>
<?php
$row_count++;
 } ?>
 </table>
</div>
 <table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/comments.php?cmd=del&cid=<?php echo $comment_id ;?>"><img src="https://www.benfund.com/images/elements/icons/private_comment.png" border="0"/></a><br /><a class="toolbar" href="https://www.benfund.com/admin/delete_page.php">Mark as Private</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/comments.php?cmd=del&cid=<?php echo $comment_id ;?>"><img src="https://www.benfund.com/images/elements/icons/delete_page.gif" border="0"/></a><br /><a class="toolbar" href="https://www.benfund.com/admin/delete_page.php">Delete Selected</a></td>
</tr>
</table>
</td></tr></table>
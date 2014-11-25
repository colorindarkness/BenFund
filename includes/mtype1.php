<?php
session_start();
if ($_GET['pid'] == 1){?>
	<div style="border: 1px dotted #DCDCDC; width; 150px; float: right;">
	<table class="toolbar">
	<tr><td align="center">
	<a target='emailpage' href='http://www.benfund.com/emailpage.php' onclick="return emailpage.load(this.href)">
	<img src="https://www.benfund.com/images/elements/icons/med/mail-compose.png" border="0"><br />
	Email</a>
	</td></tr>
	<tr><td align="center">
	<a href="javascript:bookmarksite('<?php echo $mtitle; ?> - <?php echo $ptitle; ?>', 'http://www.benfund.com/<?php echo $mid; ?>')">
	<img src="https://www.benfund.com/images/elements/icons/med/bookmark.png" border="0"><br />
	Bookmark</a>
	</td></tr>
	<tr><td align="center">
	<script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script>
	</td></tr>
	</table>
	</div>
	<div style="border: 1px dotted #000000; float: left; width: 200px; margin-right: 2px; margin-bottom: 2px;"><center><img src="http://www.benfund.com/images/illuminati.jpg"></center></div>
<?php echo $content; ?>
<p><div class="clear"><center><a href="https://www.benfund.com/mindex.php?mid=<?php echo $_GET['mid'];?>&pid=3"><img src="https://www.benfund.com/images/elements/buttons/donate_now.gif" border="0"></a></center></div><p>
<div class="clear">
	<?php if ($_GET['comment'] == 1){ 
		include($ROOT.'functions/add_comment.php');?>
		<div class="action"><span class="actionmsg">Comment Added!</span></div><p>
	<?php } ?>
<span class="subtitle">Comments</span>
<table><tr><td valign="top">
<div class="newcomment yellow" id="newcomment">
	<form name="comment_form" method="post" action="https://www.benfund.com/mindex.php?mid=<?php echo $mid; ?>&pid=1&comment=1">
		
			<span class="emphasis">Your Name:</span><br />
			<input type="text" class="nice" name="comment_name" size="23"><br />
			<span class="emphasis">Your Location (optional):</span><br />
			<input type="text" class="nice" name="comment_location" size="23"><br />
			<span class="emphasis">Title:</span><br />
			<input type="text" class="nice" name="comment_title" size="23"><br />
			<span class="emphasis">Your Comment:</span><br />
			<textarea class="nice" name="comment_text" cols="21" rows="5"></textarea><br />
			<input type="hidden" name="mid" value="<?php echo $mid;?>">
		<div class="optionbox2" style="text-align: left;">
		<span class="emphasis2">Options</span><br/>
			<input type="checkbox" name="anonymous">I would like to comment Anonymously.<br />
			<input type="checkbox" name="private">I would like to make my comment viewable only to the Benfund owner.<br />
		</div>
		<center>
		<input type="image" src="https://www.benfund.com/images/elements/submit.gif" name="submit">
		</center>
		</form>
</div>
</td>
<td valign="top">
<?php include($ROOT.'functions/comments.php');?>
</td>
</tr>
</table>
</div>
<p>
<?php } if ($_GET['pid'] == 2){?>
<?php echo $content; ?>
<p><center><a href="https://www.benfund.com/mindex.php?mid=<?php echo $_GET['mid'];?>&pid=3"><img src="https://www.benfund.com/images/elements/buttons/donate_now.gif" border="0"></a></center>
<?php }if ($_GET['pid'] == 3){?>
<?php echo $content; ?>
<?php include('includes/payment.php'); ?>
<?php } ?>
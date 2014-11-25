<?php
benfund_connect();
$comment_query = "SELECT comment_name, comment_title, comment_location, comment_text, comment_amount, comment_time FROM comments WHERE mid = '$mid' AND comment_private != '1' AND approved = '1' ORDER BY id DESC";
$comment_result = mysql_query($comment_query) or die(mysql_error());
while ($comment_row = mysql_fetch_array($comment_result)) {
	$comment_name = $comment_row[0];
	$comment_title = $comment_row[1];
	$comment_location = $comment_row[2];
	$comment_text = $comment_row[3];
	$comment_amount = $comment_row[4];
	$comment_time = $comment_row[5];
?>
<div class="commentbox white">
<span class="comment_name"><?php echo $comment_name; ?></span><br />
<?php if(isset($comment_location)){?>
<span class="comment_location"><?php echo $comment_location; ?></span><br />
<?php }
if($comment_amount != null){?>
<span class="comment_amount">$<?php echo $comment_amount; ?></span><br />
<?php } ?>
<span class="comment_title"><?php echo $comment_title; ?></span><p>
<div class="comment_wrapper">
<span class="comment_text"><?php echo $comment_text; ?></span><p>
</div>
<span class="comment_time"><?php echo $comment_time; ?></span>
</div><p>
<?php }?>
<?php
session_start();
$mail_mid = $_POST['mail_mid'];
$rec_name = $_POST['rec_name'];
$rec_email = $_POST['rec_email'];
$my_name = $_POST['my_name'];
$my_email = $_POST['my_email'];
$my_comment = $_POST['my_comment'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Email this page to a friend - Benfund</title>
<link rel="stylesheet" href="http://www.benfund.com/includes/css/style.css" type="text/css" />
</head>
<?php
	if ($_GET['send'] == 1){
		$url = 'http://www.benfund.com/'.$mail_mid.'';
		$to = $rec_email;
		$subject = "Check out this webpage - BenFund";
		$msg = 'Dear '.$rec_name.':';
		$msg .= $my_name.' has sent you a BenFund link for you to see, along with a message.';
		$msg .= 'The address to the BenFund page is '.$url.' and the message is below.';
		$msg .= ' ';
		$msg .= $my_comment;
		$from = $my_name.' <'.$my_email.'>';
		
		mail($to, $subject, $msg, $from); //send the message
	?>
Thank You!<p>
Your message has been sent.
<?php }else{ ?>
<table align="center" width="260"><tr><td align="center">	
<form name="mail_form" method="post" action="http://www.benfund.com/emailpage.php?send=1">
<table width="200">
<tr><td><span type="text" class="emphasis">Recipient Name:</span></td></tr>
<tr><td><input type="text" class="nice" name="rec_name" size="23"></td></tr>
<tr><td><span class="emphasis">Recipient Email:</span></td></tr>
<tr><td><input type="text" class="nice" name="rec_email" size="23"></td></tr>
<tr><td><span type="text" class="emphasis">Your Name:</span></td></tr>
<tr><td><input type="text" class="nice" name="my_name" size="23"></td></tr>
<tr><td><span type="text" class="emphasis">Your Email:</span></td></tr>
<tr><td><input type="text" class="nice" name="my_email" size="23"></td></tr>
<tr><td><span class="emphasis">Your Comment:</span></td></tr>
<tr><td><textarea class="nice" name="my_comment" cols="21" rows="5"></textarea></td></tr>
</table>
<input type="hidden" name="mid" value="<?php echo $mail_mid;?>">
<center>
<input type="image" src="https://www.benfund.com/images/elements/reset.gif" name="submit">
<input type="image" src="https://www.benfund.com/images/elements/submit.gif" name="submit">
</center>
</td></tr></table>
<?php } ?>
<center>
<a href="javascript:window.close();">Close This Window</a>
</center>
</body>
</html>
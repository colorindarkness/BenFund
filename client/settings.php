<?php
session_start();
if (!isset($_SESSION[valid_client])){
	$error = '<div class="error"><span class="errormsg">You must be logged in to view this page. <br>Please Login.<br></span></div>';
     header('Location:../login.php');
}
$page_title = "Account Settings";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
$error = '<div class="error"><span class="errormsg">You must be logged in to view this page. <br>Please Login.<br></span></div>';

$updated = $_POST['updated'];
$new_time_zone = $_POST['time_zone'];
$new_sec_question = $_POST['sec_question'];
$new_sec_answer = $_POST['sec_answer'];
$new_inst_msg = $_POST['inst_msg'];
$new_mail_msg = $_POST['mail_msg'];
$new_newsletter = $_POST['newsletter'];
$new_pw = $_POST['new_pw'];
$confirm_new_pw = $_POST['confirm_new_pw'];

if(isset($updated)){
	
	//ASSIGN NEW SETTINGS
	if(isset($new_time_zone)){
		$update_time_zone = $new_time_zone;
	}else{
		$update_time_zone = $tim_zone;
	}
	if(isset($new_sec_question)){
		$update_sec_question = $new_sec_question;
	}else{
		$update_sec_question = $sec_question;
	}
	if(isset($new_sec_answer)){
		$update_sec_answer = $new_sec_answer;
	}else{
		$update_sec_answer = $sec_answer;
	}
	if(isset($new_inst_msg)){ 
		$update_inst_msg = $new_inst_msg;
	}else{
		$update_inst_msg = $inst_msg;
	}
	if(isset($new_mail_msg)){
		$update_mail_msg = $new_mail_msg;
	}else{
		$update_mail_msg = $mail_msg;
	}
	if(isset($new_newsletter)){
		$update_newsletter = $new_newsletter;
	}else{
		$update_newsletter = $newsletter;
	}
	//COMPILE NEW SETTINGS
	$new_settings = $update_time_zone.'~'.$update_sec_question.'~'.$update_sec_answer.'~'.$update_inst_msg.'~'.$update_mail_msg.'~'.$update_newsletter;
	benfund_connect();
	$update_settings_query = "UPDATE client SET settings='$new_settings' WHERE id = '$cid' ";
	$update_settings_results = mysql_query($update_settings_query) or die(mysql_error());
	$status = '<div class="action"><span class="actionmsg">Settings Successfully Changed.<span></div>';
	//IF NEW PASSWORDS EXISTS
	if((isset($new_pw)) AND (isset($confirm_new_pw))){
		if(isset($new_pw)){
			$update_new_pw = $new_pw;
		}else{
			$update_new_pw = $current_pw;
		}
		if(isset($confirm_new_pw)){
			$update_confirm_new_pw = $confirm_new_pw;
		}else{
			$update_confirm_new_pw = $current_pw;
		}
	benfund_connect();
	$update_pw_query = "UPDATE client SET password='$new_pw' WHERE id = '$cid' ";
	mysql_query($update_pw_query) or die(mysql_error());
	
	$recipient = $email;
	$from = 'customerservice@benfund.com';
	$from_name = 'BenFund Customer Service';
	$subject = 'New Password Set';
	$text_message_text = 'You have specified a new password for your BenFund Account #: '.$mid.'.
	
	New Password: '.$new_pw.'
	
	If you encounter problems please contact BenFund Customer Service.';
	$html_message_text = 'You have specified a new password for your BenFund Account #: '.$mid.'<p>New Password: <i>'.$new_pw.'</i><p>If you encounter problems please contact BenFund Customer Service.';
	$text_message = text_email($text_message_text);
	$html_message = html_email($html_message_text);
	//echo $recipient;
	require ($ROOT."/functions/mail.php");
	$pw_status = '<div class="action"><span class="actionmsg">Password Successfully Changed.<span></div>';
	}
}

benfund_connect();
$settings_query = "SELECT email, settings FROM client WHERE cid = '$cid' ";
$settings_results = mysql_query($settings_query) or die(mysql_error());
$settings_row = mysql_fetch_array($settings_results) or die(mysql_error());
$_SESSION['email'] = $settings_row['email'];
$email = $_SESSION['email'];
$settings = $settings_row['settings'];
$s_segment = explode("~", $settings);
$time_zone = $s_segment[0];
$sec_question = $s_segment[1];
$sec_answer = $s_segment[2];
$messages = $s_segment[3];
$inst_messages = $s_segment[4];   
$newsletter = $s_segment[5];

if($messages == 1){
		$m1 = checked;
	}
	
if($inst_messages == 1){
		$m2 = checked;
	}
	
if($newsletter == 1){
		$n1 = checked;
	}

switch ($time_zone) {
		case 1:
				//Pacific Standard
		    $t1 = "selected";
		    break;
		case 2:
				//Mountain
		    $t2 = "selected";
		    break;
		case 3:
				//Central
		    $t3 = "selected";
		    break;
		case 4:
				//Eastern
		    $t4 = "selected";
		    break;
		case 5:
				//Hawaii
		    $t5 = "selected";
		    break;	
		case 6:
				//Alaska
		    $t6 = "selected";
		    break;
		}
		
	switch ($sec_question) {
		case 1:
				//Pacific Standard
		    $s1 = "selected";
		    break;
		case 2:
				//Mountain
		    $s2 = "selected";
		    break;
		case 3:
				//Central
		    $s3 = "selected";
		    break;
		case 4:
				//Eastern
		    $s4 = "selected";
		    break;
		case 5:
				//Hawaii
		    $s5 = "selected";
		    break;	
		case 6:
				//Alaska
		    $s6 = "selected";
		    break;
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Merchant Contol Panel</title>
<?php include ($ROOT."/includes/head.php") ?>
<script type="text/javascript">womOn();</script>
</head>
<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."/includes/header.php") ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."/includes/left.php") ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top" valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."/includes/pathway.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<?php m_menu3(); ?>
	<div class="content_outer">
	<div class="content_inner">
	<div class="pagetitle">Account Settings</div>
	<div class="hr"></div><p>
	<?php echo $status ;?>
	<p>
	<?php echo $pw_status ;?>
	The following are your Account Settings and Preferences.<p>
	
	<form name="acct_settings" id="acct_settings" method="post" action="settings.php">
	<div style="padding: 6px; border: 1px solid #6CD136; background-color: #E2F7D2;">
	<span class="emphasis">Time Zone</span><a class="btt" title="Time Zone^The Time Zone setting allows you to display BenFund time sensitive information and transactions in your Local Time."><img src="https://www.benfund.com/images/elements/icons/sm/info.gif"></a><br>
	<select name="time_zone" id="time_zone" class="nice">
	<option value="1" <?php echo $t1 ;?>>Pacific Standard Time (PST, GMT -8)</option>
	<option value="2" <?php echo $t2 ;?>>Mountain Standard Time (MST, GMT -7)</option>
	<option value="3" <?php echo $t3 ;?>>Central Standard Time (CST, GMT -6)</option>
	<option value="4" <?php echo $t4 ;?>>Eastern Standard Time (EST, GMT -5)</option>
	<option value="5" <?php echo $t5 ;?>>Hawaii Standard Time (HST, GMT -10)</option>
	<option value="6" <?php echo $t6 ;?>>Alaska Standard Time (AKST, GMT -9)</option>
	</select>
	<p>
	<span class="emphasis">Time Display Format</span><a class="btt" title="Time Zone^Specify how you would like to see time and dates displayed on your account"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif"></a><br>
	<select name="time_display" id="time_displat" class="nice">
	<option value="1" <?php echo $t1 ;?>>Simple Standard(mm/dd/yyyy)</option>
	<option value="2" <?php echo $t2 ;?>>Standard Date & Time(mm/dd/yyyy HH:MM)</option>
	<option value="3" <?php echo $t3 ;?>>Central Standard Time (CST, GMT -6)</option>
	<option value="4" <?php echo $t4 ;?>>Eastern Standard Time (EST, GMT -5)</option>
	<option value="5" <?php echo $t5 ;?>>Hawaii Standard Time (HST, GMT -10)</option>
	<option value="6" <?php echo $t6 ;?>>Alaska Standard Time (AKST, GMT -9)</option>
	</select>
	</div>
	<p>
	<div style="padding: 6px; border: 1px solid #0000FF; background-color: #E6E6FA;">
	<span class="emphasis">Messages</span><a class="btt" title="Messages^The following settings apply to the internal BenFund Messaging System"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif"></a><br>
	<input type="checkbox" id="inst_msg" name="inst_msg" value="1" <?php echo $m1 ;?>>Notify me instantly when I receive a message<br>
	<input type="checkbox" id="mail_msg" name="mail_msg" value="1" <?php echo $m2 ;?>>Notify me via email when I receive new messages
	<p>
	<span class="emphasis">BenFund Newsletter</span><a class="btt" title="BenFund Newsletter^Stay informed about BenFund related News and Updates with the BenFund Newsletter"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif"></a><br>
	<input type="checkbox" id="newsletter" name="newsletter" value="1" <?php echo $n1 ;?>>Please subscribe me to the BenFund electronic Newsletter
	</div>
	<p>
	<div style="padding: 6px; border: 1px solid #800000; background-color: #FFFFF0;">
	<span class="emphasis">Password Reset Security Question</span><a class="btt" title="Security Question^A Security Question is used in the case you forget your password to reset your password. It is important you chose a question that only you can easily remember."><img src="https://www.benfund.com/images/elements/icons/sm/info.gif"></a><br>
	<select name="sec_question" id="sec_question" class="nice">
	<option value="1" <?php echo $s1 ?>>BenFund Account Password Reset Security Question # 1?</option>
	<option value="2" <?php echo $s2 ?>>BenFund Account Password Reset Security Question # 2?</option>
	<option value="3" <?php echo $s3 ?>>BenFund Account Password Reset Security Question # 3?</option>
	<option value="4" <?php echo $s4 ?>>BenFund Account Password Reset Security Question # 4?</option>
	<option value="5" <?php echo $s5 ?>>BenFund Account Password Reset Security Question # 5?</option>
	<option value="6" <?php echo $s6 ?>>BenFund Account Password Reset Security Question # 6?</option>
	</select>
	<p>
	<span class="emphasis">Password Reset Security Answer</span><a class="btt" title="Security Answer^Please choose an answer only you know from memory. This answer is not case sensitive."><img src="https://www.benfund.com/images/elements/icons/sm/info.gif"></a><br>
	<input type="text" id="sec_answer" name="sec_answer" size="60" maxlength="60" class="nice" value="<?php echo $sec_answer ?>"> 
	<p>
	<span class="emphasis">Change Password</span><a class="btt" title="Change Your Password^You can change your BenFund Password here. You will receieve an email with your new password."><img src="https://www.benfund.com/images/elements/icons/sm/info.gif"></a><br>
	
	New Password:<br>
	<input type="password" id="new_pw" name="new_pw" size="20" maxlength="20" class="nice"><br>
	Confirm New Password:<br>
	<input type="password" id="confirm_new_pw" name="confirm_new_pw" size="20" maxlength="20" class="nice">
	</div>
	<p>
	<input type="hidden" id="updated" name="updated" value="1">
	<center><a href="javascript:this.form.reset()"><img src="https://www.benfund.com/images/elements/reset.gif" alt="Reset" border="0"></a><input src="https://www.benfund.com/images/elements/submit.gif" alt="Submit" name="Submit" border="0" type="image" ></center>
	</form>
	
	</div>
	
	</div>
	</div>
	</td>
  </tr>
  <!--MAINBODY END-->
  <!--FOOTER START-->
  <tr>
    <td colspan="2">
<?php include ($ROOT."/includes/footer.php") ?>
	</td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
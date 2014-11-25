<?php
session_start();
require ("../includes/globals.php");
require ($ROOT."/functions/common.php");
//SET VARIABLES
$_SESSION['question'] = $_POST['question'];
$_SESSION['answer'] = $_POST['answer'];
$question = $_SESSION['question'];
$answer = strtolower($_SESSION['answer']);
$time = time();

//FORM SUBMITTED - CHECK ANSWER
if(isset($answer)){
	benfund_connect();
	//BENFUND / MERCHANT
	if($reset_m_type = 1){
		$truth_query = "SELECT settings, log FROM merchant WHERE id = '$mid' OR email = '$email' LIMIT 1";
	//CLIENT
	}elseif($reset_m_type = 3){
		$truth_query = "SELECT settings, log FROM client WHERE mid = '$mid' AND cid = '$cid' OR email = '$email' LIMIT 1";
	}
	//echo $truth_query;
	$truth_result = mysql_query($truth_query) or die(mysql_error());
	$truth_row = mysql_fetch_row($truth_result);
	$truth_num_rows = mysql_num_rows($truth_result);
	$reset = $truth_row[0];
	$log = $truth_row[1];
	$log_segment = explode("^", $log);
	$failures = intval($log_segment[0]);
	$villian = $log_segment[1];
	$chron = $log_segment[2];
	$segment = explode("~", $reset);
	$true_question = $segment[1];
	$true_answer = $segment[2];
	//echo $true_question.'!='.$question.'<br>'.$true_answer.'!='.$answer;
	//IF HAS NOT EXCEEDED LOGIN ATTEMPTS
	if($failures < 4){
		//CORRECT ANSWER
		if(($true_answer == $answer) && ($true_question == $question)){
			$_SESSION['correct_answer'] = '1';
			$correct_answer = $_SESSION['correct_answer'];
			//BENFUND / MERCHANT
			if ($reset_m_type = 1){
								benfund_connect();
								$query = "SELECT id, email FROM merchant WHERE id = '$mid' OR email = '$email' LIMIT 1";
								$result = mysql_query($query) or die(mysql_error());
								$row = mysql_fetch_row($result);
								$mid = $row[0];
								$email = $row[1];
									
								include ($ROOT."/functions/randpass.php");
									
								benfund_connect();
								$reset_query = "UPDATE merchant SET password='$randpass', log='0^$REMOTE_ADDR^$time' WHERE id='$mid' LIMIT 1";
								mysql_query($reset_query) or die(mysql_error());
								
							
								$from = "customerservice@benfund.com";
								$from_name = "BenFund Customer Service";
								$recipient = $email;
								$subject = "BenFund Account Password Reset";
								$text_message = 
							"You have requested that the password for your BenFund Account# $mid be reset. Your new password is below.
							
							Your New Password: $randpass
							
							
							To Login please use the following link:
							
							https://www.benfund.com/login.php
							
							(If the Link does not work, copy the url and paste it into your web browser's address bar)
							
							For more security We strongly recommend that you change your password once you haved logged in.
							
							If you did not request your password be reset please contact us immediately.
							.
							Please do not reply to this email it is from an unmonitored account";
							
							$html_message_text = "You have requested that the password for your BenFund Account# $mid be reset. Your new password is below.<p>
							<i>Your New Password:</i> <b>$randpass</b><p>
							To Login please use the following link:<p>
							<a href='https://www.benfund.com/login.php'>https://www.benfund.com/login.php</a><p>
							(If the Link does not work, copy the url and paste it into your web browser's address bar)<p>
							For more security We strongly recommend that you change your password once you haved logged in.<p>
							If you did not request your password be reset please contact us immediately.<p>
							Please do not reply to this email it is from an unmonitored account";
							
							$html_message = html_email($html_message_text);
							
							require ($ROOT."/functions/mail.php");	
								
							}
							//CLIENT
							elseif($reset_m_type == 3){
								benfund_connect();
								$query = "SELECT mid, cid, email FROM client WHERE cid = '$cid' AND mid = '$mid' OR email = '$email' LIMIT 1";
								$result = mysql_query($query) or die(mysql_error());
								$row = mysql_fetch_row($result);
								$mid = $row[0];
								$cid = $row[1];
								$email = $row[2];
									
							include ($ROOT."/functions/randpass.php");
									
								benfund_connect();
								$reset_query = "UPDATE client SET password='$randpass', log='0^$REMOTE_ADDR^$time' WHERE mid='$mid' AND cid='$cid' LIMIT 1";
								//echo $reset_query;
								mysql_query($reset_query) or die(mysql_error());
								
							
							$from = "customerservice@benfund.com";
							$from_name = "BenFund Customer Service";
							$recipient = $email;
							$subject = "BenFund Account Password Reset";
							$text_message = 
							"You have requested that the password for your BenFund Account# $mid - $cid be reset. Your new password is below.
							
							Your New Password: $randpass
							
							
							To Login please use the following link:
							
							https://www.benfund.com/login.php
							
							(If the Link does not work, copy the url and paste it into your web browser's address bar)
							
							For more security We strongly recommend that you change your password once you haved logged in.
							
							If you did not request your password be reset please contact us immediately.
							.
							Please do not reply to this email it is from an unmonitored account";
							
							$html_message_text = "You have requested that the password for your BenFund Account# $mid be reset. Your new password is below.<p>
							<i>Your New Password:</i> <b>$randpass</b><p>
							To Login please use the following link:<p>
							<a href='https://www.benfund.com/login.php'>https://www.benfund.com/login.php</a><p>
							(If the Link does not work, copy the url and paste it into your web browser's address bar)<p>
							For more security We strongly recommend that you change your password once you haved logged in.<p>
							If you did not request your password be reset please contact us immediately.<p>
							Please do not reply to this email it is from an unmonitored account";
							
							$html_message = html_email($html_message_text);
							
							 require ($ROOT."/functions/mail.php");
							}
			//RESET COMPLETE REDIRECT
			session_write_close();
			header("Location: https://www.benfund.com/reset_password/reset.php");
		//WRONG ANSWER
		}else{
			$more_failures = $failures + 1;
			//echo $failures.' - '.$more_failures.'<p>';
			$new_villain = $REMOTE_ADDR;
			$now_chron = time();
			$new_log = $more_failures.'^'.$new_villain.'^'.$now_chron;
			benfund_connect();
				//MERCHANT / BENFUND
				if($reset_m_type = 1){
					$failure_query = "UPDATE merchant SET log='$new_log' WHERE id='$mid' LIMIT 1";
				//CLIENT
				}elseif($reset_m_type = 3){
					$failure_query = "UPDATE client SET log='$new_log' WHERE mid='$mid' AND cid='$cid' LIMIT 1";
				}
			//UPDATE LOG COLUMN. INCREASE LOGIN ATTEMPTS
			//echo $failure_query;
			mysql_query($failure_query) or die(mysql_error());
			$_SESSION['failure'] = '<div class="error"><span class="errormsg">Incorrect Security Question or Answer.<br>Please try again.</span></div>';
			$failure = $_SESSION['failure'];
			session_write_close();
			header("Location: https://www.benfund.com/reset_password/challenge.php");
	}
//HAS EXCEEDED LOGIN ATTEMPTS
}else{
	//SEND WARNING EMAIL
				$randomstring = randomstring(22);
				if (isset($cid)){
					$reset_query = "UPDATE client SET log='4^$REMOTE_ADDR^$randomstring' WHERE mid='$mid' AND cid='$cid' LIMIT 1";
					$reset_url = 'https://www.benfund.com/reset_login.php?mid='.$mid.'&cid='.$cid.'&astrum='.$randomstring;
					$acct_num = $mid.' - '.$cid;
				}else{
					$reset_query = "UPDATE merchant SET log='4^$REMOTE_ADDR^$randomstring' WHERE id='$mid' LIMIT 1";
					$reset_url = 'https://www.benfund.com/reset_login.php?mid='.$mid.'&astrum='.$randomstring;
					$acct_num = $mid;
				}
				//SET RESET STRING IN ACCOUNT LOG COLUMN
				benfund_connect();
				mysql_query($reset_query) or die(mysql_error());
				
				$from = 'customerservice@benfund.com';
				$from_name = 'BenFund Customer Service';
				$recipient = $email;
				$subject = "BenFund Account Password Reset";
				
				$text_message = 
				"Due to excessive failed login attempts for your security your BenFund Account #: $acct_num has been temporarily deactivated.
				
				To Re-Activate your BenFund Account please go to the following link:
				
				$reset_url
				
				(If the Link does not work, copy the url and paste it into your web browser's address bar)
				
				If you are unable to Re-Activate your account please contact BenFund Customer Service.
				
				Please do not reply to this email it is from an unmonitored account";
				
				$html_message = "Due to excessive failed login attempts for your security your BenFund Account #: $acct_num has been temporarily deactivated.<p>To Re-Activate your BenFund Account please go to the following link:<p><a href='$reset_url'>$reset_url</a><p>(If the Link does not work, copy the url and paste it into your web browser's address bar)<p>If you are unable to Re-Activate your account please contact BenFund Customer Service.<p>Please do not reply to this email it is from an unmonitored account";
				
				//SEND EMAIL
				require ($ROOT."/functions/mail.php");
              
				$_SESSION['failure'] = '<div class="error"><span class="errormsg">You have Exceeded Verification attempts.</span></div>';
				$failure = $_SESSION['failure'];
				//REDIRECT WITH ERROR
				session_write_close();
				header("Location: https://www.benfund.com/reset_password/index.php");
}            
}             
?>            
              
              
              
<?php
session_start();
unset($error, $failure);
require ("includes/globals.php");
require ($ROOT."/functions/common.php");
$mid = $_POST['mid'];
$cid = $_POST['cid'];
$pw = $_POST['pw'];
$m_type = $_POST['m_type'];
$ref = $_POST['ref'];
$remember = $_POST['remember'];
//echo $m_type;

//MERCHANT LOGIN PROCEDURE
	if ($m_type == 1){
			//HANDLE COOKIE IF IT EXISTS//
		//if ($_GET['cmd'] == "c00k13"){
		//	 $mid = $BenFunduser;
		//	 $pw = $BenFundpass;
		//}else{
		//$mid = $_POST['id'];
		//$pw = $_POST['pw'];
		//}
		//$remember = $_POST['remember'];
		//
		//CONNECT, SELECT, DIRECT//
		
		mysql_connect("localhost", "benfund", "pr0m3th3u$") or die(mysql_error());
		mysql_select_db("benfund") or die(mysql_error());
		$query = "SELECT id, m_type, password, activated, log FROM merchant WHERE id = '$mid' AND password = '$pw'";
		//echo $query;
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_row($result);
		$m_type = $row[1];
		$active = $row[3];
		$log = $row[4];
		$log_segment = explode("^", $log);
		$failures = $log_segment[0];
		$villian = $log_segment[1];
		$chron = $log_segment[2];
		$num_rows = mysql_num_rows($result);
		//echo $failures;
		
		if($failures < 4){
			if ($num_rows > 0 & $active != 1){
			  $_SESSION['id'] = $mid;
			 header('Location:activate.php');
			}elseif ($num_rows > 0 & $active = 1) {
			//register user info in session
			session_register("mid");
			session_register("m_type");
			$_SESSION['valid_user'] = $mid;
			$_SESSION['pw'] = $pw_encrypt;
			header('Location:https://www.benfund.com/acct/index.php');
			//	if ($remember = on)
			//	{
			//		setcookie ("BenFunduser", $_SESSION['valid_user'], time() + (60*60*24), "/acct", "www.benfund.com", 1);
			//		setcookie ("BenFundpass", $_SESSION['pw'], time() + (60*60*24), "/acct", "www.benfund.com", 1);
			//		$BenFunduser = $_SESSION['valid_user'];
			//		$BenFundpass = $_SESSION['pw'];
			//		//session_register("BenFunduser");
			//		//session_register("BenFundpass");
			//	}
			// header('Location:https://www.benfund.com/acct/index.php');
		}else{
			$more_failures = $failures + 1;
			//echo $more_failures.' - '.$failures;
			$new_villain = $REMOTE_ADDR;
			$now_chron = time();
			$new_log = $more_failures.'^'.$new_villain.'^'.$now_chron;
			benfund_connect();
			$failure_query = "UPDATE merchant SET log='$new_log' WHERE id='$mid'";
			//UPDATE LOG COLUMN. INCREASE LOGIN ATTEMPTS
			mysql_query($failure_query) or die(mysql_error());
			$_SESSION['failure'] = '<div class="error"><span class="errormsg">Incorrect Security Question or Answer.<br>Please try again.</span></div>';
			$failure = $_SESSION['failure'];
		 	$error = '<div class="error"><span class="errormsg">Invalid BenFund # or Password.<br>Please try again<br></span></div>';
		  header('Location:login.php');
		  }
		}else{
	//SEND WARNING EMAIL
				$randomstring = randomstring(22);
					$reset_query = "UPDATE merchant SET log='4^$REMOTE_ADDR^$randomstring' WHERE id='$mid'";
					$reset_url = 'https://www.benfund.com/reset_login.php?mid='.$mid.'&astrum='.$randomstring;
					$acct_num = $mid;
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


//CLIENT LOGIN PROCEDURE
if ($m_type == 3){
	//HANDLE COOKIE IF IT EXISTS//
//if ($_GET['cmd'] == "c00k13"){
//	 $mid = $BenFunduser;
//	 $pw = $BenFundpass;
//}else{
//$mid = $_POST['id'];
//$pw = $_POST['pw'];
//}
//$remember = $_POST['remember'];
//
//CONNECT, SELECT, DIRECT//

mysql_connect("localhost", "benfund", "pr0m3th3u$") or die(mysql_error());
mysql_select_db("benfund") or die(mysql_error());
//$query = "SELECT mid, activated FROM client WHERE mid = '$m_id' AND id = '$cid' AND password = '$pw'";
$query = "SELECT mid, activated, log FROM client WHERE mid = '$mid' AND cid = '$cid' AND password = '$pw'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_row($result);
//$mid = $row[0];
$active = $row[1];
$log = $row[2];
$log_segment = explode("^", $log);
$failures = $log_segment[0];
$villian = $log_segment[1];
$chron = $log_segment[2];
$num_rows = mysql_num_rows($result);

if($failures < 4){
	if ($num_rows > 0 & $active != 1){
	$_SESSION['mid'] = $_POST['mid']; //$mid;
  $_SESSION['cid'] = $_POST['cid']; //$cid;
 header('Location:register_client/begin.php?sid='.$m_type);
	} elseif ($num_rows == 1 & $active = 1) {
	//register user info in session
	session_register("mid");
	session_register("cid");
	session_register("m_type");
	$_SESSION['mid'] = $_POST['mid']; //$mid;
	$_SESSION['cid'] = $_POST['cid']; //$cid;
	$_SESSION['valid_client'] = $_POST['cid']; //$cid;
	//$_SESSION['pw'] = $pw_encrypt;
	$_SESSION['pw'] = $_POST['pw']; //$pw;
		if($ref == 'payment'){		
			header('Location:mindex.php?mid='. $_SESSION['mid'] .'&pid=3');
		}else{
			header('Location:client/');
		}
	//	if ($remember = on)
	//	{
	//		setcookie ("BenFunduser", $_SESSION['valid_user'], time() + (60*60*24), "/acct", "www.benfund.com", 1);
	//		setcookie ("BenFundpass", $_SESSION['pw'], time() + (60*60*24), "/acct", "www.benfund.com", 1);
	//		$BenFunduser = $_SESSION['valid_user'];
	//		$BenFundpass = $_SESSION['pw'];
	//		//session_register("BenFunduser");
	//		//session_register("BenFundpass");
	//	}
	// header('Location:https://www.benfund.com/acct/index.php');
	}else{
	 		$error = "<div class='error'><span class='errormsg'>Invalid BenFund #, Client # or Password!!<br>Please try again<br></span></div>";
	  if($ref == 'payment'){
			header('Location:mindex.php?mid='. $_SESSION['mid'] .'&pid=3');
		}else{
			$more_failures = $failures + 2;
			$new_villain = $REMOTE_ADDR;
			$now_chron = time();
			$new_log = $more_failures.'^'.$new_villain.'^'.$now_chron;
			benfund_connect();
			$failure_query = "UPDATE client SET log='$new_log' WHERE mid='$mid' AND cid='$cid'";
			//echo $failures.'?'.$more_failures;
			//echo $failure_query;
			//UPDATE LOG COLUMN. INCREASE LOGIN ATTEMPTS
			mysql_query($failure_query) or die(mysql_error());
			$_SESSION['failure'] = '<div class="error"><span class="errormsg">Invalid BenFund #, Client # or Password.<br>Please try again!<br></span></div>';
			$failure = $_SESSION['failure'];
			header('Location:login.php');
	  }
		}
		}else{
	//SEND WARNING EMAIL
				$randomstring = randomstring(22);
					$reset_query = "UPDATE client SET log='4^$REMOTE_ADDR^$randomstring' WHERE mid='$mid' AND cid='$cid'";
					$reset_url = 'https://www.benfund.com/reset_login.php?mid='.$mid.'&cid='.$cid.'&astrum='.$randomstring;
					$acct_num = $mid.' - '.$cid;
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
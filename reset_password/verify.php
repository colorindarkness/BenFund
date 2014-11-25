<?php
session_start();
unset($mid, $cid, $my_email, $_SESSION['m_type'], $m_type);
require ("../includes/globals.php");
$_SESSION['mid'] = $_POST['mid'];
$_SESSION['cid'] = $_POST['cid'];
$_SESSION['my_email'] = $_POST['email'];
$_SESSION['reset_m_type'] = $_POST['reset_m_type'];

$mid = $_SESSION['mid'];
$cid = $_SESSION['cid'];
$my_email = $_SESSION['email'];
$reset_m_type = $_POST['m_type'];

//$mid = $_POST['mid'];
//$cid = $_POST['cid'];
//$my_email = $_POST['email'];
//$reset_m_type = $_POST['reset_m_type'];

		mysql_connect("localhost", "benfund", "pr0m3th3u$") or die(mysql_error());
		mysql_select_db("benfund") or die(mysql_error());
if($reset_m_type = 1){
	if(isset($my_email)){
		$confirm_query = "SELECT email, log FROM merchant WHERE email = '$my_email' LIMIT 1";
	}else{
		$confirm_query = "SELECT email, log FROM merchant WHERE id = '$mid' LIMIT 1";
	}
}
elseif($reset_m_type = 3){
	if(isset($my_email)){
		$confirm_query = "SELECT email, log FROM client WHERE email = '$my_email' LIMIT 1";
	}else{
		$confirm_query = "SELECT email, log FROM client WHERE cid = '$cid' AND mid = '$mid' LIMIT 1";
	}
}else{
			header("Location: https://www.benfund.com/reset_password/index.php");
		}
		//echo $reset_m_type.' - '.$_POST['reset_m_type'].' - '.$_SESSION['m_type'];
		//echo $confirm_query;
		$confirm_result = mysql_query($confirm_query) or die(mysql_error());
		$confirm_num_rows = mysql_num_rows($confirm_result);
		$confirm_row = mysql_fetch_row($confirm_result);
		$_SESSION['email'] = $confirm_row[0];
		$log = $confirm_row[1];
		$log_segment = explode("^", $log);
		$attempts = $log_segment[0];
		$email = $_SESSION['email'];
			if ($attempts <= 3){
				if ($confirm_num_rows == 1){   
				$_SESSION['acct_verified'] = 1;
				$acct_verified = $_SESSION['acct_verified'];
				session_write_close();
				header("Location: https://www.benfund.com/reset_password/challenge.php");
				}else{
					$_SESSION['reset_failure'] = '<div class="error"><span class="errormsg">This account does not exist. <br>Please check your account number<br> and try again.</span></div>';
					$reset_failure = $_SESSION['reset_failure'];
					session_write_close();
					header("Location: https://www.benfund.com/reset_password/index.php");
				}
			}else{
				//Send a Warning email to Acct Owner
				$_SESSION['reset_failure'] = '<div class="error"><span class="errormsg">You have Exceeded Verification attempts.</span></div>';
				$reset_failure = $_SESSION['reset_failure'];
				session_write_close();
				header("Location: https://www.benfund.com/reset_password/index.php");
			}
?> 
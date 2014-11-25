<?php
if((isset($mid)) OR (isset($email))){
if(!isset($m_type)){
		benfund_connect(); 
		$confirm_query = "SELECT * FROM merchant WHERE id = '$mid' OR email = '$email'";
		$confirm_result = mysql_query($confirm_query) or die(mysql_error());
		$confirm_num_rows = mysql_num_rows($confirm_result);
		
		if ($confirm_num_rows = 1) {
			$acct_verified = 1;
		}
		
	}elseif($m_type == 3){
		benfund_connect();
		$confirm_query = "SELECT * FROM client WHERE mid = '$mid' AND cid = '$cid' OR email = '$email'";
		$confirm_result = mysql_query($confirm_query) or die(mysql_error());
		$confirm_num_rows = mysql_num_rows($confirm_result);
		
		if ($confirm_num_rows = 1) {
			$acct_verified = 1;
		}
	}
}
?>
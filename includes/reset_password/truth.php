<?php
if(isset($answer)){
	benfund_connect();
	if(!isset($m_type)){
		$truth_query = "SELECT reset FROM merchant WHERE id = '$mid' OR email = '$email'";
	}elseif($m_type == 3){
		$truth_query = "SELECT reset FROM client WHERE mid = '$mid' AND cid = '$cid' OR email = '$email'";
	}
	$truth_result = mysql_query($truth_query) or die(mysql_error());
	$truth_row = mysql_fetch_row($truth_result);
	$truth_num_rows = mysql_num_rows($truth_result);
	$reset = $truth_row[0];
	$segment = explode("~", $reset);
	$true_question = $segment[0];
	$true_answer = $segment[1];

		if(($true_question == $question) AND ($true_answer = $answer)){
			$correct_answer = '1';	
		}else{
			$challenged = NULL;
	}
}
?>
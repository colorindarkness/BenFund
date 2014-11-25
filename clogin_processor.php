<?php
session_start();
require ("includes/globals.php");
$m_id = $_POST['m_id'];
$cid = $_POST['cid'];
$pw = $_POST['pw'];
$ref = $_POST['ref'];
    
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

mysql_connect("localhost", "benfund", "oro5591ville") or die(mysql_error());
mysql_select_db("benfund") or die(mysql_error());
//$query = "SELECT mid, activated FROM client WHERE mid = '$m_id' AND id = '$cid' AND password = '$pw'";
$query = "SELECT mid, activated FROM client WHERE mid = '$m_id' AND cid = '$cid' AND password = '$pw'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_row($result);
$my_mid = $row[0];
$active = $row[1];
$num_rows = mysql_num_rows($result);

if ($num_rows > 0 & $active != 1){
  $_SESSION['id'] = $cid;
 header('Location:acct/activate.php');
}
elseif ($num_rows > 0 & $active = 1) {
//register user info in session
session_register("cid");
session_register("m_type");
$_SESSION['valid_client'] = $cid;
//$_SESSION['pw'] = $pw_encrypt;
$_SESSION['pw'] = $pw;
	if(is_null($ref)){
		header('Location:client/');
	}elseif($ref == 'payment'){		
		header('Location:mindex.php?mid='. $my_mid .'&pid=3');
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
 $error = "<div class='error'><span class='errormsg'>Could not log you in. <br>Please try again<br></span></div>";
  if($ref == 'payment'){
		header('Location:mindex.php?mid='. $my_mid .'&pid=1');
	}else{
		header('Location:login.php');
	}
  }
  
?>
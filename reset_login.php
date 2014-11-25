<?php
session_start();
require ("includes/globals.php");
require ($ROOT."/functions/common.php");
$page_title = "Account Re-Activated";
$mid = $_GET['mid'];
$cid = $_GET['cid'];
$astrum = $_GET['astrum'];
$time = time();
if (!isset($astrum)){
     header('Location:404.php');
}
benfund_connect();
	if(!isset($cid)){
		$quest_query = "SELECT log FROM merchant WHERE id = '$mid' LIMIT 1";
	}elseif(isset($cid)){
		$quest_query = "SELECT log FROM client WHERE mid = '$mid' AND cid = '$cid' LIMIT 1";
	}
	$quest_result = mysql_query($quest_query) or die(mysql_error());
	$quest_row = mysql_fetch_row($quest_result);
	$quest_num_rows = mysql_num_rows($quest_result);
	$log = $quest_row[0];
	$log_segment = explode("^", $log);
	$quest_astrum = $log_segment[2];
	
	if($astrum = $quest_astrum){
		if(!isset($cid)){
		$active_query = "UPDATE merchant SET log='0^$REMOTE_ADDR^$time' WHERE id='$mid'";
		}elseif(isset($cid)){
		$active_query = "UPDATE client SET log='0^$REMOTE_ADDR^$time' WHERE mid='$mid' AND cid='$cid'";
		}
		benfund_connect();
		mysql_query($active_query) or die(mysql_error());
	}else{
		session_destroy();
		header('Location:404.php');
	}
session_destroy();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php") ?>
<script type="text/javascript">womOn();</script>
</head>
<body>
	<div class="container" id="container">
		<table cellspacing="0" cellpadding="0" align="center">
			<!--HEADER START-->
  		<tr>
    		<td colspan="2" valign="top">
					<?php include ($ROOT."/includes/header.php"); ?>
				</td>
  		</tr>
  		<!--HEADER END-->
  		<!--LEFT COLUMN START-->
  		<tr>
    		<td class="leftcolumn" width="150px" valign="top">
					<?php include ($ROOT."/includes/left.php") ?>
    		</td>
				<!--LEFT COLUMN END-->
    		<td valign="top">
				<!--PATHWAY START-->
				<?php include ($ROOT."/includes/pathway.php"); ?>
				<!--PATHWAY END-->
				<!--MAINBODY START-->
					<div class="content_outer">
						<div class="content_inner">	
							<span class="pagetitle">Account Re-Activated</span><p>
							<div class="hr"></div><p>
							
							<img src="https://www.benfund.com/images/elements/icons/unlocked.gif" align="right" hspace="10">
							
							<span class="emphasis">Your BenFund Account has been successfully Re-Activated.</span><p>
							You can now login and operate your BenFund account as usual. We apoligize for any inconvenience this may have caused.<p>
							
							<a href="https://www.benfund.com/login.php">Login to My BenFund</a><p>
							
							If you are still unable to Login into your Account please contact BenFund Customer Service at 1800-BENFUND.<p>
							
							BenFund is dedicated to protecting your information.<br>
							<a href="https://www.benfund.com/security_policy.php">Learn more about Information Security on BenFund.</a><p>
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
  	<!--FOOTER END-->
	</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
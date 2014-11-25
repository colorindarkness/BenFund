<?php
session_start();
if ($correct_answer != '1'){
	$error = '<div class="error"><span class="errormsg">You must be logged in to view this page. <br>Please Login.<br></span></div>';
     header('Location:challenge.php');
}
session_destroy();
require ("../includes/globals.php");
require ($ROOT."/functions/common.php");
$page_title = "Password Reset Complete";
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
							<span class="pagetitle">Password Reset Complete</span><p>
							<div class="hr"></div><p>
							
							<img src="https://www.benfund.com/images/elements/icons/unlocked.gif" align="right" hspace="10">
							
							<span class="emphasis">Your Password has been successfully reset.</span><br>
							You will be receiving an email containing your new password in the email account you specified when registering.<p>
							
							Please allow <b>up to one hour</b> for the email to arrive.<br>
							If you do not receive the email after an hour please contact BenFund Customer Service at 1800-BENFUND.<p>
							
							<a href="https://www.benfund.com/login.php">Return to Login</a>
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
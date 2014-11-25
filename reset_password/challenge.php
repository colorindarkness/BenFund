<?php
session_start();
if ($acct_verified != '1'){
	$error = '<div class="error"><span class="errormsg">You must be logged in to view this page. <br>Please Login.<br></span></div>';
     header('Location:index.php');
}
require ("../includes/globals.php");
require ($ROOT."/functions/common.php");
$page_title = "Security Question";
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
							<span class="pagetitle">Security Question</span>
							<div class="hr"></div><p>
							<?php echo $failure ;?>
							Select the the security question you chose during registration from the list below and then specify the its answer. The answer is not case sensitive. 
							<div style="width: 100%; padding: 6px; background-color: #FFFFF0; border: 1px solid #CC0000;">
							<img src="https://www.benfund.com/images/elements/icons/private.gif" align="right">
							<form name="challenge" method="POST" action="https://www.benfund.com/reset_password/truth.php">
							<span class="emphasis">Please select your security question:<a class="btt" title="What is my Security Question?^Your security question was chosen during the registration process."><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a></span><br />
							<select name="question" id="question" class="nice">
							<option value="1">We own you, your vision of Freedom, Deception</option>
							<option value="2">Control You, Your liberty a lie</option>
							<option value="3">You think you are special, you think you are unique</option>
							<option value="4">Your just another Peasant</option>
							<option value="5">Grovelling on his knees</option>
							</select><p>
							<span class="emphasis">Specify your answer:<a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"><a></span><br />
							<input type="text" name="answer" id="answer" class="nice" size="60"><p>
							<center><input type="reset" value="Reset" class="nice"><input type="submit" value="Submit" class="nice"></center>
							</form>
							</div><p>
							<p>
							<span class="emphasis">Forgot your Security Question or Answer?</span><p> First check your email for the message you recieved when you first registered. The message contains your Security Question and Answer.<br>
							If you no longer have this message please contact BenFund Customer Service at 1800-BENFUND to speak to a BenFund representative and reset your password.<br>
							Note: In order to reset your password over the phone you will need to verify your identity.
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
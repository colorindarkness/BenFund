<?php
session_start();
require ("includes/globals.php");
if ($_GET['logout'] == 'true'){
require ($ROOT."/functions/logout.php");
logout();
}
$page_title = "Login";
//unset($ref);
//unset($error, $failure);
?>
<?php
require ($ROOT."/functions/common.php");
$_GET['error'];
$loggedout = '<div class="error">
	<table><tr><td>
	<div class="promptimg"><img src="https://www.benfund.com/images/elements/icons/alert.gif" class="promptimg"></div>
	</td><td>
	<span class="errormsg">You need to be Logged in to access this page.<br>Please Log In.</span></div>
	</td></table></div>
	<p>
	<div id="yreghtxt">
	<h2>Try the following hints.</h2>
	<ul class="yregbpt">
	<li>
	<h3>Your Session May have Timed Out?</h3>
	<cite>If your session has been inactive for too long our system will automatically log you out for security.</cite></li>
	<li><h3>Did you forget or misspell your Benfund Number or password?</h3>
	For your Convenience you can <a href="https://wwww.benfund.com"> have your BenFund Number sent to your configured Email address</a> or <a class="links" href="https://wwww.benfund.com">View your Password Hint online</a> by using your BenFund Number.</li>
	<li><h3>Still having trouble?</h3>
	If you are still unable to access your account you can reset your password or contact a friendly BenFund Representative.</li>
		</ul>

</div></div>';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php") ?>
<script type="text/javascript">womOn();</script>
	<script language="JavaScript1.2" src="https://www.benfund.com/includes/js/jquery.compat.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://www.benfund.com/includes/js/jquery.accordion.js"></script>
	<script type="text/javascript">
	jQuery().ready(function(){
		// simple Accordion
		jQuery('#login').Accordion({
			header: 'a.stretchtoggle',
			showSpeed: 300,
			hideSpeed: 300
		});
	});
	</script>
<script type='text/javascript' src='https://www.benfund.com/includes/js/x_core.js'></script>
<script type='text/javascript' src='https://www.benfund.com/includes/js/x_win.js'></script>
<script>
var security = new xWindow(
  'security',              // target name
  400, 500,  // size: width, height
  200, screen.height-200, // position: left, top
  0,                      // location field
  0,                      // menubar
  0,                      // resizable
  1,                      // scrollbars
  0,                      // statusbar
  0);                     // toolbar
</script>
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
							<table width="600"><tr>
								<td width="300" valign="top">
									<div class="splitleft">
										<div class="advise">
												<span class="pagetitle">Login to Benfund</span>
													<div class="hr"></div>
													<?php echo $error; ?>
													<?php echo $failure; ?>
													<p>
													<span class="big blue">Clients</span><br>
													Login as a client by the form to the right if you want to make a payment to another accounct such as a merchant or layaway account
													<p>
													<span class="big green">BenFund Owners</span><br>
													If you want to administer your BenFund Funraising or Accounts Receivable account, login as a BenFund Owner through the green link in the bottom right.
													<p>
													<br>
													<p>
													<div class="action2">
													<span class="medium darkblue">Our Privacy Policy</span><br>
													<img src="https://www.benfund.com/images/elements/icons/secure.gif" align="right" vspace="5"/>
													Feel confident that your sensitive information is kept safe by knowing you have a secure connection on BenFund.<p>
													<a target="security" href="https://www.benfund.com/information_security.php" onclick="return security.load(this.href)">Find out more about our Privacy Policy.</a>
													<p>
												</div>
												</div>
											</div>
										</td>
										<td width="225" valign="top">
											<div class="splitright">
												<div class="loginform">
	<div id="login">
	<a class="stretchtoggle darkblue big">Client Login<a class="btt" title="BenFund Client^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account" href="#"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a></a><br>
		<div>
			<form name="client_login" method="post" action="https://www.benfund.com/login_processor.php">
			<span class="emphasis">Benfund Number:</span><br>
	
	    <input name="mid" id="mid" size="6" maxlength="6" class="huge" type="text"> - <input name="cid" id="cid" size="3" maxlength="4" class="huge" type="text">
	    <br>
	    <span class="emphasis">Password:</span><br>
	    <input name="pw" id="pw" size="6" class="huge" type="password">
	    <input name="m_type" id="m_type" value="3" type="hidden">
	    <br>
	    <input name="remember" id="remember" type="checkbox"><span class="emphasis">Remember me</span>
	
	    	<div align="right">
	    		<!--<input type="image" src="https://www.benfund.com/images/elements/buttons/sm/reset.gif" name="Submit2" value="Reset" onclick="document.forms.client_login.reset(); return false;">-->
	    		<input type="image" src="https://www.benfund.com/images/elements/buttons/sm/login.gif" name="Submit" value="Submit">
	    	</div>
	    <br>
			<a href="https://www.benfund.com/reset_password/" class="emphasis3">Forgot your Password?</a>
			<br>
	    </form>
		</div>
		
		<a class="stretchtoggle green big"><br><div class="hr"></div>Benfund Login<a class="btt" title="BenFund Owner^If you want to administer your BenFund Funraising or Accounts Receivable account, login as a BenFund Owner"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a>&nbsp;&nbsp;</a>
		<div>
			<form name="merchant_login" method="post" action="https://www.benfund.com/login_processor.php">
	    <span class="emphasis">Benfund Number:</span><br>
	    <input name="mid" id="mid" size="6" maxlength="6" class="huge" type="text">
	
	    <br>
	    <span class="emphasis">Password:</span><br>
	    <input name="pw" id="pw" size="6" class="huge" type="password">
	    <input name="m_type" id="m_type" value="1" type="hidden">
	    <br>
	    <input name="remember" id="remember" type="checkbox"><span class="emphasis">Remember me</span>
	    <br>
	    	<div align="right">
	
	    		<!--<input type="image" src="https://www.benfund.com/images/elements/buttons/sm/reset.gif" name="Submit2" value="Reset" onclick="document.forms.merchant_login.reset(); return false;">-->
	    		<input type="image" src="https://www.benfund.com/images/elements/buttons/sm/login.gif" name="Submit" value="Submit">
	    	</div>
	    </form>
			<br>
			<a href="https://www.benfund.com/reset_password/" class="emphasis3">Forgot your Password?</a>
			<br>
		</div>
	</div>
</div>
    									</div>
								</td>
							</tr></table>
						</div>
					</div>
				</td>
  		</tr>
  	<!--MAINBODY END-->
  	<!--FOOTER START-->
  	<tr>
    	<td colspan="2">
				<?php include ($ROOT."/includes/footer.php"); ?>
			</td>
  	</tr>
  	<!--FOOTER END-->
	</table>
	<?php unset($loggedout, $error, $foo3); ?>
	<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
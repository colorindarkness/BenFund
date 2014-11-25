<?php
session_start();
unset($mid, $cid, $my_email, $_SESSION['m_type'], $m_type);
session_destroy();
require ("../includes/globals.php");
require ($ROOT."/functions/common.php");
$page_title = "Verify Account";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php") ?>
<script type='text/javascript'>
window.onload = function()
{
  var mooTogs    = document.getElementsByClassName('stretchtoggle');
  var mooStretch = document.getElementsByClassName('stretcher');

  // must be before mooAccordion
  mooTogs.each(function(tog, i) {
    tog.onclick = function() {
      if (tog.className == 'stretch_active') {
        mooAccordion.clearAndToggle(mooStretch[i], i);
        tog.className = 'stretchtoggle';

        // automatically show the next stretcher (unless we're the last one)
        if (i+1 != mooTogs.length) {
          mooTogs[i+1].className='stretch_active';
          mooAccordion.clearAndToggle(mooStretch[i+1], i+1);
        }

        return;
      }

      // reset then all then set clicked
      mooTogs.each(function(rtog, ri) {mooTogs[ri].className = 'stretchtoggle';});
      tog.className='stretch_active';
    };
  });

  // could not get onComplete:function(el){} to achieve this effect
  var mooAccordion = new fx.Accordion(mooTogs, mooStretch, {opacity:true, width:false, height:true});

  // stretcher to open initially
  mooAccordion.showThisHideOpen(mooStretch[0]);
  mooTogs[0].className='stretch_active'
enableTooltips()
}

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
							<table width="600">
								<tr>
										<td width="225" valign="top">
												<div class="loginform">
													<span class="subtitle">Reset Password</span><p>
													<a class="stretchtoggle">Client Accounts</a><a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a>
														<div class="stretcher" style="overflow: hidden; visibility: hidden; opacity: 0; height: 0px; margin-left: 8px;">
															<form name="client_verify" method="post" action="https://www.benfund.com/reset_password/verify.php?sid=3">
															<span class="emphasis">Benfund Number:</span><br />
							      		    	<input name="mid" type="text" id="mid" size="6" maxlength="6" class="huge"> - <input name="cid" type="text" id="cid" size="3" maxlength="4" class="huge">
							      		  		<br /><span class="attention3">-OR-</span><br />
							      		  		<span class="emphasis">Email Address:</span><br />
							      		    	<input name="my_email1" type="text" id="my_email1" size="27" maxlength="40" class="nice"></p>
							      		    	<input type="hidden" name="reset_m_type" id="m_type" value="3">
							      		  		<br />
							      		  			<div align="center">
							      		  				<input type="reset" name="creset" value="Reset">
							      		    			<input type="submit" name="csubmit" value="Submit">
							      		    		</div>
							      		    	</form>
													</div>
													<div class="hr"></div>
													<a class="stretchtoggle"> Benfund/Merchant Accounts</a><a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a>
													<div class="stretcher">
														<form name="merchant_verify" method="post" action="https://www.benfund.com/reset_password/verify.php?sid=1">
							      		  	<span class="emphasis">Benfund Number:</span><br />
							      		  	<input name="mid" type="text" id="mid" size="6" maxlength="6" class="huge">
							      		  	<br /><span class="attention3">-OR-</span><br />
							      		  	<span class="emphasis">Email Address:</span><br />
							      		  	<input name="my_email2" type="text" id="my_email2" size="27" maxlength="40" class="nice">
							      		  	<input type="hidden" name="reset_m_type" id="m_type" value="0">
							      		  	</p>
							      		  	<br />
							      		  		<div align="center">
							      		  			<input type="reset" name="mreset" value="Reset">
							      		  			<input type="submit" name="msubmit" value="Submit">
							      		  		</div>
														</form>
													</div>
												</div>
								</td>
															<td width="300" valign="top">
												<span class="pagetitle">Reset Your Password</span>
													<div class="hr"></div>
													<?php echo $reset_failure ;?>
													<a class="btt" title="What then is this!^Lorem ipsum dolor sit amet, consectetuer adipiscing elit."><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a>
													<img src="https://www.benfund.com/images/elements/icons/secure.gif" align="right"/>
													By Using the Form on the left you will be required to answer your Security Question.<p>
													Upon completion a new password will be sent to the Email address specified with your BenFund account.<p>&nbsp;<p>
													<a target="security" href="https://www.benfund.com/information_security.php" onclick="return security.load(this.href)">Find out more about Information Security on BenFund</a>
													<p>
										</td>
								</tr>
							</table>			
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
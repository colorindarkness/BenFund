<?php
session_start();
if ($_GET['pid'] == 1){?>
	<div style="border: 1px dotted #000000; float: left; width: 200px; margin-right: 2px; margin-bottom: 2px;">
		<center>
			<img src="https://www.benfund.com/images/illuminati.jpg">
		</center>
	</div>
	<div style="border: 1px dotted #DCDCDC; width; 150px; float: right;">
		<table class="toolbar">
			<tr>
				<td align="center">
					<a target='emailpage' href='https://www.benfund.com/emailpage.php' onclick="return emailpage.load(this.href)">
						<img src="https://www.benfund.com/images/elements/icons/med/mail-compose.png" border="0"><br />
							Email
					</a>
				</td>
			</tr>
			<tr>
				<td align="center">
					<a href="javascript:bookmarksite('<?php echo $mtitle; ?> - <?php echo $ptitle; ?>', 'https://www.benfund.com/<?php echo $mid; ?>')">
						<img src="https://www.benfund.com/images/elements/icons/med/bookmark.png" border="0"><br />
						Bookmark
					</a>
				</td>
			</tr>
			<tr>
				<td align="center">
					<script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script>
				</td>
			</tr>
		</table>
	</div>
<?php echo $content; ?>
<p><div class="clear"><center><a href="https://www.benfund.com/mindex.php?mid=<?php echo $_GET['mid'];?>&pid=3"><img src="https://www.benfund.com/images/elements/buttons/pay_now.gif" border="0"></a></center></div><p>
<?php } if ($_GET['pid'] == 2){?>
<?php echo $content; ?>
<p><center><a href="https://www.benfund.com/mindex.php?mid=<?php echo $_GET['mid'];?>&pid=3"><img src="https://www.benfund.com/images/elements/buttons/pay_now.gif" border="0"></a></center>
<?php }if ($_GET['pid'] == 3){?>
	<?php if(!$_SESSION['valid_client']){
		$m_type = 3;
		?>
						<div class="error2"><br><span class="large bold orange">Please Login to Continue</span></div>
							<table width="600"><tr>
								<td width="300" valign="top">
									<div class="splitleft">
										<div class="advise">
												<span class="pagetitle">Login to Benfund</span>
													<div class="hr"></div><p>
													<?php echo $error; ?>
													<p><a class="btt" title="What then is this!^Lorem ipsum dolor sit amet, consectetuer adipiscing elit."><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a>
													<img src="https://www.benfund.com/images/elements/icons/secure.gif" align="right"/>
													Feel confident that your sensitive information is kept safe by knowing you have a secure connection on BenFund.<p>
													<a href="securenfo.php">Find out more about Information Security on BenFund</a>
													<p>
												</div>
											</div>
										</td>
										<td width="225" valign="top">
											<div class="splitright">
												<div class="loginform">
													<span class="subtitle">Log in to Benfund</span><p>
													<span class="stretchtoggle">Client Login</span><a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a>
															<form name="form1" method="post" action="login_processor.php">
 															<span class="emphasis">Benfund #:</span><br />
                    		    	<input name="mid" type="text" id="mid" size="5" maxlength="6" class="huge"> - <input name="cid" type="text" id="cid" size="2" maxlength="4" class="huge">
                    		  		<br />
                    		  		<span class="emphasis">Password:</span><br />
                    		    	<input name="pw" type="password" id="pw" size="5" maxlength="10" class="huge"></p>
                    		    	<input type="hidden" name="m_type" id="m_type" value="3">
                    		    	<input name="ref" type="hidden" id="ref" size="5" value="payment">
                    		  		<br />
                    		  		<input type="checkbox" name="remember" id="remember"><span class="emphasis">Remember me</span>
                    		  			<div align="center">
	    														<input type="image" src="https://www.benfund.com/images/elements/buttons/sm/reset.gif" name="Submit2" value="Reset" onclick="document.forms.form1.reset(); return false;">
	    														<input type="image" src="https://www.benfund.com/images/elements/buttons/sm/login.gif" name="Submit" value="Submit">
	    													</div>
                    		    	<br />
					  									<a href="https://www.benfund.com/reset_password.php" class="emphasis3">Forgot your Password?</a>
					  									<br />
                    		    	</form>
												</div>
    									</div>
								</td>
							</tr></table>
	<?php }elseif ($_SESSION['valid_client']){ ?>
		<?php echo $content; ?>
<?php include('includes/payment.php'); ?>
	<?php } ?>
<?php } ?>
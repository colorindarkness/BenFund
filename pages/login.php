	<table width="100%"><tr>
	<td width="50%" valign="top" class="splitleft" style=" border-right: 2px solid #000000; padding-right: 6px;">
	<div class="splitleft">
	<div class="advise">
<?php
 	if (isset($_SESSION['error'])){ ?>
	<div class="error">
	<table><tr><td>
	<div class="promptimg"><img src="https://www.benfund.com/images/elements/alert.gif" class="promptimg"></div>
	</td><td>
	<span class="errormsg"><?php echo $_SESSION['error'] ; ?></span></div>
	</td></table></div>
	<p>
	<div id="yreghtxt">
	<h2>Try the following hints.</h2>
	<ul class="yregbpt">
	<li>
	<h3>Is the "Caps Lock" or "A" light on your keyboard on?</h3>
	<cite>For added security all Benfund passwords are Case-Sensitive. Is it possible you have the Caps Lock key activated? If so, hit the "Caps Lock" key before trying again.</cite></li>
	<li><h3>Did you forget or misspell your Benfund Number or password?</h3>
	For your Convenience you can <a href="https://wwww.benfund.com"> have your BenFund Number sent to your configured Email address</a> or <a class="links" href="https://wwww.benfund.com">View your Password Hint online</a> by using your BenFund Number.</li>
	<li><h3>Still having trouble?</h3>
	If you are still unable to access your account you can reset your password or contact a friendly BenFund Representative.</li>
		</ul>

</div></div>
<?php logout(); } else { ?>
<div class="title">BenFund Secure Login</div>
<div class="hrinline"></div>
<img src="https://www.benfund.com/images/elements/secure.gif" align="right"/>
Feel confident that your sensitive information is kept safe by knowing you have a secure connection on BenFund.
<p>
Look for the Secure Connection Padlock Icon on your Internet Browser with our Internet Address.
<p>
Microsoft Internet Explorer<br />
<img src="https://www.benfund.com/images/elements/iesc.png" /><p>
Mozilla Firefox<br />
<img src="https://www.benfund.com/images/elements/ffsc.png" /><p>

If you come across another website claiming to be BenFund please report it to our Abuse Department Immediately.
</div>
<?php } ?>
	</div>
	</div>
	</td>
	<td width="50%" valign="top">
	<div class="splitright">
	<div class="loginform">
	<span class="login" color="#CC0000" face="Arial,Helvetica">Log in to Benfund</font></b></p>
                    <font color="#0000FF"><em> 
                    
                    </em></font>
					<form name="form1" method="post" action="login_processor.php">
                      Benfund Number:<br /> 
                        <input name="id" type="text" id="id" size="4" maxlength="6" class="huge">
                      <br />
                      Password: <br />
                        <input name="pw" type="password" id="pw" size="4" maxlength="10"class="huge"></p> 
                      </p>
                      <div align="center">
                        <input name="Submit" type="submit" value="Submit">
                        <input type="reset" name="Submit2" value="Reset">
                      </div>
					  <br />
					  <a href="https://www.benfund.com/pwd_hint.php">Forgot your Password?</a>
					  <br />
                    </form>
</div>
    </div>
	</div>
	</td></tr></table>
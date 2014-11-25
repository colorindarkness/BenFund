<center><img src="https://www.benfund.com/images/elements/progress-50.gif"></center><p>
<span class="pagetitle">BenFund Registration</span>
<div class="hr"></div>
<span class="medium bold orange">Please revise any incorrect information and submit again.</span><p>
	  <form action="https://www.benfund.com/register/register.php" method="post" name="register" id="register">
	  		<div style="padding: 6px; border: 1px solid #6CD136; background-color: #E2F7D2;">
          <table width="100%" border="0">
            <tr> 
              <td width="190">
                  <span class="emphasis">Account Name:</span><br>
                </div></td>
              <td><input name="name" type="text" id="name" size="25" class="nice" maxlength="30" class="nice" value="<?php echo $name; ?>"></td>
			  <td>(Example: Boy Scout Troop 428)</td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">Contact Name:</span></td>
              <td><input name="c_name" type="text" id="c_name" size="25" class="nice" value="<?php echo $c_name; ?>"></td>
			  <td>(First, Middle Inital, 
                  Last)</td>
            </tr>
          </table>
          </div>
          <p>
        <div style="padding: 6px; border: 1px solid #0000FF; background-color: #E6E6FA;">
          <table width="100%" border="0">
            <tr> 
              <td width="190"><span class="emphasis">Address:</span></td>
              <td><input name="address1" type="text" id="address1" size="25" class="nice" value="<?php echo $address1; ?>"></td>
			  <td></td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">Address 2:</span></td>
              <td><input name="address2" type="text" id="address2" size="25" class="nice" value="<?php echo $address2; ?>"></td>
			  <td>(optional)</td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">City:</span></td>
              <td><input name="city" type="text" id="city" size="25" class="nice" value="<?php echo $city; ?>"></td>
			  <td></td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">State:</span></td>
              <td><input type="text" name="state" id="state" size="2" class="nice" value="<?php echo $state; ?>">
              <span class="emphasisright">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zip:<input name="zip" type="text" id="zip" size="5" onKeyup="autotab(this, document.register.p1)" maxlength="5"  class="nice" value="<?php echo $zip; ?>"></td>
			<td></td>
            </tr>
            <tr> 
              <td  width="190"><span class="emphasis">Phone:</span></td>
              <td>
                <input name="p1" type="text" id="p1" size="3" onKeyup="autotab(this, document.register.p2)" maxlength="3"  class="acnice" value="<?php echo $p1; ?>">
                <input name="p2" type="text" id="p2" size="2" onKeyup="autotab(this, document.register.p3)" maxlength="3"  class="nice"value="<?php echo $p2; ?>"><span class="emphasis">-</span><input name="p3" type="text" id="p3" size="3" onKeyup="autotab(this, document.register.pa1)" maxlength="4"  class="nice"value="<?php echo $p3; ?>"></td>
				<td></td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">Alternate Phone:</span></td>
              <td><input name="pa1" type="text" id="pa1" size="3" onKeyup="autotab(this, document.register.pa2)" maxlength="3"  class="acnice" value="<?php echo $pa1; ?>"> 
                <input name="pa2" type="text" id="pa2" size="2" onKeyup="autotab(this, document.register.pa3)" maxlength="3"  class="nice" value="<?php echo $pa2; ?>"><span class="emphasis">-</span><input name="pa3" type="text" id="pa3" size="3" onKeyup="autotab(this, document.register.email)" maxlength="4"  class="nice" value="<?php echo $pa3; ?>"></td>
				<td></td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">E-mail Address:</span></td>
              <td><input name="email" type="text" id="email" size="25" class="nice" value="<?php echo $email; ?>"></td>
			  <td>(must be a valid working address)</td>
            </tr>
            <tr> 
              <td width="190">&nbsp;</td>
              <td>&nbsp;</td>
			  <td></td>
            </tr>
          </table>
        </div>
        <p>
        <div style="padding: 6px; border: 1px solid #800000; background-color: #FFFFF0;">
          <table width="100%" border="0">
            <tr> 
              <td width="190"><span class="emphasis">Social Security #:</div></td>
              <td><input name="ssn1" type="text" id="ssn1" size="4" onKeyup="autotab(this, document.register.ssn2)" maxlength="3"  class="nice" value="<?php echo $ssn1; ?>"><span class="medium bold">&nbsp;-&nbsp;</span><input name="ssn2" type="text" id="ssn2" size="3" onKeyup="autotab(this, document.register.ssn3)" maxlength="2"  class="nice" value="<?php echo $ssn2; ?>"><span class="medium bold">&nbsp;-&nbsp;</span><input name="ssn3" type="text" id="ssn3" size="5" onKeyup="autotab(this, document.register.password)" maxlength="4"  class="nice" value="<?php echo $ssn3; ?>">
              </td>
			  <td></td>
            </tr>
			           <tr> 
              <td width="190"><span class="errormsg">-OR-</div></td>
              <td></td>
			  <td></td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">Federal Tax ID:</span></td>
              <td>
              	<input name="tax1" type="text" id="tax1" size="3" onKeyup="autotab(this, document.register.tax2)" maxlength="2"  class="nice" value="<?php echo $tax1; ?>"><span class="medium bold">&nbsp;-&nbsp;</span><input name="tax2" type="text" id="tax2" size="8" onKeyup="autotab(this, document.register.password)" maxlength="7"  class="nice" value="<?php echo $tax2; ?>">
              </td>
			  <td></td>
            </tr>
          </table>
					</div>
					<p>
					<div style="padding: 6px; border: 1px solid #FF8080; background-color: #FFF0F0;">
					<table width="100%" border="0">
            <tr> 
              <td width="190"><span class="emphasis">Password:</span></td>
              <td><input name="password" type="password" id="password" size="12"  class="nice" value="" onkeyup="runPassword(this.value, 'password');"></td>
			  			<td>(Must be at least 6 characters)</td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">Confirm:</span></td>
              <td><input name="pwconfirm" type="password" id="pwconfirm" size="12"  class="nice" value=""></td>
			  			<td>
			  				<div style="width: 222px; min-width: 222px; max-width: 222px; _width: auto; height: 48px; min-height: 48px; max-height: 48px; _height: auto; padding: 4px; background-color: #FFFFF0; border: 1px solid #800000;">
			  				<span class="medium green bold">Your Password Strength:</span>
			  					<div id="password_text" style="font-size: 14px; font-weight: bold;"></div>
									<div id="password_bar" style="font-size: 1px; height: 6px; width: 0px; border: 1px solid white;"></div>
								</div>
			  			</td>
            </tr>
            <!--<tr> 
              <td width="190"><p><span class="emphasis">PIN <img src="https://www.benfund.com/images/elements/icons/sm/info.gif" title="The body of the tooltip is stored in the title" tooltitle="The Title of the Tooltip" class="toolTipImg"/></div><p></td>
              <td><input name="pin" type="password" id="pin" size="4" maxlength="4"  class="nice"  value="<?php echo $pin; ?>"></td>
			  <td>(4 Digits)*</td>
            </tr>-->
          </table>
         </div>
  <input type="hidden" name="submit" value="Next">
  <input type="hidden" name="mid" id="mid" value="<?php echo $mid; ?>">
  <input type="hidden" name="m_type" id="m_type" value="<?php echo $m_type; ?>">
  <input type="hidden" name="accept" id="accept" value="set">     
  <p align="center">
  <a href="https://www.benfund.com" ><img src="https://www.benfund.com/images/elements/cancel.gif" border="0"></a>
    <input type="image" src="https://www.benfund.com/images/elements/reset.gif" border="0" alt="Reset" name="Reset" value="Reset" onclick="document.register.reset();return false;">
    <input type="image" src="https://www.benfund.com/images/elements/proceed.gif" border="0" alt="Proceed" id="proceed" name="proceed" value="Proceed">
  </p>
        </form>
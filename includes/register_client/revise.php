<center><img src="https://www.benfund.com/images/elements/progress-50.gif"></center><p>
<span class="pagetitle">BenFund Registration</span>
<div class="hr"></div>
<span class="subtitle">Please revise any incorrect information.</span>
	  <form action="register.php" method="post" name="register" id="register">
          <table width="100%" border="0" bordercolor="#000000">
            <tr>     
      				<td width="190"><span class="emphasis">First Name:</span><br></div></td>      
      				<td><input name="name" type="text" id="name" value="<?php echo $first_name; ?>" class="nice" size="25" maxlength="30"></td>
			  			<td></td>
            </tr>
            <tr>     
      				<td width="190"><span class="emphasis">Middle Intital:</span><br></div></td>      
      				<td><input name="name" type="text" id="name" value="<?php echo $m_i; ?>" class="nice" size="2" maxlength="30"></td>
			  			<td></td>
            </tr>
            <tr>     
      				<td width="190"><span class="emphasis">Last Name:</span><br></div></td>      
      				<td><input name="name" type="text" id="name" value="<?php echo $last_name; ?>" class="nice" size="25" maxlength="30"></td>
			  			<td></td>
            </tr>
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
              <td><input type="text" name="state" id="state" size="2" value="ca">
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
            <tr> 
              <td width="190"><span class="emphasis">Password:</span></td>
              <td><input name="password" type="password" id="password" size="12" maxlength="10"  class="nice" value="<?php echo $password; ?>"></td>
			  <td>(Must be at least 6 characters)</td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">Confirm:</span></td>
              <td><input name="pwconfirm" type="password" id="pwconfirm" size="12" maxlength="10"  class="nice" value="<?php echo $pwconfirm; ?>"></td>
			  <td></td>
            </tr>
            <tr> 
              <td width="190"><p><span class="emphasis">PIN <img src="https://www.benfund.com/images/elements/icons/sm/info.gif" title="The body of the tooltip is stored in the title" tooltitle="The Title of the Tooltip" class="toolTipImg"/></div><p></td>
              <td><input name="pin" type="password" id="pin" size="4" maxlength="4"  class="nice"  value="<?php echo $pin; ?>"></td>
			  <td>(4 Digits)*</td>
            </tr>
          </table>
  <input name="mid" type="text" id="mid" class="nice"  value="<?php echo $mid; ?>">
  <input name="accept" id="accept" value="set" type="hidden">     
  <p align="center">
  <a href="https://www.benfund.com" ><img src="https://www.benfund.com/images/elements/decline.gif" border="0"></a>
    <input type="image" src="https://www.benfund.com/images/elements/reset.gif" border="0" alt="Reset" name="Submit2" value="Reset" onclick="document.register.reset();return false;">
    <input type="image" src="https://www.benfund.com/images/elements/proceed.gif" border="0" alt="Proceed"  name="submit" value="Proceed">
  </p>
        </form>
        <p align="center">*This will be used if you need to reset your password. 
          Once it is set, it cannot be changed.</p>
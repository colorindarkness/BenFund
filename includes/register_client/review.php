<center><img src="https://www.benfund.com/images/elements/progress-50.gif"></center><p>
<h3 align="center"> Please review the information you have entered and be sure 
  it is accurate.</h3>

  
      <table width="100%"align="left">
        <tr> 
          <td><span class="emphasis">Benfund #:</span></td>
          <td valign="top">
              <?php echo '<span class="emphasis2">'.$mid.'</span>'; ?>
 					</td>
        </tr>
        <tr> 
          <td><span class="emphasis">First Name:</span></td>
          <td><span class="emphasis2"><?php echo $first_name; ?></span></td>
        </tr>
        <tr> 
          <td><span class="emphasis">Middle Initial:</span></td>
          <td><span class="emphasis2"><?php echo $m_i; ?></span></td>
        </tr>
        <tr> 
          <td><span class="emphasis">Last Name:</span></td>
          <td><span class="emphasis2"><?php echo $last_name; ?></span></td>
        </tr>
        <tr> 
          <td><span class="emphasis">Address:</span></td>
          <td><span class="emphasis2"> <?php echo $address1 ?></span></td>
        </tr>
        <tr> 
          <td><span class="emphasis">Address 2:</span></td>
          <td><span class="emphasis2"> <?php echo $address2 ?></span></td>
        </tr>
        <tr> 
          <td><span class="emphasis">City:</span></td>
          <td><span class="emphasis2"> <?php echo $city ?></span></td>
        </tr>
        <tr> 
          <td><span class="emphasis">State:</span></td>
          <td><span class="emphasis2"> <?php echo $state ?></span></td>
        </tr>
        <tr> 
          <td><span class="emphasis">Zip:</span></td>
          <td><span class="emphasis2"> <?php echo $zip ?></span></td>
        </tr>
        <tr> 
          <td height="25"><span class="emphasis">Phone:</span></td>
          <td><span class="emphasis2"><?php echo $phone ?></span></td>
        </tr>
        <tr>
          <td><span class="emphasis">Alternate Phone:</span></td>
          <td><span class="emphasis2"><?php echo $alt_phone; ?></span></td>
        </tr>
        <tr> 
          <td><span class="emphasis">E-mail Address:</span></td>
          <td><span class="emphasis2"><?php echo $email ?></span></td>
        </tr>
        <tr> 
          <td><span class="emphasis">PIN:</span></td>
          <td><span class="emphasis2"><?php echo $pin ?> </span></td>
        </tr>
        <tr>
        <td colspan="2">
<form name="theForm" method="post">
<input name="mid" type="hidden" id="mid" value="<?php  echo $mid ?>">
<input name="m_type" type="hidden" id="m_type" value="<?php echo $m_type ?>">
<input name="name" type="hidden" id="name" value="<?php echo $name ?>" size="30">
<input name="c_name" type="hidden" id="c_name" value="<?php echo $c_name ?>" size="30">
<input name="address1" type="hidden" id="address1" value="<?php echo $address1 ?>" size="30">
<input name="address2" type="hidden" id="address2" value="<?php echo $address2 ?>" size="30">
<input name="city" type="hidden" id="city" value="<?php echo $city ?>" size="30">
<input name="state" type="hidden" id="state" value="<?php echo $_POST['state']; ?>" size="2" maxlength="2">
<input name="zip" type="hidden" id="zip" value="<?php echo $zip ?>" size="5" maxlength="5">
<input name="email" type="hidden" id="email" value="<?php echo $email ?>" size="30">
<input name="ssn" type="hidden" id="ssn" value="<?php echo $ssn; ?>">
<input name="phone" type="hidden" id="phone" value="<?php echo $phone ?>">
<input name="p1" type="hidden" id="p1" value="<?php echo $p1 ?>">
<input name="p2" type="hidden" id="p2" value="<?php echo $p2 ?>">
<input name="p3" type="hidden" id="p3" value="<?php echo $p3 ?>">
<input name="pin" type="hidden" id="pin" value="<?php echo $pin ?>">
<input name="alt_phone" type="hidden" value="<?php echo $alt_phone; ?>">
<input name="pa1" type="hidden" id="pa1" value="<?php echo $pa1 ?>">
<input name="pa2" type="hidden" id="pa2" value="<?php echo $pa2 ?>">
<input name="pa3" type="hidden" id="pa3" value="<?php echo $pa3 ?>">
<input name="tax" type="hidden" value="<?php echo $tax; ?>">
<input name="password" type="hidden" id="password" value="<?php echo $password ?>">
<input name="accept" id="accept" value="set" type="hidden">
<p align="center">
<a href="https://www.benfund.com" ><img src="https://www.benfund.com/images/elements/decline.gif" border="0"></a>
<input type="image" src="https://www.benfund.com/images/elements/revise.gif" border="0" alt="Revise" name="Submit2" value="Revise" onClick='document.theForm.action="register.php"'>
    <input type="image" src="https://www.benfund.com/images/elements/submit.gif" border="0" alt="Submit"  name="submit" value="Submit" onClick='document.theForm.action="/includes/register/submit.php"'>
    </p>
</form>
</td>
</tr>
</table>
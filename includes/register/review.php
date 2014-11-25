<center><img src="https://www.benfund.com/images/elements/progress-50.gif"></center><p>
<span class="pagetitle">Review and Submit</span>
<div class="hr"></div>
<span class="medium bold"> Please review the information you have supplied for accuracy. If you are confident all the information is correct please submit your registration by clicking the "Submit" button below.<p>
Upon submission you will receive a confirmation message in the email account specified below. In order to activate your new Benfund account you will need to follow the web address included in the email.
</span>
<p>
  	<div style="padding: 6px; border: 1px solid #6CD136; background-color: #E2F7D2;">
      <table width="100%" border="0">
        <tr> 
          <td>
          	<span class="emphasis">Benfund #:</span>
          </td>
          <td valign="top">
            <span class="emphasis2"><?php echo $mid; ?></span>
 					</td>
        </tr>
        <tr> 
          <td>
          	<span class="emphasis">Name:</span>
          </td>
          <td>
          	<span class="emphasis2"><?php echo $name; ?></span>
          </td>
        </tr>
        <tr> 
          <td width="190">
          	<span class="emphasis">Contact Name:</span>
          </td>
          <td>
          	<span class="emphasis2"><?php echo $c_name ?></span>
          </td>
        </tr>
      </table>
     </div>
     <p>
     <div style="padding: 6px; border: 1px solid #0000FF; background-color: #E6E6FA;">
     	<table width="100%" border="0">
        <tr> 
          <td width="190">
          	<span class="emphasis">Address:</span>
          </td>
          <td>
          	<span class="emphasis2"> <?php echo $address1 ?></span>
          </td>
        </tr>
        <?php if($address2){ ?>
        <tr> 
          <td>
          	<span class="emphasis">Address 2:</span>
          </td>
          <td>
          	<span class="emphasis2"> <?php echo $address2 ?></span>
          </td>
        </tr>
      <?php } ?>
        <tr> 
          <td>
          	<span class="emphasis">City:</span>
          </td>
          <td>
          	<span class="emphasis2"> <?php echo $city ?></span>
          </td>
        </tr>
        <tr> 
          <td>
          	<span class="emphasis">State:</span>
          </td>
          <td>
          	<span class="emphasis2"> <?php echo $state ?></span>
          </td>
        </tr>
        <tr> 
          <td>
          	<span class="emphasis">Zip:</span>
          </td>
          <td>
          	<span class="emphasis2"> <?php echo $zip ?></span>
          </td>
        </tr>
        <tr> 
          <td height="25">
          	<span class="emphasis">Phone:</span>
          </td>
          <td>
          	<span class="emphasis2"><?php echo $phone ?></span>
          </td>
        </tr>
        <tr>
          <td>
          	<span class="emphasis">Alternate Phone:</span>
          </td>
          <td>
          	<span class="emphasis2"><?php echo $alt_phone; ?></span>
          </td>
        </tr>
        <tr> 
          <td>
          	<span class="emphasis">E-mail Address:</span>
          </td>
          <td>
          	<span class="emphasis2"><?php echo $email ?></span>
          </td>
        </tr>
      </table>
     </div>
     <p>
     <div style="padding: 6px; border: 1px solid #800000; background-color: #FFFFF0;">
      <table width="100%" border="0">
        <tr> 
          <td width="190">
          	<span class="emphasis"><?php if(empty($ssn)){echo "Federal Tax ID:";} else{echo "Social Security #:";} ?></span>
          </td>
          <td>
          	<span class="emphasis2"><?php if($ssn){ echo $ssn1.' - '.$ssn2.' - '.$ssn3; }else{ echo $tax1.' - '.$tax2; } ?></span>
          </td>
        </tr>
			</table>
		</div>
<form action="https://www.benfund.com/includes/register/submit.php" method="post" name="register" id="register">
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
<input name="ssn1" type="hidden" id="ssn1" value="<?php echo $ssn1; ?>">
<input name="ssn2" type="hidden" id="ssn2" value="<?php echo $ssn2; ?>">
<input name="ssn3" type="hidden" id="ssn3" value="<?php echo $ssn3; ?>">
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
<input name="tax1" type="hidden" value="<?php echo $tax1; ?>">
<input name="tax2" type="hidden" value="<?php echo $tax2; ?>">
<input name="tax" type="hidden" value="<?php echo $tax; ?>">
<input name="password" type="hidden" id="password" value="<?php echo $password ?>">
<input name="pwconfirm" type="hidden" id="pwconfirm" value="<?php echo $pwconfirm ?>">
<input name="accept" id="accept" value="set" type="hidden">
<input name="submit" type="hidden" value="Next">
<p align="center">
<a href="https://www.benfund.com" ><img src="https://www.benfund.com/images/elements/cancel.gif" border="0"></a>
<input type="image" src="https://www.benfund.com/images/elements/revise.gif" border="0" alt="Revise" name="Revise" value="Revise" onClick='document.register.action="register.php?act=review"'>
<input type="image" src="https://www.benfund.com/images/elements/submit.gif" border="0" alt="Submit"  name="submit" value="Submit" onClick='document.register.action="https://www.benfund.com/includes/register/submit.php"'>
</p>
</form>
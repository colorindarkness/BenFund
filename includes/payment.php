<?php
$user = $_SESSION['user']; 
$error2 = $_SESSION['error2'];
$mid = $_GET['mid'];	   
?>
<?php 	
				while(isset($_SESSION['error']))
				{echo '<div class="error"><span class="errormsg2">' . $_SESSION['error'] . '</span></div>'; 
				 unset ($_SESSION['error']);
				} 
		?>
<p>
<form action="receipt.php" method="post">
<!--##############################################################################
<table width="600" style="width: 600px">
	<tr>
		<td>
			<div style="padding: 6px; border: 1px solid #6CD136; background-color: #E2F7D2;">
			<span class="subtitle" >Payment Amount:</span><br />
			<input type="text" size="6" id="last_name" name="last_name" value="" class="huge"/>
			</div>
			<p>
			<div style="padding: 6px; border: 1px solid #0000FF; background-color: #E6E6FA;">
			<table width="275">
				<tr>
					<td>
						<span class="subtitle" >First Name:</span>
					</td>
					<td>
						<span class="subtitle" >M.I.:</span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" size="30" id="first_name" name="first_name" value="" class="big"/>
					</td>
					<td>
						<input type="text" size="2" id="m_i" name="m_i" value=""  onKeyup="autotab(this, document.newclient.last_name)"  maxlength="1" class="big"/>
					</td>
				</tr>
			</table>
			<span class="subtitle" >Last Name:</span><br />
			<input type="text" size="30" id="last_name" name="last_name" value="" class="big"/>
			</div>
			<p>
			<div style="padding: 6px; border: 1px solid #800000; background-color: #FFFFF0;">
				<span class="subtitle" >Address:</span><br />
				<input type="text" size="30" id="address" name="address" value="" class="big"/><p>
				<span class="subtitle" >Address 2:</span><br />
				<input type="text" size="30" id="address2" name="address2" value="" class="big"/><p>
				<table>
					<tr>
						<td>
							<span class="subtitle" >City:</span><br />
							<input type="text" size="20" id="city" name="city" value="" class="big"/><p>
						</td>
						<td>
							<center>
								<span class="subtitle" >State:</span><br />
								<select class="nice" id="select3" name="state">
          <option value="<?php echo $user['4']; ?>"><?php echo $user['4']; ?></option>
          <option value="AK">AK</option>
          <option value="AL">AL</option>
          <option value="AR">AR</option>
          <option value="AZ">AZ</option>
          <option value="CA">CA</option>
          <option value="CO">CO</option>
          <option value="CT">CT</option>
          <option value="DC">DC</option>
          <option value="DE">DE</option>
          <option value="FL">FL</option>
          <option value="GA">GA</option>
          <option value="HI">HI</option>
          <option value="IA">IA</option>
          <option value="ID">ID</option>
          <option value="IL">IL</option>
          <option value="IN">IN</option>
          <option value="KS">KS</option>
          <option value="KY">KY</option>
          <option value="LA">LA</option>
          <option value="MA">MA</option>
          <option value="MD">MD</option>
          <option value="ME">ME</option>
          <option value="MI">MI</option>
          <option value="MN">MN</option>
          <option value="MO">MO</option>
          <option value="MS">MS</option>
          <option value="MT">MT</option>
          <option value="NC">NC</option>
          <option value="ND">ND</option>
          <option value="NE">NE</option>
          <option value="NH">NH</option>
          <option value="NJ">NJ</option>
          <option value="NM">NM</option>
          <option value="NV">NV</option>
          <option value="NY">NY</option>
          <option value="OH">OH</option>
          <option value="OK">OK</option>
          <option value="OR">OR</option>
          <option value="PA">PA</option>
          <option value="RI">RI</option>
          <option value="SC">SC</option>
          <option value="SD">SD</option>
          <option value="TN">TN</option>
          <option value="TX">TX</option>
          <option value="UT">UT</option>
          <option value="VA">VA</option>
          <option value="VT">VT</option>
          <option value="WA">WA</option>
          <option value="WI">WI</option>
          <option value="WV">WV</option>
          <option value="WY">WY</option>
          <option value="AA">AA</option>
          <option value="AE">AE</option>
          <option value="AP">AP</option>
          <option value="AS">AS</option>
          <option value="FM">FM</option>
          <option value="GU">GU</option>
          <option value="MH">MH</option>
          <option value="MP">MP</option>
          <option value="PR">PR</option>
          <option value="PW">PW</option>
          <option value="VI">VI</option>
        </select>
								<p>
							</center>
						</td>
						<td>
							<center>
								<span class="subtitle" >Zip:</span><br />
								<input type="text" size="5" onKeyup="autotab(this, document.newclient.p1)"maxlength="5" id="zip" name="zip" value="<?php echo $zip; ?>" class="big"/></div><p>
							</center>
						</td>
					</tr>
				</table>
				<p>
				<span class="subtitle" >Phone Number:</span><br />
				<input name="p1" type="text" id="p1" size="3" onKeyup="autotab(this, document.newclient.p2)" maxlength="3"  class="acnice" value="<?php echo $p1; ?>">
				<input name="p2" type="text" id="p2" size="2" onKeyup="autotab(this, document.newclient.p3)" maxlength="3"  class="nice"value="<?php echo $p2; ?>"><span class="emphasis">-</span><input name="p3" type="text" id="p3" size="3" onKeyup="autotab(this, document.newclient.pa1)" maxlength="4"  class="nice"value="<?php echo $p3; ?>"><p>
				<span class="subtitle" >Alternate Phone Number:</span><br />
				<input name="pa1" type="text" id="pa1" size="3" onKeyup="autotab(this, document.newclient.pa2)" maxlength="3"  class="acnice" value="<?php echo $pa1; ?>"> 
				<input name="pa2" type="text" id="pa2" size="2" onKeyup="autotab(this, document.newclient.pa3)" maxlength="3"  class="nice" value="<?php echo $pa2; ?>"><span class="emphasis">-</span><input name="pa3" type="text" id="pa3" size="3" onKeyup="autotab(this, document.newclient.email)" maxlength="4"  class="nice" value="<?php echo $pa3; ?>"><p>
				<span class="subtitle" >Email Address:</span><br />
				<input type="text" size="30" id="email" name="email" value="" class="big"/>
			</div>
			<p>
			<div style="padding: 6px; border: 1px solid #FFA500; background-color: #FFF3DD;">
				<table>
					<tr> 
    			  <td><span class="subtitle">Credit Card Type:</span></td>
    			  <td>
    			      <select class="nice" name="select">
    			        <option>Visa</option>
    			        <option>Master Card</option>
    			        <option>American Express</option>
    			        <option>Discover</option>
    			      </select>
    				</td>
    			  <td>&nbsp; </td>
    			</tr>
    			<tr <?php if(stristr($error2, "num")){ echo "class='error_row'"; }?> >
    				<td>
    					<span class="subtitle">Credit Card Number:</span>
    				</td>
    				<td>
    					<input class="nice" name="ccnum" type="text" id="ccnum" value="<?php echo $user['10']; ?>">
    				</td>
    				<td>
    				&nbsp;
    				</td>
    			</tr>
    			<tr <?php if(stristr($error2, "exp")){ echo "class='error_row'"; }?> >
    				<td>
    					<span class="subtitle">Expiration Date:</span>
    				</td>
    				<td>
    				    <select class="nice" name="exp_month" id="select">
    				      <option value="<?php echo $user['11']; ?>"><?php echo $user['11']; ?></option>
    				      <option value="01">01</option>
    				      <option value="02">02</option>
    				      <option value="03">03</option>
    				      <option value="04">04</option>
    				      <option value="05">05</option>
    				      <option value="06">06</option>
    				      <option value="07">07</option>
    				      <option value="08">08</option>
    				      <option value="09">09</option>
    				      <option value="10">10</option>
    				      <option value="11">11</option>
    				      <option value="12">12</option>
    				    </select>
    				    <span class="subtitle">/</span>
    				    <select class="nice" name="exp_year" id="select2">
    				      <option value="<?php echo $user['12']; ?>"><?php echo $user['12']; ?></option>
    				      <option value="2007">2007</option>
    				      <option value="2008">2008</option>
    				      <option value="2009">2009</option>
    				      <option value="2010">2010</option>
    				      <option value="2011">2011</option>
    				      <option value="2012">2012</option>
    				      <option value="2013">2013</option>
    				      <option value="2014">2014</option>
    				      <option value="2015">2015</option>
    				      <option value="2016">2016</option>
    				      <option value="2017">2017</option>
    				      <option value="2018">2018</option>
    				      <option value="2019">2019</option>
    				      <option value="2020">2020</option>
    				    </select>
    				</td>
    				<td>
    					&nbsp;
    				</td>
    			</tr>
				</table>
			</div>
			<p>
			<div class="optionbox2">
			<table>
					<tr> 
      <td colspan="3"><span class="emphasis">Your Comment:</span></td>
    </tr>
    <tr>
    	<td><span class="emphasis">Comment Title:</span></td>
    	<td><input class="nice" name="comment_title" type="text" id="comment_title" value=""></td>
    	<td></td>
    </tr>
    <tr> 
      <td colspan="3">
      <textarea class="nice" name="comment_text" cols="50" rows="6"></textarea>
			<br /><br />

<span class="emphasis2">Comment Options</span> (optional)<br/>
			<input type="checkbox" class="nice" name="anonymous">I would like to comment Anonymously.<br />
			<input type="checkbox" class="nice" name="hide_location">I would like to hide my location in my comment.<br />
			<input type="checkbox" class="nice" name="hide_amount">I would like to hide the amount donated in my comment.<br />
			<input type="checkbox" class="nice" name="private">I would like to make my comment viewable only to the Benfund owner.<br />
			</td>
    </tr>
  </table>
			</div>
			<p>
		</td>
	</tr>
</table>
##############################################################################-->
  <table width="auto" border="0" cellpadding="5" cellspacing="0">
    <tr <?php if(stristr($error2, "amount")){ echo "class='error_row'"; }else{ echo "class='amount_row'"; }?> > 
    <td ><span class="emphasis">Amount:</span></td>
    <td><div align="left"><span class="emphasis">$</span><input class="nice" name="amount" type="text" id="amount2" value="<?php echo $user['13']; ?>" size="6">
      </div></td>
    <td>&nbsp; </td>
    </tr>
    <tr > 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "first_name")){ echo "class='error_row'"; }?>	>
		<td width="200">
			<span class="emphasis">First Name:</span>
		</td>
    <td width="148">
    	<input class="nice" name="first_name" type="text" id="first_name" value="<?php echo $user['0']; ?>">
    </td>
    <td width="auto">&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "last_name")){  echo "class='error_row'"; }?> >
    <td>
    	<span class="emphasis">Last Name:</span>
    </td>
    <td>
      <input class="nice" name="last_name" type="text" id="last_name" value="<?php echo $user['1']; ?>">
    </td>
    <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "address")){ echo "class='error_row'"; }?> >
    <td><span class="emphasis">Address:</span></td>
    <td>
    	<input class="nice" name="address" type="text" id="address" value="<?php echo $user['2']; ?>">
    </td>
    <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "city")){  echo "class='error_row'"; }?> >
    <td>
    	<span class="emphasis">City:</span>
   	</td>
    <td>
    	<input class="nice" name="city" type="text" id="city" value="<?php echo $user['3']; ?>">
    </td>
    <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "state")){ echo "class='error_row'"; }?> >
    <td><span class="emphasis">State:</span></td>
    <td>
        <select class="nice" id="select3" name="state">
          <option value="<?php echo $user['4']; ?>"><?php echo $user['4']; ?></option>
          <option value="AK">AK</option>
          <option value="AL">AL</option>
          <option value="AR">AR</option>
          <option value="AZ">AZ</option>
          <option value="CA">CA</option>
          <option value="CO">CO</option>
          <option value="CT">CT</option>
          <option value="DC">DC</option>
          <option value="DE">DE</option>
          <option value="FL">FL</option>
          <option value="GA">GA</option>
          <option value="HI">HI</option>
          <option value="IA">IA</option>
          <option value="ID">ID</option>
          <option value="IL">IL</option>
          <option value="IN">IN</option>
          <option value="KS">KS</option>
          <option value="KY">KY</option>
          <option value="LA">LA</option>
          <option value="MA">MA</option>
          <option value="MD">MD</option>
          <option value="ME">ME</option>
          <option value="MI">MI</option>
          <option value="MN">MN</option>
          <option value="MO">MO</option>
          <option value="MS">MS</option>
          <option value="MT">MT</option>
          <option value="NC">NC</option>
          <option value="ND">ND</option>
          <option value="NE">NE</option>
          <option value="NH">NH</option>
          <option value="NJ">NJ</option>
          <option value="NM">NM</option>
          <option value="NV">NV</option>
          <option value="NY">NY</option>
          <option value="OH">OH</option>
          <option value="OK">OK</option>
          <option value="OR">OR</option>
          <option value="PA">PA</option>
          <option value="RI">RI</option>
          <option value="SC">SC</option>
          <option value="SD">SD</option>
          <option value="TN">TN</option>
          <option value="TX">TX</option>
          <option value="UT">UT</option>
          <option value="VA">VA</option>
          <option value="VT">VT</option>
          <option value="WA">WA</option>
          <option value="WI">WI</option>
          <option value="WV">WV</option>
          <option value="WY">WY</option>
          <option value="AA">AA</option>
          <option value="AE">AE</option>
          <option value="AP">AP</option>
          <option value="AS">AS</option>
          <option value="FM">FM</option>
          <option value="GU">GU</option>
          <option value="MH">MH</option>
          <option value="MP">MP</option>
          <option value="PR">PR</option>
          <option value="PW">PW</option>
          <option value="VI">VI</option>
        </select>
    </td>
    <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "zip")){ echo "class='error_row'"; }?> >
    <td><span class="emphasis">Zip:</span></td>
    <td>
        <input class="nice" name="zip" type="text" id="zip" value="<?php echo $user['5']; ?>" size="5" maxlength="5">
    </td>
    <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "phone")){  echo "class='error_row'"; }?> >
    <td><span class="emphasis">Phone:</span></td>
    <td>
        <input class="acnice" name="p1" type="text" id="p1" value="<?php echo $user['6']; ?>" size="3" maxlength="3">
        - 
        <input class="nice" name="p2" type="text" id="p22" value="<?php echo $user['7']; ?>" size="3" maxlength="3">
        - 
        <input class="nice" name="p3" type="text" id="p32" value="<?php echo $user['8']; ?>" size="4" maxlength="4">
    </td>
    <td>&nbsp; </td>
    </tr>
    <tr <?php if(stristr($error2, "email")){  echo "class='error_row'"; }?> >
    <td><span class="emphasis">Email:</span></td>
    <td>
        <input class="nice" name="email" type="text" id="email" value="<?php echo $user['9']; ?>">
   	</td>
    <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><span class="emphasis">Credit Card Type:</span></td>
      <td>
          <select class="nice" name="select">
            <option>Visa</option>
            <option>Master Card</option>
            <option>American Express</option>
            <option>Discover</option>
          </select>
    	</td>
      <td>&nbsp; </td>
    </tr>
    <tr <?php if(stristr($error2, "num")){ echo "class='error_row'"; }?> >
    <td><span class="emphasis">Credit Card Number:</span></td>
    <td><input class="nice" name="ccnum" type="text" id="ccnum" value="<?php echo $user['10']; ?>"></td>
    <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "exp")){ echo "class='error_row'"; }?> >
    <td><span class="emphasis">Expiration Date:</span></td>
    <td>
        <select class="nice" name="exp_month" id="select">
          <option value="<?php echo $user['11']; ?>"><?php echo $user['11']; ?></option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
        </select>
        <span class="emphasis">/</span>
        <select class="nice" name="exp_year" id="select2">
          <option value="<?php echo $user['12']; ?>"><?php echo $user['12']; ?></option>
          <option value="2007">2007</option>
          <option value="2008">2008</option>
          <option value="2009">2009</option>
          <option value="2010">2010</option>
          <option value="2011">2011</option>
          <option value="2012">2012</option>
          <option value="2013">2013</option>
          <option value="2014">2014</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
        </select>
    </td>
    <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="3"><span class="emphasis">Your Comment:</span></td>
    </tr>
    <tr>
    	<td><span class="emphasis">Comment Title:</span></td>
    	<td><input class="nice" name="comment_title" type="text" id="comment_title" value=""></td>
    	<td></td>
    </tr>
    <tr> 
      <td colspan="3">
      <textarea class="nice" name="comment_text" cols="50" rows="6"></textarea>
			<br /><br />
			<div class="optionbox2">
<span class="emphasis2">Comment Options</span> (optional)<br/>
			<input type="checkbox" class="nice" name="anonymous">I would like to comment Anonymously.<br />
			<input type="checkbox" class="nice" name="hide_location">I would like to hide my location in my comment.<br />
			<input type="checkbox" class="nice" name="hide_amount">I would like to hide the amount donated in my comment.<br />
			<input type="checkbox" class="nice" name="private">I would like to make my comment viewable only to the Benfund owner.<br />
			</div>
			</td>
    </tr>
  </table>
  <div align="center">

<?php 
while(isset($_SESSION['user']))
{ unset ($_SESSION['user']);
}
while(isset($_SESSION['error2']))
{ unset ($_SESSION['error2']);
}
?>    
<!--<input class="nice" name="reset" type="reset" id="reset" value="Reset">-->
	<input name="mid" type="hidden" value="<?php echo $mid;?>">
	<input type="image" src="https://www.benfund.com/images/elements/reset.gif" name="Reset" value="Submit">
	<input type="image" src="https://www.benfund.com/images/elements/submit.gif" name="Submit" value="Submit">
  </div>
</form>
</body>
</html>

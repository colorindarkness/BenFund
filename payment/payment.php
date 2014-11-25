<?php session_start(); ?>
<html>
<?php $user = $_SESSION['user']; 
	  $error2 = $_SESSION['error2'];
	  $mid = $_POST['h_mid'];
	   
?>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.error {font-size: 18px; font-weight: bold; background : #FF0000 none;}
</style>
</head>

<body>
<?php echo $mid; ?>
<div align="center"></div>
<form action="https://www.benfund.com/payment/receipt.php" method="post">
  <table width="auto" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr> 
      <td colspan="3"> <div align="center"> 
          <?php 	
				while(isset($_SESSION['error']))
				{echo $_SESSION['error']; 
				 unset ($_SESSION['error']);
				} 
		?>
        </div></td>
    </tr>
    <?php if(stristr($error2, "amount"))
   {  echo "<tr class='error'>"; }
    else
	{ echo "<tr bgcolor='#00FF00'>"; }
?>
    <td >Amount: </td>
    <td><div align="left">$ 
        <input name="amount" type="text" id="amount2" value="<?php echo $user['13']; ?>" size="6">
      </div></td>
    <td>&nbsp; </td>
    </tr>
    <tr > 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <?php 
	if(stristr($error2, "first_name"))
   		{  echo "<tr class='error'>"; }
    else
		{ echo "<tr>"; }
	?>	
	<td width="130">First Name:</td>
    <td width="148"><div align="left"> 
        <input name="first_name" type="text" id="first_name" value="<?php echo $user['0']; ?>">
      </div></td>
    <td width="auto">&nbsp;</td>
    </tr>
    <?php if(stristr($error2, "last_name"))
   {  echo "<tr class='error'>"; }
    else
	{ echo "<tr>"; }
?>
    <td>Last Name:</td>
    <td> <p align="left"> 
        <input name="last_name" type="text" id="last_name" value="<?php echo $user['1']; ?>">
      </p></td>
    <td>&nbsp;</td>
    </tr>
    <?php if(stristr($error2, "address"))
   {  echo "<tr class='error'>"; }
    else
	{ echo "<tr>"; }
?>
    <td>Address: </td>
    <td><div align="left"> 
        <input name="address" type="text" id="address" value="<?php echo $user['2']; ?>">
      </div></td>
    <td>&nbsp;</td>
    </tr>
    <?php if(stristr($error2, "city"))
   {  echo "<tr class='error'>"; }
    else
	{ echo "<tr>"; }
?>
    <td>City: </td>
    <td><div align="left"> 
        <input name="city" type="text" id="city" value="<?php echo $user['3']; ?>">
      </div></td>
    <td>&nbsp;</td>
    </tr>
    <?php if(stristr($error2, "state"))
   {  echo "<tr class='error'>"; }
    else
	{ echo "<tr>"; }
?>
    <td>State:</td>
    <td><div align="left"> 
        <select id="select3" name="state">
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
      </div></td>
    <td>&nbsp;</td>
    </tr>
    <?php if(stristr($error2, "zip"))
   {  echo "<tr class='error'>"; }
    else
	{ echo "<tr>"; }
?>
    <td>Zip:</td>
    <td><div align="left"> 
        <input name="zip" type="text" id="zip" value="<?php echo $user['5']; ?>" size="5" maxlength="5">
      </div></td>
    <td>&nbsp;</td>
    </tr>
    <?php if(stristr($error2, "phone"))
   {  echo "<tr class='error'>"; }
    else
	{ echo "<tr>"; }
?>
    <td>Phone: </td>
    <td><div align="left"> 
        <input name="p1" type="text" id="p1" value="<?php echo $user['6']; ?>" size="3" maxlength="3">
        - 
        <input name="p2" type="text" id="p22" value="<?php echo $user['7']; ?>" size="3" maxlength="3">
        - 
        <input name="p3" type="text" id="p32" value="<?php echo $user['8']; ?>" size="4" maxlength="4">
      </div></td>
    <td>&nbsp; </td>
    </tr>
    <?php if(stristr($error2, "email"))
   {  echo "<tr class='error'>"; }
    else
	{ echo "<tr>"; }
?>
    <td>Email: </td>
    <td><div align="left"> 
        <input name="email" type="text" id="email" value="<?php echo $user['9']; ?>">
      </div></td>
    <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Credit Card Type:</td>
      <td><div align="left"> 
          <select name="select">
            <option>Visa</option>
            <option>Master Card</option>
            <option>American Express</option>
            <option>Discover</option>
          </select>
        </div></td>
      <td>&nbsp; </td>
    </tr>
    <?php if(stristr($error2, "num"))
   {  echo "<tr class='error'>"; }
    else
	{ echo "<tr>"; }
?>
    <td>Credit Card Number:</td>
    <td><input name="ccnum" type="text" id="ccnum" value="<?php echo $user['10']; ?>"></td>
    <td>&nbsp;</td>
    </tr>
    <?php if(stristr($error2, "exp"))
   {  echo "<tr class='error'>"; }
    else
	{ echo "<tr>"; }
?>
    <td>Expiration Date:</td>
    <td><div align="left"> 
        <select name="exp_month" id="select">
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
        / 
        <select name="exp_year" id="select2">
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
      </div></td>
    <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="3"> <div align="left">
          <input name="mid" type="hidden" id="mid" value="<?php echo $mid; ?>">
          <input name="cid" type="hidden" id="cid" value="<?php echo $cid; ?>">
        </div></td>
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
	
	<input type="submit" name="Submit" value="Submit">
    <input name="reset" type="reset" id="reset" value="Reset">
  </div>
</form>
</body>
</html>

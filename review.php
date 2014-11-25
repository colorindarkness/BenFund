<?php require ("includes/globals.php");
session_start();
$page_title = "Register";
require($ROOT."/functions/benfund_connect.php");
require ($ROOT."functions/logout.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."includes/head.php") ?>
</head>

<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."includes/header.php") ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."includes/left.php") ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top" valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."includes/pathway.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">
<!--MAJOR IF STARTS HERE-->
<?php
if ($_POST['submit'] == Revise) {
?>
<span class="pagetitle">BenFund Registration</span>
<div class="hr"></div>
<span class="subtitle">Please revise any incorrect information.</span>
	  <form action="review.php" method="post" name="register" id="register">
          <table width="100%" border="0" bordercolor="#000000">
            <tr> 
              <td width="190">
                  <span class="emphasis">Account Name:</span><br>
                </div></td>
              <td><input name="group" type="text" id="group" size="25" class="nice" maxlength="30" class="nice" value="<?php echo $name; ?>"></td>
			  <td>(Example: Boy Scout Troop 428)</td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">Contact Name:</span></td>
              <td><input name="name" type="text" id="name" size="25" class="nice" value="<?php echo $c_name; ?>"></td>
			  <td>(First, Middle Inital, 
                  Last)</td>
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
              <td><input name="state" type="text" id="state" size="2" onKeyup="autotab(this, document.register.zip)" maxlength="2"  class="nice" value="<?php echo $group; ?>"><span class="emphasisright">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zip:<input name="zip" type="text" id="zip" size="5" onKeyup="autotab(this, document.register.p1)" maxlength="5"  class="nice" value="<?php echo $zip; ?>"></td>
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
              <td width="190"><span class="emphasis">Social Security #:</div></td>
              <td><input name="ssn" type="text" id="ssn" size="9" onKeyup="autotab(this, document.register.pw)" maxlength="9"  class="nice" value="<?php echo $ssn; ?>"> 
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
              <td><input name="tax" type="text" id="tax" size="9" onKeyup="autotab(this, document.register.pw)" maxlength="9"  class="nice" value="<?php echo $tax; ?>"></td>
			  <td></td>
            </tr>
            <tr>
              <td width="190">&nbsp;</td>
              <td>&nbsp;</td>
			  <td></td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">Password:</span></td>
              <td><input name="pw" type="password" id="pw" size="12" maxlength="10"  class="nice" value="<?php echo $pw; ?>"></td>
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
  <p align="center">
    <input class="cool" type="submit" name="Submit" value="Next" class="button">
    <input class="cool" type="reset" name="Submit2" value="Reset">
  </p>
        </form>
        <p align="center">*This will be used if you need to reset your password. 
          Once it is set, it cannot be changed.</p>
<?php
} elseif ($_POST['submit'] == Submit){
$m_type = $_POST['m_type'];
$name = $_POST['name'];
$c_name = $_POST['c_name'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$alt_phone = $_POST['alt_phone'];
$email = $_POST['email'];
$goal = $_POST['goal'];
$ss2 = $_POST['ss2'];
$tax2 = $_POST['tax2'];
$password = $_POST['password'];
$pin = $_POST['pin'];
$status = $_POST['status'];
$reset = $_POST['reset'];
$g_name = $_POST['g_name'];
$mid = $_POST['mid'];
benfund_connect();
$query0 = "INSERT INTO merchant (id, m_type, name, contact_name, address, address2, city, state, zip, phone, alt_phone, email, goal, ssn2, tax2, password, pin, activated, reset, g_name) VALUES('$mid', '$m_type', '$name', '$c_name', '$address', '$address2', '$city', '$state', '$zip', '$phone', '$alt_phone', '$email', '$goal', '$ss2', '$tax2', '$password', '$pin', '$status', '$reset', '$g_name')";
mysql_query($query0) or die(mysql_error());
$now = date("m/d/y g:i a");
benfund_connect();
$query1 = "INSERT INTO mpages (mid, pid, title, content, date) VALUES('$mid', '1', 'Home', 'This is your Benfund Home Page. Make this an introductory page', '$now')";
mysql_query($query1) or die(mysql_error());
benfund_connect();
$query2 = "INSERT INTO mpages (mid, pid, title, content, date) VALUES('$mid', '2', 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '$now')";
mysql_query($query2) or die(mysql_error());
benfund_connect();
$query3 = "INSERT INTO mpages (mid, pid, title, content, date) VALUES('$mid', '3', 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '$now')";
mysql_query($query3) or die(mysql_error());
benfund_connect();
$query4 = "INSERT INTO mtemplates (mid, title, meta, header, menu, info, footer, date) VALUES('$mid', '$name', '$name', '$name', '$name', '$name', '$name', '$now')";
mysql_query($query4) or die(mysql_error());
?>
<table width="100%" border="0" align="left" bordercolor="#000000">
  <tr> 
    <td><span class="emphasis">Benfund #:</span></td>
    <td><em> 
      <?php  echo $mid ?>
      <font size="-1"> (Note: you will use this to login to your account) </font></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Account Name:</span></td>
    <td><?php echo $name; ?></td>
  </tr>
  <tr> 
    <td width="50%"><span class="emphasis">Contact Name:</span></td>
    <td width="50%"><em> <?php echo $c_name ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Address:</span></td>
    <td><em> <?php echo $address1 ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Address 2 (optional):</span></td>
    <td><em> <?php echo $address2 ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">City:</span></td>
    <td><em> <?php echo $city ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">State:</span></td>
    <td><em> <?php echo $state ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Zip:</span></td>
    <td><em> <?php echo $zip ?></em></td>
  </tr>
  <tr> 
    <td height="25"><span class="emphasis">Phone:</span></td>
    <td><em> <?php echo $phone ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">E-mail Address</span></td>
    <td><em><?php echo $email ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">
        <?php if(empty($ssn)){echo "Federal Tax ID:";} else{echo "Social Security Number:";} ?>
        </span></td>
    <td><em>
      <?php if(empty($ssn)){echo "$tax1-$tax2";} else{echo "xxx-xx-$ssn2";} ?>
      </em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Password:</span></td>
    <td><em><?php echo $pw ?></em></td>
  </tr>
  <tr> 
    <td><span class="emphasis">PIN:</span></td>
    <td><em><?php echo $pin ?> </em></td>
  </tr>
</table>
<p align="center"><em><font size="+1">Please check your email and click on the 
  link provided to activate your account.</font></em></p>
<p align="center"><em><a href="login.php"><font size="+1"><strong>Return to login</strong></font></a></em></p>

<?php
$message = "
$id
$name
$address1
$address2
$city, $state $zip
$phone
$email
";



$subject = "New Benfund Account $id";

mail("remembering_never@hotmail.com, johanlon100@ptloma.edu", "$subject", "$message", "From: tim@websweeper.com");

$subject = "Activate Your Benfund Account";
$url = "https://www.benfund.com/account_activation.php?id=$id_encrypt&id2=$id&Submit=Submit";
$message = 
"Thank you for registering. Please click the link below to activate your account.  Your benfund #: $id.
$url
(If the Link does not work copy the url and paste it into your web browser's address bar)

Please do not reply to this email it is from an unmonitored account";
mail("$email", "$subject", "$message", "From: accounts@benfund.com");

} else {
?>

<?php 
				$group = $_POST['name'];
				$name = $_POST['c_name'];
  			$address1 = $_POST['address1'];
				$address2 = $_POST['address2'];
				$city = $_POST['city'];
				$state = $_POST['state'];
				$zip = $_POST['zip'];
				$p1 = $_POST['p1'];
				$p2 = $_POST['p2'];
				$p3 = $_POST['p3'];
				$email = $_POST['email'];
				$ssn = $_POST['ssn'];
				$pw = $_POST['pw'];
				$pwconfirm = $_POST['pwconfirm'];
				$pin = $_POST['pin'];
				$pa1 = $_POST['pa1'];
				$pa2 = $_POST['pa2'];
				$pa3 = $_POST['pa3'];
				$tax = $_POST['tax'];
				
				$phone = "$p1$p2$p3";
				$alt_phone = "$pa1$pa2$pa3";
				

			if (get_magic_quotes_gpc())
			{
				$group = stripslashes($group);
				$name = stripslashes($name);
				$address1 = stripslashes($address1);
				$address2 = stripslashes($address2);
				$city = stripslashes($city);
				$state = stripslashes($state);
				$zip = stripslashes($zip);
				$p1 = stripslashes($p1);
				$p2 = stripslashes($p2);
				$p3 = stripslashes($p3);
				$ssn = stripslashes($ssn);
				$email = stripslashes($email);
				$pwconfirm = stripslashes($pwconfirm);
				$pw = stripslashes($pw);
				$pin = stripslashes($pin);
				$pa1 = stripslashes($pa1);
				$pa2 = stripslashes($pa2);
				$pa3 = stripslashes($pa3);
				$tax = stripslashes($tax);
			}
			
?>
<?php
 require("functions/valid_email.php");
 require("functions/var_check.php");
 $required = array ("group" => "Group",
 					"name" => "Name (First, Middle Initial, Last)",
  					"address1" => "Address",
					"city" => "City",
					"state" => "State",
					"zip" => "Zip",
					"p1" => "Phone",
					"p2" => "Phone",
					"p3" => "Phone",
					"pa1" => "Alternate Phone",
					"pa2" => "Alternate Phone",
					"pa3" => "Alternate Phone",
					"email" => "E-mail",
					"pw" => "Password",
					"pwconfirm" => "Confirm Password",
					"pin" => "PIN");
foreach($required as $field => $label)
{
  		if (!$_POST[$field])
  		{$err .="$label is a required field <br>";}
}
		if (!var_check2($tax, $ssn))
		{$err .="You must enter your Social Security Number or Federal Tax ID<br>";
		}
		
		if (!var_check($tax, $ssn))
		{$err .="Please only enter your Social Security Number <em>or</em> Federal Tax ID, not both<br>";
		}
		
		if (!check_email_address($email)) 
		{$err .="$email is not a valid email address <br>";
		}

		if(strlen($pw) < 6 )
		{$err .="Your password must be at least 6 characters <br>";
		}
	
		if ($pw != $pwconfirm)
		{$err .="Your passwords must match <br>";
		}
		
		if (!eregi('^[0-9]+$', $pin))
		{$err .="Your PIN can only contain numbers <Br>";
		}
		
		if (strlen($pin) < 4 )
		{$err .="Your PIN must be 4 digits <br>";
		}
		
		if (char_check($ssn))
		{$err .="Your social security number can only contain numbers <Br>";
		}
		
		if (char_check($tax))
		{$err .="Your federal tax ID can only contain numbers <Br>";
		}
		
		if(length_check($ssn))
		{$err .="Your social security number must be 9 digits <br>";
		}
		
		if(length_check($tax))
		{$err .="Your Federal Tax ID must be 9 digits <br>";
		}
		
		if (!eregi('^[0-9]+$', $zip))
		{$err .="Your zip code can only contain numbers <Br>";
		}
		
		if(strlen($zip) < 5 )
		{$err .="Your zip code must be 5 digits <br>";
		}
		
		if (!eregi('^[0-9]+$', $phone))
		{$err .="Your phone number can only contain numbers <Br>";
		}
		
		if(strlen($phone) < 10 )
		{$err .="Your phone number must be 10 digits <br>";
		}
		
		if (!eregi('^[0-9]+$', $alt_phone))
		{$err .="Your alternate phone number can only contain numbers <Br>";
		}
		
		if(strlen($alt_phone) < 10 )
		{$err .="Your alternate phone number must be 10 digits <br>";
		}
				
	if (isset($err) & $_POST['submit'] == Next) {
	echo '<div class="error2"><span class="errormsg2">'.$err.'</span></div>';	
?>
<?php if (empty($_POST['accept']))
		{die("<h1>You must accept the User Agreement and Privacy Policy to register for an account</h1>");
		}
?>
<span class="pagetitle">BenFund Registration <?php echo $_POST['submit']; ?></span>
<div class="hr"></div>
	  <form action="review.php" method="post" name="register" id="register">
          <table width="100%" border="0" bordercolor="#000000">
            <tr> 
              <td width="190">
                  <span class="emphasis">Account Name:</span><br>
                </div></td>
              <td><input name="group" type="text" id="group" size="25" class="nice" maxlength="30" class="nice" value="<?php echo $name; ?>"></td>
			  <td>(Example: Boy Scout Troop 428)</td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">Contact Name:</span></td>
              <td><input name="name" type="text" id="name" size="25" class="nice" value="<?php echo $c_name; ?>"></td>
			  <td>(First, Middle Inital, 
                  Last)</td>
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
              <td><input name="state" type="text" id="state" size="2" onKeyup="autotab(this, document.register.zip)" maxlength="2"  class="nice" value="<?php echo $group; ?>"><span class="emphasisright">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zip:<input name="zip" type="text" id="zip" size="5" onKeyup="autotab(this, document.register.p1)" maxlength="5"  class="nice" value="<?php echo $zip; ?>"></td>
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
              <td width="190"><span class="emphasis">Social Security #:</div></td>
              <td><input name="ssn" type="text" id="ssn" size="9" onKeyup="autotab(this, document.register.pw)" maxlength="9"  class="nice" value="<?php echo $ssn; ?>"> 
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
              <td><input name="tax" type="text" id="tax" size="9" onKeyup="autotab(this, document.register.pw)" maxlength="9"  class="nice" value="<?php echo $tax; ?>"></td>
			  <td></td>
            </tr>
            <tr>
              <td width="190">&nbsp;</td>
              <td>&nbsp;</td>
			  <td></td>
            </tr>
            <tr> 
              <td width="190"><span class="emphasis">Password:</span></td>
              <td><input name="pw" type="password" id="pw" size="12" maxlength="10"  class="nice" value="<?php echo $pw; ?>"></td>
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
  <p align="center">
    <input class="cool" type="submit" name="submit" value="Next" class="button">
    <input class="cool" type="reset" name="Submit2" value="Reset">
  </p>
        </form>
        <p align="center">*This will be used if you need to reset your password. 
          Once it is set, it cannot be changed.</p>
          
          
  <?php	
 }else {
?>
<h3 align="center"> Please review the information you have entered and be sure 
  it is accurate.</h3>

  
      <table width="100%"align="left">
        <tr> 
          <td><span class="emphasis">Benfund #:</span></td>
          <td valign="top"> <div align="left"><em> 
              <?php  $mid = rand(100000,999999);
	  
	  echo "$id"; ?>
              <font size="-1"><br>
              </font></em></div></td>
        </tr>
        <tr> 
          <td><span class="emphasis">Group Name:</span></td>
          <td><?php echo $group; ?></td>
        </tr>
        <tr> 
          <td width="57%"><span class="emphasis">Name:</span></td>
          <td width="43%"><em> <?php echo $name ?></em></td>
        </tr>
        <tr> 
          <td><span class="emphasis">Address:</span></td>
          <td><em> <?php echo $address1 ?></em></td>
        </tr>
        <tr> 
          <td><span class="emphasis">Address 2 (optional):</span></td>
          <td><em> <?php echo $address2 ?></em></td>
        </tr>
        <tr> 
          <td><span class="emphasis">City:</span></td>
          <td><em> <?php echo $city ?></em></td>
        </tr>
        <tr> 
          <td><span class="emphasis">State:</span></td>
          <td><em> <?php echo $state ?></em></td>
        </tr>
        <tr> 
          <td><span class="emphasis">Zip:</span></td>
          <td><em> <?php echo $zip ?></em></td>
        </tr>
        <tr> 
          <td height="25"><span class="emphasis">Phone:</span></td>
          <td><em><?php echo $phone ?></em></td>
        </tr>
        <tr>
          <td><span class="emphasis">Alternate Phone:</span></td>
          <td><?php echo $alt_phone; ?></td>
        </tr>
        <tr> 
          <td><span class="emphasis">E-mail Address:</span></td>
          <td><em><?php echo $email ?></em></td>
        </tr>
        <tr> 
          <td><span class="emphasis"><?php if(empty($ssn)){echo "Federal Tax ID:";} else{echo "Social Security Number:";} ?></span></td>
          <td><em></em><?php echo $ssn; echo $tax; ?></em></td>
        </tr>
        <tr> 
          <td><span class="emphasis">PIN:</span></td>
          <td><em><?php echo $pin ?> </em></td>
        </tr>
        <tr>
        <td colspan="2">
<form name="form1" method="post" action="review.php">
<input name="mid" type="hidden" id="mid" value="<?php  echo $mid ?>">
<input name="name" type="hidden" id="name" value="<?php echo $name ?>" size="30">
<input name="c_name" type="hidden" id="c_name" value="<?php echo $cname ?>" size="30">
<input name="address1" type="hidden" id="address1" value="<?php echo $address1 ?>" size="30">
<input name="address2" type="hidden" id="address2" value="<?php echo $address2 ?>" size="30">
<input name="city" type="hidden" id="city" value="<?php echo $city ?>" size="30">
<input name="state" type="hidden" id="state" value="<?php echo $state ?>" size="2" maxlength="2">
<input name="zip" type="hidden" id="zip" value="<?php echo $zip ?>" size="5" maxlength="5">
<input name="email" type="hidden" id="email" value="<?php echo $email ?>" size="30">
<input name="ssn" type="hidden" id="ssn" value="<?php echo $ssn; ?>">
<input name="pw" type="hidden" id="pw" value="<?php echo $pw ?>">
<input name="phone" type="hidden" id="phone" value="<?php echo $phone ?>">
<input name="pin" type="hidden" id="pin" value="<?php echo $pin ?>">
<input name="alt_phone" type="hidden" value="<?php echo $alt_phone; ?>">
<input name="tax" type="hidden" value="<?php echo $tax; ?>">
<input type="submit" name="submit" value="Submit" onClick="document.theForm.action='review.php'">
<input type="submit" name="submit" value="Revise" onClick="document.theForm.action='review.php'">
</form>
</td>
</tr>
</table>

<?php } ?>
<?php } ?>
<!--MAJOR IF ENDS HERE-->
	</div>
	</div>
	</td>
  </tr>
  <!--MAINBODY END-->
  <!--FOOTER START-->
  <tr>
    <td colspan="2">
<?php include ($ROOT."includes/footer.php") ?>
	</td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>

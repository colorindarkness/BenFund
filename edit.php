<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
   <meta https-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta name="Author" content="Tim Merino">
   <meta name="GENERATOR" content="Mozilla/4.7 [en] (WinNT; U) [Netscape]">
   <title>Benfund Main Page</title>
</head>
<body>
<img SRC="https://www.benfund.com/ben-logo1.gif" height=81 width=389>
<table>
  <tr>
<td valign="top" WIDTH="120">
<center><table BORDER=0 CELLSPACING=3 CELLPADDING=3 WIDTH="119" BGCOLOR="#FFFFFF" >
<tr>
            <td width="107" BGCOLOR="#33FF33"><b><font color="#000099" face="Arial,Helvetica"><a href="donate.htm">Donate</a></font></b></td>
</tr>

<tr>
<td><img SRC="https://www.benfund.com/clear.gif" height=2 width=20></td>
</tr>

<tr>
            <td BGCOLOR="#33CCFF"><font color="#000099" face="Arial,Helvetica"><a href="about.htm">About 
              Benfund</a></font></td>
</tr>

<tr>
<td BGCOLOR="#FFFFFF"><img SRC="https://www.benfund.com/clear.gif" height=2 width=20></td>
</tr>

<tr>
            <td BGCOLOR="#33CCFF"><font color="#000099" face="Arial,Helvetica"><a href="faq.htm">FAQ</a></font></td>
</tr>

<tr>
<td BGCOLOR="#FFFFFF"><img SRC="https://www.benfund.com/clear.gif" height=2 width=20></td>
</tr>

<tr>
            <td BGCOLOR="#33CCFF"><font color="#000099" face="Arial,Helvetica"><a href="demo1.htm">Demo</a></font></td>
</tr>

<tr>
<td BGCOLOR="#FFFFFF"><img SRC="https://www.benfund.com/clear.gif" height=2 width=20></td>
</tr>

<tr>
            <td BGCOLOR="#33CCFF"><font color="#000099" face="Arial,Helvetica"><a href="../agreement.php">Start 
              a Fund</a></font></td>
</tr>

<tr>
<td BGCOLOR="#FFFFFF"><img SRC="https://www.benfund.com/clear.gif" height=2 width=20></td>
</tr>

<tr>
            <td BGCOLOR="#33CCFF"><font color="#000099" face="Arial,Helvetica"><a href="contact.php">Contact 
              Us</a></font></td>
</tr>
</table></center>
      <p><img SRC="https://www.benfund.com/clear.gif" height=46 width=20> <br>
        <b></b></p>
      <p> <br>
      </p></td>

    <td valign="top" WIDTH="640"><!-- InstanceBeginEditable name="EditRegion1" -->
<?php 
				$group = $_POST['group'];
				$name = $_POST['name'];
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
				$cause = $_POST['cause'];
				$pin = $_POST['pin'];
				$pa1 = $_POST['pa1'];
				$pa2 = $_POST['pa2'];
				$pa3 = $_POST['pa3'];
				$tax = $_POST['tax'];

			if (get_magic_quotes_gpc())
			{
				
				$group = stripslashes($group);
				$id = stripslashes($id);
				$name = stripslashes($name);
				$address1 = stripslashes($address1);
				$address2 = stripslashes($address2);
				$city = stripslashes($city);
				$state = stripslashes($state);
				$zip = stripslashes($zip);
				$p1 = stripslashes($p1);
				$p2 = stripslashes($p2);
				$p3 = stripslashes($p3);
				$email = stripslashes($email);
				$cause = stripslashes($cause);
				$pwconfirm = stripslashes($pwconfirm);
				$pw = stripslashes($pw);
				$pin = stripslashes($pin);
				$pa1 = stripslashes($pa1);
				$pa2 = stripslashes($pa2);
				$pa3 = stripslashes($pa3);
				$tax = stripslashes($tax);
			}
				
				$phone = "$p1$p2$p3";
?>

<form action="review.php" method="post" name="edit" id="edit">
        <table width="73%" border="0" align="center" bordercolor="#000000">
          <tr> 
            <td><div align="right"> 
                <p>Group Name:<br>
                  (Example: Boy Scout Troop 224)</p>
              </div></td>
            <td><input name="group" type="text" id="group" value="<?php echo $group; ?>" size="30" maxlength="30"></td>
          </tr>
          <tr> 
            <td width="57%"><div align="right"> Name (First, Middle Inital, Last):</div></td>
            <td width="43%"><input name="name" type="text" id="name" value="<?php echo $name ?>" size="30"></td>
          </tr>
          <tr> 
            <td><div align="right">Address:</div></td>
            <td><input name="address1" type="text" id="address1" value="<?php echo $address1 ?>" size="30"></td>
          </tr>
          <tr> 
            <td><div align="right">Address 2 (optional):</div></td>
            <td><input name="address2" type="text" id="address2" value="<?php echo $address2 ?>" size="30"></td>
          </tr>
          <tr> 
            <td><div align="right">City:</div></td>
            <td><input name="city" type="text" id="city" value="<?php echo $city ?>" size="30"></td>
          </tr>
          <tr> 
            <td><div align="right">State:</div></td>
            <td><input name="state" type="text" id="state" value="<?php echo $state ?>" size="2" maxlength="2"></td>
          </tr>
          <tr> 
            <td><div align="right">Zip:</div></td>
            <td><input name="zip" type="text" id="zip" value="<?php echo $zip ?>" size="5" maxlength="5"></td>
          </tr>
          <tr> 
            <td height="25"><div align="right">Phone:</div></td>
            <td>( 
              <input name="p1" type="text" id="p1" value="<?php echo $p1 ?>" size="3" maxlength="3">
              ) 
              <input name="p2" type="text" id="p2" value="<?php echo $p2 ?>" size="3" maxlength="3">
              - 
              <input name="p3" type="text" id="p3" value="<?php echo $p3 ?>" size="4" maxlength="4"></td>
          </tr>
          <tr> 
            <td><div align="right">Alternate Phone:</div></td>
            <td>(
              <input name="pa1" type="text" id="pa1" value="<?php echo $pa1; ?>" size="3" maxlength="3">
              ) 
              <input name="pa2" type="text" id="pa2" value="<?php echo $pa2; ?>" size="3" maxlength="3">
              -
              <input name="pa3" type="text" id="pa3" value="<?php echo $pa3; ?>" size="4" maxlength="4"></td>
          </tr>
          <tr> 
            <td><div align="right">E-mail Address (must be a valid working address):</div></td>
            <td><input name="email" type="text" id="email" value="<?php echo $email ?>" size="30"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td><div align="right">Social Security Number</div></td>
            <td><input name="ssn" type="text" id="ssn" value="<?php echo $ssn; ?>" size="9" maxlength="9"></td>
          </tr>
          <tr>
            <td>
<div align="right"><strong>OR</strong> Federal Tax ID:</div></td>
            <td><input name="tax" type="text" id="tax" value="<?php echo $tax; ?>" size="9" maxlength="9"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td><div align="right">Password (Must be at least 5 characters):</div></td>
            <td><input name="pw" type="password" id="pw" value="<?php echo $pw ?>" size="12" maxlength="10"></td>
          </tr>
          <tr> 
            <td><div align="right">Confirm Password:</div></td>
            <td><input name="pwconfirm" type="password" id="pwconfirm" value="<?php echo $pwconfirm ?>" size="12" maxlength="10"></td>
          </tr>
          <tr> 
            <td><div align="right">PIN (4 Digits)*</div></td>
            <td> <input name="pin" type="text" id="pin" value="<?php echo $pin ?>" size="4" maxlength="4"></td>
          </tr>
        </table>
        <p align="center">Why People Should Donate:</p>
        
  <p align="center"> 
    <textarea name="cause" cols="75" rows="10" id="cause"><?php echo $cause ?></textarea>
  </p>
        <p>&nbsp;</p>
        <p align="center"> 
          <input type="submit" name="Submit" value="Next">
        </p>
        
  <p align="center">*This will be used if you need to reset your password. Once 
    it is set, it cannot be changed </p>
      </form>
<!-- InstanceEndEditable --> 
    </td>
</tr>
</table>

<p><b><font color="#000099" size="-2" face="Arial,Helvetica">Copyright &copy;&nbsp; 
  2004-2006</font></b></p>
</body>
<!-- InstanceEnd --></html>

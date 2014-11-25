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
				$pwconfirm = stripslashes($pwconfirm);
				$pw = stripslashes($pw);
				$pin = stripslashes($pin);
				$pa1 = stripslashes($pa1);
				$pa2 = stripslashes($pa2);
				$pa3 = stripslashes($pa3);
				$tax = stripslashes($tax);
			}

?>

<!doctype html public "-//w3c//dtd html 4.0 transitional//en"><html><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
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
<h3 align="center">Please write a brief summary of why people should donate to 
  your cause.</h3>
<form name="form1" method="post" action="review.php">
<input name="group" type="hidden" id="group" value="<?php echo $group ?>" size="30">
<input name="name" type="hidden" id="name" value="<?php echo $name ?>" size="30">
<input name="address1" type="hidden" id="address1" value="<?php echo $address1 ?>" size="30">
<input name="address2" type="hidden" id="address2" value="<?php echo $address2 ?>" size="30">
<input name="city" type="hidden" id="city" value="<?php echo $city ?>" size="30">
<input name="state" type="hidden" id="state" value="<?php echo $state ?>" size="2" maxlength="2">
<input name="zip" type="hidden" id="zip" value="<?php echo $zip ?>" size="5" maxlength="5">
<input name="p1" type="hidden" id="p1" value="<?php echo $p1 ?>" size="3" maxlength="3">
<input name="p2" type="hidden" id="p2" value="<?php echo $p2 ?>" size="3" maxlength="3">
<input name="p3" type="hidden" id="p3" value="<?php echo $p3 ?>" size="4" maxlength="4">
<input name="email" type="hidden" id="email" value="<?php echo $email ?>" size="30">
<input name="ssn" type="hidden" id="ssn" value="<?php echo $ssn; ?>">
<input name="pw" type="hidden" id="pw" value="<?php echo $pw ?>" size="12" maxlength="10">
<input name="pwconfirm" type="hidden" id="pwconfirm" value="<?php echo $pwconfirm ?>" size="12" maxlength="10">
<input name="pin" type="hidden" id="pin" value="<?php echo $pin ?>">
<input name="pa1" type="hidden" id="pa1" value="<?php echo $pa1; ?>">
<input name="pa2" type="hidden" value="<?php echo $pa2; ?>">
<input name="pa3" type="hidden" value="<?php echo $pa3; ?>">
<input name="tax" type="hidden" value="<?php echo $tax; ?>">
        <div align="center">
    <p>
      <textarea name="cause" cols="75" rows="10" id="cause"></textarea>
    </p>
    <p>
      <input type="submit" name="Submit" value="Next">
    </p>
  </div>
</form>
<!-- InstanceEndEditable --> 
    </td>
</tr>
</table>

<p><b><font color="#000099" size="-2" face="Arial,Helvetica">Copyright &copy;&nbsp; 
  2004-2006</font></b></p>
</body>
<!-- InstanceEnd --></html>

<html><!-- InstanceBegin template="/Templates/cust admin.dwt" codeOutsideHTMLIsLocked="false" -->
<?php
session_start();
$id = $_SESSION['valid_user'];
$pw = $_SESSION['pw'];
require('functions/update_totals.php');
require('functions/user_info.php');
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
?>
<head>
   <meta https-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta name="Author" content="Tim Merino">
   <meta name="GENERATOR" content="Mozilla/4.7 [en] (WinNT; U) [Netscape]">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Benfund Main Page</title>
<!-- InstanceEndEditable --> <!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>
<body>
<?php

if(!isset($_SESSION['valid_user']))
{
die($error);
}
?>
<img SRC="https://www.benfund.com/ben-logo1.gif" height=81 width=389>
<table>
  <tr>
<td valign="top" WIDTH="120">
<center><table BORDER=0 CELLSPACING=3 CELLPADDING=3 WIDTH="119" BGCOLOR="#FFFFFF" >
<tr>
            <td width="107" BGCOLOR="#00FF00"><font color="#000099" face="Arial,Helvetica"><a href="../flyers.php"><strong>Print 
              Flyers </strong></a></font></td>
</tr>

<tr>
<td><img SRC="https://www.benfund.com/clear.gif" height=2 width=20></td>
</tr>

<tr>
            <td BGCOLOR="#33CCFF"><font color="#000099" face="Arial,Helvetica"><a href="../donate.php">Add 
              Funds </a></font></td>
</tr>

<tr>
<td BGCOLOR="#FFFFFF"><img SRC="https://www.benfund.com/clear.gif" height=2 width=20></td>
</tr>

<tr>
            <td BGCOLOR="#33CCFF"><font color="#000099" size="-1" face="Arial,Helvetica"><a href="../password.php">Change 
              Password </a></font></td>
</tr>

<tr>
<td BGCOLOR="#FFFFFF"><img SRC="https://www.benfund.com/clear.gif" height=2 width=20></td>
</tr>

<tr>
            <td BGCOLOR="#33CCFF"><font color="#000099" face="Arial,Helvetica"><a href="../new_email.php">Change 
              Email </a></font></td>
</tr>

<tr>
<td BGCOLOR="#FFFFFF"><img SRC="https://www.benfund.com/clear.gif" height=2 width=20></td>
</tr>

<tr>
            <td BGCOLOR="#33CCFF"><p><font color="#000099" face="Arial,Helvetica"><a href="../image_upload.php">Upload/Change 
                Photo</a></font></p>
              </td>
</tr>

<tr>
<td BGCOLOR="#FFFFFF"><img SRC="https://www.benfund.com/clear.gif" height=2 width=20></td>
</tr>

<tr>
            <td BGCOLOR="#33CCFF"><font color="#000099" face="Arial,Helvetica"><a href="../logout.php">Log 
              Out </a></font></td>
</tr>
</table></center>
      <p><img SRC="https://www.benfund.com/clear.gif" height=46 width=20> <br>
        <b></b></p>
      <p> <br>
      </p></td>

    <td valign="top" WIDTH="640"><!-- InstanceBeginEditable name="EditRegion3" -->
<form name="form1" method="post" action="change_email.php">
        <p>&nbsp;</p>

        <table width="300" border="0" bgcolor="#CCCCCC">
          <?php
 			 if (isset($_SESSION['error2']))
 			 {echo $_SESSION['error2'];
			  unset($_SESSION['error2']);}
			?>
          <tr width="300"> 
            <td><div align="right"><strong>Password: </strong></div></td>
            <td><input name="pw" type="password" id="old_pw2" size="10" maxlength="10"> 
            </td>
          </tr>
          <tr> 
            <td><div align="right"><strong>PIN: </strong></div></td>
            <td><input name="pin" type="password" id="pin2" size="4" maxlength="4"> 
            </td>
          </tr>
          <tr> 
            <td><div align="right"><strong>New Email:</strong></div></td>
            <td><input name="email" type="text" id="new_pw2" size="30"> 
            </td>
          </tr>
          <tr> 
            <td><div align="right"> <strong> 
                <input type="submit" name="Submit" value="Submit">
                </strong></div></td>
            <td><input type="reset" name="Submit2" value="Reset"></td>
          </tr>
        </table>
        <div align="center"></div>
        <p align="center">&nbsp; </p>
  <p align="center">&nbsp; </p>
  <p align="center">&nbsp; </p>
  </form>
<!-- InstanceEndEditable --> 
    </td>
</tr>
</table>

<p><b><font color="#000099" size="-2" face="Arial,Helvetica">Copyright &copy;&nbsp; 
  2004-2006</font></b></p>
</body>
<!-- InstanceEnd --></html>

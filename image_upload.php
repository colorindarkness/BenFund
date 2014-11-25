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
<form action="<?=$PHP_SELF?>" method="post" enctype="multipart/form-data">
        <?php
if (isset($HTTP_POST_VARS['submit'])) {
  if (!is_uploaded_file($HTTP_POST_FILES['file']['tmp_name'])) {
    $error2 = "You did not upload a file!";
    unlink($HTTP_POST_FILES['file']['tmp_name']);
    // assign error message, remove uploaded file, redisplay form.
  } else {
    //a file was uploaded
    $maxfilesize=1625292;

    if ($HTTP_POST_FILES['file']['size'] > $maxfilesize) {
      $error2 = "file is too large";
      unlink($HTTP_POST_FILES['file']['tmp_name']);
      // assign error message, remove uploaded file, redisplay form.
    } else {
      if ($HTTP_POST_FILES['file']['type'] != "image/pjpeg" && $HTTP_POST_FILES['file']['type'] != "image/jpeg") {
        $error2 = "This file type is not allowed";
        unlink($HTTP_POST_FILES['file']['tmp_name']);
        // assign error message, remove uploaded file, redisplay form.
      } else {
       //File has passed all validation, copy it to the final destination and remove the temporary file:
       $filename = $HTTP_POST_FILES['file']['name'];
	   copy($HTTP_POST_FILES['file']['tmp_name'],"images/$id.jpg");
       unlink($HTTP_POST_FILES['file']['tmp_name']);
       require ("functions/image_resize.php");
	   $img = "images/$id.jpg";
	   scale($img,'480','360');
	   echo "The file $filename has been successfully uploaded!";

		include("approval_email.php");

	   }
    }
  }
}
?>
        <p>
          <?php
		 $im = "images/approved/$id.jpg";
		 $im2 = getimagesize($im);
		 $im = "https://www.benfund.com/images/approved/$id.jpg";
		 if(isset($im2[0])){ ?>
          <img SRC="<?php echo $im; ?>"> 
          <?php } ?>
          <br>
          <?php if (isset($error2)){ echo $error2; }
		  
     ?>
          <br>
          Choose an image to upload:<br>
          <input type="file" name="file">
          <br>
          Images may be a max of 1.5MB. Photo must be a JPG<br>
          Images may not contain nudity, sexually explicit content, violent, offensive 
          material, or be copyrighted. Do not upload images of other people without 
          their permission. Image approval can take as long as two business days. 
          When the image has been approved, you will recieve an email informing 
          you of approval and the image will appear above.</p>
        <p>This photo will be used on your flyers.</p>
        <p>
          <input type="submit" name="submit" value="Upload Image">
        </p>
      </form>


<!-- InstanceEndEditable --> 
    </td>
</tr>
</table>

<p><b><font color="#000099" size="-2" face="Arial,Helvetica">Copyright &copy;&nbsp; 
  2004-2006</font></b></p>
</body>
<!-- InstanceEnd --></html>

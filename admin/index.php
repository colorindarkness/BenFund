<?php require ("../includes/globals.php");?>
<?php
session_start();
//$id = $_SESSION['valid_admin'];
//$pw = $_SESSION['pw'];
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Login</title>
<?php include ($ROOT."/includes/head.php") ?>
</head>

<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."/admin/includes/header.php") ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."/includes/left.php") ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."/includes/pathway.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">
	<?php

if(!isset($_SESSION['valid_admin'])) {
echo "<script>document.location.href='login.php'</script>";
//die($error);
} else {
?>
<center><span class="subtitle">Administrator Control Panel</span></center>
<table width="500" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td>
	<a href="https://www.benfund.com/admin/acct_manager.php">
      <center>
        <img src="https://www.benfund.com/images/elements/icons/users.png" border="0"/>
      </center>
	  </a>
    </td>
    <td>
	<a href="https://www.benfund.com/admin/finance_manager.php">
      <center>
        <img src="https://www.benfund.com/images/elements/icons/reports.png" border="0"/>
      </center>
    </td>
    <td>
	<a href="https://www.benfund.com/admin/page_manager.php">
      <center>
        <img src="https://www.benfund.com/images/elements/icons/edit_pages.png" border="0"/>
      </center>
	  </a>
    </td>
    <td>
	<a href="https://www.benfund.com/admin/file_manager.php">
      <center>
        <img src="https://www.benfund.com/images/elements/icons/files.png" border="0"/>
      </center>
    </td>
  </tr>
  <tr>
    <td>
	<a href="https://www.benfund.com/admin/acct_manager.php">
      <center>
        Account Manager
      </center>
	  </a>
    </td>
    <td>
	<a href="https://www.benfund.com/admin/finance_manager.php">
      <center>
        Finance Manager
      </center>
	 </a>
    </td>
    <td>
	<a href="https://www.benfund.com/admin/page_manager.php">
      <center>
        Page Manager
      </center>
	  </a>
    </td>
    <td>
	<a href="https://www.benfund.com/admin/file_manager.php">
      <center>
        File Manager
      </center>
	  </a>
    </td>
  </tr>
  <tr>
    <td>
      <center>
        <img src="https://www.benfund.com/images/elements/icons/edit_tpl.png" border="0"/>
      </center>
    </td>
    <td>
      <center>
        <img src="https://www.benfund.com/images/elements/icons/edit_pages.png" border="0"/>
      </center>
    </td>
    <td>
      <center>
        <img src="https://www.benfund.com/images/elements/icons/nfo.png" border="0"/>
      </center>
    </td>
    <td>
      <center>
      <a href="login.php">
        <img src="https://www.benfund.com/images/elements/icons/logout.png" border="0"/>
        </a>
      </center>
    </td>
  </tr>
  <tr>
    <td>
      <center>
        Edit Template 
      </center>
    </td>
    <td>
      <center>
        Edit Pages 
      </center>
    </td>
    <td>
      <center>
        Change Information
      </center>
    </td>
    <td>
      <center>
      <a href="login.php">
        Logout
        </a>
      </center>
    </td>
  </tr>
</table>
	</div>
	</div>
	</td>
  </tr>
  <!--MAINBODY END-->
  <!--FOOTER START-->
  <tr>
    <td colspan="2">
<?php include ($ROOT."/includes/footer.php") ?>
	</td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
<?php } ?>
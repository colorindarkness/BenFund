<?php require ("../includes/globals.php");
session_start();
$page_title = "Login";
require ($ROOT."/admin/functions/logout.php");
logout(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php") ?>
</head>

<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."/includes/header.php"); ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."/includes/left.php") ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top" valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."/includes/pathway.php"); ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">
	<table width="600"><tr>
	<td width="385" valign="top">
<span class="pagetitle">BenFund Administration</span>
<div class="hr"></div>
	<div class="loginform2">
	<span class="subtitle">Admin Login</span></p>
                    <font color="#0000FF"><em> 
                    
                    </em></font>
					<form name="admin_login" method="post" action="admin_login.php">
                      <span class="emphasis">User Name:</span><br /> 
                        <input name="adminid" type="text" id="adminid" size="20" maxlength="40" class="huge">
                      <br />
                      <span class="emphasis">Password:</span><br />
                        <input name="adminpw" type="password" id="adminpw" size="20" maxlength="40"class="huge"></p> 
                      </p>
                      <div align="center">
                        <input name="Submit" type="submit" value="Submit">
                        <input type="reset" name="Submit2" value="Reset">
                      </div>
					  <br />
					  <a href="dev>null">Forgot your Password? Too Bad!</a>
					  <br />
                    </form>
</div>
	</td></tr></table>
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
<?php unset($loggedout, $error, $foo3); ?>
</body>
</html>

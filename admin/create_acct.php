<?php require ("../includes/globals.php");
$page_title = "Create Account";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
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
    <td valign="top" valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."/includes/pathway.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">Create Account</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/admin/acct_manager.php"><img src="https://www.benfund.com/images/elements/icons/cancel.gif" border="0"/><br />Cancel</a></td>
</tr></table>
</td></tr></table>
This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><br />
<form method="post" action="acct_manager.php?cmd=create">
<span class="subtitle" >Account Type:</span><br />
<input type="text" size="50" id="m_type" name="m_type" value="" class="big"/><p>
<span class="subtitle" >Account Name:</span><br />
<input type="text" size="50" id="name" name="name" value="" class="big"/><p>
<span class="subtitle" >Contact Name:</span><br />
<input type="text" size="50" id="c_name" name="c_name" value="" class="big"/><p>
<span class="subtitle" >Address:</span><br />
<input type="text" size="50" id="address" name="address" value="" class="big"/><p>
<span class="subtitle" >Address 2:</span><br />
<input type="text" size="50" id="address2" name="address2" value="" class="big"/><p>
<table><tr>
<td>
<span class="subtitle" >City:</span><br />
<input type="text" size="25" id="city" name="city" value="" class="big"/><p>
</td><td>
<center>
<span class="subtitle" >State:</span><br />
<input type="text" size="1" maxlength="2" id="state" name="state" value="" class="big"/><p>
</center>
</td><td>
<center>
<span class="subtitle" >Zip Code:</span><br />
<input type="text" size="5" maxlength="5" id="zip" name="zip" value="" class="big"/><p>
</center>
</td></tr></table>
<span class="subtitle" >Phone Number:</span><br />
<input type="text" size="11" maxlength="10" id="phone" name="phone" value="" class="big"/><p>
<span class="subtitle" >Alternate Phone Number:</span><br />
<input type="text" size="11" maxlength="10" id="alt_phone" name="alt_phone" value="" class="big"/><p>
<span class="subtitle" >Email Address:</span><br />
<input type="text" size="50" id="email" name="email" value="" class="big"/><p>
<span class="subtitle" >Financial Goal:</span><br />
<input type="text" size="50" id="goal" name="goal" value="" class="big"/><p>
<span class="subtitle" >Social Security Number Suffix:</span><br />
<input type="text" size="4" maxlength="4" id="ssn2" name="ssn2" value="" class="big"/><p>
<span class="subtitle" >Tax ID Number Suffix:</span><br />
<input type="text" size="4" maxlength="4" id="tax2" name="tax2" value="" class="big"/><p>
<span class="subtitle" >Encrypted Password:</span><br />
<input type="text" size="50" id="password" name="password" value="" class="big"/><p>
<span class="subtitle" >Encrypted PIN:</span><br />
<input type="text" size="50" id="pin" name="pin" value="" class="big"/><p>
<span class="subtitle" >Account Status: (1 = Activated)</span><br />
<input type="text" size="1" maxlength="1" id="status" name="status" value="" class="big"/><p>
<span class="subtitle" >Reset:</span><br />
<input type="text" size="50" id="reset" name="reset" value="" class="big"/><p>
<span class="subtitle" >G Name??:</span><br />
<input type="text" size="50" id="g_name" name="g_name" value="" class="big"/><p>
	<input type="submit" name="save" value="Submit" onclick=""/>
	<input type="reset" name="reset" value="Reset" />
</form>
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

</body>
</html>
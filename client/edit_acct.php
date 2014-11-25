<?php
session_start();
if (!isset($_SESSION[valid_client])){
     header('Location:../login.php');
}else{
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
$cid = $_GET['cid'];
$page_title = "Edit Client";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<script type="text/javascript">womOn();</script>
<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."/includes/header.php") ?>
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
	<?php m_menu3(); ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">Edit Client</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/client_manager.php"><img src="https://www.benfund.com/images/elements/icons/cancel.gif" border="0"/><br />Cancel</a></td>
</tr></table>
</td></tr></table>
This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><br />
<?php
benfund_connect();
$query = "SELECT id, mid, first_name, m_i, last_name, address, address2, city, state, zip, phone, alt_phone, email, balance, activated FROM client WHERE id = '$cid'";
$results = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_row($results) or die(mysql_error());
$id = $row[0];
$mid = $row[1];
$first_name = $row[2];
$m_i = $row[3];
$last_name = $row[4];
$address = $row[5];
$address2 = $row[6];
$city = $row[7];
$state = $row[8];
$zip = $row[9];
$phone = $row[10];
$alt_phone = $row[11];
$email = $row[12];
$balance = $row[13];
$status = $row[14];
?>
<form method="post" action="client_manager.php?cmd=edit">
<span class="subtitle" >First Name:</span><br />
<input type="text" size="50" id="first_name" name="first_name" value="<?php echo $first_name; ?>" class="big"/><p>
<span class="subtitle" >Middle Initial:</span><br />
<input type="text" size="50" id="m_i" name="m_i" value="<?php echo $m_i; ?>" class="big"/><p>
<span class="subtitle" >Last Name:</span><br />
<input type="text" size="50" id="last_name" name="last_name" value="<?php echo $last_name; ?>" class="big"/><p>
<span class="subtitle" >Address:</span><br />
<input type="text" size="50" id="address" name="address" value="<?php echo $address; ?>" class="big"/><p>
<span class="subtitle" >Address 2:</span><br />
<input type="text" size="50" id="address2" name="address2" value="<?php echo $address2; ?>" class="big"/><p>
<table><tr>
<td>
<span class="subtitle" >City:</span><br />
<input type="text" size="25" id="city" name="city" value="<?php echo $city; ?>" class="big"/><p>
</td><td>
<center>
<span class="subtitle" >State:</span><br />
<input type="text" size="1" maxlength="2" id="state" name="state" value="<?php echo $state; ?>" class="big"/><p>
</center>
</td><td>
<center>
<span class="subtitle" >Zip Code:</span><br />
<input type="text" size="5" maxlength="5" id="zip" name="zip" value="<?php echo $zip; ?>" class="big"/><p>
</center>
</td></tr></table>
<span class="subtitle" >Phone Number:</span><br />
<input type="text" size="11" maxlength="10" id="phone" name="phone" value="<?php echo $phone; ?>" class="big"/><p>
<span class="subtitle" >Alternate Phone Number:</span><br />
<input type="text" size="11" maxlength="10" id="alt_phone" name="alt_phone" value="<?php echo $alt_phone; ?>" class="big"/><p>
<span class="subtitle" >Email Address:</span><br />
<input type="text" size="50" id="email" name="email" value="<?php echo $email; ?>" class="big"/><p>
<span class="subtitle" >Financial Goal:</span><br />
<input type="text" size="50" id="balance" name="balance" value="<?php echo $balance; ?>" class="big"/><p>
<span class="subtitle" >Account Status: (1 = Activated)</span><br />
<input type="text" size="1" maxlength="1" id="status" name="status" value="<?php echo $status; ?>" class="big"/><p>
	<input type="hidden" id="cid" name="cid" value="<?php echo $cid; ?>" class="big"/>
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
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
<?php
}
?>
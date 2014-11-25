<?php
require ("../includes/globals.php");
$page_title = "Account Manager";
/*require ($ROOT."/admin/includes/pages.php");*/
require($ROOT."/functions/benfund_connect.php");
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
<?php include ($ROOT."/admin/includes/header.php"); ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."/includes/left.php"); ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."/includes/pathway.php"); ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">Account Manager</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/admin/create_acct.php"><img src="https://www.benfund.com/images/elements/icons/new_page.gif" border="0"/><br />New Account</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/admin/delete_page.php"><img src="https://www.benfund.com/images/elements/icons/delete_page.gif" border="0"/><br />Delete</a></td>
</tr></table>
</td></tr></table>

This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><p><p><p>
<?php

if($_GET["cmd"]=="del")
{
$mid = $_GET['mid'];
benfund_connect();
$sql0 = "DELETE FROM merchant WHERE id = $mid";
$result0 = mysql_query($sql0);
    echo '<div class="action"><span class="actionmsg2">Account Deleted!</span></div><p>';
}

if($_GET["cmd"]=="edit")
{
$newtitle = $_POST['title'];
$newcontent = $_POST['content'];
$newauthor = $_POST['author'];
$newdate = $_POST['date'];
$newaccess = $_POST['access'];
$pid = $_POST['pid'];
benfund_connect();
$query0 = "UPDATE pages SET title='$newtitle', content='$newcontent', author='$newauthor', date='$newdate', access='$newaccess' WHERE pid='$pid'";
mysql_query($query0) or die(mysql_error());
echo '<div class="action"><span class="actionmsg">Account Updated!</span></div><p>';
}

if($_GET["cmd"]=="create")
{
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
$mid = rand(100000,999999);
benfund_connect();
$query0 = "INSERT INTO merchant (id, m_type, name, contact_name, address, address2, city, state, zip, phone, alt_phone, email, goal, ssn2, tax2, password, pin, activated, reset, g_name) VALUES('$mid', '$m_type', '$name', '$c_name', '$address', '$address2', '$city', '$state', '$zip', '$phone', '$alt_phone', '$email', '$goal', '$ss2', '$tax2', '$password', '$pin', '$status', '$reset', '$g_name')";
mysql_query($query0) or die(mysql_error());
$now = date("m/d/y g:i a");
echo '<div class="action"><span class="actionmsg">Account Added!</span></div><p align="center"><span class="actionmsg">Benfund Number: '.$mid.'<br />Page URL:<br /><a href="https://www.benfund.com/mindex.php?mid='.$mid.'&pid=1">https://www.benfund.com/mindex.php?mid='.$mid.'&pid=1</a></span></p>';
}
?>
<table width="95%" align="center" border="0" cellspacing="0" cellpadding="4" class="adminlist">

<tr>
<th valign="top" width="5" class="tablehead"><input name="toggle" value="" onclick="checkAll(50);" type="checkbox"></th><th valign="top" width="20" class="tablehead"><b>ID</b></th><th valign="top" class="tablehead"><b>Name</b></th><th valign="top" class="tablehead"><b>Goal</b></th><th valign="top" class="tablehead"><b>Status</b></th><th valign="top" class="tablehead">&nbsp;</th>
</tr>
<?php

benfund_connect();
$query = "SELECT id, cid, first_name, m_i, last_name, balance, activated FROM client WHERE mid = '$mid' ";
$result = mysql_query($query) or die(mysql_error());
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
/*$row = mysql_fetch_row($result) or die(mysql_error());*/
while ($row = mysql_fetch_row($result)) {
$id = $row[0];
$cid = $row[1];
$first_name = $row[2];
$m_i = $row[3];
$last_name = $row[4];
$balance = $row[5];
$activated = $row[6];
$row_color = ($row_count % 2) ? $color1 : $color2;
if ($active==1){
	$status = '<span class="true">Active</span>';
} else {
	$status = '<span class="false">Inactive</span>';
}
?>
<tr class="<?php echo $row_color; ?>"><td valign="top" width="20"><input id="cb0" name="cid[]" value="<?php echo $mid; ?>" onclick="isChecked(this.checked);" type="checkbox"></td><td valign="top" width="20"><?php echo $cid; ?></td><td valign="top" width="250"><a href="edit_acct.php?mid=<?php echo $mid; ?>"><?php echo $first_name; ?> <?php echo $m_i; ?> <?php echo $last_name; ?></a></td><td valign="top"><?php echo $balance; ?></td><td valign="top"><?php echo $status; ?></td><td valign="top"><a onclick="return confirmDelete()" href="acct_manager.php?cmd=del&mid=<?php echo $mid; ?>"><img src="https://www.benfund.com/images/elements/icons/sm/delete.gif" border="0" /></a></td></tr>
<?php
$row_count++;
 } ?>
</table>
	</div>
	</div>
	</td>
  </tr>
  <!--MAINBODY END-->
  <!--FOOTER START-->
  <tr>
    <td colspan="2">
      <font color="#FEFFC1">
      <?php include ($ROOT."/includes/footer.php"); ?>
	  </font></td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>

</body>
</html>
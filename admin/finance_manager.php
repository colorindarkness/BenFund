<?php
require ("../includes/globals.php");
$page_title = "Finance Manager";
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
<span class="pagetitle">Finance Manager</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/admin/new_acct.php"><img src="https://www.benfund.com/images/elements/icons/new_page.gif" border="0"/><br />New Account</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/admin/delete_page.php"><img src="https://www.benfund.com/images/elements/icons/delete_page.gif" border="0"/><br />Delete</a></td>
</tr></table>
</td></tr></table>

This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><p><p><p>
<?php

if($_GET["cmd"]=="del")
{
$pid = $_GET['pid'];
benfund_connect();
    $sql = "DELETE FROM user WHERE id = $uid";
    $result = mysql_query($sql);
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

if($_GET["cmd"]=="new")
{
$newtitle = $_POST['title'];
$newcontent = $_POST['content'];
$newauthor = $_POST['author'];
$newdate = $_POST['date'];
$newaccess = $_POST['access'];
benfund_connect();
$query0 = "INSERT INTO pages (title, content, author, date, access) VALUES('$newtitle', '$newcontent', '$newauthor', '$newdate', '$newaccess')";
mysql_query($query0) or die(mysql_error());
$lastid = mysql_insert_id();
echo '<div class="action"><span class="actionmsg">Account Added!</span></div><p align="center"><span class="actionmsg">Page URL:<br /> https://www.benfund.com/page.php?pid='.$lastid.'</span></p>';
}
?>

<?php

benfund_connect();
$query1 = "SELECT SUM(ammount) FROM account_balance";
$result1 = mysql_query($query1) or die(mysql_error());
$row1 = mysql_fetch_row($result1) or die(mysql_error());
$total1 = $row1[0];
?>
<h3>Total Account Balances:<?php echo $total1 ?></h3>
<?php

benfund_connect();
$query2 = "SELECT SUM(ammount) FROM totals";
$result2 = mysql_query($query2) or die(mysql_error());
$row2 = mysql_fetch_row($result2) or die(mysql_error());
$total2 = $row2[0];
?>
<h3>Total Account Balances:<?php echo $total2 ?></h3>
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
<?php
session_start();
if (!isset($_SESSION[valid_client])){
	$_SESSION['error'] = "This script sucks. <br>Please try again<br>";
     header('Location:../login.php');
}
require ("../includes/globals.php");
$page_title = "Client Manager";
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
require($ROOT."functions/user_info.php");
require_once($ROOT."functions/randpass.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<script type="text/javascript" src="https://www.benfund.com/includes/js/tabs.js"></script>
<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=800,left = 340,top = 112');");
}
</script>
<script type="text/javascript">womOn();</script>
<body <?php echo $onload ;?>>
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
<?php include ($ROOT."/includes/left.php"); ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."/includes/pathway.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<?php m_menu3(); ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">Client Manager</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/add_client.php"><img src="https://www.benfund.com/images/elements/icons/add-client.png" border="0"/><br />Add Client</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/quick_add.php"><img src="https://www.benfund.com/images/elements/icons/quick-add.png" border="0"/><br />Quick Add</a></td>
</tr></table>
</td></tr></table>
<?php
if($_GET["cmd"]=="edit")
{
$first_name = $_POST['first_name'];
$m_i = $_POST['m_i'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$phone = "$p1-$p2-$p3";
$pa1 = $_POST['pa1'];
$pa2 = $_POST['pa2'];
$pa3 = $_POST['pa3'];
$phone2 = "$pa1-$pa2-$pa3";
$email = $_POST['email'];
$balance = $_POST['balance'];
$status = $_POST['status'];
$cid = $_POST['cid'];
benfund_connect();
$query0 = "UPDATE client SET first_name='$first_name', m_i='$m_i', last_name='$last_name', address='$address', address2='$address2', city='$city', state='$state', zip='$zip', phone='$phone', alt_phone='$phone2', email='$email', activated='$status' WHERE cid='$cid' AND mid='$mid'";
mysql_query($query0) or die(mysql_error());
echo '<div class="action"><span class="actionmsg">Client Updated!</span></div><p>';
}

if($_GET["cmd"]=="new")
{
$first_name = $_POST['first_name'];
$m_i = $_POST['m_i'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$phone = "$p1-$p2-$p3";
$pa1 = $_POST['pa1'];
$pa2 = $_POST['pa2'];
$pa3 = $_POST['pa3'];
$phone2 = "$pa1-$pa2-$pa3";
$email = $_POST['email'];
$password = pass_gen();
$balance = $_POST['balance'];
$status = $_POST['status'];
$cid = $_POST['cid'];
if (isset($_POST['cid'])){
	$cid = $_POST['cid'];
} else {
	$cid = rand(1000, 9999);
}
$print = $_POST['print'];
$send = $_POST['send'];
if (isset($send)){
$to = $email;
$subject = 'BenFund: New Account Information!';
$message = '<table width="550" align="center" style="padding: 6px; border: 1px solid #2C2C2C;"><tr><td>
<span style="font-family: Georgia, Garamond, "Times New Roman", Serif; font-size: 40pt; color: #484848; text-align: left;">BenFund</span><br>
<span style="font-size: 10pt; font-style: italic; color: #484848; text-decoration: none; font-weight: bold; clear: both;">"Funding Financial Objectives"</span>
<p>
<span style="font-size: 25pt; color: #484848; text-decoration: none; font-weight: bolder; text-align: left; clear: both;">New Account Information</span>
<div style="height: 2px; background: transparent url(https://www.benfund.com/images/elements/hr.gif) repeat-x left; clear: both; width: 90%; padding: 4px;"></div>
With BenFund you can begin paying your account online with three simple steps.
<p>
<span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 1.</span><br>
<span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Go to </span><span class="emphasis2">www.BenFund.com</span>
<br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Click on the "Login" link in the orange box on the left.</span><p>

<span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 2.</span><br>
<span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Login with the Following Information:</span><br><br>

<div style="margin-left: 10px; padding: 6px; border: 1px solid #2C2C2C; background: #E8E8E8; width: 200px;">
<span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Client Number:</span><br>
<span class="emphasis2">'. $mid . '-' . $cid . '</span><br>
<span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Password:</span><br>
<span class="emphasis2">' . $password . '</span><p>
</div>

<br>
<span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 3.</span><br>
<span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Complete our Simple Online Registration.</span><p>
<p>
<center>&#169; Copyright 2007-2008 BenFund Payment Systems<br />www.BenFund.com "Funding Financial Objectives"</center>
</td></tr></table>';
$headers = "From: noreply@benfund.com\r\n" .
       'X-Mailer: PHP/' . phpversion() . "\r\n" .
       "MIME-Version: 1.0\r\n" .
       "Content-Type: text/html; charset=utf-8\r\n" .
       "Content-Transfer-Encoding: 8bit\r\n\r\n";

// Send
mail($to, $subject, $message, $headers);
}
benfund_connect();
$query0 = "INSERT INTO client (cid, mid, first_name, m_i, last_name, address, address2, city, state, zip, phone, alt_phone, email, password, balance) VALUES('$cid', '$mid', '$first_name', '$m_i', '$last_name', '$address', '$address2', '$city', '$state', '$zip', '$phone', '$alt_phone', '$email', '$password', '$balance')";
mysql_query($query0) or die(mysql_error());
$lastid = mysql_insert_id();
?>
<div class="action"><span class="actionmsg">Client Added!</span><img src="https://www.benfund.com/images/elements/blank.gif" onload="javascript:popUp('https://www.benfund.com/client/client_manager/print_client.php')"></div><p>
<?php
}

if($_GET["cmd"]=="quickadd")
{
$first_name = $_POST['first_name'];
$m_i = $_POST['m_i'];
$last_name = $_POST['last_name'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$phone = "$p1-$p2-$p3";
$email = $_POST['email'];
$password = pass_gen();
$balance = $_POST['balance'];
//$cid = $_POST['cid'];
if (isset($_POST['cid'])){
	$cid = rand(1000, 9999);
} else {
	$cid = $_POST['cid'];
}
$print = $_POST['print'];
$send = $_POST['send'];
if (isset($send)){
$to = $email;
$subject = 'BenFund: New Account Information!';
$message = '<table width="550" align="center" style="padding: 6px; border: 1px solid #2C2C2C;"><tr><td>
<span style="font-family: Georgia, Garamond, Serif; font-size: 40pt; color: #484848; text-decoration: none; font-weight: bolder; text-align: left; clear: both;">BenFund</span><br>
<span style="font-size: 10pt; font-style: italic; color: #484848; text-decoration: none; font-weight: bold; clear: both;">"Funding Financial Objectives"</span>
<p>
<span style="font-size: 25pt; color: #484848; text-decoration: none; font-weight: bolder; text-align: left; clear: both;">New Account Information</span>
<hr>
With BenFund you can begin paying your account online with three simple steps.
<p>
<span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 1.</span><br>
<span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Go to </span><span style="font-size: 14pt; color: #0000CC; text-decoration: none; font-weight: bold;">www.BenFund.com</span>
<br><span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Click on the "Login" link in the orange box on the left.</span><p>

<span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 2.</span><br>
<span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Login with the Following Information:</span><br><br>

<div style="margin-left: 10px; padding: 6px; border: 1px solid #2C2C2C; background: #E8E8E8; width: 200px;">
<span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Client Number:</span><br>
<span style="font-size: 14pt; color: #0000CC; text-decoration: none; font-weight: bold;">'. $mid . '-' . $cid . '</span><br>
<span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Password:</span><br>
<span style="font-size: 14pt; color: #0000CC; text-decoration: none; font-weight: bold;">' . $password . '</span><p>
</div>

<br>
<span style="font-size: 16pt; color: #484848; text-decoration: none; font-weight: bold; clear: both;">Step 3.</span><br>
<span style="font-size: 14pt; color: #484848; text-decoration: none; font-weight: bold;">Complete our Simple Online Registration.</span><p>
<p>
<center>&#169; Copyright 2007-2008 BenFund Payment Systems<br />www.BenFund.com "Funding Financial Objectives"</center>
</td></tr></table>';
$headers = "From: noreply@benfund.com\r\n" .
       'X-Mailer: PHP/' . phpversion() . "\r\n" .
       "MIME-Version: 1.0\r\n" .
       "Content-Type: text/html; charset=utf-8\r\n" .
       "Content-Transfer-Encoding: 8bit\r\n\r\n";

// Send
mail($to, $subject, $message, $headers);
}
benfund_connect();
$query0 = "INSERT INTO client (cid, mid, first_name, m_i, last_name, phone, email, password, balance) VALUES('$cid', '$mid', '$first_name', '$m_i', '$last_name', '$phone', '$email', '$password', '$balance')";
mysql_query($query0) or die(mysql_error());
$lastid = mysql_insert_id();
?>
<div class="action"><span class="actionmsg">Client Added!</span><img src="https://www.benfund.com/images/elements/blank.gif" onload="javascript:popUp('https://www.benfund.com/client/client_manager/print_client.php?rand=<?php echo $password ;?>')">!<?php echo $_POST['cid'];?>?!<?php echo $cid;?>?<?php echo rand(1000, 9999);?></div><p>
<?php
}
?>
<ul id="maintab" class="shadetabs">
<li class="selected"><a href="#default" rel="ajaxcontentarea">Active</a></li>
<li><a href="external.htm" rel="ajaxcontentarea">Past Due</a></li>
<li><a href="external2.htm" rel="ajaxcontentarea">Inactive</a></li>
<li><a href="external3.htm" rel="ajaxcontentarea">All Clients</a></li>
<li><a href="external4.htm" rel="ajaxcontentarea">Sea Otter</a></li>
</ul>

<div id="ajaxcontentarea" class="contentstyle">
<div class="clear">
<table width="95%" align="center" border="0" cellspacing="0" cellpadding="4"  class="sortable" id="omfug">
<tr>
<th valign="top" width="20" class="tablehead"><b>Date</b></th><th valign="top" width="20" class="tablehead"><b>Name</b></th><th valign="top" class="tablehead"><b>Amount</b></th><th valign="top" class="tablehead"><b>Status</b></th>
</tr>
<?php
benfund_connect();
$result = mysql_query("SELECT cid, first_name, m_i, last_name, balance, activated FROM client WHERE mid = '$mid' AND deleted = '0' ORDER BY id");
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
while ($row = mysql_fetch_row($result)) {
	 $cid = $row[0];
	 $first_name = $row[1];
	 $m_i = $row[2];
	 $last_name = $row[3];
	 $balance = $row[4];
   $active = $row[5];
/*   $year = substr($timestamp, 0, 4);
   $month = substr($timestamp, 5, 2);
   $day = substr($timestamp, 8, 2);
   $date = "$month/$day/$year";
   $method = $row['method'];
   $active = $row['valid'];
   benfund_connect();
	 $result2 = mysql_query("SELECT first_name, last_name FROM payment_data WHERE id='$payid'");
	 $row2 = mysql_fetch_row($result2);
	 */
   if ($active==1){
	$status = '<span class="true">Cleared</span>';
} else {
	$status = '<span class="false">Pending</span>';
}

   $row_color = ($row_count % 2) ? $color1 : $color2;
?>
<tr class="<?php echo $row_color; ?>"><td valign="top" width="20"><?php echo $cid; ?></td><td valign="top" width="250"><a href="edit_client.php?cid=<?php echo $cid; ?>"><?php echo $first_name; ?> <?php echo $last_name; ?></a></td><td valign="top" width="250"><a href="edit_client.php?cid=<?php echo $cid; ?>"><?php echo $balance; ?></a></td><td valign="top"><?php echo $status; ?></td></tr>
<?php
$row_count++;
 } ?>
</table>
</div>
<p><b><a href="javascript: expandtab('maintab', 2)">Select 3rd tab of "maintab"</a></b></p>
</div>

<script type="text/javascript">
//Start Ajax tabs script for UL with id="maintab" Separate multiple ids each with a comma.
startajaxtabs("maintab")
</script>
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
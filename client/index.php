<?php
session_start();
if (!isset($_SESSION[valid_client])){
		$error = '<div class="error"><span class="errormsg">Verification Failed.<br>Please try again<br></span></div>';
     header('Location:../login.php');
}
global $page_title;
$page_title = "Control Panel";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
benfund_connect();
$query = "SELECT id, m_type, name, contact_name, address, address2, city, state, zip, phone, alt_phone, email, ssn2, tax2, password, pin, goal, activated, settings FROM merchant WHERE id = '$mid' ";
$results = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($results) or die(mysql_error());
$uid = $row['id'];
$m_type = $row['m_type'];
$_SESSION['m_type'] = $m_type;
$name = $row['name'];
$c_name = $row['contact_name'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Contol Panel</title>
<?php include ($ROOT."/includes/head.php") ?>
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
	<div class="content_outer">
	<div class="content_inner" id="content_inner">
<span class="pagetitle">Welcome <?php echo $c_name; ?></span>

<center><span class="subtitle">Client Control Panel</span></center>

<div style="margin-left: 45px;">
<table width="300"><tr><td style="border: 1px solid #0000FF; background: #E6E6FA; padding: 4px;">
<?php
benfund_connect();
$msgresult = mysql_query("SELECT * FROM messages WHERE to_mid = '$mid' AND deleted = '0' AND new = '0'");
$numrows = mysql_num_rows($msgresult);
if ($numrows > 0){
?>
<?php if($numrows == 1){ ?>
<table>
<tr><td align="center"><a href="https://www.benfund.com/client/message_center.php"><img src="https://www.benfund.com/images/elements/icons/med/msg-cntr.png" border="0"height="32" width="32" /><br /><a class="toolbar" href="https://www.benfund.com/client/message_center.php">Message Center</a></td>
</tr>
</table>
<span class="emphasis">You have <?php echo $numrows ?> new message!</span>
<?php }
if ($numrows > 1){
?>
<table>
<tr><td align="center"><a href="https://www.benfund.com/client/message_center.php"><img src="https://www.benfund.com/images/elements/icons/med/msg-cntr.png" border="0"height="32" width="32" /><br /><a class="toolbar" href="https://www.benfund.com/client/message_center.php">Message Center</a></td>
</tr>
</table>
<span class="emphasis">You have <?php echo $numrows ?> new messages!</span>
<?php } ?>
<table width="95%" align="center" border="0" cellspacing="0" cellpadding="4" class="sortable">
<tr>
<th valign="top" width="20" class="tablehead"><b>From</b></th><th valign="top" class="tablehead"><b>Subject</b></th>
</tr>
<?php
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
while ($msg_row = mysql_fetch_array($msgresult)) {
$msg_id = $msg_row[0];
$msg_from = $msg_row[1];
benfund_connect();
$from_result = mysql_query("SELECT name FROM merchant WHERE id='$msg_from'");
$from_row = mysql_fetch_array($from_result)or die(mysql_error());
$msg_from = $from_row['name'];
$msg_to = $msg_row[2];
$msg_subject = $msg_row[3];
$msg_content = $msg_row[4];
$msg_date = $msg_row[5];
$msg_read = $msg_row[6];
$msg_reply = $msg_row[7];
$msg_deleted = $msg_row[8];
$row_color = ($row_count % 2) ? $color1 : $color2;
?>
<tr class="<?php echo $row_color; ?>"><td valign="top" width="20"><?php echo $msg_from; ?></td><td valign="top" width="250"><a href="view_msg.php?msg_id=<?php echo $msg_id?>"><?php echo $msg_subject; ?></a></td></tr>
<?php
$row_count++;
 } ?>
</table>
<?php
} else {
?>
<table>
<tr><td>
<table>
<tr><td align="center"><a href="https://www.benfund.com/client/message_center.php"><img src="https://www.benfund.com/images/elements/icons/med/msg-cntr.png" border="0"height="32" width="32" /><br /><a class="toolbar" href="https://www.benfund.com/client/message_center.php">Message Center</a></td>
</tr></table>
<td>You have no new messages.</td>
</tr>
</table>

<?php }
echo $switches;
?>
</td></tr></table>
</div>

<?php
//Overdue Sum
$past = future_past("-", "721");
benfund_connect();
$odquery = "SELECT SUM(total) AS paytotal FROM invoice WHERE date <= $past AND to_id='$cid' AND status='0'";    
$odresult = mysql_query($odquery) or die(mysql_error());
$odrow = mysql_fetch_array($odresult);
$odnum_pend = mysql_num_rows($odresult);
$overdue = (integer)$odrow['paytotal'];
//echo 'This '.$balance.' is the Total Payments.'

//Current
$to_now = future_past("-", "720");
benfund_connect();
$curquery = "SELECT SUM(total) AS paytotal FROM invoice WHERE date >= $to_now AND to_id='$cid' AND status='0'";    
$curresult = mysql_query($curquery) or die(mysql_error());
$currow = mysql_fetch_array($curresult);
$curnum_pend = mysql_num_rows($curresult);
$curbalance = (integer)$currow['paytotal'];

?>

<?php
$userquery = "SELECT name, contact_name, goal FROM merchant WHERE id='$mid'";    
$userresult = mysql_query($userquery) or die(mysql_error());
$userrow = mysql_fetch_row($userresult);
$mname = $userrow[0];
$c_name = $userrow[1];
$total = (integer)$userrow[2];
	
?>

<div style="margin-left: 45px;">
	<table width="300"><tr><td style="border: 1px solid #800000; background: #FFFFF0; padding: 4px;">
<?php if ($odnum_pend = 1){ ?>
	<table width="300"><tr><td><img src="https://www.benfund.com/images/elements/icons/med/invoice-overdue.png" border="0"height="32" width="32" /></td><td>You have One Payment OverDue<br><span style="text-align: right;"><a href="#">Make Payment</a> | <a href="#">View Invoice</a></span></td></tr></table>
<?php }
			elseif ($odnum_pend >= 2){ ?> 
	<table width="300"><tr><td><img src="https://www.benfund.com/images/elements/icons/med/invoice-overdue.png" border="0"height="32" width="32" /></td><td>You have <?php echo $num_pend; ?> Payments OverDue<br><span style="text-align: right;"><a href="#">Make Payments</a> | <a href="#">View Invoices</a></span></td></tr></table>
<?php } ?>
<?php if ($curnum_pend = 1){ ?>
	<table width="300"><tr><td><img src="https://www.benfund.com/images/elements/icons/med/invoice.png" border="0"height="32" width="32" /></td><td>You have One Payment Due<br><span style="text-align: right;"><a href="#">Make Payment</a> | <a href="#">View Invoice</a></span></td></tr></table>
<?php }
			elseif ($curnum_pend >= 2){ ?> 
	<table width="300"><tr><td><img src="https://www.benfund.com/images/elements/icons/med/invoice.png" border="0"height="32" width="32" /></td><td>You have <?php echo $num_pend; ?> Payments Due<br><span style="text-align: right;"><a href="#">Make Payments</a> | <a href="#">View Invoices</a></span></td></tr></table>
<?php } ?>
	</td></tr></table>
</div>

<center>
<div class="fieldset">
<span class="legend"><span class="subtitle">Accounting</span></span><br/>
<table width="375" border="0" align="center" cellpadding="4" cellspacing="0" class="toolbar">
  <tr>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">1.</span></span>
      <center>
<a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><a href="https://www.benfund.com/client/overview.php">
        <img src="https://www.benfund.com/images/elements/icons/reports.png" border="0" /><br />
        Account Overview
</a></a>
      </center>
    </td>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">2.</span></span>
      <center>
<a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><a href="https://www.benfund.com/client/history.php">
<img src="https://www.benfund.com/images/elements/icons/invoice.png" border="0" /><br />
Account History
</a></a>
      </center>
    </td>
        <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">3.</span></span>
      <center>
<a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><a href="https://www.benfund.com/client/payment_manager.php">
<img src="https://www.benfund.com/images/elements/icons/quote.png" border="0" /><br />
Make A Payment
</a></a>
      </center>
    </td>
  </tr>
</table></div>
</center>
<p><p>
<center>
<div class="fieldset">
<span class="legend"><span class="subtitle">Miscellaneous</span></span><br/>
<table width="375" border="0" align="center" cellpadding="4" cellspacing="0" class="toolbar">
  <tr>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">4.</span></span>
      <center>
<a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><a href="https://www.benfund.com/client/settings.php">
        <img src="https://www.benfund.com/images/elements/icons/pref.png" border="0" /><br />
        Preferences
</a></a>
      </center>
    </td>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">5.</span></span>
      <center>
<a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><a href="https://www.benfund.com/support/">
<img src="https://www.benfund.com/images/elements/icons/help.png" border="0" /><br />
Help
</a></a>
      </center>
    </td>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">6.</span></span>
      <center>
<a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><a href="https://www.benfund.com/login.php?logout=true">
        <img src="https://www.benfund.com/images/elements/icons/logout.png" border="0" /><br />
        Logout
</a></a>
      </center>
    </td>
  </tr>
</table>
</div>
</center>
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
<?php
session_start();
if (!isset($_SESSION[valid_user])){
	$error = '<div class="error"><span class="errormsg">You must be logged in to view this page. <br>Please Login.<br></span></div>';
     header('Location:../login.php');
}
$page_title = "Control Panel";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
$error = '<div class="error"><span class="errormsg">You must be logged in to view this page. <br>Please Login.<br></span></div>';
benfund_connect();
$query = "SELECT id, m_type, name, contact_name, address, address2, city, state, zip, phone, alt_phone, email, ssn2, tax2, password, pin, goal, activated, settings FROM merchant WHERE id = '$mid' ";
$results = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($results) or die(mysql_error());
$uid = $row['id'];
$m_type = $row['m_type'];
$_SESSION['m_type'] = $m_type;
$name = $row['name'];
$c_name = $row['contact_name'];
include($ROOT."/includes/lang/".$m_type.".php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - <?php echo _ACCT_TYPE ;?> Contol Panel</title>
<?php include ($ROOT."/includes/head.php") ?>
<script type="text/javascript">womOn();</script>
<?php 
benfund_connect();
$wizquery = "SELECT date FROM mtemplates WHERE mid = '$mid' ";
$wizresults = mysql_query($wizquery) or die(mysql_error());
$wizrow = mysql_fetch_array($wizresults) or die(mysql_error());
$template_mod_date = $wizrow['0'];
if($template_mod_date != NULL){ ?>
<script type="text/javascript" src="https://www.benfund.com/includes/js/thickbox.js"></script>
<link rel="stylesheet" href="https://www.benfund.com/includes/css/thickbox.css" type="text/css" media="screen" />
<!--<script type="text/javascript" src="https://www.benfund.com/functions/wizard_prompt.js"></script>-->
<?php } ?>
</head>
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

<center><span class="subtitle"><?php echo _ACCT_TYPE ;?> Control Panel</span></center>

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
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/acct/message_center.php"><img src="https://www.benfund.com/images/elements/icons/med/msg-cntr.png" border="0"height="32" width="32" /><br /><a class="toolbar" href="https://www.benfund.com/acct/message_center.php">Messages</a></td>
</tr>
</table>
<span class="emphasis">You have <?php echo $numrows ?> new message!</span>
<?php }
if ($numrows > 1){
?>
<table>
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/acct/message_center.php"><img src="https://www.benfund.com/images/elements/icons/med/msg-cntr.png" border="0"height="32" width="32" /><br /><a class="toolbar" href="https://www.benfund.com/acct/message_center.php">Messages</a></td>
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
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/acct/message_center.php"><img src="https://www.benfund.com/images/elements/icons/med/msg-cntr.png" border="0"height="32" width="32" /><br /><a class="toolbar" href="https://www.benfund.com/acct/message_center.php">Messages</a></td>
</tr></table>
<td>You have no new messages.</td>
</tr>
</table>
<?php
benfund_connect();
$comresult = mysql_query("SELECT * FROM comments WHERE mid = '$mid' AND approved = '0'");
$comrows = mysql_num_rows($comresult);
if ($comrows > 0){
?>
<?php if($comrows == 1){ ?>
<table>
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/acct/comments.php"><img src="https://www.benfund.com/images/elements/icons/med/comment.png" border="0"height="32" width="32" /><br /><a class="toolbar" href="https://www.benfund.com/acct/comments.php">Comments</a></td>
<td>
<a class="toolbar" href="https://www.benfund.com/acct/comments.php">You have <?php echo $comrows ?> new Comment!</a>
</td>
</tr>
</table>
<?php }
if ($comrows > 1){
?>
<table>
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/acct/comments.php"><img src="https://www.benfund.com/images/elements/icons/med/comment.png" border="0"height="32" width="32" /><br /><a class="toolbar" href="https://www.benfund.com/acct/comments.php">Comments</a></td>
<td>
<a class="toolbar" href="https://www.benfund.com/acct/comments.php">You have <?php echo $comrows ?> new Comments!</a>
</td>
</tr>
</table>
<?php
		}
	}
}
?>
</td></tr></table>
</div>
<span class="medium bold">This is your BenFund Dasboard. Here you can access any of the features we offer.</span><p>

<span class="bold">Hover over any of the icons below to view a brief description.</span>
<?php if($m_type == '1'){ ?>
<center>
	<div class="fieldset">
		<span class="legend"><span class="subtitle">My BenFund</span></span><br/>
		<table width="375" border="0" align="center" cellpadding="4" cellspacing="0" class="toolbar">
  		<tr>
    		<td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">1.</span></span>
      	<center>
					<a class="btt" title="BenFund Summary^Easily view the status of your entire account from one convenient place" href="https://www.benfund.com/acct/finance_manager.php">
        	<img src="https://www.benfund.com/images/elements/icons/reports.png" border="0" /><br />
        		BenFund Summary</a>
      	</center>
    	</td>
    	<td>
    		<span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">2.</span></span>
      	<center>
					<a class="btt" title="Donations^View all the donations your BenFund has received" href="https://www.benfund.com/acct/donations/">
        		<img src="https://www.benfund.com/images/elements/icons/donations.png" border="0" /><br />
        		Donations</a>
        	</b>
      	</center>
    	</td>
    	<td>
    		<span style="position:relative; left: 1px; top: 1px; float: left;">
    		<span style="position:absolute; left: 1px; top: 1px;">3.</span></span>
      <center>
<a class="btt" title="Promotion^Create, manage and print your BenFund promotional materials." href="https://www.benfund.com/acct/promotion/">
<img src="https://www.benfund.com/images/elements/icons/promote.png" border="0" /><br />
Promotion
</a>
      </center>
    </td>
        	<td>
    		<span style="position:relative; left: 1px; top: 1px; float: left;">
    		<span style="position:absolute; left: 1px; top: 1px;">3.</span></span>
      <center>
<a class="btt" title="Comments^View and manage the comments people have posted on your BenFund page." href="https://www.benfund.com/acct/comments.php">
<img src="https://www.benfund.com/images/elements/icons/comment.png" border="0" /><br />
Comments
</a>
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
<a class="btt" title="Setup^Configure your account setup such as your basic account information, your template and web pages." href="https://www.benfund.com/acct/setup.php">
        <img src="https://www.benfund.com/images/elements/icons/setup.png" border="0" /><br />
        Setup
</a>
      </center>
    </td>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">5.</span></span>
      <center>
<a class="btt" title="Preferences^Specify your BenFund account preferences." href="https://www.benfund.com/acct/settings.php">
        <img src="https://www.benfund.com/images/elements/icons/pref.png" border="0" /><br />
        Preferences
</a>
      </center>
    </td>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">6.</span></span>
      <center>
<a class="btt" title="Help^Access our Customer Support Center to view help topics or report a problem with your account." href="https://www.benfund.com/acct/template_manager.php">
<img src="https://www.benfund.com/images/elements/icons/help.png" border="0" /><br />
Help
</a>
      </center>
    </td>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">7.</span></span>
      <center>
<a class="btt" title="Logout^Log out of your BenFund Account" href="https://www.benfund.com/login.php?logout=true">
        <img src="https://www.benfund.com/images/elements/icons/logout.png" border="0" /><br />
        Logout
</a>
      </center>
    </td>
  </tr>
</table>
</div>
</center>
<?php } 
if($m_type == '2'){ ?>
	<center>
	<div class="fieldset">
		<span class="legend"><span class="subtitle">Accounting</span></span><br/>
		<table width="375" border="0" align="center" cellpadding="4" cellspacing="0" class="toolbar">
  		<tr>
    		<td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">1.</span></span>
      	<center>
					<a class="btt" title="At a Glance^Easily view the status of your entire account from one convenient place" href="https://www.benfund.com/acct/finance_manager.php">
        	<img src="https://www.benfund.com/images/elements/icons/reports.png" border="0" /><br />
        		At a Glance</a>
      	</center>
    	</td>
    	<td>
    		<span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">2.</span></span>
      	<center>
					<a class="btt" title="Clients^View and manage all your clients" href="https://www.benfund.com/acct/client_manager.php">
        		<img src="https://www.benfund.com/images/elements/icons/clients.png" border="0" /><br />
        		Clients</a>
        	</a>
      	</center>
    	</td>
    	<td>
    		<span style="position:relative; left: 1px; top: 1px; float: left;">
    		<span style="position:absolute; left: 1px; top: 1px;">3.</span></span>
      <center>
<a class="btt" title="Invoices^View and manange all your invoices" href="https://www.benfund.com/acct/invoice_manager.php">
<img src="https://www.benfund.com/images/elements/icons/invoice.png" border="0" /><br />
Invoices
</a>
      </center>
    </td>
        <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">4.</span></span>
      <center>
<a class="btt" title="Quotes^View all the quotes you have created" href="https://www.benfund.com/acct/quote_manager.php">
<img src="https://www.benfund.com/images/elements/icons/quote.png" border="0" /><br />
Quotes
</a>
      </center>
    </td>
  </tr>
  <tr>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">5.</span></span>
      <center>
<a class="btt" title="Add Client^Create a new client in your BenFund account" href="https://www.benfund.com/acct/add_client.php">
        <img src="https://www.benfund.com/images/elements/icons/add-client.png" border="0" /><br />
        Add Client
</a>
</center>
    </td>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">6.</span></span>
      <center>
<a class="btt" title="Quick Add^Quickly and easily create a new client" href="https://www.benfund.com/acct/quick_add.php">
        <img src="https://www.benfund.com/images/elements/icons/quick-add.png" border="0" /><br />
        Quick Add
</a>
      </center>
    </td>
        <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">7.</span></span>
      <center>
<a class="btt" title="New Invoice^Create a new invoice and send it to a client" href="https://www.benfund.com/acct/new_invoice.php">
<img src="https://www.benfund.com/images/elements/icons/new-invoice.png" border="0" /><br />
New Invoice
</a>
      </center>
    </td>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">8.</span></span>
      <center>
<a class="btt" title="New Quote^Create a new quote for a client" href="https://www.benfund.com/login.php">
        <img src="https://www.benfund.com/images/elements/icons/new-quote.png" border="0" /><br />
        New Quote
</a>
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
  	<td>
    		<span style="position:relative; left: 1px; top: 1px; float: left;">
    		<span style="position:absolute; left: 1px; top: 1px;">9.</span></span>
      <center>
<a class="btt" title="Promotion^Create, manage and print your BenFund promotional materials." href="https://www.benfund.com/acct/promotion/">
<img src="https://www.benfund.com/images/elements/icons/promote.png" border="0" /><br />
Promotion
</a>
      </center>
    </td>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">10.</span></span>
      <center>
<a class="btt" title="Setup^Configure your account setup such as your basic account information, your template and web pages." href="https://www.benfund.com/acct/setup.php">
        <img src="https://www.benfund.com/images/elements/icons/setup.png" border="0" /><br />
        Setup
</a>
      </center>
    </td>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">11.</span></span>
      <center>
<a class="btt" title="Preferences^Specify your BenFund account preferences." href="https://www.benfund.com/acct/settings.php">
        <img src="https://www.benfund.com/images/elements/icons/pref.png" border="0" /><br />
        Preferences
</a>
      </center>
    </td>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">12.</span></span>
      <center>
<a class="btt" title="Help^Access our Customer Support Center to view help topics or report a problem with your account." href="https://www.benfund.com/acct/template_manager.php">
<img src="https://www.benfund.com/images/elements/icons/help.png" border="0" /><br />
Help
</a>
      </center>
    </td>
    <td><span style="position:relative; left: 1px; top: 1px; float: left;"><span style="position:absolute; left: 1px; top: 1px;">13.</span></span>
      <center>
<a class="btt" title="Logout^Log out of your BenFund Account." href="https://www.benfund.com/login.php?logout=true">
        <img src="https://www.benfund.com/images/elements/icons/logout.png" border="0" /><br />
        Logout
</a>
      </center>
    </td>
  </tr>
</table>
</div>
</center>
<?php } ?>
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
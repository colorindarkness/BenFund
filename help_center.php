<?php require ("includes/globals.php");
session_start();
$page_title = "Help Center";
require ($ROOT."functions/logout.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."includes/head.php") ?>
</head>

<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."includes/header.php") ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."includes/left.php") ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."includes/pathway.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">

<span class="pagetitle">Contact Us</span>
<div class="hr"></div>
Here at BenFund We pride ourselves on offering excellent service to our customers and are eager to hear your questions, concerns and suggestions. Please contact us using the form below, making sure to provide as many details as you can. The more we know, the better we can meet your needs. If you prefer to phone or send a letter, please see the contact information at the bottom of this page.
<br>
Required fields are marked with an asterisk<br>
<br>

<form name="contactUs" action="https://www.bordersstores.com/servlet/FMP" method="get">
	<input name="returnpage" value="/care/care.jsp" type="hidden">
	<input name="ccPage" value="7" type="hidden">
	<input name="crumbs" value="not_empty:last_name,not_empty:email_subject,not_empty:comments,field_length:comments@1000" type="hidden">
	<input name="crumbs" value="email:email_to" type="hidden">
	<input name="email_to" value="customercare@bordersstores.com" type="hidden">
	<input name="email_form" value="/care/cc_remedy_frm.vm" type="hidden">

	<input name="email_body" value="first_name,last_name,email_from,email_subject,comments,store,contact,phone,street,city,state,zip_code" type="hidden">
	<input name="crumbs" value="csv_log:contactUs" type="hidden">
	<input name="csvlog_fields" value="first_name,last_name,email_from,email_subject,comments,store,contact,phone,street,city,state,zip_code" type="hidden">
	First Name:<br>
	<input size="25" name="first_name" value="" type="text">
	<br>
	<br>
	
	<span class="alerttext">*</span> Last Name:<br>

	
	<input size="25" name="last_name" value="" type="text">
	<br>
	<br>
	
	<span class="alerttext">*</span> Email Address:<br>
	<input size="25" name="email" value="" type="text">
	<br>
	<br>
	
	<span class="alerttext">*</span> Topic<br>
	
	<select name="email_subject">
		<option value="">-- Select a Subject --</option>
		<option value="Donation Request">Donation Request</option>
		<option value="Donation Request">Media/Press Relations</option>
		<option value="Service">Service</option>
		<option value="Suggestion">Suggestion</option>
	</select>
	<br>
	<br>

	
	<span class="alerttext">*</span> Your Message (Please limit to 1000 characters)<br>
	
	<textarea name="comments" cols="30" rows="5" wrap="virtual"></textarea>
	<br>
	<br>
If you prefer to talk to us by phone please call our customer service center at 1-888-555-5555. Our hours are 7:00 AM-9:00 PM CT (Pacific Time) Monday-Friday, 8:00 AM-7:00 PM on Saturday and 10:00 AM-7:00 PM CT on Sunday.
<p>
You may write us at:<br>
BenFund Payment Systems
	</div>
	</div>
	</td>
  </tr>
  <!--MAINBODY END-->
  <!--FOOTER START-->
  <tr>
    <td colspan="2">
<?php include ($ROOT."includes/footer.php") ?>
	</td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
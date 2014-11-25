<?php
session_start();
$sid = $_GET['sid'];
$page_title = "More Information";
require ("includes/globals.php");
include ($ROOT."functions/common.php")
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
<?php if($sid == 1) { ?>
<span class="pagetitle">Fundraising Accounts</span>
<div class="hr"></div>
For business, a BenFund Accounts receivable account comes with intuitive features that can streamline
your cash flow and increase the percentage of collectable accounts.
<p>
<span class="emphasis">A BenFund Account Receivable account has features that allow you to:</span>
<ul class="emphasis4">
<li>Accept Online payments with Visa, MC, Amex, Discover, PayPal, or Electronic Check.</li>
<li>Create invoices and send them through email or print them for delivery.</li>
<li>Invoice customers on a "recurring" schedule.</li>
<li>Automatically charge customers on a regular payment schedule.</li>
<li>Create quotes or estimates and convert them to invoices as needed.</li>
<li>Send important messages via email to existing clients.</li>
<li>Send appropriate notices to overdue accounts</li>
<li>Automatically apply finance charges if needed.</li>
<li>Automatically apply late charges if needed.</li>
<li>Sort information and view or print reports</li>
<li>and much more.</li>
</ul>
<p align="right">
<input type="image" src="https://www.benfund.com/images/elements/back.gif" border="0" alt="Back" name="Submit2" onClick="history.go(-1)">
<a href="https://www.benfund.com/register/agreement.php?sid=2"><img src="https://www.benfund.com/images/elements/sign_up.gif" border="0"></a>
</p>
<?php } ?>
<?php if($sid == 2) { ?>
<span class="pagetitle">Accounts Receivable Accounts</span>
<div class="hr"></div>
For business, a BenFund Accounts receivable account comes with intuitive features that can streamline
your cash flow and increase the percentage of collectable accounts.
<p>
<span class="emphasis">A BenFund Account Receivable account has features that allow you to:</span>
<ul class="emphasis4">
<li>Accept Online payments with Visa, MC, Amex, Discover, PayPal, or Electronic Check.</li>
<li>Create invoices and send them through email or print them for delivery.</li>
<li>Invoice customers on a "recurring" schedule.</li>
<li>Automatically charge customers on a regular payment schedule.</li>
<li>Create quotes or estimates and convert them to invoices as needed.</li>
<li>Send important messages via email to existing clients.</li>
<li>Send appropriate notices to overdue accounts</li>
<li>Automatically apply finance charges if needed.</li>
<li>Automatically apply late charges if needed.</li>
<li>Sort information and view or print reports</li>
<li>and much more.</li>
</ul>
<p align="right">
<input type="image" src="https://www.benfund.com/images/elements/back.gif" border="0" alt="Back" name="Submit2" onClick="history.go(-1)">
<a href="https://www.benfund.com/register/agreement.php?sid=2"><img src="https://www.benfund.com/images/elements/sign_up.gif" border="0"></a>
</p>
<?php } ?>

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
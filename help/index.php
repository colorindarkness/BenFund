<?php require ("../includes/globals.php");
session_start();
$page_title = "BenFund Help Center";
require ($ROOT."functions/common.php");
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

<span class="pagetitle">BenFund Help Center</span>
<div class="hr"></div><p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent semper augue eu lectus. Ut purus. Integer porttitor mollis libero. Sed aliquam imperdiet elit.
<br>
<input type="text" size="70" class="nice" value="Why can I not stop consuming?" onfocus="this.value = '';"><br>
<center><input type="submit" value="Search" class="nice"></center>
<p>
<table width="100%" border="0" cellpadding="6">
<tr>
<td width="50%" valign="top">
<span class="subtitle">Frequently Asked Questions</span>
<p>
General
<ul>
<li><a href="faq.php?qid=1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a></li>
<li><a href="faq.php?qid=1">Aenean iaculis lacus ac urna.</a></li>
<li><a href="faq.php?qid=1">Nullam fringilla gravida sem.</a></li>
</ul>
<p>

Technical
<ul>
<li><a href="faq.php?qid=1">Proin scelerisque adipiscing justo.</a></li>
<li><a href="faq.php?qid=1">Curabitur aliquam lacus quis dui.</a></li>
<li><a href="faq.php?qid=1">Suspendisse tristique nonummy nunc.</a></li>
<li><a href="faq.php?qid=1">Quisque tempus massa quis neque egestas condimentum.</a></li>
</ul>
<a href="faq.php">View More...</a>
</td>
<td width="50%" valign="top">
<span class="subtitle">Submit a Help Ticket</span>
<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent semper augue eu lectus. Ut purus. Integer porttitor mollis libero. Sed aliquam imperdiet elit. Fusce id odio at neque rhoncus malesuada. Aenean risus. Vestibulum a augue. Nunc lacinia. Nam hendrerit, sapien id convallis luctus, est sapien.
<p>
<a href="faq.php?qid=1">Proin scelerisque adipiscing justo.</a>
<p>
<span class="subtitle">Check Existing Ticket</span>
<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent semper augue eu lectus. Ut purus. Integer porttitor mollis libero. Sed aliquam imperdiet elit. Fusce id odio at neque rhoncus malesuada. Aenean risus. Vestibulum a augue. Nunc lacinia. Nam hendrerit, sapien id convallis luctus, est sapien.
<p>
<a href="faq.php?qid=1">Proin scelerisque adipiscing justo.</a>
<p>
</td>
</tr>
</table>

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
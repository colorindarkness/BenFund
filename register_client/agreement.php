<?php
$page_title = "User Agreement and Privacy Policy";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
$aid = $_GET['sid'];
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
	<center><img src="https://www.benfund.com/images/elements/progress-25.gif"></center><p>
	<table class="clear">
<tbody><tr><td>
	<table class="toolbar" align="right">
<tbody><tr><td align="center"><a class="toolbar" href="https://www.benfund.com/print_page.php?pid=<?php echo $aid;?>"><img src="https://www.benfund.com/images/elements/icons/sm/print.gif" border="0"><br>Print Page</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/pdf.php?pid=<?php echo $aid;?>"><img src="https://www.benfund.com/images/elements/icons/sm/pdf.gif" border="0"><br>Download</a></td>
</tr></tbody></table>
</td></tr></tbody></table>
<div class="agreement">
<?php include("http://www.benfund.com/print_page.php?pid=" . $aid); ?>
</div>
<form name="form1" method="post" action="https://www.benfund.com/register_client/register.php">
  <div align="center">
    <input name="accept" type="hidden" id="accept" value="set">
	<input name="m_type" type="hidden" id="m_type" value="<?php echo $_GET['sid']; ?>">
		<a href="javascript: history.go(-1)" ><img src="https://www.benfund.com/images/elements/back.gif" border="0" alt="Back"></a>
		<a href="https://www.benfund.com" ><img src="https://www.benfund.com/images/elements/decline.gif" border="0"></a>&nbsp;&nbsp;
    <input type="image" src="https://www.benfund.com/images/elements/accept.gif" border="0" alt="Accept" name="Submit" >
    
  </div>
</form>
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
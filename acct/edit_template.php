<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../login.php');
}else{
$page_title = "Edit Page";
require ("../includes/globals.php");
require ($ROOT."/includes/mpage.php");
require ($ROOT."/functions/editor.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<?php simple_editor(); ?>
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
	<div class="content_inner">
<span class="pagetitle">Edit Page</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/admin/acct_manager.php"><img src="https://www.benfund.com/images/elements/icons/cancel.gif" border="0"/><br />Cancel</a></td>
</tr></table>
</td></tr></table>
This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><br />
<form method="post" action="http://tinymce.moxiecode.com/dump.php?example=true">
	<span class="subtitle" >Page Title:</span><br />
	<input type="text" id="title" value="<?php echo $ptitle; ?>" class="big"/><p>



	<span class="subtitle" >Page Content:</span><br />
	<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%">
		<?php echo $title ?>
	</textarea>


<table cellspacing="0" cellpadding="0" align="center">
  <tr>
<!--HEADER START-->
    <td colspan="2" valign="top">
	<span class="subtitle" >Header:</span><br />
	<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%">
		<?php echo $header ?>
	</textarea>

	</td>
<!--HEADER END-->
  </tr>
  <tr>
  <!--LEFT COLUMN START-->
    <td class="leftcolumn" width="150px" valign="top">


    </td>
	<!--LEFT COLUMN END-->
    <td valign="top">
	<!--PATHWAY START-->
Pathway.
	<!--PATHWAY END-->
	<!--MAINBODY START-->
Main Content Area

	<!--MAINBODY START-->
	</td>
  </tr>
  <tr>
<!--FOOTER START-->
    <td colspan="2">Footer:</span><br />
	<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%">
		<?php echo $footer ?>
	</textarea>
	</td>
<!--FOOTER END-->
  </tr>
</table>
	<span class="subtitle" >Keywords:</span><br />
	<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%">
		<?php echo $meta ?>
	</textarea>






	<br />
	<input type="submit" name="save" value="Submit" />
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
<?php unset($loggedout, $error, $foo3); ?>
</body>
</html>
<?php
}
?>
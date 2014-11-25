<?php require ("../includes/globals.php");
require ($ROOT."/admin/includes/page.php");
require ($ROOT."/functions/editor.php");
$page_title = "Edit Page";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<?php simple_editor(); ?>
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
	<div class="content_inner">
<span class="pagetitle">Edit Page</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/admin/page_manager.php"><img src="https://www.benfund.com/images/elements/icons/cancel.gif" border="0"/><br />Cancel</a></td>
</tr></table>
</td></tr></table>
This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><br />
<form method="post" action="page_manager.php?cmd=edit">
	<span class="subtitle" >Page Title:</span><br />
	<input type="text" id="title" name="title" value="<?php echo $ptitle; ?>" class="big"/><p>
	<span class="subtitle" >Page Content:</span><br />
	<textarea id="content" name="content" rows="15" cols="80" style="width: 100%">
		<?php echo $content ?>
	</textarea>
	<p>
	<span class="subtitle" >Page Access:</span><br />
	<select id="access" name="access" class="big">
	<option class="big" value="Public">Public</option>
	<option class="big" value="Admin">Admin</option>
	</select>
	<input type="hidden" id="author" name="author" value="<?php echo $pauthor; ?>" class="big"/>
	<input type="text" id="date" name="date" value="<?php echo date("m/d/y g:i a"); ?>" class="big"/>
	<input type="hidden" id="pid" name="pid" value="<?php echo $pid; ?>" class="big"/>
	<input type="submit" name="save" value="Submit" onclick=""/>
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

</body>
</html>

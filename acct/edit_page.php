<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../login.php');
}
$page_title = "Edit Page";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
require ($ROOT."/acct/functions/get_mpage.php");
require ($ROOT."/functions/editor.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<script type="text/javascript">womOn();</script>
<?php @editor(simple, 400, 600); ?>
<script type="text/javascript">
function FCKeditor_OnComplete( elm1 ){
 tb_remove();
}
</script>
<script type="text/javascript" src="https://www.benfund.com/includes/js/thickbox.js"></script>
<link rel="stylesheet" href="https://www.benfund.com/includes/css/thickbox.css" type="text/css" media="screen" />
<?php include($ROOT.'/functions/page_loading.php'); ?>
</head>
<body>
<img src="https://www.benfund.com/images/elements/blank.gif" onload="pageloading();">
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
	<?php if($m_type == 1){ m_menu1(); } if($m_type == 2){ m_menu2(); } ?>
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">Edit Page</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/acct/page_manager.php"><img src="https://www.benfund.com/images/elements/icons/cancel.gif" border="0"/><br />Cancel</a></td>
</tr></table>
</td></tr></table>
This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><br />
<form method="post" action="https://www.benfund.com/acct/page_manager.php?cmd=edit">
	<span class="subtitle" >Page Title:</span><br />
	<input type="text" id="title" value="<?php echo $ptitle; ?>" class="big"/ size="50"><br />
	<span class="actionmsg">Last edited <?php echo $pdate ;?></span>
	<p>
	<span class="subtitle" >Page Content:</span><br />
	<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%"><?php echo $pcontent ?></textarea>
	<br />
	<input type="image"  src="https://www.benfund.com/images/elements/buttons/reset.gif" name="reset" value="Reset" onclick="this.form.reset();return false;"/>
	<input type="image" src="https://www.benfund.com/images/elements/buttons/submit.gif" name="save" value="Submit" />
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
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
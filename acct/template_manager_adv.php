<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../login.php');
}else{
$page_title = "Edit Template";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
require ($ROOT."/acct/mdata.php");
require ($ROOT."/functions/editor.php");
$mid = $_SESSION['valid_user'];
$pw = $_SESSION['pw'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<script type="text/javascript">womOn();</script>
<?php @editor(simple); ?>
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
	<!--MAINBODY START-->
	<?php if($m_type == 1){ m_menu1(); } if($m_type == 2){ m_menu2(); } ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">Edit Template</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/acct/index.php"><img src="https://www.benfund.com/images/elements/icons/cancel.gif" border="0"/><br />Cancel</a></td>
</tr></table>
</td></tr></table>
<?php
if($_GET["cmd"]=="edit")
{
$newtitle = $_POST['title'];
$newheader = $_POST['header'];
$newfooter = $_POST['footer'];
$newmeta = $_POST['meta'];
$newdate = $_POST['date'];
$mid = $_POST['mid'];
benfund_connect();
$query0 = "UPDATE mtemplates SET title='$newtitle', header='$newheader', footer='$newfooter', meta='$newmeta', date='$newdate' WHERE mid='$mid'";
mysql_query($query0) or die(mysql_error());
echo '<div class="action"><span class="actionmsg">Account Updated!</span></div><p>';
}
?>
Use the editors below to customize how your Benfund template will appear to visitors.<br /><br />
<form method="post" action="https://www.benfund.com/acct/template_manager.php?cmd=edit" name="template">
	<span class="subtitle" >Template Title:</span><br />This phrase will display as part of the all your page titles. We recommend using your Fund Name.<br />
	<input type="text" id="title" name="title" value="<?php echo $mtitle; ?>" class="big" size="50"/><p>


<table cellspacing="0" cellpadding="0" align="center" width="550" style="border: 2px solid #B0B0FF ">
  <tr>
<!--HEADER START-->
    <td colspan="2" valign="top">
	<span class="subtitle" >Header:</span><br /> This is the header of the template that will replace the above Benfund logo on your pages. You will certainly want to have your fund name here.<br />
	<textarea style="height: 150px" id="header" name="header">
		<?php echo $header ?>
	</textarea>

	</td>
<!--HEADER END-->
  </tr>
  <tr>
  <!--LEFT COLUMN START-->
    <td class="leftcolumn" width="75px" valign="top">
<div class="mainmenu">
<span class="mainitem">Home</a>
<hr class="mainmenuhr" align="left">
<span class="mainitem">About Us</a>
<hr class="mainmenuhr" align="left">
<span class="mainitem">Who we help</a>
<hr class="mainmenuhr" align="left">
<span class="mainitem">Testimonies</a>

<hr class="mainmenuhr" align="left">
<span class="mainitem">FAQ</a>
<hr class="mainmenuhr" align="left">
</div>
<p>
</p><div class="usermenu">
<span class="mainitem">Funds</span>
<hr class="mainmenuhr" align="left">
<span class="mainitem2">Start a Fund</span><br>
<hr class="mainmenuhr" align="left">
<span class="mainitem2">Make a Donation</span>
<hr class="mainmenuhr" align="left">
<span class="mainitem2">Manage Fund</span>

<hr class="mainmenuhr" align="left">

<a href="https://www.benfund.com/help.php" class="mainitem2">Help</a>
<hr class="mainmenuhr" align="left">
</div>

    </td>
	<!--LEFT COLUMN END-->
    <td valign="top">
	<!--PATHWAY START-->
<div class="topmenu_outer" style="width: 450px">
<div class="topmenu_inner" style="width: 450px">
<span class="pathway">
Pathway.
</span>
Contact Us | <img src="https://www.benfund.com/images/decrease.gif" alt="decrease font size" width="20" height="20" border="0"/><img src="https://www.benfund.com/images/increase.gif" alt="increase font size" width="20" height="20" border="0"/>
</div>
</div>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
<br>
<br>
<br>
<br>
<br>
<br>
Main Content Area
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<!--MAINBODY START-->
	</td>
  </tr>
  <tr>
<!--FOOTER START-->
    <td colspan="2"><span class="subtitle" >Footer:</span><br />You can put your contact information here of feelfree to do something original like a slogan, phrase or quote.<br />
	<textarea style="height: 150px" id="footer" name="footer">
		<?php echo $footer ?>
	</textarea>
	</td>
<!--FOOTER END-->
  </tr>
</table>
	<span class="subtitle" >Keywords:</span><br>These are descriptive words that search engines will use to clasify your pages. You can use single words or phrases. Separate with commas.<br />
	<input type="text" id="meta" name="meta" value="<?php echo $meta ?>" class="big" size="75">
<input type="hidden" id="date" name="date" value="<?php echo date("m/d/y g:i a"); ?>" class="big"/>
<input type="hidden" id="mid" name="mid" value="<?php echo $mid; ?>" class="big"/>
	<br />
	<center>
	<a href="" ><img src="https://www.benfund.com/images/elements/cancel.gif" border="0"></a>
	<input type="image" src="https://www.benfund.com/images/elements/reset.gif"  border="0"name="reset" value="Reset"  onclick="document.register.reset();return false;"/>
	<a href="#" onClick="document.template.action='https://www.benfund.com/acct/tpl_preview.php;return false;'" target="_blank"><img src="https://www.benfund.com/images/elements/preview.png" border="0"  name="submit2" value="Preview"></a>
	<input type="image" src="https://www.benfund.com/images/elements/submit.gif" border="0" name="save" value="Submit" />
	</center>
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
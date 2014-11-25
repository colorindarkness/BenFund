<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../login.php');
}else{
$page_title = "Create Client";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<script type="text/javascript">
	// Initialise the effects
	var updates, introduction, bare, smooth, going, ending;
	
	window.onload = function() {
		updates = new fx.Combo('updates', {height: true, opacity: true, duration: 500});
		
		// Hide them to begin with
		updates.hide();
	}
</script>
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
	<?php if($m_type == 1){ m_menu1(); } if($m_type == 2){ m_menu2(); } ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">Quick Client Add</span><p>
<div class="hr"></div>
<table class="clear" valign="top" align="center">
<tr><td valign="top" >
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="#" onclick="document.quickadd.submit();"><img src="https://www.benfund.com/images/elements/icons/save.png" border="0"/><br />Save</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/client_manager.php"><img src="https://www.benfund.com/images/elements/icons/cancel.gif" border="0"/><br />Cancel</a></td>
</tr></table>
</td></tr></table>

<form method="post" action="https://www.benfund.com/acct/client_manager.php?cmd=quickadd" name="quickadd">
<table width="100%"><tr><td>
<div style="padding: 6px; border: 1px solid #6CD136; background-color: #E2F7D2;">
<table width="275"><tr>
<td>
<span class="subtitle" >First Name:</span>
</td>
<td><span class="subtitle" >M.I.:</span></td></tr>
<tr><td><input type="text" size="20" id="first_name" name="first_name" value="" class="big"/></td>
<td>
<input type="text" size="2" id="m_i" name="m_i" value="" class="big" onKeyup="autotab(this, document.quickadd.last_name)" maxlength="1"/></td>
</tr>
</table>
<span class="subtitle" >Last Name:</span><br />
<input type="text" size="30" id="last_name" name="last_name" value="" class="big"/>
</div>
<p>
<div style="padding: 6px; border: 1px solid #0000FF; background-color: #E6E6FA;">
<span class="subtitle" >Phone Number:</span><br />
<input name="p1" type="text" id="p1" size="3" onKeyup="autotab(this, document.quickadd.p2)" maxlength="3"  class="acnice" value="<?php echo $p1; ?>">
<input name="p2" type="text" id="p2" size="2" onKeyup="autotab(this, document.quickadd.p3)" maxlength="3"  class="nice"value="<?php echo $p2; ?>"><span class="emphasis">-</span><input name="p3" type="text" id="p3" size="3" onKeyup="autotab(this, document.quickadd.balance)" maxlength="4"  class="nice"value="<?php echo $p3; ?>"><p>

<span class="subtitle" >Email Address:</span>(optional)<br />
<input type="text" size="20" id="email" name="email" value="" class="big"/>
</div>
<p>
<div style="padding: 6px; border: 1px solid #FFA500; background-color: #FFF3DD;">
<span class="subtitle" >Initial Balance:</span><br />
<input type="text" size="10" id="balance" name="balance" value="" class="big"/>
</div>
</td>
<td valign="top">
<div class="optionbox">
<span class="subtitle">Options</span>
<div class="hr"></div>
	<div class="wrapper">	
		<div class="main">
<span class="subtitle" ><input type="checkbox" name="assign" value="off" onclick="updates.toggle(); this.form.cid.value='';">Assign Client ID?</span><a class="btt" title="Tip:^You can Manually assign a Client ID Number here. Otherwise the Client ID will be automatically generated"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a><br>
<div id="updates" style="margin-left: .75cm">
<table><tr><td valign="top"><input class="huge" size="3" maxlength="4" name="cid"></td>
<td valign="top"><b>Tip:</b><br>If you already have an existing customer ID system that exceeds four digits, simply use only the last four.</td></tr></table>
</div>
</div>
</div>
<span class="subtitle" ><input type="checkbox" name="print">Print</span><br>
<span class="subtitle" ><input type="checkbox" name="send">Email</span>
</div>
</td>
</tr></table>
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
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
<?php
}
?>
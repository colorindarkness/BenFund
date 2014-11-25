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
<script type="text/javascript" src="https://www.benfund.com/includes/js/btt.js"></script>
<script type="text/javascript" src="https://www.benfund.com/includes/js/jquery.accordion.js"></script>
	<script type="text/javascript" src="https://www.benfund.com/includes/js/jquery.accordion.js"></script>
	<script type="text/javascript">
	jQuery().ready(function(){
		
		jQuery('#assign_id').Accordion({
			showSpeed: 600,
			hideSpeed: 150,
			header: '#assign_toggle',
			active: false,
			alwaysOpen: false,
		});
		
	});
	
	function toggleCheckbox() {
		var thisCheckbox = document.getElementById("assign");
		if(thisCheckbox.checked = "false"){
			thisCheckbox.checked = "true";
		}else{
    thisCheckbox.checked = "false";
  }
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
<span class="pagetitle">Create Client</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="#" onclick="document.newclient.submit();"><img src="https://www.benfund.com/images/elements/icons/save.png" border="0"/><br />Save Changes</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/client_manager.php"><img src="https://www.benfund.com/images/elements/icons/cancel.gif" border="0"/><br />Cancel</a></td>
</tr></table>
</td></tr></table>
This example shows you how TinyMCE can be configurated to function with Word content in the best possible way. TinyMCE is configured to auto convert/cleanup pasted Word content in this example. It's has also a custom CSS that makes paragraphs marginless as in Word.<br /><br />
<form method="post" action="https://www.benfund.com/acct/client_manager.php?cmd=create" name="newclient">
<table width="100%"><tr><td>
<div style="padding: 6px; border: 1px solid #6CD136; background-color: #E2F7D2;">
<table width="275"><tr>
<td>
<span class="subtitle" >First Name:</span>
</td>
<td><span class="subtitle" >M.I.:</span></td></tr>
<tr><td><input type="text" size="30" id="first_name" name="first_name" value="" class="big"/></td>
<td>
<input type="text" size="2" id="m_i" name="m_i" value=""  onKeyup="autotab(this, document.newclient.last_name)"  maxlength="1" class="big"/></td>
</tr>
</table>
<span class="subtitle" >Last Name:</span><br />
<input type="text" size="30" id="last_name" name="last_name" value="" class="big"/>
</div>
<p>
<div style="padding: 6px; border: 1px solid #0000FF; background-color: #E6E6FA;">
<span class="subtitle" >Address:</span><br />
<input type="text" size="30" id="address" name="address" value="" class="big"/><p>
<span class="subtitle" >Address 2:</span><br />
<input type="text" size="30" id="address2" name="address2" value="" class="big"/><p>
<table><tr>
<td>
<span class="subtitle" >City:</span><br />
<input type="text" size="20" id="city" name="city" value="" class="big"/><p>
</td><td>
<center>
<span class="subtitle" >State:</span><br />
<input type="text" size="1" onKeyup="autotab(this, document.newclient.zip)"maxlength="2" id="state" name="state" value="<?php echo $state; ?>" class="big"/><p>
</center>
</td><td>
<center>
<span class="subtitle" >Zip:</span><br />
<input type="text" size="5" onKeyup="autotab(this, document.newclient.p1)"maxlength="5" id="zip" name="zip" value="<?php echo $zip; ?>" class="big"/></div><p>
</center>
</td></tr></table>
</div>
<p>
<div style="padding: 6px; border: 1px solid #800000; background-color: #FFFFF0;">
<span class="subtitle" >Phone Number:</span><br />
<input name="p1" type="text" id="p1" size="3" onKeyup="autotab(this, document.newclient.p2)" maxlength="3"  class="acnice" value="<?php echo $p1; ?>">
                <input name="p2" type="text" id="p2" size="2" onKeyup="autotab(this, document.newclient.p3)" maxlength="3"  class="nice"value="<?php echo $p2; ?>"><span class="emphasis">-</span><input name="p3" type="text" id="p3" size="3" onKeyup="autotab(this, document.newclient.pa1)" maxlength="4"  class="nice"value="<?php echo $p3; ?>"><p>
<span class="subtitle" >Alternate Phone Number:</span><br />
<input name="pa1" type="text" id="pa1" size="3" onKeyup="autotab(this, document.newclient.pa2)" maxlength="3"  class="acnice" value="<?php echo $pa1; ?>"> 
                <input name="pa2" type="text" id="pa2" size="2" onKeyup="autotab(this, document.newclient.pa3)" maxlength="3"  class="nice" value="<?php echo $pa2; ?>"><span class="emphasis">-</span><input name="pa3" type="text" id="pa3" size="3" onKeyup="autotab(this, document.newclient.email)" maxlength="4"  class="nice" value="<?php echo $pa3; ?>"><p>
<span class="subtitle" >Email Address:</span><br />
<input type="text" size="30" id="email" name="email" value="" class="big"/>
</div>
<p>
<div style="padding: 6px; border: 1px solid #FFA500; background-color: #FFF3DD;">
<span class="subtitle" >Initial Balance?:</span><a class="btt" title="Initial Balance^The Initial Balance is what this client owes to you as of this moment, this field is optional if there is currently no outstanding balance."><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a><br />
<input type="text" size="10" id="balance" name="balance" value="" class="big"/><p>
<!--<span class="subtitle" >Account Status: (1 = Activated)</span><br />
<input type="text" size="1" maxlength="1" id="status" name="status" value="" class="big"/><p>
-->
</div>
</td>
<td valign="top">
<div class="optionbox">
<span class="subtitle">Options</span>
<div class="hr"></div>
		<div id="assign_id">
				<div id="assign_toggle" onclick="toggleCheckbox();"><input type="checkbox" style="text-align: left;" id="assign"><span class="subtitle" style="text-align: right;">Assign Client ID?</span><a class="btt" title="Assign Client ID Number^You can manually assign a Client ID number by checking here. Otherwise the Client ID will be automatically generated"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a></div>
			<div>
				<table>
					<tr>
						<td valign="top"><input class="huge" size="3" maxlength="4" name="cid"></td>
						<td valign="top"><b>Tip:</b><br>If you already have an existing customer ID system that exceeds four digits, simply use only the last four.</td>
					</tr>
				</table>
			</div>
		</div><p>
		<span class="subtitle" ><input type="checkbox" name="print">Print</span><a class="btt" title="Print Client Info^If you would like you can print a receipt of adding this client for your records"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a><p>
		<span class="subtitle" ><input type="checkbox" name="send">Email</span><a class="btt" title="Send Email to Client^With this option you can send and email to this client so that the client can activate their account"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a>
	</div>
	</td>
	</tr>
</table>
<p>
	<center>
	<a href="https://www.benfund.com/acct/client_manager.php"><img src="https://www.benfund.com/images/elements/buttons/cancel.gif" border="0"></a>
	<a href="#" onclick="document.newclient.reset();"><img src="https://www.benfund.com/images/elements/buttons/reset.gif" border="0"></a>
	<input type="image" src="https://www.benfund.com/images/elements/buttons/submit.gif" name="save" value="Submit">
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
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
<?php
}
?>
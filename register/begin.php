<?php
$page_title = "Before We Begin...";
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
<script type="text/javascript" src="https://www.benfund.com/includes/js/btt.js"></script>
<link media="screen" href="https://www.benfund.com/includes/css/bt.css" rel="stylesheet" type="text/css" style="display: block;" class="undefined">
<script type="text/javascript">
window.onload=function(){enableTooltips()};
</script>
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
<center><img src="https://www.benfund.com/images/elements/progress-1.gif"></center><p>
	<span class="pagetitle">Before We Begin...</span>
	<div class="hr"></div><p>
<span class="dropcap">Y</span>ou are now beginning the BenFund Registration process and are only minutes away from establishing your account with us.<p>
Before we begin I would like you to know several things.<p>
<ul>
<li>During the this Registration process there will be a progress bar as you see above. This progress bar will indicate how far along you are in the process.<p></li>

<li>Allow yourself an average of Five to Ten minutes to finish registration.<p></li>

<li>While you can cancel the registration process at any time before the final submission by clicking on the "Cancel" button, please note that the information will not be saved until you submit your information at the end of the registration.<p></li>

<li>If you find you want more information concerning an item throughout registration process you can get quick answers when you find an "Answer Bubble"<a class="btt" title="Have a Question?^You may find a quick answer here in these bubbles!"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a>. Simply place your mouse cursor over the blue question mark icon and a relevant answer will pop up in a bubble. You will find this useful feature throughout BenFund<p></li>

<li>If you need to revise your information or go back one page use the buttons below to navigate in the registration process and avoid using your browsers navigation buttons, doing so may result in unexpected errors.<p></li>
</ul>

<span class="subtitle">Non-Profit Organizations</span>
<div class="hrinline"></div><p>
If you are registering as an organizational enitity such as a Non-Profit Organization, Club, Fraternity, or Sorority you consider having the having the following information available when you register:<p>

To proceed click on the "Proceed" button below.<p>

<form name="form1" method="post" action="https://www.benfund.com/register/register.php">
  <div align="center">
    <input name="accept" type="hidden" id="accept" value="set">
	<input name="m_type" type="hidden" id="m_type" value="<?php echo $_GET['sid']; ?>">
		<a href="javascript: history.go(-1)"><img src="https://www.benfund.com/images/elements/back.gif" border="0" alt="Back" onClick="history.go(-1)"></a>&nbsp;&nbsp;
    <a href="https://www.benfund.com/register/agreement.php?sid=<?php echo $aid; ?>"><img src="https://www.benfund.com/images/elements/proceed.gif" border="0" alt="Accept"></a>
    
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
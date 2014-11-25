<?php
session_start();
$page_title = "Oops!";
require("includes/globals.php");
require($ROOT."/functions/common.php");
$location = substr($_SERVER['QUERY_STRING'], -6);
	if (is_numeric($location)){
		if (strlen($location) == "6"){
			header( 'Location: https://www.benfund.com/mindex.php?mid='. $location .'&pid=1' ) ;
}
}
//echo $_SERVER['QUERY_STRING'].'*0<br>';
//echo $location.'*1<br>';
//echo strlen($location).'*2<br>';
//echo is_numeric($location).'*3<br>';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Home</title>
<?php include ($ROOT."includes/head.php"); ?>
<script src="https://www.benfund.com/includes/livesearch.js"></script>
<script type="text/javascript">
function Append(letter)
{
var account = letter
document.hidden.h_mid.value = letter;
}
</script>
</head>

<body onload="self.focus(); document.searchform.mid.focus(); liveSearchInit(); ">
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
    <td valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."/includes/pathway2.php") ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">
 	
<span class="pagetitle">Oops! I'm lost.</span>
<div class="hr"></div><p>
The page you requested cannot be found. The page you are looking for may have been removed, renamed, or is temporarily unavailable.  We apologize for the inconvenience.
<p>

		  <span class="subtitle">BenFund Search</span>
<form name="lookup" id="lookup" method="GET">
<input type="text" class="big" size="30" id="mid" name="mid" onkeypress="liveSearchStart()" onchange="liveSearchStart()" onFocus="liveSearchStart()" value="<?php echo stripslashes($_GET['mid']); ?>">
<div id="LSResult" style="display: none;"><div id="LSShadow"></div></div>
<p>&nbsp;</p>
</form>
<form action="https://www.benfund.com/payment/payment.php" method="post" name="hidden" id="hidden">
  <input name="h_mid" type="hidden" value="">
</form>
<br />
<span class="subtitle">Please try the following:</span><br />
<ul>
<li>If you typed the page address in the Address bar, make sure that it is spelled correctly.</li>
<li>Use the navigation bar on the left to find the link you are looking for.</li>
<li>Click the Back button to return where you came from.</li>
<li>Enter a term in the search form above to look for information on CNN sites or the Internet.</li>
</ul>
	<br />
<span class="subtitle">E-Mail Us</span><br />
Let us know how we can help you.E-mail us<p>

<span class="subtitle">Broken Links</span><br />
To report broken links, E-mail us. Be sure to paste the bad URL in the body of the e-mail message.<p>

<span class="subtitle">Help Desk</span><br />
Find out answers to the most frequently asked questions.<br />
Click here to visit the help desk.<p>

<span class="subtitle">Home Page</span><br />
<a href="https://www.benfund.com/">Return to the BenFund.com home page.</a>
    </div>
	</div>
	</td>
  </tr>
  <tr>
    <td colspan="2">
<?php include ($ROOT."/includes/footer.php") ?>
	</td>
  </tr>
</table>
</div>
</body>
</html>

<?php require ("../../includes/globals.php");
session_start();
$password = $_GET['rand'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>New Client - BenFund</title>
<?php include ($ROOT."includes/head.php") ?>
<script type="text/javascript">womOn();</script>
<body onLoad="window.print()">
<table width="550" align="center" style="padding: 6px; border: 1px solid #2C2C2C;"><tr><td>
<span class="logotext">BenFund</span><br>               
<span class="slogan">"Funding Financial Objectives"</span>
<p>
<span class="pagetitle">New Account Information</span>
<div class="hr"></div>
With BenFund you can begin paying your account online with three simple steps.
<p>
<span class="subtitle">Step 1.</span><br>
<span class="emphasis">Go to </span><span class="emphasis2">www.BenFund.com</span>
<br><span class="emphasis">Click on the "Login" link in the orange box on the left.</span><p>

<span class="subtitle">Step 2.</span><br>
<span class="emphasis">Login with the Following Information:</span><br><br>

<div style="margin-left: 10px; padding: 6px; border: 1px solid #2C2C2C; background: #E8E8E8; width: 200px;">
<span class="emphasis">Client Number:</span><br>
<span class="emphasis2"><?php echo $mid; ?>-<?php echo $cid ?></span><br>
<span class="emphasis">Password:</span><br>
<span class="emphasis2"><?php echo $password; ?></span><p>
</div>

<br>
<span class="subtitle">Step 3.</span><br>
<span class="emphasis">Complete our Simple Online Registration.</span><p>
<p>
<center>© Copyright 2007-2008 BenFund Payment Systems<br />www.BenFund.com "Funding Financial Objectives"</center>
</td></tr></table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
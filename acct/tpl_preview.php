<?php require("D:\benfund.com\includes\globals.php"); ?>
<?php 
$newtitle = $_POST['title'];
$newheader = $_POST['header'];
$newfooter = $_POST['footer'];
$newmeta = $_POST['meta'];
$newdate = $_POST['date'];
$mid = $_POST['mid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $newtitle; ?> - <?php echo $ptitle; ?></title>
<?php include ($ROOT."includes/head.php"); ?>
<script type="text/javascript">womOn();</script>

<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<div class="header_outer">                                
<div class="header_inner">                                
<?php echo $newheader ?>
<span class="provided"><a href="https://www.benfund.com/">Provided by BenFund</a></span>
</div>                                                    
</div>   
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."includes/mleft.php"); ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top" valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."includes/pathway.php"); ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">Template Preview</span>
<div class="hr"></div>

<span class="subtitle">This is how your Benfund pages will appear to your visitors.</span><p>

<img src="http://imagecache2.allposters.com/images/PF/PF_982110.jpg" align="right">This page section is your main content area where your pages will appear.<p>

When editing your information here are some considerations.<p>
<ul>
<li>Main content area is 600 pixels wide.</li>
<li>Header and footer sections are 750 pixels. This is also the width of the page template.</li>
</ul>
	</div>
	</div>
	</td>
  </tr>
  <!--MAINBODY END-->
  <!--FOOTER START-->
  <tr>
    <td colspan="2">
<div class="footer_outer">                                                                                                                
<div class="footer_inner">                                                                                                                
<?php echo $newfooter ?>
</div>
</div>    
	</td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>


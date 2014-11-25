<?php
session_start();
require("D:\benfund.com\includes\globals.php");
require($ROOT."/functions/common.php");
require ($ROOT."includes/mpage.php");
$page_title = $mtitle.''. $ptitle;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $mtitle; ?> - <?php echo $ptitle; ?></title>
<?php include ($ROOT."includes/head.php"); ?>
<script type="text/javascript">
function bookmarksite(title,url){
if (window.sidebar) // firefox
	window.sidebar.addPanel(title, url, "");
else if(window.opera && window.print){ // opera
	var elem = document.createElement('a');
	elem.setAttribute('href',url);
	elem.setAttribute('title',title);
	elem.setAttribute('rel','sidebar');
	elem.click();
} 
else if(document.all)// ie
	window.external.AddFavorite(url, title);
}
</script>
<script type='text/javascript' src='https://www.benfund.com/includes/js/x_core.js'></script>
<script type='text/javascript' src='https://www.benfund.com/includes/js/x_win.js'></script>
<script>
var emailpage = new xWindow(
  'emailpage',              // target name
  300, 500,  // size: width, height
  200, screen.height-200, // position: left, top
  0,                      // location field
  0,                      // menubar
  0,                      // resizable
  1,                      // scrollbars
  0,                      // statusbar
  0);                     // toolbar
</script>
<script type="text/javascript" type="text/javascript" src="https://www.benfund.com/includes/js/cssquery2-p.js"></script>
<script type="text/javascript" type="text/javascript" src="https://www.benfund.com/includes/js/ruzeeborders.js"></script>
<script type="text/javascript" type="text/javascript"><!--

RUZEE.Borders.add({
  '#newcomment': { borderType:'shadow', cornerRadius:10, shadowWidth:10 },
  '.commentbox': { borderType:'shadow', cornerRadius:10, shadowWidth:10 }
});

window.onload=function(){
//alert("sd");
  RUZEE.Borders.render();
};

//-->
</script>
</head>

<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."includes/mheader.php"); ?>
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
<?php include('includes/mtype'.$m_type.'.php');?>
	</div>
	</div>
	</td>
  </tr>
  <!--MAINBODY END-->
  <!--FOOTER START-->
  <tr>
    <td colspan="2">
<?php include ($ROOT."includes/mfooter.php"); ?>
	</td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
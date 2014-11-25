<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../login.php');
}else{
$page_title = "Advanced Editor";
require ("../../includes/globals.php");
require($ROOT."/functions/common.php");
require ($ROOT."/functions/editor.php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
benfund_connect();
$query = "SELECT id, m_type, name, contact_name, address, address2, city, state, zip, phone, alt_phone, email, ssn2, tax2, password, pin, goal, activated, settings FROM merchant WHERE id = '$mid' ";
$results = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($results) or die(mysql_error());
$uid = $row['id'];
$m_type = $row['m_type'];
$name = $row['name'];
$c_name = $row['contact_name'];
//Here we define out main variables
$welcome_string="Welcome!";
$numeric_date=date("G");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Simple Flyer Editor</title>
<?php include ($ROOT."/includes/head.php") ?>
<style>
body {
	background: url('background.gif');
}
iframe {
	height: auto;
	width: 400px;
}
iframe.hidden {
	visibility: hidden;
	width:0px;
	height:0px;
}

#main {
	overflow: visible;
	width: 410px;
	height: 250px !important;
	height: auto;
	min-height: 250px;
	max-height: 400px;
	background-color: white;
}

#images {
	height: 400px;
	width: 400px;
	//margin: 20px;
	vertical-align: top;
	background: #FFFFFF;
	background-image: url('https://www.benfund.com/images/elements/no-image.png');
	background-repeat: no-repeat;
	background-position: top center;
	border-width: 2px;
}

#images div {
	margin: 10px;
	width: auto;
	height: auto;
	height: 100% !important;
	background: #FFFFFF;
	text-align: center;
	overflow: hidden;
}

#images div:hover {
	border-color: #529EBD;
}

#images img.load {
	margin: 36px;
}
.editflyer{
	border: 2px dashed #C0C0C0;
	background-color: #FFFFFF;
}
.editflyer:hover{
	border: 2px dashed #707070;
	background-color: #FFFFFF;
}
.flyertitle{
	font:26pt Georgia, Garamond, "Times New Roman", Serif;
	text-align: center;
}
.flyertext{
	font:20pt Georgia, Garamond, "Times New Roman", Serif;
}
</style>
<style type="text/css">
<!--

.minitext {
  font-family: Arial, Verdana, Geneva, Helvetica, sans-serif;
  font-size: 8pt;
  font-weight: normal;
  color: Black;
}

.0 {
  background-color: #4786D2;
}
.1 {
  background-color: #D3E8FD;
}
.2 {
  background-color: #D3E8FD;
}
.3 {
  background-color: #D3E8FD;
}
.4 {
  background-color: #D3E8FD;
}

.enable {
  background-color: #77FF77;
  font-weight: bold;
  color: Black;
}
.disable {
  background-color: #FF7777;
  font-weight: bold;
  color: Black;
}
-->
</style>
<script language="javascript" type="text/javascript">
function addtext() {
	var newtext = "test";
	document.myform.mce_editor_0.value += newtext;
}
</script>

<script type="text/javascript">
<!--
function getObject(obj) {
  var theObj;
  if(document.all) {
    if(typeof obj=="string") {
      return document.all(obj);
    } else {
      return obj.style;
    }
  }
  if(document.getElementById) {
    if(typeof obj=="string") {
      return document.getElementById(obj);
    } else {
      return obj.style;
    }
  }
  return null;
}

//Contador de caracteres.
function Contar(entrada,salida,texto,caracteres) {
  var entradaObj=getObject(entrada);
  var salidaObj=getObject(salida);
  var longitud=caracteres - entradaObj.value.length;
  if(longitud <= 0) {
    longitud=0;
    texto='<span class="disable"> '+texto+' </span>';
    entradaObj.value=entradaObj.value.substr(0,caracteres);
  }
  salidaObj.innerHTML = texto.replace("{CHAR}",longitud);
}

//-->
</script>
<style type="text/css">
textarea {width:100%;}
.textarea-resizer {height:4px; background:#EEE url('https://www.benfund.com/images/elements/grippie.gif') center center no-repeat; cursor:s-resize;}
</style>
<script type="text/javascript" src="https://www.benfund.com/includes/js/IEtoW3C-loader.js"></script>
<script type="text/javascript" src="https://www.benfund.com/includes/js/TextAreaResizer.js"></script>
<script type="text/javascript" src="https://www.benfund.com/includes/js/ScriptSheet.js"></script>
<link rel="scriptsheet" type="text/javascript" href="https://www.benfund.com/includes/js/TextAreaResizer.js#TextAreaResizer" title="default" />
<script type="text/javascript" src="https://www.benfund.com/includes/js/preload.js"></script>
<script type="text/javascript">womOn();</script>

<body onLoad="document.getElementById('loading').style.display = 'none';">
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
<span class="pagetitle">Simple Flyer Editor</span>
<div class="hr"></div>

<table class="clear">
<tbody><tr><td>
<table class="toolbar" align="right">
<tbody><tr>
<td align="center"><a class="toolbar" href="#" onclick="document.editclient.submit();"><img style="width: 48px; height: 48px;" src="https://www.benfund.com/images/elements/icons/save.png" border="0"><br>Save Changes</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/client_manager.php"><img style="width: 48px; height: 48px;" src="https://www.benfund.com/images/elements/icons/cancel.gif" border="0"><br>Cancel</a></td>
</tr></tbody></table>
</td></tr></tbody></table>

<form action="<?=$PHP_SELF?>" method="post" enctype="multipart/form-data" name="myform" id="myform">

<table width="550" style="border: 1px solid #696969; min-height: 550px; max-height: 550px;">
<tr><td>
<div style="height: auto; width: auto; border: 20px solid #EFEFEF; padding: 6px;">

<center><span class="subtitle">Your Flyer Title</span><br />
<input type="text" class="editflyer flyertitle" id="eBann" name="bannerURL" size="33" maxlength="35" onFocus="document.getElementById('charcount1').style.visibility = 'visible';"  onBlur="document.getElementById('charcount1').style.visibility = 'hidden';" onKeyUp="Contar('eBann','sBann','{CHAR} characters left.',document.getElementById('eBann').maxLength);"></center>
<div id="charcount1" style="display: block; position: relative; top: -10px; right: -50px; border: 1px dashed #C0C0C0; background-color: #F5F5F5; padding: 2px; height: auto; width: auto; float: right; text-align: right; visibility: hidden;"><span id="sBann" class="minitext">35 characters left.</span></div><br />
<br>
<center><span class="subtitle">Image</span><br />
<?php	
$imago = '../functions/upload/'.$mid.'.jpg';
//$imago = 'https://www.benfund.com/acct/functions/upload/'.$mid.'.jpg';
//echo $imago;
if (file_exists($imago)) { ?>
    <div id="current_image" style="display: block; position: relative; height: 388px; width: 250px;" onMouseOver="getElementById('imgopt').style.visibility = 'visible'" onMouseOut="getElementById('imgopt').style.visibility = 'hidden'"><div id="imgopt" style="position: absolute; top: 4px; right: 4px; height: 50px; width: auto; border: 2px solid; background: #FFFFFF; filter:alpha(opacity=60); -moz-opacity:.60; opacity:.60;visibility: hidden;" onMouseOver="getElementById('imgopt').style.opacity='.80'; getElementById('imgopt').style.filter='alpha(opacity=80)';" onMouseOut="getElementById('imgopt').style.opacity='.60'; getElementById('imgopt').style.filter='alpha(opacity=60)';"><table><tr><td><center><a href="#"><img src="https://www.benfund.com/images/elements/icons/med/edit.png" border="0"><br>Edit</a></center></td><td><center><a href="#"><img src="https://www.benfund.com/images/elements/icons/med/delete.png" border="0"><br>Remove</a></center></td></tr></table></div><img src="<?php echo $imago; ?>"></div>
<?php
} else { ?>
		<div id="main">
			<div id="images"></div>
			<div id="imgupload" style="position: relative; top: -250px; visibility: visible;">
				<input type="button" value="Upload your image" style="font-size: 20px; padding: 4px;" onclick="document.getElementById('iframe').style.visibility = 'visible';">
				<div id="iframe" style="visibility: hidden;">
				<iframe src="../functions/upload.php" frameborder="0"></iframe>
				</div>
	</div>
<?php } ?>
</center>
<br>
<center><span class="subtitle">Text</span><br />
	<textarea style="width: 550px; height: 200px" name="outputtext" id="outputtext" class="editflyer flyertext"></textarea><center>
<p>
<center><span class="emphasis">www.benfund.com/<?php echo $mid; ?></span></center>
</div>
</td></tr>
</table>
        <p>
          <input type="submit" name="submit" value="Upload Image" class="big">
        </p>
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

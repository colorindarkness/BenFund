<?php require('D:\benfund.com\functions\editor.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>FCKeditor - Sample</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../sample.css" rel="stylesheet" type="text/css" />
	<link href="https://www.benfund.com/includes/css/style.css" rel="stylesheet" type="text/css" />	
<?php editor(simple, 900, 600); ?>
</head>
<body>
	<h1>
		FCKeditor - JavaScript - Sample 2</h1>
	<div>
		This sample displays a normal HTML form with an FCKeditor with full features enabled.
		It uses the "ReplaceTextarea" command to create the editor.
	</div>
	<hr />
	<form action="sampleposteddata.asp" method="post" target="_blank">
		<div>
			<textarea name="FCKeditor1" rows="10" cols="60" style="width: 300px; height: 200px">This is some &lt;strong&gt;sample text&lt;/strong&gt;. You are using &lt;a href="http://www.fckeditor.net/"&gt;FCKeditor&lt;/a&gt;.</textarea>
		</div>
		<br />
		<input type="submit" value="Submit" />
	</form>
</body>
</html>

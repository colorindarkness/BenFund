<?php require ("functions/editor.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<?php simple_editor(); ?>
</head>
<body>
	<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%">
		&lt;p&gt;Some paragraph&lt;/p&gt;
		&lt;p&gt;Some other paragraph&lt;/p&gt;
		&lt;p&gt;Some &lt;b&gt;element&lt;/b&gt;, this is to be editor 1. &lt;br /&gt; This editor instance has a 100% width to it.
		&lt;p&gt;Some paragraph. &lt;a href=&quot;http://www.sourceforge.net&quot;&gt;Some link&lt;/a&gt;&lt;/p&gt;
		&lt;img src=&quot;logo.jpg&quot;&gt;</p>
	</textarea>
</body>
</html>

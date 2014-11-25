<?php require("D:\benfund.com\includes\globals.php"); ?>
<?php require ($ROOT."includes/page.php");
$page_title = $ptitle;
$solo = $_GET['solo'];
if ($solo == 1) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $ptitle; ?> - BenFund</title>
<?php include ($ROOT."includes/head.php"); ?>
</head>
<body>
<?php echo $content; ?>
</body>
</html>
<?php
} else {
	echo $content;
}
?>
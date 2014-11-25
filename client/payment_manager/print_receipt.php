<?php
session_start();
require ("../../includes/globals.php");
require($ROOT."/functions/common.php");
$page_title = "Print Receipt";
include($ROOT."/includes/lang/".$m_type.".php");;
require($ROOT."functions/user_info.php");
$iid = $_GET['iid'];
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<style type="text/css">
table.inv {
	border-width: 2px 2px 2px 2px;
	border-spacing: 2px;
	border-style: solid solid solid solid;
	border-color: black black black black;
	border-collapse: collapse;
	background-color: white;
}
table.inv th {
	border-width: 2px 2px 2px 2px;
	padding: 4px 4px 4px 4px;
	border-style: solid solid solid solid;
	border-color: black black black black;
	background-color:#F6F6F6;
	-moz-border-radius: 0px 0px 0px 0px;
}
table.inv td {
	border-width: 2px 2px 2px 2px;
	padding: 4px 4px 4px 4px;
	border-style: solid solid solid solid;
	border-color: black black black black;
	background-color: white;
	-moz-border-radius: 0px 0px 0px 0px;
}
</style>
<?php include ($ROOT."/includes/head.php"); ?>
</head>
<body onLoad="window.print()">
<?php include ('receipt2.php');?>
<p>
<center><a href="javascript:window.close();">Close Window</a></center>
</body>
</html>
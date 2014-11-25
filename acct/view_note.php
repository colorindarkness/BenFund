<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../login.php');
}else{
$page_title = "View Client Note";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
$nid = $_GET['nid'];
benfund_connect();
$notes_query = "SELECT id, mid, cid, date, text FROM client_notes WHERE id = '$nid' AND mid = '$mid'";
$notes_result = mysql_query($notes_query) or die(mysql_error());
$notes_row = mysql_fetch_row($notes_result) or die(mysql_error());
$nid = $notes_row[0];
$cid = $notes_row[2];
$n_date = chronos($notes_row[3], 4);
$n_text = $notes_row[4];
benfund_connect();
$client_query = "SELECT first_name, m_i, last_name FROM client WHERE cid = '$cid' AND mid = '$mid'";
$client_result = mysql_query($client_query) or die(mysql_error());
$client_row = mysql_fetch_row($client_result) or die(mysql_error());
$c_name = $client_row[0].' '.$client_row[1].' '.$client_row[2];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<body>

<table width="365"  border="0" ><tr><td>
<span style="float: right;"><a href="javascript:window.close();">close window</a></span>
<span class="subtitle">Client Note</span>
<div class="hrinline"></div>
<div style="width: 360px; background-color: #A5AAE4; border: 2px solid #000080; padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 4px;">
<div style="width: 347px; background-color: #FBFBFB; border: 2px solid #6A72D2; padding: 4px;">
<span class="emphasis">RE: <?php echo $c_name ;?></span><br>
<span class="demphasis"><?php echo $n_date ;?></span><p>
<?php echo $n_text ;?>
<p>
</div>
<span class="emphasis5">Edit | Delete</span><br>
</td>
</tr>
</table>

</body>
</html>
<?php
}
?>
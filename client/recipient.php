<?php 
$q = $_GET['q'];
?>
<xml version='1.0' encoding='utf-8'>
Matches:
<div class="LSRes">
<?php
mysql_connect("localhost", "benfund", "oro5591ville") or die(mysql_error());
mysql_select_db("benfund") or die(mysql_error());
$query = "SELECT id, name FROM merchant WHERE name LIKE '%$q%' OR id LIKE '%$q%'";
$results = mysql_query($query) or die(mysql_error());
while ($row = mysql_fetch_array($results)) {
$rid = $row[0];
$rname = $row[1];
?>
<div class="LSRow"><a href="#" onclick="Append('<?php echo $rid; ?>')"><?php echo $rname; ?></a></div>
<?php } ?>
</xml>
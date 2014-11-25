<?php 
$id = $_GET['mid'];
?> <xml version='1.0' encoding='utf-8'> Accounts: 
<ul class='LSRes'>
<?php
mysql_connect("localhost", "benfund", "oro5591ville") or die(mysql_error());
mysql_select_db("benfund") or die(mysql_error());
$query = "SELECT id, name FROM merchant WHERE name LIKE '%$id%' OR id LIKE '%$id%'";
$results = mysql_query($query) or die(mysql_error());
while ($row = mysql_fetch_array($results)) {
$rid = $row[0];
$rname = $row[1];
?>
<li class="LSRow"><a href="https://www.benfund.com/mindex.php?mid=<?php echo $rid; ?>&pid=1" onclick="Append('<?php echo $rid; ?>'); document.hidden.submit();"><?php echo $rname; ?></a></li>
<?php } ?>
</ul>
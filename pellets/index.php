<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ameri-Brand Products Wood Pellet Sale</title>
</head>

<body bgcolor="#FFFFFF" text="#0000CC" link="#00CC00" vlink="#00CC00" alink="#00CC00">
<table width="500px" align="center"><tr><td>
<center><img src="https://www.benfund.com/pellets/site-logo-index.gif" alt="ab-inc" /><br />
  <b><font color="#CC0000" size="6" face="Arial, Helvetica, sans-serif" >Wood Pellet Sale</font> </b></center>
  <p>
<div style="background-color:#FFFFCC; border: 2px solid #009900; color:#00CC00; float:right; clear:none; width:150px; height: 30px; text-align:center; padding: 6px"><a  style="color:#00CC00; font-size:20px; font-weight:bold" href="#order">Order Now!</a></div><p>
<font color="#0000CC" face="Arial, Helvetica, sans-serif" size="4">Because the entire West Coast of the United States is experiencing a major outage of wood pellet supplies we have decided to purchase a few box cars of North Country Wood Pellets Totaling 500 Tons.</p>

<p>These Pellets are scheduled to arrive in Oroville, Ca on or around Friday Feb. 16th. This date is subject to shipping circumstances and is subject to change. Please Check back often to stay up to date.</p>

<p><font size="4"><b>Our supplies are very limited and will sell quickly so <a href="#order">Reserve Your Pellets Now!</a></b></font></p>
<?php
	mysql_connect("localhost", "benfund", "pr0m3th3u$") or die(mysql_error());
	mysql_select_db("pellets") or die(mysql_error());
	$query = "SELECT SUM(q) AS total FROM sale";    
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$ordered = (integer)$row['total'];
$i = '96';
$r = $i - $ordered;

?>
<p><b><font color="#CC0000" size="6">Only <?php echo $r; ?> Tons Remaining.</font></b></p>

<table id="table1" border="0" cellpadding="2" width="100%" style="background:#F2F2F2; border: 2px solid #0099CC">
  <tbody>
  <tr><td colspan="3">
  <p><font color="#0000CC" face="Arial, Helvetica, sans-serif" size="4">North Country Wood Pellet sources only premium grade wood pellets from Canada and the United States. To ensure a clean and efficient burn, our product adheres to the following characteristics:</font></p>
</td></tr>
    <tr>
      <td align="right" width="14%"> <font style="font-size: 11pt;" color="#0000CC" face="Arial, Helvetica, sans-serif"> <strong>&#9679;</strong></td>
      <td width="42%"><font color="#0000CC" face="Arial, Helvetica, sans-serif" style="font-size: 11pt;">Less than .05%   					ash</td>
      <td rowspan="4" width="41%"> <font color="#0000CC" face="Arial, Helvetica, sans-serif" style="font-size: 11pt;"><img src="https://www.benfund.com/pellets/bag_logo.jpg" border="0" height="195" width="151" /></td>
    </tr>
    <tr>
      <td align="right" width="14%"> <font style="font-size: 11pt;" color="#0000CC" face="Arial, Helvetica, sans-serif"> <strong>&#9679;</strong></td>
      <td width="42%"><font color="#0000CC" face="Arial, Helvetica, sans-serif" style="font-size: 11pt;">5 - 6%   					moisture</td>
    </tr>
    <tr>
      <td align="right" width="14%"> <font style="font-size: 11pt;" color="#0000CC" face="Arial, Helvetica, sans-serif"> <strong>&#9679;</strong></td>
      <td width="42%"><font color="#0000CC" face="Arial, Helvetica, sans-serif" style="font-size: 11pt;">8500 BTU's per   					pound</td>
    </tr>
    <tr>
      <td align="right" width="14%"> <font style="font-size: 11pt;" color="#0000CC" face="Arial, Helvetica, sans-serif"> <strong>&#9679;</strong></td>
      <td width="42%"><font color="#0000CC" face="Arial, Helvetica, sans-serif" style="font-size: 11pt;">Contamination   					free!</font></td>
    </tr>
  </tbody>
</table>
<p align="center"><img src="https://www.benfund.com/pellets/paymeth_edit.gif" alt="payment methods" />
<table width="500" border="0" cellspacing="0" cellpadding="4" align="center" style="background-color:#FFFFCC; border: 2px solid #009900; text-align:center; padding: 6px"><a  style="color:#00CC00; font-size:20px; font-weight:bold">
<tr>
<td colspan="2">
<b><font color="#009900" size="36px"><a name="order">Order Now!</a></font></b>
</td>
</tr>
  <tr>
    <td align="left"><form id="quantity" action="https://www.benfund.com/pellets/cart.php" method="post"><input type="text" id="q" name="q" size="2" maxlength="3" style="height:60px; width: 60px; font:Arial, Helvetica, sans-serif bold; font-size:50px; border:2px solid #00CC00" /><br><font color="#009900"><u><b>Ton(s)</b></u></font><br /><input type="submit" value="Order!" /></form></td>
    <td><b><font color="#009900" size="36px">$399.50</font></b> <font color="#009900"><u><b>a Ton<br />
    </b></u></font><b><font color="#FF0000">Minimum Order One Ton<br />Maximum Order of Five Tons per Customer.</font></b> </td>
  </tr>
</table>
<p />&nbsp;&nbsp;&nbsp;&nbsp;
<center>
<font face="Arial,Helvetica" color="#cc0000" size="+2">Questions?<br />
Call (530)534-6802</font>
</center>
</td></tr></table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>

</html>

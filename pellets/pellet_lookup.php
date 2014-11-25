<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<?php
require ("../functions/common.php");
$user = $_POST['user'];
$pw = $_POST['pw'];
$pw = sha1($pw);

$cmd = $_GET['cmd'];
$id = $_GET['id'];

$error = "<div align='center'><strong><font color='#FF0000' size='5'>YOU MUST LOGIN TO SEE THIS PAGE<br>IF YOU ATTEMPTED TO LOGIN CHECK YOUR USERNAME AND PASSWORD AND TRY AGAIN<br><br><a href='https://www.benfund.com/pellets/admin_login.php'>Return To Login</a></font></strong> </div>";

if (!isset($_SESSION['valid_user']))
{
pellets_connect();
$query = "SELECT * FROM admin WHERE user='$user' AND password='$pw'";
$result = mysql_query($query) or die(mysql_error());
$num_rows = mysql_num_rows($result);

  if ($num_rows == 1)
	{ $_SESSION['valid_user'] = $user;}
  else 
	{ die($error); }
}
if (isset($_SESSION['valid_user']))
{
?>
<head>
<title>Wood Pellet Order Pickup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center"><img src="site-logo-index.gif" width="411" height="32"> </div>
<form name="form1" method="post" action="https://www.benfund.com/pellets/pellet_lookup.php">
  <table width="auto" border="0" align="center" cellpadding="0">
    <tr> 
      <td>Phone Number:</td>
      <td><input name="phone" type="text" maxlength="10"></td>
      <td><em>(example: 5555555555)</em></td>
    </tr>
    <tr> 
      <td colspan="3"><div align="center"><strong>OR</strong></div></td>
    </tr>
    <tr> 
      <td>Last Name:</td>
      <td><input name="last_name" type="text" id="last_name"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="3"><div align="center">
          <input type="submit" name="Submit" value="Lookup">
          <input type="reset" name="Submit2" value="Reset">
        </div></td>
    </tr>
  </table>
  </form>
<br>
<?php
if ($_GET['cmd'] == 'received')
{
pellets_connect();
$query = "UPDATE sale SET pickup='1' WHERE id='$id'";
$result = mysql_query($query) or die(mysql_error());
$num_rows = mysql_affected_rows();
	if ($num_rows > 0)
		{echo "<h2><center>Order has been marked as picked up</center></h2>";}
	else
		{echo "<h2><center>There has been an error, please lookup the order and click the pickup button again.</center></h2>";}	
}
if (isset ($_POST['phone']) || isset ($_POST['last_name']))
{
$phone = $_POST['phone'];
$last_name = $_POST['last_name'];

pellets_connect();
$query = "SELECT * FROM sale WHERE pickup IS NULL AND phone='$phone' OR pickup IS NULL AND last_name='$last_name'";
$result = mysql_query($query) or die(mysql_error());

		echo '<table border="2" cellspacing="2"  width="auto" align="center">';
   		echo "<tr bgcolor='#CCCCCC'><td><strong>First</strong></td><td><strong>Last</strong></td><td><strong>Address</strong></td><td><strong>City</strong></td><td><strong>Phone</strong></td><td><strong>CC Type</strong></td><td><strong>CC Number</strong></td><td><strong># of tons</strong></td><td><strong>Total</strong></td><td><strong>Picked Up</strong></td></tr>";
	while ($row = mysql_fetch_array($result)) 
	{
	    $pu = "<input type='button' onclick='window.location.href=\"https://www.benfund.com/pellets/pellet_lookup.php?cmd=received&id=$row[id]\"' value='Picked Up'>";
		
		$total = number_format($row['total'], 2);
	    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>\n", $row["first_name"], $row["last_name"], $row["address"], $row["city"], $row["phone"], $row["cc_type"], $row["cc_num"], $row["q"], $total, $pu); 
	}
   		echo '</table>';	
	
unset ($_POST['phone']);
unset ($_POST['last_name']);
}

?>
</body>

<?php }
else
{ print($error); }
 ?>
</html>

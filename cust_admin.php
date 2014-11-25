<?php require ("includes/globals.php");?>
<?php
session_start();
$id = $_SESSION['valid_user'];
$pw = $_SESSION['pw'];
//require('functions/update_totals.php');
//require('functions/user_info.php');
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
?>
<?php 
//user_info($id, $pw);
//update_totals($id);
if (isset($_SESSION['changed']))
{echo $_SESSION['changed'];
unset($_SESSION['changed']);
}
?>
<?php

//Here we define out main variables
$welcome_string="Welcome!";
$numeric_date=date("G");

//Start conditionals based on military time
if($numeric_date>=0&&$numeric_date<=11)
$welcome_string="Good Morning";
else if($numeric_date>=12&&$numeric_date<=17)
$welcome_string="Good Afternoon";
else if($numeric_date>=18&&$numeric_date<=23)
$welcome_string="Good Evening";
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Login</title>
<?php include ($ROOT."/includes/head.php") ?>
</head>

<body>
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
	<div class="content_outer">
	<div class="content_inner">
	<?php

if(!isset($_SESSION['valid_user']))
{
echo "<script>document.location.href='login.php'</script>";
//die($error);
}
?>
<span class="pagetitle"><?php echo $welcome_string; ?> <?php echo "$row[1]"; ?> </span>

<center><span class="subtitle">Client Control Panel</span></center>
<table width="500" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td>
      <center>
        <img src="https://www.benfund.com/images/elements/icons/reports.png" />
      </center>
    </td>
    <td>
      <center>
        <img src="https://www.benfund.com/images/elements/icons/acct_hist.png" />
      </center>
    </td>
    <td>
      <center>
        <img src="https://www.benfund.com/images/elements/icons/reports2.png" />
      </center>
    </td>
    <td>
      <center>
        <img src="https://www.benfund.com/images/elements/icons/edit_flyer.png" />
      </center>
    </td>
  </tr>
  <tr>
    <td>
      <center>
        Account Summary 
      </center>
    </td>
    <td>
      <center>
        Account History 
      </center>
    </td>
    <td>
      <center>
        Reports
      </center>
    </td>
    <td>
      <center>
        Manage Flyer 
      </center>
    </td>
  </tr>
  <tr>
    <td>
      <center>
        <img src="https://www.benfund.com/images/elements/icons/edit_tpl.png" />
      </center>
    </td>
    <td>
      <center>
        <img src="https://www.benfund.com/images/elements/icons/edit_pages.png" />
      </center>
    </td>
    <td>
      <center>
        <img src="https://www.benfund.com/images/elements/icons/nfo.png" />
      </center>
    </td>
    <td>
      <center>
        <img src="https://www.benfund.com/images/elements/icons/logout.png" />
      </center>
    </td>
  </tr>
  <tr>
    <td>
      <center>
        Edit Template 
      </center>
    </td>
    <td>
      <center>
        Edit Pages 
      </center>
    </td>
    <td>
      <center>
        Change Information 
      </center>
    </td>
    <td>
      <center>
        Logout
      </center>
    </td>
  </tr>
</table>

<h4>Your current balance of donations is:<em><strong> $<?php echo $sum; ?> </strong></em></h4>
<p><strong>Donations to date:</strong></p>
<p> 
  <?php
 	mysql_connect("localhost", "benfund", "oro5591ville") or die(mysql_error());
	mysql_select_db("benfund") or die(mysql_error()); 
$result = mysql_query("SELECT ammount, date FROM account_balance WHERE id='$id'");  
while ($row = mysql_fetch_array($result)) {
   $timestamp = $row["date"];
   $year = substr($timestamp, 0, 4);
   $month = substr($timestamp, 4, 2);
   $day = substr($timestamp, 6, 2);
   $date = "$month/$day/$year";
   echo '<table border="0" cellspacing="6"  width="300">';
   printf("<tr bgcolor='#CCCCCC'><td><strong>Date:</strong> <em>%s</em> <strong>Amount:</strong> <em>$%s</em></td></tr>\n", $date, $row["ammount"]); 
   echo '</table>';
}


?>



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

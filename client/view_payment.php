<?php
session_start();
if (!isset($_SESSION[valid_client])){
     header('Location:../login.php');
}else{
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
$payid = $_GET['payid'];
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
$cmd = $_GET['cmd'];
$msg_id = $_POST['msg_id'];

benfund_connect();
$result = mysql_query("SELECT * FROM payment_data WHERE id = '$payid'");
$row = mysql_fetch_array($result)or die(mysql_error());
$id = $row[0];
$payid = $row[1];
$first_name = $row[2];
$m_i = $row[3];
$last_name = $row[4];
$address1 = $row[5];
$address2 = $row[6];
$city = $row[7];
$state = $row[8];
$zip = $row[9];
$method = $row[10];
$cc_num = $row[11];
$exp_date = $row[12];
$paypal_email = $row[13];
$check_num = $row[14];
benfund_connect();
$result2 = mysql_query("SELECT * FROM payments WHERE id = '$payid'");
$row2 = mysql_fetch_array($result2)or die(mysql_error());
$cid = $row2[2];
$amount = $row2[3];
$date = $row2[4];
$active = $row2[6];
if ($active==1){
	$status = '<span class="true">Cleared</span>';
} else {
	$status = '<span class="false">Pending</span>';
}
$ip = $row2[7];
if ($msg_reply == 1){
	$sent_as = '<img src=https://www.benfund.com/images/elements/icons/sm/mail-reply.png>';
}
if ($msg_reply == 2){
	$sent_as = '<img src=https://www.benfund.com/images/elements/icons/sm/mail-forward.png>';
} else {
		$sent_as = '<img src=https://www.benfund.com/images/elements/icons/sm/mail-reply.png>';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Merchant Contol Panel</title>
<script>
var imageURL = "https://www.benfund.com/images/elements/window/maximize.png";

if (document.images) {
     var clock = new Image();
     clock.src = "https://www.benfund.com/images/elements/window/maximize.png";

     var cup = new Image();
     cup.src = "https://www.benfund.com/images/elements/window/minimize.png";
}
function changeImage() {
     if (document.images) {
          if (imageURL == "https://www.benfund.com/images/elements/window/minimize.png") imageURL = "https://www.benfund.com/images/elements/window/maximize.png";
          else imageURL = "https://www.benfund.com/images/elements/window/minimize.png";

         document.myImage.src = imageURL;
     }
}
</script>
<?php include ($ROOT."/includes/head.php") ?>
<script type="text/javascript">
	// Initialise the effects
	var updates, introduction, bare, smooth, going, ending;
	
	window.onload = function() {
		updates = new fx.Combo('updates', {height: true, opacity: true, duration: 500});
		bare = new fx.Combo('bare', {height: true, opacity: true, duration: 500});
		
		// Hide them to begin with
		updates.hide();
		bare.hide();
	}
</script>
<script type="text/javascript">womOn();</script>

<body>
<div class="0">
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
	<?php m_menu3(); ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">View Payment</span>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/message.php?cmd=compose&cid=<?php echo $mid ?>-<?php echo $cid ?>"><img src="https://www.benfund.com/images/elements/icons/mail-reply.png" border="0"><br>Send Payee<br />Message</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/finance_manager.php"><img src="https://www.benfund.com/images/elements/icons/reports.png" border="0"><br>Return</a></td>
</tr></table>
</td></tr></table>

	<div class="wrapper">	
		<div class="main">
<table width="100%" height="35" cellpadding="0" cellspacing="0" ><tr valign="middle" onclick="updates.toggle();">
<td class="dataheader2" width="35" height="35"><img src="https://www.benfund.com/images/elements/window/left.gif"></td>
<td class="dataheader" height="35" width="*"><span class="xp_title" onclick="updates.toggle();">Personal Information<img src="https://www.benfund.com/images/elements/window/trans.gif"></span></td>
<td class="dataheader3" width="35" height="35"><img src="https://www.benfund.com/images/elements/window/maximize.png" name="myImage" onclick="changeImage(); updates.toggle();"></td>
</tr></table>
<div class="window">
<table>
<tr>
<td class="datalabel" width="150"><span class="emphasis">Payee Name</span></td>
<td class="datatext" colspan="5"><span class="emphasis2"><?php echo $first_name ?> <?php echo $m_i ?> <?php echo $last_name ?></span></span></td>
</tr>
</table>

<div id="updates">
<table>
<tr class="datarow">
<tr><td class="datalabel"><span class="emphasis">Address</span></td>
<td class="datatext" colspan="5"><span class="emphasis2"><?php echo $address1 ?></span></td></tr>
<?php if(isset($address2)){ ?>
<tr class="datarow">
<td class="datalabel"><span class="emphasis">Address 2</span></td>
<td class="datatext" colspan="5"><span class="emphasis2"><?php echo $address2 ?></span></span></td></tr>
<?php } ?>
<tr class="datarow">
<td class="datalabel"><span class="emphasis">City</span></span></td>
<td class="datatext"><span class="emphasis2"><?php echo $city ?></span></td>
<td class="datalabel"><span class="emphasis">State</span></td>
<td class="datatext"><span class="emphasis2"><?php echo $state ?></span></td>
<td class="datalabel"><span class="emphasis">ZIP</span></td>
<td class="datatext"><span class="emphasis2"><?php echo $zip ?></span></td></tr>
</table>
</div><!-- end div updates -->
</div>
	
<table width="100%" height="35" cellpadding="0" cellspacing="0" ><tr>
<td class="dataheader2" width="35" height="35"><img src="https://www.benfund.com/images/elements/window/left.gif"></td>
<td class="dataheader" height="35" width="*"><span class="xp_title" onclick="bare.toggle();">Payment Data</span></div><img src="https://www.benfund.com/images/elements/window/trans.gif"></span></td>
<td class="dataheader3" width="35" height="35"><img src="https://www.benfund.com/images/elements/window/maximize.png" name="myImage" onclick="changeImage(); bare.toggle();"></td>
</tr></table>
<div class="window">
<div id="bare">
<table>
<tr><td  class="datalabel"><span class="emphasis">Date</span></td><td colspan="5" class="datatext"><span class="emphasis2"><?php echo $date ?></span></td></tr>
<tr><td class="datalabel"><span class="emphasis">Amount</span></td><td colspan="5" class="datatext"><span class="emphasis2"><?php echo $amount ?></span></td></tr>
<tr><td class="datalabel"><span class="emphasis">Method</span></td><td colspan="5" class="datatext"><span class="emphasis2"><?php echo $method ?></span></td></tr>
<tr><td class="datalabel"><span class="emphasis">Status</span></td><td colspan="5" class="datatext"><span class="emphasis2"><?php echo $status ?></span></td></tr>
</table>
</div>
</div>
		</div><!-- end div main -->
	</div><!-- end div wrapper -->
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/finance_manager.php"><img src="https://www.benfund.com/images/elements/icons/error.png" border="0"><br />Report Error</a></td>
</tr></table>
</td></tr></table>
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
<?php
}
?>

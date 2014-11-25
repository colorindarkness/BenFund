<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../../login.php');
}else{
require ("../../includes/globals.php");
require($ROOT."/functions/common.php");
$payid = $_GET['iid'];
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
$cmd = $_GET['cmd'];
$msg_id = $_POST['msg_id'];

benfund_connect();
$result = mysql_query("SELECT * FROM payment_data WHERE id = '$payid'");
$row = mysql_fetch_array($result)or die(mysql_error());
$iid = $row[0];
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
$inv = $row2[1];
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

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund - Merchant Contol Panel</title>
<?php include ($ROOT."/includes/head.php") ?>
<script type="text/javascript">womOn();</script>
<body>
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
	<tr>
		<td>
			<table class="toolbar" align="right">
				<tr>
					<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/invoice_manager/view_invoice.php?iid=<?php echo $iid ?>"><img src="https://www.benfund.com/images/elements/icons/invoice.png" border="0"><br>View Invoice</a></td>
					<td align="center"><a class="toolbar" href="javascript:history.back()"><img src="https://www.benfund.com/images/elements/icons/reports.png" border="0"><br>Return</a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<div style="border: 1px solid #0000FF; background: #E6E6FA; padding: 4px;">	
<span class="larger bold">Personal Information</span><br>
	<table>
			<tr>
				<td width="200" valign="top">
					<span class="emphasis">Payee Name:</span><br>
					<span class="emphasis">Address:</span><br>
					<?php if(isset($address2)){ ?><span class="emphasis">Address 2:</span><br><?php } ?>
					<span class="emphasis">City:</span><br>
					<span class="emphasis">State:</span><br>
					<span class="emphasis">ZIP:</span><br>
				</td>
				<td valign="top">
					<span class="emphasis2"><?php echo $first_name ?> <?php echo $m_i ?> <?php echo $last_name ?></span><br>
					<span class="emphasis2"><?php echo $address1 ?></span><br>
					<?php if(isset($address2)){ ?><span class="emphasis2"><?php echo $address2 ?></span><br><?php } ?>
					<span class="emphasis2"><?php echo $city ?></span><br>
					<span class="emphasis2"><?php echo $state ?></span><br>
					<span class="emphasis2"><?php echo $zip ?></span><br>
				</td>
			</tr>
		</table>
</div>
<p>
<div style="display: block; border: 1px solid #800000; background: #FFFFF0; padding: 4px; height: auto;">
	<span class="larger bold">Payment Data</span><br>
		<table>
			<tr>
				<td width="200" valign="top">
					<span class="emphasis">Payment ID:</span><br>
					<span class="emphasis">Invoice #:</span><br>
					<span class="emphasis">Date:</span><br>
					<span class="emphasis">Total:</span><br>
					<span class="emphasis">Method:</span><br>
					<span class="emphasis">Status:</span><br>
				</td>	
				<td valign="top">
					<span class="emphasis2"><?php echo $payid ?></span><br>
					<span class="emphasis2"><?php echo $inv ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.benfund.com/acct/invoice_manager/view_invoice.php?iid=<?php echo $iid; ?>">View Invoice&nbsp;<img src="https://www.benfund.com/images/elements/icons/sm/view.png" border="0" /></a><br>
					<span class="emphasis2"><?php echo $date ?></span><br>
					<span class="emphasis2"><?php echo $amount ?></span><br>
					<span class="emphasis2"><?php echo $method ?></span><br>
					<span class="emphasis2"><?php echo $status ?></span><br>
				</td>
			</tr>
</table>
</div>
<table class="clear">
	<tr>
		<td>
			<table class="toolbar" align="right">
				<tr>
					<td align="center"><a class="toolbar" href="https://www.benfund.com/client/finance_manager.php">
						<img src="https://www.benfund.com/images/elements/icons/error.png" border="0"><br />Report Error</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

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

<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../login.php');
}else{
$page_title = "View Donation";
require ("../../includes/globals.php");
require($ROOT."/functions/common.php");
$did = $_GET['did'];
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<script type="text/javascript" src="https://www.benfund.com/includes/js/tabs.js"></script>
<script type="text/javascript">womOn();</script>
<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."/includes/header.php"); ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."/includes/left.php"); ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."/includes/pathway.php"); ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<?php if($m_type == 1){ m_menu1(); } if($m_type == 2){ m_menu2(); } ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">View Donation</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/donations/"><img src="https://www.benfund.com/images/elements/icons/donations.png" border="0"/><br />Donations</a></td>
</tr></table>
</td></tr></table>

<?php
benfund_connect();
$result = mysql_query("SELECT * FROM donations WHERE to_id='$mid' AND did = '$did'");
$row = mysql_fetch_array($result);
$id = $row[0];
$did = $row[1];
$to = $row[2];
$from = $row[3];
$total = $row['total'];
$status = $row['status'];
	if($status == 0){ $condition = '<span class="true">Cleared</span>'; }
	if($status == 1){ $condition = '<span class="false">Pending</span>'; }

$timestamp = $row[4];
$time = chronos($timestamp, 0);
$desc = $row[5];
$comment = $row[7];
$dispute = $row[8];

benfund_connect();
$comquery = "SELECT * FROM comments WHERE mid='$mid' AND id='$comment'";
$comresult = mysql_query($comquery);
$com_row = mysql_fetch_array($comresult);
$com_id = $com_row[0];
$com_from = $com_row[2];;
$com_subject = $com_row[3];
$com_location = $com_row[4];
$com_content = $com_row[5];
$com_amount = $com_row[6];
$com_date = $com_row[7];
$com_private = $com_row[8];
$com_status = $com_row[9];
?>
<table width="100%">
<tr><td><span class="emphasis">From:</span></td><td><span class="emphasis"><?php echo $from; ?></span></td></tr>
<tr><td><span class="emphasis">Donation:</span></td><td><span class="emphasis"><?php echo $total; ?></span></td></tr>
<tr><td><span class="emphasis">Status:</span></td><td><span class="emphasis"><?php echo $condition; ?></span></td></tr>
<tr><td><span class="emphasis">Time:</span></td><td><span class="emphasis"><?php echo $time; ?></span></td></tr>
</table>
<?php if(mysql_num_rows($comresult)){ ?>
	<div style="border: 2px solid #CE0000; height: auto; width: auto;">
	<table width="100%">
		<tr><td colspan="2"><span class="emphasis">Donors Comment:</span></td><td>
		<tr><td><span class="emphasis">Commenting as:</span></td><td><span class="emphasis"><?php echo $com_from; ?></span></td></tr>
		<tr><td><span class="emphasis">Date:</span></td><td><span class="emphasis"><?php echo $com_date; ?></span></td></tr>
		<tr><td colspan="2"><span class="subtitle"><?php echo $com_subject; ?></span></td></tr>
		<tr><td colspan="2">
		<hr>
		<div class="message">
		<?php echo $com_content; ?>
		</div>
		<hr>
		</td></tr>
		<tr><td colspan="2">
		<table class="clear">
		<tr><td>
		<table class="toolbar" align="right">
		<tr>
		<?php if($com_status == 0){ ?>
		<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/comment.php?cmd=approve?com_id=<?php echo $com_id; ?>"><img src="https://www.benfund.com/images/elements/icons/approve_comment.png" border="0"/><br>Approve</a></td>
		<?php } ?>
		<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/comment.php?cmd=private<?php echo $com_id; ?>"><img src="https://www.benfund.com/images/elements/icons/private_comment.png" border="0"/><br>Private</a></td>
		<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/comment.php?cmd=delete<?php echo $com_id; ?>"><img src="https://www.benfund.com/images/elements/icons/delete_comment.png" border="0"/><br>Delete</a></td>
		</tr>
		</table>
		</td></tr></table>
		</td></tr>
		</table>
	</div>
	<?php } ?>

<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="javascript:popUp('https://www.benfund.com/acct/finance_manager/print_invoice.php?iid=<?php echo $iid; ?>')"><img src="https://www.benfund.com/images/elements/icons/print.png" border="0"/><br />Print Invoice</a></td>
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
      <font color="#FEFFC1">
      <?php include ($ROOT."/includes/footer.php"); ?>
	  </font></td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
<?php
}
?>
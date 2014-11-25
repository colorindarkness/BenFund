<?php
session_start();
if (!isset($_SESSION[valid_client])){
	$_SESSION['error'] = "This script sucks. <br>Please try again<br>";
     header('Location:../login.php');
}
$page_title = "Search Transactions";
require ("../../includes/globals.php");
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
require($ROOT."functions/user_info.php");
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
$rand = chaos(6);

////////////////////////////
//COLLECT SEARCH VARIABLES//
////////////////////////////

$srch_type = $_POST['srch_type'];
$srch_field = $_POST['srch_field'];
$srch_cat = $_POST['srch_cat'];
$srch_stat = $_POST['srch_stat'];
$srch_dispute = $_POST['srch_dispute'];
$srch_date_mm1 = $_POST['srch_date_mm1'];
$srch_date_dd1 = $_POST['srch_date_dd1'];
$srch_date_yy1 = $_POST['srch_date_yy1'];
$srch_date_mm2 = $_POST['srch_date_mm2'];
$srch_date_dd2 = $_POST['srch_date_dd2'];
$srch_date_yy2 = $_POST['srch_date_yy2'];

/////////////////////////
//ASSEMBLE SEARCH QUERY//
/////////////////////////

//SEARCH TYPE
$srch="%".$srch_field."%";

if($srch_type){
	if($srch_type == 'kw'){
		$query = " desc LIKE '$srch'";
 }elseif($srch_type == 'inv'){
		$query = "  inv LIKE '$srch'";
 }
}

//CATEGORY
if($srch_cat){
	if($srch_cat == 'all'){
		$query .= "";
 }elseif($srch_cat = 'pay'){
		$query .= " AND type = '1' AND from_id = '$cid'";
 }elseif($srch_cat = 'cred'){
		$query .= " AND type = '1' AND to_id = '$cid'";
 }elseif($srch_cat = 'invoice'){
		$query .= " AND type = '2'";
 }
}

//STATUS
if($srch_stat){
	if($srch_stat == 'all'){
		$query .= "";
 }elseif($srch_stat == 'paid'){
		$query .= " AND status = '1'";
 }elseif($srch_stat == 'unpaid'){
		$query .= " AND status = '0'";
 }
}

//DISPUTE
if($srch_dispute){
	$query .= " AND dispute = '1'";
}

if(isset($srch_date_mm1, $srch_date_dd1, $srch_date_yy1, $srch_date_mm2, $srch_date_dd2, $srch_date_yy2)){
	$begin = $srch_date_yy1.''.$srch_date_mm1.''.$srch_date_dd1.'000000';
	$end = $srch_date_yy2.''.$srch_date_mm2.''.$srch_date_dd2.'000000';
	$date_fltr = ' AND date BETWEEN $begin AND $end';
}

$search = "SELECT * FROM srch_trans_tmp$rand WHERE $query ORDER BY id DESC"; 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<script type="text/javascript" src="https://www.benfund.com/includes/js/tabs.js"></script>
<script type="text/javascript">
		womAdd('sfHover()');
		womOn();
	</script>
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
	<?php m_menu3(); ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">Search Results</span><p>
<div class="hr"></div>

<div style="border: 1px solid #0000A0; background: #E6E6FA url(https://www.benfund.com/images/elements/icons/med/search.png) no-repeat top right; padding: 4px; width: 100%; height: auto;">
<form name="search_payments" method="post" action="https://www.benfund.com/client/payment_manager/search.php">
<span class="large">Search by:</span>
<select name="srch_type" class="inputmed">
<option value="kw">Keyword(s)</option>
<option value="inv">Invoice # </option>
</select>
<br>
<input type="text" class="nice" id="srch_field" name="srch_field" size="23" maxlength="23"><input type="submit" class="large" value="Search">
<div id="simple_srch" style="display: block;">
<a href="#" onclick="getElementById('adv_options').style.display = 'block'; getElementById('simple_srch').style.display = 'none'">Advanced Search</a>
</div>
<div id="adv_options" style="display: none;">
<a href="#" onclick="getElementById('simple_srch').style.display = 'block'; getElementById('adv_options').style.display = 'none';">Simple Search</a><br>
<div style="position: absolute; border: 1px solid #0000A0; background: #F2F2FD; padding: 4px; height: auto !important; max-width: 320px;">
<span class="red bold">The following options are to refine your results and are not required.</span>
<table border="0" width="100%" cellpadding="4" style="border: 1px solid #A3A3A3; padding: 4px; border-collapse: collapse;"><tr>
	<td valign="top"  style="border: 1px solid #A3A3A3;">
		<span class="medium bold">Category:</span><br>
		<select class="bold" name="srch_cat">
			<option value="all">All</option>
			<option value="inv">Invoice</option>
			<option value="pay">Payment</option>
			<option value="cred">Credit</option>
		</select><br>
		<input type="radio" name="srch_stat" value="all" checked>All<br>
		<input type="radio" name="srch_stat" value="paid">Paid<br>
		<input type="radio" name="srch_stat" value="unpaid">Unpaid<br>
		<input type="checkbox" name="srch_dispute">Disputed<br>
	</td>
	<td valign="top"  style="border: 1px solid #A3A3A3;">
		<span class="medium bold">Date Filter:</span><br>
			<table>
				<tr><td colspan="3"><span class="bold">From</span></td></tr>
				<tr><td><?php dateSelect(1,06,05,1) ?></td></tr>
				<tr><td colspan="3"><span class="bold">To</span></td></tr>
				<tr><td><?php dateSelect(2,06,05,1) ?></td></tr>
			</table>
</td></tr></table>
</div>
</div>
</form>
</div>
<div class="hr"></div>
<?php
benfund_connect();
mysql_query("CREATE TEMPORARY TABLE srch_trans_tmp$rand (id int(11) NOT NULL auto_increment, type int(1) NOT NULL default '0', inv int(6) default NULL, to_id int(11) NOT NULL default '0', from_id varchar(6) NOT NULL default '', total varchar(32) NOT NULL default '', date varchar(64) NOT NULL default '', status char(1) NOT NULL default '', PRIMARY KEY  (id), UNIQUE KEY inv (inv)) TYPE=MyISAM");
benfund_connect();
mysql_query("INSERT INTO srch_trans_tmp$rand SELECT * FROM transactions WHERE to_id='$cid' OR from_id='$cid'");

benfund_connect();
$result = mysql_query($search);
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
if($result){
	$num_rows = mysql_num_rows($result);
	?>
	<table width="100%" border="0">
	<tr>
		<td valign="top">	
			<span class="large bold">Search returned <?php echo $num_rows; ?> result(s).</span><br> If your search returned too many results consider using Advanced Search.
		</td>
		<td valign="top" width="115">
			<div style="text-align: right; display: block;">
			Records per Page:<br />
			<select class="nice" onchange="rowsDisplayed(document.getElementById('jukejoint'), document.getElementById('jukejoint').className, this.value); Repaginate()">
  			<option value="5">5</option>
  			<option value="10">10</option>
  			<option value="20">20</option>
  			<option value="30">30</option>
  			<option value="40">40</option>
  			<option value="50">50</option>
  		</select>  
	</div>  
		</td>   
	</tr>
</table>
<div id="datatable">
<table class="sortable-onload-1-reverse no-arrow paginate-5" id="jukejoint" align="center" border="0" cellpadding="4" cellspacing="0" width="95%">
<tr>
<th valign="top" width="50" class="sortable"><b>Inv#</b></th>
<th valign="top" width="400" class="sortable"><b>Type</b></th>
<th valign="top" width="60" class="sortable"><b>Amount</b></th>
<th valign="top" width="60" class="sortable"><b>Status</b></th>
<th valign="top" width="50" class="sortable"><b>Date</b></th>
<th valign="top" width="20">View</th>
</tr>
<?php
while ($row = mysql_fetch_array($result)) {
$iid = $row[0];
$type = $row[1];
if($type == 1){
		$type = '<span class="bold red">Payment</span>';
	}elseif($type == 2){
		$type = '<span class="bold blue">Invoice</span>';
	}elseif($type == 3){
		$type = '<span class="bold green">Credit</span>';
	}
$inv = $row[2];
$to = $row[3];
$from = $row[4];
$amount = $row[5];
$timestamp = $row[6];
$time = chronos($timestamp, 0);
$status = $row[7];
	if($status == '0'){
		$status = '<span class="bold red">Pending</span>';
	}elseif($status == '1'){
		$status = '<span class="bold green">Cleared</span>';
	}
$row_color = ($row_count % 2) ? $color1 : $color2;
?>
<tr class="<?php echo $row_color; ?>" onclick="document.location.href = 'https://www.benfund.com/client/payment_manager/view_invoice.php?iid=<?php echo $iid; ?>';">
<td valign="top"><a href="https://www.benfund.com/client/payment_manager/view_invoice.php?iid=<?php echo $iid; ?>"><?php echo $inv ?></a></td>
<td valign="top"><?php echo $type; ?></td>
<td valign="top" width="250"><a href="https://www.benfund.com/client/payment_manager/view_invoice.php?iid=<?php echo $iid; ?>"><?php echo $amount; ?></a></td>
<td valign="top" width="100"><?php echo $status; ?></td>
<td valign="top"><?php echo $time; ?></td>
<td valign="top"><?php if ($row[1] == 1){?><a href="https://www.benfund.com/client/payment_manager/view_payment.php?iid=<?php echo $iid; ?>"><?php } if ($row[1] == 2){?><a href="https://www.benfund.com/client/payment_manager/view_invoice.php?iid=<?php echo $iid; ?>"><?php } if ($row[1] == 3){?><a href="https://www.benfund.com/client/payment_manager/view_credit.php?iid=<?php echo $iid; ?>"><?php } ?><img src="https://www.benfund.com/images/elements/icons/sm/view.png" border="0" /></a></td></tr>
<?php
$row_count++;
 } ?>
 </table>
</div>
<?php
}else{
	?>
	<span class="red bold large">Sorry your search returned no results.</span><br>
	<span class="bold large">Consider being less specific on your search and try again.</span>
<?php } ?>

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

</body>
</html>
<?php
session_start();
if (!isset($_SESSION[valid_user])){
     header('Location:../login.php');
}else{
$page_title = "Edit Client";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
$cid = $_GET['cid'];
benfund_connect();
$query = "SELECT cid, mid, first_name, m_i, last_name, address, address2, city, state, zip, phone, alt_phone, email, balance, activated FROM client WHERE cid = '$cid'";
$results = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_row($results) or die(mysql_error());
$cid = $row[0];
$mid = $row[1];
$first_name = $row[2];
$m_i = $row[3];
$last_name = $row[4];
$address = $row[5];
$address2 = $row[6];
$city = $row[7];
$state = $row[8];
$zip = $row[9];
$phone = $row[10];
$phoneseg = explode("-", $phone);
$p1 = $phoneseg[0];
$p2 = $phoneseg[1];
$p3 = $phoneseg[2];
$alt_phone = $row[11];
$alt_phoneseg = explode("-", $alt_phone);
$pa1 = $alt_phoneseg[0];
$pa2 = $alt_phoneseg[1];
$pa3 = $alt_phoneseg[2];
$email = $row[12];
$balance = $row[13];
$status = $row[14];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<script type="text/javascript">
// HIDE/DISPLAY FUNCTIONS 
function displayView() { document.getElementById('viewclient').style.display = ''; }
function displayEdit() { document.getElementById('editclient').style.display = ''; }
			
function hideAll() {
		document.getElementById('viewclient').style.display = 'none';
		document.getElementById('editclient').style.display = 'none';
		}
</script>
<script type="text/javascript" src="https://www.benfund.com/includes/js/tabs.js"></script>
<script type="text/javascript">womOn();</script>
<script type='text/javascript' src='https://www.benfund.com/includes/js/x_core.js'></script>
<script type='text/javascript' src='https://www.benfund.com/includes/js/x_win.js'></script>
<script>
var viewnote = new xWindow(
  'viewnote',              // target name
  400, 200,  // size: width, height
  200, 200, // position: left, top
  0,                      // location field
  0,                      // menubar
  0,                      // resizable
  1,                      // scrollbars
  0,                      // statusbar
  0);                     // toolbar
</script>
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
	<?php if($m_type == 1){ m_menu1(); } if($m_type == 2){ m_menu2(); } ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">Client Information</span><p>
<div class="hr"></div>
<?php future_past("-", "720");?>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="#" onclick="document.editclient.submit();"><img src="https://www.benfund.com/images/elements/icons/save.png" border="0"/><br />Save Changes</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/new_invoice.php?id=<?php echo $cid;?>"><img src="https://www.benfund.com/images/elements/icons/invoice-send.png" border="0"/><br />Send Invoice</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/message_center.php?view=compose&id=<?php echo $cid;?>"><img src="https://www.benfund.com/images/elements/icons/mail-compose.png" border="0"/><br />Send Message</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/client_manager.php"><img src="https://www.benfund.com/images/elements/icons/cancel.gif" border="0"/><br />Cancel</a></td>
</tr></table>
</td></tr></table>


<div id="viewclient">
	<div style="background: #F0F0F0; border: 2px solid #9AA3C5; margin: 10px; padding: 4px;">
		<div style="clear: both; float: right;">
			<a href="#" onclick="hideAll();displayEdit();"><img src="https://www.benfund.com/images/elements/buttons/edit_client.png" border="0"></a>
		</div>
	<br />
<span class="subtitle">Client Information</span><a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a>
<div class="hr"></div>
<table width="100%" border="0" align="center" style="background: #F9F9F9;" >
<tr>
<td valign="top">
	<table border="0" align="center">
	<tr>
		<td valign="top"><span class="demphasis">Client Name</span></td>
		<td valign="top"><?php echo $first_name; ?> <?php echo $m_i; ?> <?php echo $last_name; ?></td>
	</tr>
	<tr>
		<td valign="top"><span class="demphasis">Status</span></td>
		<td valign="top">
		<?php
	if($status = 1){
		echo '<span style="color: green; font-weight: bold;">Active</span>';
	}
	if($status = 0){
		echo '<span style="color: red; font-weight: bold;">Inactive</span>';
	}
	?>
		</td>
	</tr>
	<tr>
		<td valign="top"><span class="demphasis">Address</span></td>
		<td valign="top"><?php echo $address; ?><br />
<?php echo $city; ?>, <?php echo $state; ?> <?php echo $zip; ?></td>
	</tr>
</table>
</td><td valign="top">
<table border="0" align="center">
	<tr>
		<td valign="top"><span class="demphasis">Primary Phone</span></td>
		<td valign="top">(<?php echo $p1; ?>) <?php echo $p2; ?>-<?php echo $p3; ?></td>
		</tr><tr>
		<td valign="top"><span class="demphasis">Alt Phone</span></td>
		<td valign="top">(<?php echo $pa1; ?>) <?php echo $pa2; ?>-<?php echo $pa3; ?></td>
		</tr><tr>
		<td valign="top"><span class="demphasis">Email</span></td>
		<td valign="top"><?php echo $email; ?></td>
	</tr>
</table>
</td></tr></table>
<table width="100%">
	<tr>
		<td valign="top" width="70%" border="1">
			<span class="emphasis">Notes</span><a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a><br />
			<div style="border: 1px solid #9AA3C5; height: 100px; max-height: 100px; _height:auto !important;">
			<div id="datatable">
				<table width="380" style="width: 380px;" align="center" border="0" cellspacing="0" cellpadding="4" class="sortable-onload-1-reverse no-arrow" id="voodoo">
					<thead>
						<tr>
							<th valign="top" width="50" class="sortable"><b>Date</b></th><th valign="top" width="150" class="sortable"><b>Text</b></th><th valign="top" width="20" class="sortable">&nbsp;</th><th valign="top" width="20" class="sortable">&nbsp;</th>
						</tr>
					<thead>
					<tbody style="height: 72px; max-height: 72px; _height:auto !important; width: 600px; overflow: auto; overflow-x:hidden;">
						<?php
						benfund_connect();
						$notes_query = "SELECT id, mid, cid, date, text FROM client_notes WHERE mid='$mid' AND cid='$cid'";
						$notes_result = mysql_query($notes_query) or die(mysql_error());
						$color1 = "row0";
						$color2 = "row1";
						$row_count = 0;
						if($notes_result){
						/*$row = mysql_fetch_row($result) or die(mysql_error());*/
						while ($notes_row = mysql_fetch_row($notes_result)) {
						$nid = $notes_row[0];
						$n_date = chronos($notes_row[3], 0);
						$n_text = $notes_row[4];
						$row_color = ($row_count % 2) ? $color1 : $color2;
						?>
						<tr class="<?php echo $row_color; ?>"><td valign="top" width="50"><?php echo $n_date; ?></td><td valign="top" width="150"><a target='viewnote' href="view_note.php?nid=<?php echo $nid; ?>" onclick="return viewnote.load(this.href)"><?php echo $n_text; ?></a></td><td width="20"><a href="#"><img src="https://www.benfund.com/images/elements/icons/sm/edit.png" border="0"></a></td><td width="20"><a href="#"><img src="https://www.benfund.com/images/elements/icons/sm/delete.gif" border="0"></a></td></tr>
						<?php
						$row_count++;
						} 
					}elseif(!$notes_result){?>
						<tr><td colspan="4">poop</td></tr>
					<?php } ?>
 					</tbody>
				</table>
			</div>
			</div>
			<div style="float: right;"><a href="#" onclick=""><img src="https://www.benfund.com/images/elements/buttons/edit_add_notes.png" border="0"></a></div>
		</td>
		<td valign="top" width="30%">
			<span class="emphasis">Reports</span><a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a><br />
			<ul>
				<li><a href="#">Quick Report</a></li>
				<li><a href="#">Transactions</a></li>
				<li><a href="#">Revenue</a></li>
				<li><a href="#">Expenses</a></li>
			</ul>
		</td>
	</tr>
</table>
</div>
<span class="subtitle">Clients Transactions</span><a class="btt" title="What then is this!^Login as a client if you want to make a payment to another accounct such as a merchant or layaway account"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></a>
<div class="hr"></div>
<ul id="maintab" class="shadetabs">
<li class="selected"><a href="#default" rel="ajaxcontentarea">Recent</a></li>
<li><a href="external.htm" rel="ajaxcontentarea">Past Due</a></li>
<li><a href="external2.htm" rel="ajaxcontentarea">Payments</a></li>
<li><a href="external3.htm" rel="ajaxcontentarea">Credits</a></li>
<li><a href="external4.htm" rel="ajaxcontentarea">else?</a></li>
</ul>

<div id="ajaxcontentarea" class="contentstyle">
<div class="clear">
<div id="datatable">
<table width="95%" align="center" border="0" cellspacing="0" cellpadding="4"  class="sortable-onload-1-reverse no-arrow" id="omfug">
<thead>
<tr>
<th valign="top" width="50" class="sortable"><b>Inv #</b></th>
<th valign="top" width="70" class="sortable"><b>Type</b></th>
<th valign="top" width="20" class="sortable"><b>Date</b></th>
<th valign="top" class="sortable"><b>Total</b></th>
<th valign="top" class="sortable"><b>Status</b></th>
<th valign="top" width="20">View</th>
</tr>
</thead>
<?php
benfund_connect();
$result = mysql_query("SELECT * FROM transactions WHERE to_id='$cid' AND from_id='$mid' ORDER BY inv DESC");
$color1 = "row0";
$color2 = "row1";
$row_count = 0;
if($result){
while ($row = mysql_fetch_row($result)) {
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
<tbody>
<tr class="<?php echo $row_color; ?>">
	<td valign="top" width="20"><?php echo $inv; ?></td>
	<td valign="top"><?php echo $type; ?></td>
	<td valign="top" width="250"><a href="view_invoice.php?iid=<?php echo $inv; ?>"><?php echo $time; ?></a></td>
	<td valign="top" width="250"><a href="view_invoice.php?iid=<?php echo $inv; ?>"><?php echo $amount; ?></a></td>
	<td valign="top"><?php echo $status; ?></td>
	<td valign="top"><?php if ($row[1] == 1){?><a href="https://www.benfund.com/acct/finance_manager/view_payment.php?iid=<?php echo $iid; ?>"><?php } if ($row[1] == 2){?><a href="https://www.benfund.com/acct/invoice_manager/view_invoice.php?iid=<?php echo $iid; ?>"><?php } if ($row[1] == 3){?><a href="https://www.benfund.com/acct/finance_manager/view_credit.php?iid=<?php echo $iid; ?>"><?php } ?><img src="https://www.benfund.com/images/elements/icons/sm/view.png" border="0" /></a></td>
</tr>
</tbody>
<?php
$row_count++;
 } 
}else{?>
	<tbody>
<tr class="row0">
<td>Nothing.
</td>
</tr>
</tbody>
<?php } ?>	
</table>
</div>
</div>
<p><b><a href="javascript: expandtab('maintab', 2)">Select 3rd tab of "maintab"</a></b></p>
</div>

<script type="text/javascript">
//Start Ajax tabs script for UL with id="maintab" Separate multiple ids each with a comma.
startajaxtabs("maintab")
</script>
</div>


<div id="editclient" style="display: none;">
	<div style="height: 30px; min-height:30px!important; max-height:30px!important; _height: auto!important; background: #F0F0F0; border: 2px solid #9AA3C5; margin: 10px; padding: 4px;">
		<div style="position: relative; display: block; clear: both; float: right; height: 25px!important; min-height:25px!important; _height: auto!important;">
			<a href="#" onclick="hideAll();displayView();"><img src="https://www.benfund.com/images/elements/buttons/view_client.gif" border="0"></a><p>&nbsp;<br />&nbsp;<p>&nbsp;<br>
		</div>
	</div>


<div style="width: 420px; margin: auto auto; padding: 12px; background: #FFFEF2; border: 2px solid #9AA3C5;">
<span class="subtitle">Edit Client Information</span>
<div class="hr"></div>
<form method="post" action="client_manager.php?cmd=edit" name="editclient">
<table><tr>
<td>
<span class="subtitle" >First Name:</span><br />
<input type="text" size="15" id="first_name" name="first_name" value="<?php echo $first_name; ?>" class="big"/>
</td>
<td>
<span class="subtitle" >MI:</span><br />
<input type="text" size="1" id="m_i" name="m_i" value="<?php echo $m_i; ?>" class="big"  onKeyup="autotab(this, document.editclient.last_name)" maxlength="1"/>
</td>
<td>
<span class="subtitle" >Last Name:</span><br />
<input type="text" size="20" id="last_name" name="last_name" value="<?php echo $last_name; ?>" class="big"/>
</td>
</tr></table>

<span class="subtitle" >Address:</span><br />
<input type="text" size="30" id="address" name="address" value="<?php echo $address; ?>" class="big"/><p>
<span class="subtitle" >Address 2:</span><br />
<input type="text" size="30" id="address2" name="address2" value="<?php echo $address2; ?>" class="big"/><p>
<table><tr>
<td>
<span class="subtitle" >City:</span><br />
<input type="text" size="20" id="city" name="city" value="<?php echo $city; ?>" class="big"/><p>
</td><td>
<center>
<span class="subtitle" >State:</span><br />
<input type="text" size="1" onKeyup="autotab(this, document.editclient.zip)" maxlength="2" id="state" name="state" value="<?php echo $state; ?>" class="big"/><p>
</center>
</td><td>
<center>
<span class="subtitle" >Zip:</span><br />
<input type="text" size="5" onKeyup="autotab(this, document.editclient.p1)" maxlength="5" id="zip" name="zip" value="<?php echo $zip; ?>" class="big"/><p>
</center>
</td></tr></table>
<table><tr>
<td>
<span class="subtitle" >Phone Number:</span><br />
<input type="text" name="p1" id="p1" size="3" onKeyup="autotab(this, document.editclient.p2)" maxlength="3"  class="acnice" value="<?php echo $p1; ?>">
                <input type="text" name="p2" id="p2" size="2" onKeyup="autotab(this, document.editclient.p3)" maxlength="3"  class="nice"value="<?php echo $p2; ?>"><span class="emphasis">-</span><input type="text" name="p3" id="p3" size="3" onKeyup="autotab(this, document.editclient.pa1)" maxlength="4"  class="nice"value="<?php echo $p3; ?>">
</td><td>
<span class="subtitle" >&nbsp; &nbsp; &nbsp;Alternate Phone Number:</span><br />
&nbsp; &nbsp; &nbsp;<input type="text" name="pa1" id="pa1" size="3" onKeyup="autotab(this, document.editclient.pa2)" maxlength="3"  class="acnice" value="<?php echo $pa1; ?>"> 
<input type="text" name="pa2" id="pa2" size="2" onKeyup="autotab(this, document.editclient.pa3)" maxlength="3"  class="nice" value="<?php echo $pa2; ?>"><span class="emphasis">-</span><input type="text" name="pa3" id="pa3" size="3" onKeyup="autotab(this, document.editclient.email)" maxlength="4"  class="nice" value="<?php echo $pa3; ?>">
</td></tr></table>
<span class="subtitle" >Email Address:</span><br />
<input type="text" size="35" id="email" name="email" value="<?php echo $email; ?>" class="big"/><p>
<!--
<span class="subtitle" >Financial Goal:</span><br />
<input type="text" size="50" id="balance" name="balance" value="<?php echo $balance; ?>" class="big"/><p>
-->
<span class="subtitle" >Account Status:</span><br />
<select name="status" class="big">
<option value="1" style="background-color: #82E001;">Active</option>
<option value="0" style="background-color: #FF8888;">Inactive</option>
</select><p>
<!--
<input type="text" size="1" maxlength="1" id="status" name="status" value="<?php echo $status; ?>" class="big"/><p>
-->
	<input type="hidden" id="cid" name="cid" value="<?php echo $cid; ?>" class="big"/>
	<center>
	<a href="#"><img src="https://www.benfund.com/images/elements/buttons/cancel.gif" name="reset" onclick="hideAll();displayView(); viewOpacity.toggle(0, 1);" border="0"/></a>
	<input type="image" src="https://www.benfund.com/images/elements/buttons/submit.gif" name="save" value="Submit" onclick="" />
	</center>
</form>
</div></div>
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
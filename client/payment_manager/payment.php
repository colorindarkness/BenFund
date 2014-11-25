<?php
session_start();
if (!isset($_SESSION[valid_client])){
     header('Location:../login.php');
}
$page_title = "Pay Invoice";
require ("../../includes/globals.php");
require($ROOT."/functions/common.php");
benfund_connect();
$query = "select first_name, m_i, last_name, address, city, state, zip, phone, email from client where cid = '$cid'";
$results = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($results);
if($_POST['inv_id']){
	$inv_id = $_POST['inv_id'];
}else{
	$inv_id = $_SESSION['inv_id'];
}
if($_POST['inv_payee']){
	$inv_payee = $_POST['inv_payee'];
}else{
	$inv_payee = $_SESSION['inv_payee'];
}
if($_POST['inv_payee_id']){
	$inv_payee_id = $_POST['inv_payee_id'];
}else{
	$inv_payee_id = $_SESSION['inv_payee_id'];
}
if($_POST['inv_num']){
	$inv_num = $_POST['inv_num'];
}else{
	$inv_num = $_SESSION['inv_num'];
}
if($_POST['amount']){
	$amount = $_POST['amount'];
}else{
	$amount = $_SESSION['amount'];
}

if (!$p_fn){
	$fn = $row[0];
}else{
	$fn = $p_fn;
}
if (!$p_mi){
	$mi = $row[1];
}else{
	$mi = $p_mi;
}
if (!$p_ln){
	$ln = $row[2];
}else{
	$ln = $p_ln;
}
if (!$p_add){
	$add = $row[3];
}else{
	$add = $p_add;
}
if (!$p_ci){
	$ci = $row[4];
}else{
	$ci = $p_ci;
}

$st = $row[5];

if (!$p_zip){
	$zip = $row[6];
}else{
	$zip = $p_zip;
}
if (!$p_ph){
	$ph = explode('-', $row[7] );
}else{
	$ph = explode('-', $p_ph );
}
if (!$p_em){
	$em = $row[8];
}else{
	$em = $p_em;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
<?php include ($ROOT."/includes/head.php"); ?>
<script type="text/javascript" src="https://www.benfund.com/includes/js/tabs.js"></script>
<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=800,left = 340,top = 112');");
}
</script>
<script type="text/javascript">womOn();</script>
<style type="text/css">
.datrow {
	display: inline;
	position: relative;
	width: 100%;
	float: left;
}
.datentry {
	display: inline;
	position: relative;
	width: auto;
	padding: 6px;
	float: left;
}
.datlabel {
	display: inline;
	position: relative;
	width: auto;
	float: left;
}
.datval {
	display: inline;
	position: relative;
	width: auto;
	float: left;
	clear: left;
}
</style>
</html>
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
<span class="pagetitle">Pay Invoice</span><p>
<div class="hr"></div>

<?php
//$user = $_SESSION['user']; 
//$error2 = $_SESSION['error2'];	   
?>
<?php 	
				while(isset($_SESSION['error']))
				{echo '<div class="error"><span class="errormsg2">' . $_SESSION['error'] . '</span></div>'; 
				 unset ($_SESSION['error']);
				} 
		?>
<p>
<form action="https://www.benfund.com/client/payment_manager/receipt.php" method="post">

<div style="padding: 6px; border: 1px solid #6CD136; background-color: #E2F7D2;">
	<div class="datrow" style="display: table-row;">
		<div class="datentry">
			<div class="datlabel"><span class="emphasis">Payee:</span></div><br>
			<div class="datval"><input type="text" class="nice" size="35" value="<?php if($inv_payee){ echo $inv_payee; } else { $_SESSION['inv_payee']; } ?> (<?php if($inv_payee_id){ echo $inv_payee_id; } else { $_SESSION['inv_payee_id']; } ?>)" readonly></div>
			<!--<div class="datval"><span class="emphasis"><?php if($inv_payee){ echo $inv_payee; } else { $_SESSION['inv_payee']; } ?> (<?php if($inv_payee_id){ echo $inv_payee_id; } else { $_SESSION['inv_payee_id']; } ?>)</span></div>-->
			<input type="hidden" name="inv_payee" id="inv_payee" value="<?php if($inv_payee){ echo $inv_payee; } else { $_SESSION['inv_payee']; } ?>">
			<input type="hidden" name="inv_payee_id" id="inv_payee_id" value="<?php if($inv_payee_id){ echo $inv_payee_id; } else { $_SESSION['inv_payee_id']; } ?>">
		</div>
		<div class="datentry">
			<div class="datlabel"><span class="emphasis">Invoice Number:</span></div><br>
			<!--<span class="emphasis"><?php if($inv_num){ echo $inv_num; } else { $_SESSION['inv_num']; } ?></span>-->
			<div class="datval"><input type="text" class="nice" name="inv_num" id="inv_num" value="<?php if($inv_num){ echo $inv_num; } else { $_SESSION['inv_num']; } ?>" readonly></div>
		</div>
	</div>
	<div>
		<div>
			<div><span class="emphasis">Payment Total:</span></div><br>
			<div <?php if(stristr($error2, "amount")){ echo "class='error_row'"; }else{ echo "class='amount_row'"; }?> style="height: auto;"><span class="emphasis">$</span><input class="nice darkgreen" name="amount" type="text" id="amount" value="<?php if($_POST['amount']){ echo $_POST['amount']; } else { echo $_SESSION['amount']; } ?>" size="6" readonly></div>
		</div>
	</div>
</div>
<p>
<div style="padding: 6px; border: 1px solid #0000FF; background-color: #E6E6FA;">
	<span class="medium bold darkblue">Please fill out the following information as it appears on the credit card statement of which you intend to pay with.</span>
	<div class="datrow" style="display: table-row;">
		<div class="datentry <?php if(stristr($error2, "first_name")){ echo "error_row"; }?>">
			<div class="datlabel"><span class="emphasis">First Name:</span></div><br>
			<div class="datval"><input class="nice" name="first_name" type="text" id="first_name" value="<?php echo $fn; ?>" size="15"></div>
		</div>
		<div class="datentry">
			<div class="datlabel"><span class="emphasis">M.I.:</span></div><br>
			<div class="datval"><input class="nice" name="first_name" type="text" id="first_name" value="<?php echo $fn; ?>" size="2"></div>
		</div>
		<div class="datentry <?php if(stristr($error2, "last_name")){  echo "error_row"; }?>">
			<div class="datlabel"><span class="emphasis">Last Name:</span></div><br>
			<div class="datval"><input class="nice" name="last_name" type="text" id="last_name" value="<?php echo $ln; ?>"></div>
		</div>
	</div>
	<div class="datrow" style="display: table-row;">
		<div class="datentry <?php if(stristr($error2, "address")){ echo "error_row"; }?>">
			<div class="datlabel"><span class="emphasis">Address:</span></div><br>
			<div class="datval"><input class="nice" name="address" type="text" id="address" value="<?php echo $add; ?>" size="45"></div>
		</div>
	</div>
	<div class="datrow" style="display: table-row;">
		<div class="datentry <?php if(stristr($error2, "city")){  echo " error_row"; }?>">
			<div class="datlabel"><span class="emphasis">City:</span></div>
			<div class="datval"><input class="nice" name="city" type="text" id="city" value="<?php echo $ci; ?>"></div>
		</div>
		<div class="datentry <?php if(stristr($error2, "state")){ echo " error_row"; }?>">
			<div class="datlabel"><span class="emphasis">State:</span></div>
			<div class="datval">
				<select class="nice" id="select3" name="state">
          <option value="<?php echo $user['4']; ?>"><?php echo $user['4']; ?></option>
          <option value="AK" <?php if($st == "AK"){ echo "selected"; } ?>>AK</option>
          <option value="AL" <?php if($st == "AL"){ echo "selected"; } ?>>AL</option>
          <option value="AR" <?php if($st == "AR"){ echo "selected"; } ?>>AR</option>
          <option value="AZ" <?php if($st == "AZ"){ echo "selected"; } ?>>AZ</option>
          <option value="CA" <?php if($st == "CA"){ echo "selected"; } ?>>CA</option>
          <option value="CO" <?php if($st == "CO"){ echo "selected"; } ?>>CO</option>
          <option value="CT" <?php if($st == "CT"){ echo "selected"; } ?>>CT</option>
          <option value="DC" <?php if($st == "DC"){ echo "selected"; } ?>>DC</option>
          <option value="DE" <?php if($st == "DE"){ echo "selected"; } ?>>DE</option>
          <option value="FL" <?php if($st == "FL"){ echo "selected"; } ?>>FL</option>
          <option value="GA" <?php if($st == "GA"){ echo "selected"; } ?>>GA</option>
          <option value="HI" <?php if($st == "HI"){ echo "selected"; } ?>>HI</option>
          <option value="IA" <?php if($st == "IA"){ echo "selected"; } ?>>IA</option>
          <option value="ID" <?php if($st == "ID"){ echo "selected"; } ?>>ID</option>
          <option value="IL" <?php if($st == "IL"){ echo "selected"; } ?>>IL</option>
          <option value="IN" <?php if($st == "IN"){ echo "selected"; } ?>>IN</option>
          <option value="KS" <?php if($st == "KS"){ echo "selected"; } ?>>KS</option>
          <option value="KY" <?php if($st == "KY"){ echo "selected"; } ?>>KY</option>
          <option value="LA" <?php if($st == "LA"){ echo "selected"; } ?>>LA</option>
          <option value="MA" <?php if($st == "MA"){ echo "selected"; } ?>>MA</option>
          <option value="MD" <?php if($st == "MD"){ echo "selected"; } ?>>MD</option>
          <option value="ME" <?php if($st == "ME"){ echo "selected"; } ?>>ME</option>
          <option value="MI" <?php if($st == "MI"){ echo "selected"; } ?>>MI</option>
          <option value="MN" <?php if($st == "MN"){ echo "selected"; } ?>>MN</option>
          <option value="MO" <?php if($st == "MO"){ echo "selected"; } ?>>MO</option>
          <option value="MS" <?php if($st == "MS"){ echo "selected"; } ?>>MS</option>
          <option value="MT" <?php if($st == "MT"){ echo "selected"; } ?>>MT</option>
          <option value="NC" <?php if($st == "NC"){ echo "selected"; } ?>>NC</option>
          <option value="ND" <?php if($st == "ND"){ echo "selected"; } ?>>ND</option>
          <option value="NE" <?php if($st == "NE"){ echo "selected"; } ?>>NE</option>
          <option value="NH" <?php if($st == "NH"){ echo "selected"; } ?>>NH</option>
          <option value="NJ" <?php if($st == "NJ"){ echo "selected"; } ?>>NJ</option>
          <option value="NM" <?php if($st == "NM"){ echo "selected"; } ?>>NM</option>
          <option value="NV" <?php if($st == "NV"){ echo "selected"; } ?>>NV</option>
          <option value="NY" <?php if($st == "NY"){ echo "selected"; } ?>>NY</option>
          <option value="OH" <?php if($st == "OH"){ echo "selected"; } ?>>OH</option>
          <option value="OK" <?php if($st == "OK"){ echo "selected"; } ?>>OK</option>
          <option value="OR" <?php if($st == "OR"){ echo "selected"; } ?>>OR</option>
          <option value="PA" <?php if($st == "PA"){ echo "selected"; } ?>>PA</option>
          <option value="RI" <?php if($st == "RI"){ echo "selected"; } ?>>RI</option>
          <option value="SC" <?php if($st == "SC"){ echo "selected"; } ?>>SC</option>
          <option value="SD" <?php if($st == "SD"){ echo "selected"; } ?>>SD</option>
          <option value="TN" <?php if($st == "TN"){ echo "selected"; } ?>>TN</option>
          <option value="TX" <?php if($st == "TX"){ echo "selected"; } ?>>TX</option>
          <option value="UT" <?php if($st == "UT"){ echo "selected"; } ?>>UT</option>
          <option value="VA" <?php if($st == "VA"){ echo "selected"; } ?>>VA</option>
          <option value="VT" <?php if($st == "VT"){ echo "selected"; } ?>>VT</option>
          <option value="WA" <?php if($st == "WA"){ echo "selected"; } ?>>WA</option>
          <option value="WI" <?php if($st == "WI"){ echo "selected"; } ?>>WI</option>
          <option value="WV" <?php if($st == "WV"){ echo "selected"; } ?>>WV</option>
          <option value="WY" <?php if($st == "WY"){ echo "selected"; } ?>>WY</option>
          <option value="AA" <?php if($st == "AA"){ echo "selected"; } ?>>AA</option>
          <option value="AE" <?php if($st == "AE"){ echo "selected"; } ?>>AE</option>
          <option value="AP" <?php if($st == "AP"){ echo "selected"; } ?>>AP</option>
          <option value="AS" <?php if($st == "AS"){ echo "selected"; } ?>>AS</option>
          <option value="FM" <?php if($st == "FM"){ echo "selected"; } ?>>FM</option>
          <option value="GU" <?php if($st == "GU"){ echo "selected"; } ?>>GU</option>
          <option value="MH" <?php if($st == "MH"){ echo "selected"; } ?>>MH</option>
          <option value="MP" <?php if($st == "MP"){ echo "selected"; } ?>>MP</option>
          <option value="PR" <?php if($st == "PR"){ echo "selected"; } ?>>PR</option>
          <option value="PW" <?php if($st == "PW"){ echo "selected"; } ?>>PW</option>
          <option value="VI" <?php if($st == "VI"){ echo "selected"; } ?>>VI</option>
        </select>
			</div>       
		</div>
		<div class="datentry <?php if(stristr($error2, "zip")){ echo " error_row"; }?>">
			<div class="datlabel"><span class="emphasis">Zip:</span></div>
			<div class="datval"><input class="nice" name="zip" type="text" id="zip" value="<?php echo $zip; ?>" size="5" maxlength="6"></div>
		</div>
	</div>
		<div <?php if(stristr($error2, "phone")){  echo "class='error_row'"; }?>>
			<div><span class="emphasis">Phone:</span></div>
			<div><input class="acnice" name="p1" type="text" id="p1" value="<?php echo $ph[0]; ?>" size="3" maxlength="3">-<input class="nice" name="p2" type="text" id="p2" value="<?php echo $ph[1]; ?>" size="3" maxlength="3">-<input class="nice" name="p3" type="text" id="p3" value="<?php echo $ph[2]; ?>" size="4" maxlength="4"></div>
		</div>
		<div <?php if(stristr($error2, "email")){  echo "class='error_row'"; }?>>
			<div><span class="emphasis">Email:</span></div>
			<div><input class="nice" name="email" type="text" id="email" value="<?php echo $em; ?>" size="45"></div>
		</div>
</div>
<p>
<div style="padding: 6px; border: 1px solid #800000; background-color: #FFFFF0;">
	<div>
		<div><span class="emphasis">Credit Card Type:</span></div>
		<div>
			<select class="nice" name="select">
						<option>Visa</option>
            <option>Master Card</option>
            <option>American Express</option>
            <option>Discover</option>
			</select>
	</div>
	</div>
	<div <?php if(stristr($error2, "num")){ echo "class='error_row'"; }?>>
		<div><span class="emphasis">Credit Card Number:</span></div>
		<div><input class="nice" name="ccnum" size="20" type="text" id="ccnum" value="<?php echo $_SESSION['ccnum']; ?>" maxlength="16"></div>
	</div>
	<div <?php if(stristr($error2, "exp")){ echo "class='error_row'"; }?>>
		<div><span class="emphasis">Expiration Date:</span></div>
		<div><select class="nice" name="exp_month" id="select">
					<option value="<?php echo $user['11']; ?>"><?php echo $user['11']; ?></option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          </select>
          <span class="emphasis">/</span>
          <select class="nice" name="exp_year" id="select2">
          <option value="<?php echo $user['12']; ?>"><?php echo $user['12']; ?></option>
          <option value="2007">2007</option>
          <option value="2008">2008</option>
          <option value="2009">2009</option>
          <option value="2010">2010</option>
          <option value="2011">2011</option>
          <option value="2012">2012</option>
          <option value="2013">2013</option>
          <option value="2014">2014</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          </select>
    </div>
	</div>
</div>
<!--
  <table width="auto" border="0" cellpadding="5" cellspacing="0">
  	<tr> 
    <td><span class="emphasis">Payee:</span></td>
    <td><div align="left"><span class="emphasis"><?php echo $inv_payee; ?></span></div></td>
    <td>&nbsp; </td>
    </tr>
    
  	<tr> 
    <td><span class="emphasis">Invoice Number:</span></td>
    <td><div align="left"><span class="emphasis"><?php echo $inv_num; ?></span></div></td>
    <td>&nbsp; </td>
    </tr>
    <tr <?php if(stristr($error2, "amount")){ echo "class='error_row'"; }else{ echo "class='amount_row'"; }?> > 
    <td ><span class="emphasis">Amount:</span></td>
    <td><div align="left"><span class="emphasis">$</span><input class="nice darkgreen" name="amount" type="text" id="amount2" value="<?php echo $inv_total; ?>" size="6" readonly>
      </div></td>
    <td>&nbsp; </td>
    </tr>
    <tr > 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "first_name")){ echo "class='error_row'"; }?>	>
		<td width="200">
			<span class="emphasis">First Name:</span>
		</td>
    <td width="148">
    	<input class="nice" name="first_name" type="text" id="first_name" value="<?php echo $fn; ?>" size="15">
    </td>
    <td width="auto"><span class="emphasis">M.I.:</span>&nbsp;<input class="nice" name="first_name" type="text" id="first_name" value="<?php echo $fn; ?>" size="2" maxlength="1"></td>
    </tr>
    <tr <?php if(stristr($error2, "last_name")){  echo "class='error_row'"; }?> >
    <td>
    	<span class="emphasis">Last Name:</span>
    </td>
    <td>
      <input class="nice" name="last_name" type="text" id="last_name" value="<?php echo $ln; ?>">
    </td>
    <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "address")){ echo "class='error_row'"; }?> >
    <td><span class="emphasis">Address:</span></td>
    <td>
    	<input class="nice" name="address" type="text" id="address" value="<?php echo $add; ?>" size="30">
    </td>
    <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "city")){  echo "class='error_row'"; }?> >
    <td>
    	<span class="emphasis">City:</span>
   	</td>
    <td>
    	<input class="nice" name="city" type="text" id="city" value="<?php echo $ci; ?>">
    </td>
    <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "state")){ echo "class='error_row'"; }?> >
    <td><span class="emphasis">State:</span></td>
    <td>
        <select class="nice" id="select3" name="state">
          <option value="<?php echo $user['4']; ?>"><?php echo $user['4']; ?></option>
          <option value="AK">AK</option>
          <option value="AL">AL</option>
          <option value="AR">AR</option>
          <option value="AZ">AZ</option>
          <option value="CA">CA</option>
          <option value="CO">CO</option>
          <option value="CT">CT</option>
          <option value="DC">DC</option>
          <option value="DE">DE</option>
          <option value="FL">FL</option>
          <option value="GA">GA</option>
          <option value="HI">HI</option>
          <option value="IA">IA</option>
          <option value="ID">ID</option>
          <option value="IL">IL</option>
          <option value="IN">IN</option>
          <option value="KS">KS</option>
          <option value="KY">KY</option>
          <option value="LA">LA</option>
          <option value="MA">MA</option>
          <option value="MD">MD</option>
          <option value="ME">ME</option>
          <option value="MI">MI</option>
          <option value="MN">MN</option>
          <option value="MO">MO</option>
          <option value="MS">MS</option>
          <option value="MT">MT</option>
          <option value="NC">NC</option>
          <option value="ND">ND</option>
          <option value="NE">NE</option>
          <option value="NH">NH</option>
          <option value="NJ">NJ</option>
          <option value="NM">NM</option>
          <option value="NV">NV</option>
          <option value="NY">NY</option>
          <option value="OH">OH</option>
          <option value="OK">OK</option>
          <option value="OR">OR</option>
          <option value="PA">PA</option>
          <option value="RI">RI</option>
          <option value="SC">SC</option>
          <option value="SD">SD</option>
          <option value="TN">TN</option>
          <option value="TX">TX</option>
          <option value="UT">UT</option>
          <option value="VA">VA</option>
          <option value="VT">VT</option>
          <option value="WA">WA</option>
          <option value="WI">WI</option>
          <option value="WV">WV</option>
          <option value="WY">WY</option>
          <option value="AA">AA</option>
          <option value="AE">AE</option>
          <option value="AP">AP</option>
          <option value="AS">AS</option>
          <option value="FM">FM</option>
          <option value="GU">GU</option>
          <option value="MH">MH</option>
          <option value="MP">MP</option>
          <option value="PR">PR</option>
          <option value="PW">PW</option>
          <option value="VI">VI</option>
        </select>
    </td>
    <td><span class="emphasis">Zip:</span></td><td><input class="nice" name="zip" type="text" id="zip" value="<?php echo $zip; ?>" size="5" maxlength="5"></td>
    </tr>
    <tr <?php if(stristr($error2, "zip")){ echo "class='error_row'"; }?> >
    <td><span class="emphasis">Zip:</span></td>
    <td>
        <input class="nice" name="zip" type="text" id="zip" value="<?php echo $zip; ?>" size="5" maxlength="5">
    </td>
    <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "phone")){  echo "class='error_row'"; }?> >
    <td><span class="emphasis">Phone:</span></td>
    <td>
        <input class="acnice" name="p1" type="text" id="p1" value="<?php echo $ph[0]; ?>" size="3" maxlength="3">
        - 
        <input class="nice" name="p2" type="text" id="p2" value="<?php echo $ph[1]; ?>" size="3" maxlength="3">
        - 
        <input class="nice" name="p3" type="text" id="p3" value="<?php echo $ph[2]; ?>" size="4" maxlength="4">
    </td>
    <td>&nbsp; </td>
    </tr>
    <tr <?php if(stristr($error2, "email")){  echo "class='error_row'"; }?> >
    <td><span class="emphasis">Email:</span></td>
    <td>
        <input class="nice" name="email" type="text" id="email" value="<?php echo $em; ?>">
   	</td>
    <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><span class="emphasis">Credit Card Type:</span></td>
      <td>
          <select class="nice" name="select">
            <option>Visa</option>
            <option>Master Card</option>
            <option>American Express</option>
            <option>Discover</option>
          </select>
    	</td>
      <td>&nbsp; </td>
    </tr>
    <tr <?php if(stristr($error2, "num")){ echo "class='error_row'"; }?> >
    <td><span class="emphasis">Credit Card Number:</span></td>
    <td><input class="nice" name="ccnum" size="20" type="text" id="ccnum" value="<?php echo $user['10']; ?>" maxlength="16"></td>
    <td>&nbsp;</td>
    </tr>
    <tr <?php if(stristr($error2, "exp")){ echo "class='error_row'"; }?> >
    <td><span class="emphasis">Expiration Date:</span></td>
    <td>
        <select class="nice" name="exp_month" id="select">
          <option value="<?php echo $user['11']; ?>"><?php echo $user['11']; ?></option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
        </select>
        <span class="emphasis">/</span>
        <select class="nice" name="exp_year" id="select2">
          <option value="<?php echo $user['12']; ?>"><?php echo $user['12']; ?></option>
          <option value="2007">2007</option>
          <option value="2008">2008</option>
          <option value="2009">2009</option>
          <option value="2010">2010</option>
          <option value="2011">2011</option>
          <option value="2012">2012</option>
          <option value="2013">2013</option>
          <option value="2014">2014</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
        </select>
    </td>
    <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="3"><span class="emphasis">Your Comment:</span></td>
    </tr>
    <tr>
    	<td><span class="emphasis">Comment Title:</span></td>
    	<td><input class="nice" name="comment_title" type="text" id="comment_title" value=""></td>
    	<td></td>
    </tr>
    <tr> 
      <td colspan="3">
      <textarea class="nice" name="comment_text" cols="50" rows="6"></textarea>
			<br /><br />
			<div class="optionbox2">
<span class="emphasis2">Comment Options</span> (optional)<br/>
			<input type="checkbox" class="nice" name="anonymous">I would like to comment Anonymously.<br />
			<input type="checkbox" class="nice" name="hide_location">I would like to hide my location in my comment.<br />
			<input type="checkbox" class="nice" name="hide_amount">I would like to hide the amount donated in my comment.<br />
			<input type="checkbox" class="nice" name="private">I would like to make my comment viewable only to the Benfund owner.<br />
			</div>
			</td>
    </tr>
  </table>
 -->
  <div align="center">

<?php 
while(isset($_SESSION['user']))
{ unset ($_SESSION['user']);
}
while(isset($_SESSION['error2']))
{ unset ($_SESSION['error2']);
}
?>    
<!--<input class="nice" name="reset" type="reset" id="reset" value="Reset">-->
	<input name="mid" type="hidden" value="<?php echo $mid;?>">
	<input type="image" src="https://www.benfund.com/images/elements/reset.gif" name="Reset" value="Submit">
	<input type="image" src="https://www.benfund.com/images/elements/submit.gif" name="Submit" value="Submit">
  </div>
</form>
</body>
</html>


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
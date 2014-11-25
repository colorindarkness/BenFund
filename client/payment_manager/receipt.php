<?php
session_start();
if (!isset($_SESSION[valid_client])){
     header('Location:../login.php');
}
$page_title = "Payment Receipt";
require ("../../includes/globals.php");
require($ROOT."/functions/common.php");

 require($ROOT."functions/valid_email.php");
 require($ROOT."functions/var_check.php");

$ccnum = $_POST['ccnum'];
$exp_month = $_POST['exp_month'];
$exp_year = $_POST['exp_year'];
$exp_date = "$exp_month-$exp_year";
$inv_id = $_POST['inv_id'];
$inv_payee = $_POST['inv_payee'];
$inv_payee_id = $_POST['inv_payee_id'];
$inv_num = $_POST['inv_num'];
$amount = $_POST['amount'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$phone = "($p1)$p2-$p3";
$email = $_POST['email'];       
$comment = $_POST['comment_text'];
$private = $_POST['private'];

$_SESSION['ccnum'] = $_POST['ccnum'];
$_SESSION['exp_month'] = $_POST['exp_month'];
$_SESSION['exp_year'] = $_POST['exp_year'];
$_SESSION['exp_date'] = "$exp_month-$exp_year";
$_SESSION['inv_id'] = $_POST['inv_id'];
$_SESSION['inv_payee'] = $_POST['inv_payee'];
$_SESSION['inv_payee_id'] = $_POST['inv_payee_id'];
$_SESSION['inv_num'] = $_POST['inv_num'];
$_SESSION['amount'] = $_POST['amount'];
$_SESSION['first_name'] = $_POST['first_name'];
$_SESSION['last_name'] = $_POST['last_name'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['state'] = $_POST['state'];
$_SESSION['zip'] = $_POST['zip'];
$_SESSION['p1'] = $_POST['p1'];
$_SESSION['p2'] = $_POST['p2'];
$_SESSION['p3'] = $_POST['p3'];
$_SESSION['phone'] = "($p1)$p2-$p3";
$_SESSION['email'] = $_POST['email'];

$ccnum = str_replace("-", "", $ccnum);
$ccnum = str_replace(" ", "", $ccnum);

$trccnum = substr($ccnum, -4);
$hideccnum = "XXXXXXXX".$trccnum;

$first_name = stripslashes("$first_name");
$last_name = stripslashes("$last_name");
$address = stripslashes("$address");
$city = stripslashes("$city");
				   
$_SESSION['user'] = $user_info;


$required = array  ("first_name" => "First Name",
 					"last_name" => "Last Name",
  					"address" => "Address",
					"city" => "City",
					"state" => "State",
					"zip" => "Zip",
					"email" => "E-mail",
					"ccnum" => "Credit Card Number",
					"exp_month" => "Expiration Month",
					"exp_year" => "Expiration Year",
					"amount" => "Amount");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Payment Receipt - BenFund</title>
<?php include ($ROOT."includes/head.php"); ?>
<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=800,left = 340,top = 112');");
}
</script>
</head>

<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."includes/header.php"); ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."includes/left.php"); ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top" valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."includes/pathway.php"); ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<div class="content_outer">
	<div class="content_inner">
<?php
$auth_net_login_id			= "ameri1";
$auth_net_tran_key			= "7st9A25Bp49C4xXW";
$auth_net_url				= "https://secure.authorize.net/gateway/transact.dll";

$authnet_values				= array
(
	"x_login"				=> $auth_net_login_id,
	"x_version"				=> "3.1",
	"x_delim_char"			=> "|",
	"x_delim_data"			=> "TRUE",
	"x_type"				=> "AUTH_CAPTURE",
	"x_method"				=> "CC",
 	"x_tran_key"			=> $auth_net_tran_key,
 	"x_relay_response"		=> "FALSE",
	"x_dupliacte_window"	=> "60",
	"x_card_num"			=> $ccnum,
	"x_exp_date"			=> $exp_date,
	"x_description"			=> "Benfund.com Payment",
	"x_amount"				=> $amount,
	"x_first_name"			=> $first_name,
	"x_last_name"			=> $last_name,
	"x_address"				=> $address,
	"x_city"				=> $city,
	"x_state"				=> $state,
	"x_zip"					=> $zip,
	"x_phone"				=> $phone,
	"x_email"				=> $email,
	"x_test_request"        => "TRUE",
	"x_country"				=> "US"
);

$fields = "";
foreach( $authnet_values as $key => $value ) $fields .= "$key=" . urlencode( $value ) . "&";

foreach($required as $field => $label)
{
  		if (!$_POST[$field])
  		{$err2 .="$field";}
}
		
		if (!check_email_address($email)) 
		{$err2 .="email";
		}
		
		if (!eregi('^[0-9]+$', $zip))
		{$err2 .="zip";
		}
		
		if(strlen($zip) < 5 )
		{$err2 .="zip";
		}
		
		if (!eregi('^[0-9]+$', "$p1$p2$p3"))
		{$err2 .="phone";
		}
		
		if(strlen("$p1$p2$p3") < 10 )
		{$err2 .="phone";
		}


		if ($err2) 
		{ $_SESSION['error2'] = $err2;   
		} 

foreach($required as $field => $label)
{
  		if (!$_POST[$field])
  		{$err .="$label is a required field <br>";}
}
		
		if (!check_email_address($email)) 
		{$err .="$email is not a valid email address <br>";
		}
		
		if (!eregi('^[0-9]+$', $zip))
		{$err .="Your zip code can only contain numbers <br>";
		}
		
		if(strlen($zip) < 5 )
		{$err .="Your zip code must be 5 digits <br>";
		}
		
		if (!eregi('^[0-9]+$', "$p1$p2$p3"))
		{$err .="Your phone number can only contain numbers <br>";
		}
		
		if(strlen("$p1$p2$p3") < 10 )
		{$err .="Your phone number must be 10 digits <br>";
		}

		if ($err) 
		{ $_SESSION['error'] = $err; ?> <script> location.href='https://www.benfund.com/client/payment_manager/payment.php'; </script>  
  <?php die();}

$ch = curl_init("https://secure.authorize.net/gateway/transact.dll"); 
curl_setopt($ch, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim( $fields, "& " )); // use HTTP POST to send form data
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response. ###
$resp = curl_exec($ch); //execute post and get results
curl_close ($ch);
$receipt = explode("|", $resp);

	if ($receipt[3] != "(TESTMODE) This transaction has been approved.")
		{$err .= "$receipt[3]";
		}
	if ($err)
		{ $_SESSION['error'] = $err; $_SESSION['error2'] = $err; ?> <script> history.back(); </script>  
  <?php die();}
	
	$timestamp = microtime(true);

$ip = $REMOTE_ADDR;
benfund_connect();
$query0 = "INSERT INTO payments (inv, to_id, from_id, amount, date, method, valid, ip) VALUES ('$inv_num', '$mid', '$cid', '$receipt[9]', '$timestamp', 'ccard', '1', '$ip')";
mysql_query($query0) or die(mysql_error());
$query1 = "SELECT id FROM payments WHERE to_id='$mid' AND date='$timestamp'";
$results1 = mysql_query($query1) or die(mysql_error());
$row1 = mysql_fetch_array($results1);
$payid = $row1['id'];
$query1 = "INSERT INTO payment_data (payment_id, first_name, last_name, address1, city, state, zip, method, cc_num, exp_date) VALUES ('$payid', '$receipt[13]', '$receipt[14]', '$receipt[16]', '$receipt[17]', '$receipt[18]', '$receipt[19]', 'ccard', '$ccnum2', '$exp_date')";
benfund_connect();
$query2 = "UPDATE invoice SET status = '1' WHERE id = '$inv_id'";
mysql_query($query2) or die(mysql_error());
mysql_query($query1) or die(mysql_error());
?>
<!--
//
///
//
/
//

/
/
/
-->
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="javascript:popUp('https://www.benfund.com/client/payment_manager/print_receipt.php?iid=<?php echo $iid; ?>')"><img src="https://www.benfund.com/images/elements/icons/print.png" border="0"/><br />Print Receipt</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/payment_manager.php"><img src="https://www.benfund.com/images/elements/icons/quote.png" border="0"/><br />Payment Center</a></td>
</tr></table>
</td></tr></table>
<p>
<span class="large bold">Thank You for making this payment.</span><p>
Below is you receipt of this payment, please consider printing it to keep for your records. A copy of this receipt has been sent to you email address as well.<p>
<?php include($ROOT.'client/payment_manager/receipt2.php'); ?>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="javascript:popUp('https://www.benfund.com/client/payment_manager/print_receipt.php?iid=<?php echo $iid; ?>')"><img src="https://www.benfund.com/images/elements/icons/print.png" border="0"/><br />Print Receipt</a></td>
</tr></table>
</td></tr></table>
<!--
<table width="auto" border="0" align="center" cellpadding="5">
  <tr> 
    <td colspan="2"><div align="center"> 
        <h1>Thank You</h1>
      </div></td>
  </tr>
  <tr> 
    <td colspan="2"><div align="center"><em>Please print this page for your records</em></div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="title_row"> 
    <td colspan="2"><center><span class="emphasis">Order Information</span></center></td>
  </tr>
  <tr bgcolor=""> 
    <td width="200"><span class="emphasis">Description:</span></td>
    <td><span class="attention2"><?php echo $receipt[8]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Amount:</span></td>
    <td><span class="attention2">$<?php echo "$receipt[9] (USD)"; ?></span></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="title_row"> 
    <td colspan="2"><center><span class="emphasis">Billing Information</span></center></td>
  </tr>
  <tr> 
    <td><span class="emphasis">First Name:</span></td>
    <td><span class="attention2"><?php echo $receipt[13]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Last Name:</span></td>
    <td><span class="attention2"><?php echo $receipt[14]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Address:</span></td>
    <td><span class="attention2"><?php echo $receipt[16]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">City:</span></td>
    <td><span class="attention2"><?php echo $receipt[17]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">State:</span></td>
    <td><span class="attention2"><?php echo $receipt[18]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Zip:</span></td>
    <td><span class="attention2"><?php echo $receipt[19]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Phone:</span></td>
    <td><span class="attention2"><?php echo $receipt[21]; ?></span></td>
  </tr>
  <tr>      
    <td><span class="emphasis">Email:</span></td>
    <td><span class="attention2"><?php echo $receipt[23]; ?></span></td>
  </tr>
  <tr>      
    <td colspan="2"><span class="emphasis">Your Comment:</span></td>
  </tr>
  <tr>
  	<td  colspan="2"><span class="attention2"><?php echo $comment; ?></span></td>
  </tr>
</table>
-->
	</div>
	</div>
	</td>
  </tr>
  <!--MAINBODY END-->
  <!--FOOTER START-->
  <tr>
    <td colspan="2">
<?php include ($ROOT."includes/footer.php"); ?>
	</td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
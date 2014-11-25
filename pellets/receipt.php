<?php session_start(); ?>
<html>
<?php
 require("../functions/common.php");
 require("../functions/valid_email.php");
 require("../functions/var_check.php");

$ccnum = $_POST['ccnum'];
$exp_month = $_POST['exp_month'];
$exp_year = $_POST['exp_year'];
$exp_date = "$exp_month-$exp_year";
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
$phone2 = "$p1$p2$p3";
$email = $_POST['email'];
$quantity = $_POST['quantity'];
$subtotal = $_POST['subtotal'];
$tax = $_POST['tax'];
$total = $_POST['total'];

$ccnum = str_replace("-", "", $ccnum);
$ccnum = str_replace(" ", "", $ccnum);
$start = substr($ccnum, 0, 1);
$ccnum2 = substr($ccnum, -4, 4);

if ($start == 3)
	{$type = "American Express";}

if ($start == 4)
	{$type = "Visa";}

if ($start == 5)
	{$type = "Master Card";}		

if ($start == 6)
	{$type = "Discover Card";}
	
$first_name = stripslashes("$first_name");
$last_name = stripslashes("$last_name");
$address = stripslashes("$address");
$city = stripslashes("$city");

$user_info = array ($first_name,
					$last_name,
					$address,
					$city,
					$state,
					$zip,
					$p1,
					$p2,
					$p3,
					$email,
					$ccnum,
					$exp_month,
					$exp_year,
					$quantity,
					$subtotal,
					$tax,
					$total
				   );
				   
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
					"quantity" => "Quantity");
?>

<head>
<title>Ameri-Brand Products Receipt</title>
</head>


<body>
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
	"x_description"			=> "North Country Premium Grade Wood Pellets (includes Sales Tax)",
	"x_amount"				=> $total,
	"x_first_name"			=> $first_name,
	"x_last_name"			=> $last_name,
	"x_address"				=> $address,
	"x_city"				=> $city,
	"x_state"				=> $state,
	"x_zip"					=> $zip,
	"x_phone"				=> $phone,
	"x_email"				=> $email,
	"x_test_request"        => "FALSE",
	"x_country"				=> "US",
	"x_line_item"			=> "NCWP<|>Wood Pellets<|>North Country Premium Grade Wood Pellets from Canada and the United States<|>$quantity<|>399.50<|>Y");

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
		{$err .="Your zip code can only contain numbers <Br>";
		}
		
		if(strlen($zip) < 5 )
		{$err .="Your zip code must be 5 digits <br>";
		}
		
		if (!eregi('^[0-9]+$', "$p1$p2$p3"))
		{$err .="Your phone number can only contain numbers <Br>";
		}
		
		if(strlen("$p1$p2$p3") < 10 )
		{$err .="Your phone number must be 10 digits <br>";
		}

		if ($err) 
		{ $_SESSION['error'] = $err; unset ($_POST); ?>
<div align="center">
  <script>location.href = "https://www.benfund.com/pellets/payment.php"; </script>
  <?php die();}

$ch = curl_init("https://secure.authorize.net/gateway/transact.dll"); 
curl_setopt($ch, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim( $fields, "& " )); // use HTTP POST to send form data
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response. ###
$resp = curl_exec($ch); //execute post and get results
curl_close ($ch);

$receipt = explode("|", $resp);

	if ($receipt[3] != "This transaction has been approved.")
		{$err .= "$receipt[3]";
		}
	if ($err)
		{ $_SESSION['error'] = $err; $_SESSION['error2'] = $err; unset ($_POST); ?>
  <script>location.href = "https://www.benfund.com/pellets/payment.php"; </script>
  <?php die();}

$receipt[13] = addslashes("$receipt[13]");
$receipt[14] = addslashes("$receipt[14]");
$receipt[16] = addslashes("$receipt[16]");
$receipt[17] = addslashes("$receipt[17]");
$receipt[18] = addslashes("$receipt[18]");
$receipt[19] = addslashes("$receipt[19]");
$receipt[23] = addslashes("$receipt[23]");

pellets_connect();
$query = "INSERT INTO sale (first_name, last_name, address, city, state, zip, phone, email, cc_type, cc_num, subtotal, tax, total, q) VALUES ('$receipt[13]', '$receipt[14]', '$receipt[16]', '$receipt[17]', '$receipt[18]', '$receipt[19]', '$phone2', '$receipt[23]', '$type', '$ccnum2', '$subtotal', '$tax', '$total', '$quantity')";	
mysql_query($query) or die(mysql_error());


$receipt[13] = stripslashes("$receipt[13]");
$receipt[14] = stripslashes("$receipt[14]");
$receipt[16] = stripslashes("$receipt[16]");
$receipt[17] = stripslashes("$receipt[17]");
$receipt[18] = stripslashes("$receipt[18]");
$receipt[19] = stripslashes("$receipt[19]");
$receipt[23] = stripslashes("$receipt[23]");
$tax = number_format($tax, 2);
$total = number_format($total, 2);
$subtotal = number_format($subtotal, 2);
  ?>
  <img src="site-logo-index.gif" width="411" height="32"> </div>
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
  <tr> 
    <td colspan="2" bgcolor="#CCCCCC"><div align="center">----- Order Information 
        -----</div></td>
  </tr>
  <tr> 
    <td>Description:</td>
    <td width="250"><?php echo $receipt[8]; ?></td>
  </tr>
  <tr> 
    <td>Quantity:</td>
    <td><?php if ($quantity > 1){ echo "$quantity tons";} else {echo "$quantity ton";} ?></td>
  </tr>
  <tr> 
    <td>Subtotal:</td>
    <td>$<?php echo "$subtotal"; ?></td>
  </tr>
  <tr> 
    <td>Tax:</td>
    <td>$<?php echo "$tax"; ?></td>
  </tr>
  <tr> 
    <td colspan="2"><div align="center"><strong>Total: $<?php echo "$receipt[9] (USD)"; ?></strong></div></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="2" bgcolor="#CCCCCC"> <div align="center">----- Billing Information 
        -----</div></td>
  </tr>
  <tr> 
    <td>Credit Card Type:</td>
    <td><?php echo "$type"; ?></td>
  </tr>
  <tr> 
    <td>Credit Card Ending In:</td>
    <td><?php echo "$ccnum2"; ?></td>
  </tr>
  <tr> 
    <td>First Name:</td>
    <td><?php echo $receipt[13]; ?></td>
  </tr>
  <tr> 
    <td>Last Name:</td>
    <td><?php echo $receipt[14]; ?></td>
  </tr>
  <tr> 
    <td>Address:</td>
    <td><?php echo $receipt[16]; ?></td>
  </tr>
  <tr> 
    <td>City:</td>
    <td><?php echo $receipt[17]; ?></td>
  </tr>
  <tr> 
    <td>State:</td>
    <td><?php echo $receipt[18]; ?></td>
  </tr>
  <tr> 
    <td>Zip:</td>
    <td><?php echo $receipt[19]; ?></td>
  </tr>
  <tr> 
    <td>Phone:</td>
    <td><?php echo $receipt[21]; ?></td>
  </tr>
  <tr> 
    <td>Email:</td>
    <td><?php echo $receipt[23]; ?></td>
  </tr>
</table>
<font size="-1"><br>
</font>
<div align="center" ><font size="-1"><em>Please pick up your order within 2 business 
  days after availability notification to avoid storage charges.<br>
  You must present the credit card used in the transaction at time of pickup for 
  verification. </em></font></div>
<p>&nbsp;</p>
</body>
<script language="JavaScript">
window.print();
</script>
</html>
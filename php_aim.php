<html>
<?php
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
$email = $_POST['email'];

$ccnum = str_replace("-", "", $ccnum);
$ccnum = str_replace(" ", "", $ccnum);

$first_name = stripslashes("$first_name");
$last_name = stripslashes("$last_name");
$address = stripslashes("$address");
$city = stripslashes("$city");


?>
<head>
<title>Authorize.net Test</title>
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


$ch = curl_init("https://secure.authorize.net/gateway/transact.dll"); 
curl_setopt($ch, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim( $fields, "& " )); // use HTTP POST to send form data
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response. ###
$resp = curl_exec($ch); //execute post and get results
curl_close ($ch);

echo $resp;

$alert = explode("|", $resp);
if ($alert[3] != "(TESTMODE) This transaction has been approved.")
{ ?>
<script language="JavaScript">history.back(); alert("<?php echo $alert[3]; ?>")</script>
<?php
}


?>


</body>
</html>
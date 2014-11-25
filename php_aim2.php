<html>
<?php
$ccnum = $_POST['ccnum'];
$exp_date = $_POST['exp_date'];
$ammount = $_POST['ammount'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$email = $_POST['email'];
?>
<head>
<title>Authorize.net Test</title>
</head>


<body>
<?php


$DEBUGGING					= 1;				# Display additional information to track down problems
$TESTING					= 1;				# Set the testing flag so that transactions are not live
$ERROR_RETRIES				= 2;				# Number of transactions to post if soft errors occur

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
	"x_amount"				=> $ammount,
	"x_first_name"			=> $first_name,
	"x_last_name"			=> $last_name,
	"x_address"				=> $address,
	"x_city"				=> $city,
	"x_state"				=> $state,
	"x_zip"					=> $zip,
	"x_phone"				=> $phone,
	"x_email"				=> $email,
	"x_customer_ip"			=> $_SERVER['REMOTE_ADDR'],
	"x_test_request"        => "TRUE",
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


$text = $resp;


$tok = strtok($text,"|");
while(!($tok === FALSE)){
//while ($tok) {
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$tok."<br>";
    $tok = strtok("|");
}



$text = $resp;
$h = substr_count($text, "|");
$h++;




	for($j=1; $j <= $h; $j++){

	$p = strpos($text, "|");

	if ($p === false) { // note: three equal signs

		echo "<tr>";
		echo "<td class=\"e\">";

			//  x_delim_char is obviously not found in the last go-around

			if($j>=69){

				echo "Merchant-defined (".$j."): ";
				echo ": ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $text;
				echo "<br>";

			} else {

				echo $j;
				echo ": ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $text;
				echo "<br>";

			}


		echo "</td>";
		echo "</tr>";

	}else{

		$p++;

		//  We found the x_delim_char and accounted for it . . . now do something with it

		//  get one portion of the response at a time
		$pstr = substr($text, 0, $p);

		//  this prepares the text and returns one value of the submitted
		//  and processed name/value pairs at a time
		//  for AIM-specific interpretations of the responses
		//  please consult the AIM Guide and look up
		//  the section called Gateway Response API
		$pstr_trimmed = substr($pstr, 0, -1); // removes "|" at the end

		if($pstr_trimmed==""){
			$pstr_trimmed="NO VALUE RETURNED";
		}


		echo "<tr>";
		echo "<td class=\"e\">";

		switch($j){

			case 1:
				echo "Response Code: ";

				echo "</td>";
				echo "<td class=\"v\">";

				$fval="";
				if($pstr_trimmed=="1"){
					$fval="Approved";
				}elseif($pstr_trimmed=="2"){
					$fval="Declined";
				}elseif($pstr_trimmed=="3"){
					$fval="Error";
				}

				echo $fval;
				echo "<br>";
				break;

			case 2:
				echo "Response Subcode: ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 3:
				echo "Response Reason Code: ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 4:
				echo "Response Reason Text: ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 5:
				echo "Approval Code: ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 6:
				echo "AVS Result Code: ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 7:
				echo "Transaction ID: ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 8:
				echo "Invoice Number (x_invoice_num): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 9:
				echo "Description (x_description): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 10:
				echo "Amount (x_amount): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 11:
				echo "Method (x_method): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 12:
				echo "Transaction Type (x_type): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 13:
				echo "Customer ID (x_cust_id): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 14:
				echo "Cardholder First Name (x_first_name): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 15:
				echo "Cardholder Last Name (x_last_name): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 16:
				echo "Company (x_company): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 17:
				echo "Billing Address (x_address): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 18:
				echo "City (x_city): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 19:
				echo "State (x_state): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 20:
				echo "ZIP (x_zip): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 21:
				echo "Country (x_country): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 22:
				echo "Phone (x_phone): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 23:
				echo "Fax (x_fax): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 24:
				echo "E-Mail Address (x_email): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 25:
				echo "Ship to First Name (x_ship_to_first_name): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 26:
				echo "Ship to Last Name (x_ship_to_last_name): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 27:
				echo "Ship to Company (x_ship_to_company): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 28:
				echo "Ship to Address (x_ship_to_address): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 29:
				echo "Ship to City (x_ship_to_city): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 30:
				echo "Ship to State (x_ship_to_state): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 31:
				echo "Ship to ZIP (x_ship_to_zip): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 32:
				echo "Ship to Country (x_ship_to_country): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 33:
				echo "Tax Amount (x_tax): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 34:
				echo "Duty Amount (x_duty): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 35:
				echo "Freight Amount (x_freight): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 36:
				echo "Tax Exempt Flag (x_tax_exempt): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 37:
				echo "PO Number (x_po_num): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 38:
				echo "MD5 Hash: ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			case 39:
				echo "Card Code Response: ";

				echo "</td>";
				echo "<td class=\"v\">";

				$fval="";
				if($pstr_trimmed=="M"){
					$fval="M = Match";
				}elseif($pstr_trimmed=="N"){
					$fval="N = No Match";
				}elseif($pstr_trimmed=="P"){
					$fval="P = Not Processed";
				}elseif($pstr_trimmed=="S"){
					$fval="S = Should have been present";
				}elseif($pstr_trimmed=="U"){
					$fval="U = Issuer unable to process request";
				}else{
					$fval="NO VALUE RETURNED";
				}

				echo $fval;
				echo "<br>";
				break;

			case 40:
			case 41:
			case 42:
			case 43:
			case 44:
			case 45:
			case 46:
			case 47:
			case 48:
			case 49:
			case 50:
			case 51:
			case 52:
			case 53:
			case 54:
			case 55:
			case 55:
			case 56:
			case 57:
			case 58:
			case 59:
			case 60:
			case 61:
			case 62:
			case 63:
			case 64:
			case 65:
			case 66:
			case 67:
			case 68:
				echo "Reserved (".$j."): ";

				echo "</td>";
				echo "<td class=\"v\">";

				echo $pstr_trimmed;
				echo "<br>";
				break;

			default:

				if($j>=69){

					echo "Merchant-defined (".$j."): ";
					echo ": ";

					echo "</td>";
					echo "<td class=\"v\">";

					echo $pstr_trimmed;
					echo "<br>";

				} else {

					echo $j;
					echo ": ";

					echo "</td>";
					echo "<td class=\"v\">";

					echo $pstr_trimmed;
					echo "<br>";

				}

				break;

		}

		echo "</td>";
		echo "</tr>";

		// remove the part that we identified and work with the rest of the string
		$text = substr($text, $p);

	}

}

echo "</table>";

echo "<br>";




echo "<hr>";
///////////////////////////////////////////////////////////


echo "<b>04: Done.</b><br>";



?>


		</td>
	</tr>
</table>

</div>

</body></html>
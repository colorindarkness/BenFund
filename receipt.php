<?php
session_start();
require("D:\benfund.com\includes\globals.php");
$page_title = $mtitle.''. $ptitle;
require($ROOT."/functions/common.php");
$mid = $_POST['mid'];

benfund_connect();
$query0 = "SELECT m_type FROM merchant WHERE id = '$mid'";
$results0 = mysql_query($query0) or die(mysql_error());
$row0 = mysql_fetch_row($results0) or die(mysql_error());

$m_type = $row0[0];

benfund_connect();
$query = "SELECT title, meta, header, menu, info, footer, date FROM mtemplates WHERE mid = '$mid'";
$results = mysql_query($query) or die(mysql_error());
if (!mysql_num_rows($results)){
	header( 'Location: https://www.benfund.com/404.php' ) ;
}
$row = mysql_fetch_row($results) or die(mysql_error());

$mtitle = $row[0];
$meta = $row[1];
$header = $row[2];
$menu = $row[3];
$info = $row[4];
$footer = $row[5];
$date = $row[6];

//benfund_connect();
//$query2 = "SELECT mid, pid, title, content FROM mpages WHERE mid = '$mid' AND pid = '$pid'";
//$results2 = mysql_query($query2) or die(mysql_error());
//$row2 = mysql_fetch_row($results2) or die(mysql_error());
//
//$mid = $row2[0];
//$pid = $row2[1];
//$ptitle = $row2[2];
//$content = $row2[3];

 require("functions/valid_email.php");
 require("functions/var_check.php");

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
$comment = $_POST['comment_text'];
$private = $_POST['private'];

$ccnum = str_replace("-", "", $ccnum);
$ccnum = str_replace(" ", "", $ccnum);

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
					$amount
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
					"amount" => "Amount");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $mtitle; ?> - <?php echo $ptitle; ?></title>
<?php include ($ROOT."includes/head.php"); ?>
</head>

<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."includes/mheader.php"); ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."includes/mleft.php"); ?>
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
		{ $_SESSION['error'] = $err; ?> <script> history.back(); </script>  
  <?php die();}

$ch = curl_init("https://secure.authorize.net/gateway/transact.dll"); 
curl_setopt($ch, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim( $fields, "& " )); // use HTTP POST to send form data
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response. ###
$resp = curl_exec($ch); //execute post and get results
curl_close ($ch);

$reciept = explode("|", $resp);

	if ($reciept[3] != "(TESTMODE) This transaction has been approved.")
		{$err .= "$reciept[3]";
		}
	if ($err)
		{ $_SESSION['error'] = $err; $_SESSION['error2'] = $err; ?> <script> history.back(); </script>  
  <?php die();}
	
	$timestamp = microtime(true);

$ip = $REMOTE_ADDR;
benfund_connect();

if (!empty($cid)){
$query0 = "INSERT INTO payments (mid, amount, date, method, valid, ip) VALUES ('$mid', '$receipt[9]', '$timestamp', 'ccard', '1', '$ip')";
mysql_query($query0) or die(mysql_error());
$query1 = "SELECT id FROM payments WHERE mid='$mid' AND date='$timestamp'";
$results1 = mysql_query($query1) or die(mysql_error());
$row1 = mysql_fetch_array($results1);
$id = $row1['id'];
$query1 = "INSERT INTO payment_data (payment_id, first_name, last_name, address1, city, state, zip, method, cc_num, exp_date) VALUES ('$id', '$receipt[13]', '$receipt[14]', '$receipt[16]', '$receipt[17]', '$receipt[18]', '$receipt[19]', 'ccard', '$ccnum2', '$exp_date')";		
mysql_query($query1) or die(mysql_error());
}else{
$query0 = "INSERT INTO payments (mid, cid, amount, date, method, valid, ip) VALUES ('$mid', '$cid', '$receipt[9]', '$timestamp', 'ccard', '1', '$ip')";
mysql_query($query0) or die(mysql_error());
$query1 = "SELECT id FROM payments WHERE mid='$mid' AND date='$timestamp'";
$results1 = mysql_query($query1) or die(mysql_error());
$row1 = mysql_fetch_array($results1);
$id = $row1['id'];
$query1 = "INSERT INTO payment_data (payment_id, first_name, last_name, address1, city, state, zip, method, cc_num, exp_date) VALUES ('$id', '$receipt[13]', '$receipt[14]', '$receipt[16]', '$receipt[17]', '$receipt[18]', '$receipt[19]', 'ccard', '$ccnum2', '$exp_date')";		
mysql_query($query1) or die(mysql_error());
}
include($ROOT.'functions/add_comment.php');
  ?>		
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
    <td><span class="attention2"><?php echo $reciept[8]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Amount:</span></td>
    <td><span class="attention2">$<?php echo "$reciept[9] (USD)"; ?></span></td>
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
    <td><span class="attention2"><?php echo $reciept[13]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Last Name:</span></td>
    <td><span class="attention2"><?php echo $reciept[14]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Address:</span></td>
    <td><span class="attention2"><?php echo $reciept[16]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">City:</span></td>
    <td><span class="attention2"><?php echo $reciept[17]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">State:</span></td>
    <td><span class="attention2"><?php echo $reciept[18]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Zip:</span></td>
    <td><span class="attention2"><?php echo $reciept[19]; ?></span></td>
  </tr>
  <tr> 
    <td><span class="emphasis">Phone:</span></td>
    <td><span class="attention2"><?php echo $reciept[21]; ?></span></td>
  </tr>
  <tr>      
    <td><span class="emphasis">Email:</span></td>
    <td><span class="attention2"><?php echo $reciept[23]; ?></span></td>
  </tr>
  <tr>      
    <td colspan="2"><span class="emphasis">Your Comment:</span></td>
  </tr>
  <tr>
  	<td  colspan="2"><span class="attention2"><?php echo $comment; ?></span></td>
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
<?php include ($ROOT."includes/mfooter.php"); ?>
	</td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
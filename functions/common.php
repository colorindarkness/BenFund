<?php
//include_once($ROOT."functions/class.breadcrumb.inc.php");

//MAKE DATETIME STAMP
function datetime(){
	return date("ymdHis");
}

//CONNECT TO DB
function benfund_connect() {
	global $mid;
	mysql_connect("localhost", "benfund", "pr0m3th3u$") or die(mysql_error());
	mysql_select_db("benfund") or die(mysql_error());
}

//DISPLAYS TIME ACCORDING TO USERS TIME ZONE
function chronos($time, $format) {
	benfund_connect();
		if (($m_type = 1) OR ($m_type = 2)){
			$chrono_query = "SELECT settings FROM merchant WHERE id = '$mid' LIMIT 1";
		}elseif($m_type = 3){
			$chrono_query = "SELECT settings FROM client WHERE cid = '$cid' AND mid = '$mid' LIMIT 1";
		}
		$chrono_result = mysql_query($chrono_query) or die(mysql_error());
		$chrono_row = mysql_fetch_row($chrono_result);
		$settings = $chrono_row[0];
		$settings_segment = explode("~", $settings);
		$chronology = $settings_segment[0];
		
		//make current server time                          
		//$time =  date("ymdHis");
		
		$time_seg = str_split($time, 2);
		//$time_seg = explode("-", $time);
		$y = $time_seg[0]; //year
		$m = $time_seg[1]; //month
		$d = $time_seg[2]; //day
		$H = $time_seg[3]; //hour
		$i = $time_seg[4]; //minute
		$s = $time_seg[5]; //second
		
		//subtract hours according to users time zone setting
		switch ($chronology) {
		case 0:
				//Pacific Standard
		    $subtract = 20;
		    break;
		case 1:
				//Mountain
		    $subtract = 19;
		    break;
		case 2:
				//Central
		    $subtract = 18;
		    break;
		case 3:
				//Eastern
		    $subtract = 17;
		    break;
		case 4:
				//Hawaii
		    $subtract = 22;
		    break;	
		case 5:
				//Alaska
		    $subtract = 21;
		    break;
		default:
		    $subtract = 20;
		}
		
		$nH = $H -$subtract;
		
		$timestamp = mktime($nH , $i, $s, $m, $d, $y);
		
		//display date format
		switch ($format) {
		case 0:
				//date
		    $time_format = "m/d/y";
		    break;
		case 1:
				//time
		    $time_format = "H:i:s";
		    break;
		case 2:
				//date and time
		    $time_format = "m/d/$y H:i";
		    break;
		case 3:
				//date and time with seconds
		    $time_format = "m/d/y H:i:s";
		    break;
		case 4:
				//full textual
		    $time_format = "l F jS Y, g:i a";
		    break;
		default:
		    $time_format = "m-d-y-H-i-s";
		}
	$local_user_time = date($time_format, $timestamp);
	return $local_user_time;
}

//DISPLAY DATES IN THE FUTURE OR PAST ACCORDING TO USERS TIME ZONE SETTING
function future_past($func, $var) {
	//first get users time
	benfund_connect();
		if (($m_type = 1) OR ($m_type = 2)){
			$chrono_query = "SELECT settings FROM merchant WHERE id = '$mid' LIMIT 1";
		}elseif($m_type = 3){
			$chrono_query = "SELECT settings FROM client WHERE cid = '$cid' AND mid = '$mid' LIMIT 1";
		}
		$chrono_result = mysql_query($chrono_query) or die(mysql_error());
		$chrono_row = mysql_fetch_row($chrono_result);
		$settings = $chrono_row[0];
		$settings_segment = explode("~", $settings);
		$chronology = $settings_segment[0];
		
		//make current server time                          
		$time_now =  date("ymdHis");                          
		
		$time_seg = str_split($time_now, 2);
		//$time_seg = explode("-", $time_now);
		$m = $time_seg[0]; //month
		$d = $time_seg[1]; //day   
		$y = $time_seg[2]; //year  
		$H = $time_seg[3]; //hour  
		$i = $time_seg[4]; //minute
		$s = $time_seg[5]; //second
		
		//get user time offset
		switch ($chronology) {
		case 0:
				//pacific standard
		    $subtract = 20;
		    break;
		case 1:
				//mountain
		    $subtract = 19;
		    break;
		case 2:
				//central
		    $subtract = 18;
		    break;
		case 3:
				//eastern
		    $subtract = 17;
		    break;
		case 4:
				//hawaii
		    $subtract = 22;
		    break;	
		case 5:
				//alaska
		    $subtract = 21;
		    break;
		default:
		    $subtract = 20;
		}
		
		//apply user time offest and time variable
			switch ($func) {
		case '-':
				//Subtract Var
				$nHi = $H -$subtract;
		    $nH = $nHi - $var;
		    break;
		case '+':
				//Add Var
		    $nHi = $H -$subtract;
		    $nH = $nHi + $var;
		    break;
		  }
		
		//$nH = $H -$subtract ;
		
	//$timestamp = mktime($nH , $i, $s, $m, $d, $y);
	$timestamp = $nH.', '.$i.', '.$s.', '.$m.', '.$d.', '.$y;
	$future_past = date("ymdHis", mktime($timestamp));
	return $future_past;
}

function pellets_connect(){
	mysql_connect("localhost", "benfund", "pr0m3th3u$") or die(mysql_error());
	mysql_select_db("pellets") or die(mysql_error());
}

//Create a random string
function randomstring($length)
{
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $string  = $pattern{rand(0,62)};
    for($i=1;$i<$length;$i++)
    {
        $string .= $pattern{rand(0,62)};
    }
    return $string;
}
function chaos($length)
{
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $string  = $pattern{rand(0,62)};
    for($i=1;$i<$length;$i++)
    {
        $string .= $pattern{rand(0,62)};
    }
    return $string;
}

function html_email($message_body)
{
	$html_body = '<table width="600"" border="0" align="center"><tr><td><font color="#484848" face="Georgia, Garamond, Times New Roman, Serif" Size="40">BenFund</font><br><i><b><font color="#484848" size="3" >"Funding Financial Objectives"</font></b></i></td></tr><tr><td bgcolor="#DEEBB4">&nbsp;</td></tr><tr><td><p>'.$message_body.'<p><hr><font color="#484848" face="Arial, Geneva, sans-serif" size="1" ><b>BenFund will NEVER ask you for your Password and/or Security Question or Answer.<p>Learn how you can protect yourself from spoof (fake) emails at:<br>http://www.benfund.com/help/fraud<p>See our Privacy Policy and User Agreement if you have questions about BenFunds information security policies.<br>Privacy Policy: http://www.benfund.com//help/policies/privacy-policy.php<br>User Agreement: http://www.benfund.com//help/policies/user-agreement.php<p></td></tr><tr><td bgcolor="#E9AE36"><center><font color="#FFFFFF" face="Arial, Geneva, sans-serif" size="1" >© Copyright 2007-2008 BenFund Payment Systems. All Rights Reserved.<br>4619 Olive Hwy Oroville CA 95966<br>1-800-982-6966<br>Designated trademarks and brands are the property of their respective owners.<br>BenFund and the BenFund logo are registered trademarks or trademarks of BenFund Payment Systems.</center></font></td></tr></table>';
return $html_body;
}

function text_email($message_body)
{
    $text_body = 'BenFund
    "Funding Financial Objectives"
    
    '.$message_body.'
    
Learn how you can protect yourself from spoof (fake) emails at: 
http://www.benfund.com/help/fraud

See our Privacy Policy and User Agreement if you have questions about BenFunds information security policies.
Privacy Policy: http://www.benfund.com//help/policies/privacy-policy.php
User Agreement: http://www.benfund.com//help/policies/user-agreement.php

© Copyright 2007-2008 BenFund Payment Systems. All Rights Reserved.
4619 Olive Hwy Oroville CA 95966
1-800-982-6966 
Designated trademarks and brands are the property of their respective owners.
BenFund and the BenFund logo are registered trademarks or trademarks of eBay, Inc.';
    return $text_body;
}

function m_menu1()
{
?>
	<ul id="nav">
		<li><a href="https://www.benfund.com/acct/index.php">Home</a></li>
		<li><a href="#">Data</a>
			<ul>
				<li><a href="https://www.benfund.com/acct/finance_manager.php">Finance Manager</a></li>
				<li><a href="https://www.benfund.com/acct/client_manager.php" class="daddy">Client Manager</a>
					<ul>
							<li><a href="https://www.benfund.com/acct/create_client.php">Create Client</a></li>
					</ul>
				</li>
				<li><a href="#">Make Payment</a></li>
				<li><a href="#">Bluefishes</a></li>
				<li><a href="#">Tigerfishes</a></li>
			</ul>
		</li>
	<li><a href="#">Account</a>
		<ul>
			<li><a href="#" class="daddy">Message Center</a>
					<ul>
						<li><a href="https://www.benfund.com/acct/message_center.php?view=compose">Compose Message</a></li>
						<li><a href="https://www.benfund.com/acct/message_center.php">Inbox</a></li>
						<li><a href="https://www.benfund.com/acct/message_center.php?view=outbox">Sent Messages</a></li>
					</ul>
			</li>
			<li><a href="https://www.benfund.com/acct/page_manager.php">Page Manager</a></li>
			<li><a href="#" class="daddy">Flyer Manager</a>
					<ul>
						<li><a href="https://www.benfund.com/acct/flyer_manager_simple.php">Simple Editor</a></li>
						<li><a href="https://www.benfund.com/acct/flyer_manager_adv.php">Advanced Editor</a></li>
					</ul>
			</li>
			<li><a href="#" class="daddy">Template Manager</a>
					<ul>
						<li><a href="https://www.benfund.com/acct/template_manager_simple.php">Simple Editor</a></li>
						<li><a href="https://www.benfund.com/acct/template_manager_adv.php">Advanced Editor</a></li>
					</ul>
			</li>
			<li><a href="https://www.benfund.com/acct/edit_acct.php">Acct Information</a></li>
		</ul>
	</li>
	<li><a href="#">Help</a></li>
	<li><a href="https://www.benfund.com/login.php">Log out</a></li>
</ul>
<?php
}

function m_menu2()
{
?>
	<ul id="nav">
		<li><a href="https://www.benfund.com/acct/index.php">Home</a></li>
		<li><a href="#">Data</a>
			<ul>
				<li><a href="https://www.benfund.com/acct/finance_manager.php">Finance Manager</a></li>
				<li><a href="https://www.benfund.com/acct/client_manager.php" class="daddy">Client Manager</a>
					<ul>
							<li><a href="https://www.benfund.com/acct/create_client.php">Create Client</a></li>
					</ul>
				</li>
				<li><a href="#">Make Payment</a></li>
				<li><a href="#">Bluefishes</a></li>
				<li><a href="#">Tigerfishes</a></li>
			</ul>
		</li>
	<li><a href="#">Account</a>
		<ul>
			<li><a href="#" class="daddy">Message Center</a>
					<ul>
						<li><a href="https://www.benfund.com/acct/message_center.php?view=compose">Compose Message</a></li>
						<li><a href="https://www.benfund.com/acct/message_center.php">Inbox</a></li>
						<li><a href="https://www.benfund.com/acct/message_center.php?view=outbox">Sent Messages</a></li>
					</ul>
			</li>
			<li><a href="https://www.benfund.com/acct/page_manager.php">Page Manager</a></li>
			<li><a href="#" class="daddy">Flyer Manager</a>
					<ul>
						<li><a href="https://www.benfund.com/acct/flyer_manager_simple.php">Simple Editor</a></li>
						<li><a href="https://www.benfund.com/acct/flyer_manager_adv.php">Advanced Editor</a></li>
					</ul>
			</li>
			<li><a href="#" class="daddy">Template Manager</a>
					<ul>
						<li><a href="https://www.benfund.com/acct/template_manager_simple.php">Simple Editor</a></li>
						<li><a href="https://www.benfund.com/acct/template_manager_adv.php">Advanced Editor</a></li>
					</ul>
			</li>
			<li><a href="https://www.benfund.com/acct/edit_acct.php">Acct Information</a></li>
		</ul>
	</li>
	<li><a href="#">Help</a></li>
	<li><a href="https://www.benfund.com/login.php">Log out</a></li>
</ul>
<?php
}

function m_menu3()
{
?>
	<ul id="nav">
		<li><a href="https://www.benfund.com/client/index.php">Home</a></li>
		<li><a href="#">Data</a>
			<ul>
				<li><a href="https://www.benfund.com/client/finance_manager.php">Finance Manager</a></li>
				<li><a href="https://www.benfund.com/client/client_manager.php" class="daddy">Client Manager</a>
					<ul>
							<li><a href="https://www.benfund.com/client/create_client.php">Create Client</a></li>
					</ul>
				</li>
				<li><a href="#">Make Payment</a></li>
				<li><a href="#">Bluefishes</a></li>
				<li><a href="#">Tigerfishes</a></li>
			</ul>
		</li>
	<li><a href="#">Account</a>
		<ul>
			<li><a href="#" class="daddy">Message Center</a>
					<ul>
						<li><a href="https://www.benfund.com/client/message_center.php?view=compose">Compose Message</a></li>
						<li><a href="https://www.benfund.com/client/message_center.php">Inbox</a></li>
						<li><a href="https://www.benfund.com/client/message_center.php?view=outbox">Sent Messages</a></li>
					</ul>
			</li>
			<li><a href="https://www.benfund.com/client/page_manager.php">Page Manager</a></li>
			<li><a href="#" class="daddy">Flyer Manager</a>
					<ul>
						<li><a href="https://www.benfund.com/client/flyer_manager_simple.php">Simple Editor</a></li>
						<li><a href="https://www.benfund.com/client/flyer_manager_adv.php">Advanced Editor</a></li>
					</ul>
			</li>
			<li><a href="#" class="daddy">Template Manager</a>
					<ul>
						<li><a href="https://www.benfund.com/client/template_manager_simple.php">Simple Editor</a></li>
						<li><a href="https://www.benfund.com/client/template_manager_adv.php">Advanced Editor</a></li>
					</ul>
			</li>
			<li><a href="https://www.benfund.com/client/edit_acct.php">Acct Information</a></li>
		</ul>
	</li>
	<li><a href="#">Help</a></li>
	<li><a href="https://www.benfund.com/login.php">Log out</a></li>
</ul>
<?php
}

function dateSelect($fieldName,$startYear,$numYears,$horz) {
	
/* Month Select*/	
if($horz==1){
	echo '<tr><td>';
}
?>
<select name="srch_date_mm<?php echo $fieldName; ?>" class="bold"><option value="">Month</option><option value="01">Jan</option><option value="02">Feb</option><option value="03">Mar</option><option value="04">Apr</option><option value="05">May</option><option value="06">Jun</option><option value="07">Jul</option><option value="08">Aug</option><option value="09">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select>
<?php

/* Day Select*/


if($horz==1){ 
	echo '</td><td>';
}
?>
<select name="srch_date_dd<?php echo $fieldName?>" class="bold"><option value="">Day</option>
<?
for ($i = 01; $i <= 31; $i++) {
?>
<option value="<?php echo substr($i+100,1); ?>"><?php echo substr($i+100,1);?></option>
<?
}
?>
</select>
<?

/* Year Select*/

if (!$startYear) {
$startYear = (date('y')-1);
}
if (!$numYears) {
$numYears = 10;
}
if($horz==1){ 
	echo '</td><td>';
}
?>
<select name="srch_date_yy<?php echo $fieldName?>" class="bold"><option value="">Year</option>
<?
for ($i = 00; $i < $numYears; $i++) {
$thisyear=$startYear+$i;
?>
<option value="<?php echo substr($thisyear+100,1); ?>"><?php echo substr($thisyear+100,1); ?></option>
<?
}
?>
</select>
<?php
if($horz==1){ 
	echo '</td></tr>';
}
}
?>
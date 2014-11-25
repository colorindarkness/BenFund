<?php
benfund_connect();
$result = mysql_query("SELECT * FROM invoice WHERE from_id='$mid' AND id = '$iid'");
$row = mysql_fetch_array($result);
$id = $row[0];
$inv = $row[1];
$to = $row[2];
benfund_connect();
$c_result = mysql_query("SELECT * FROM client WHERE cid='$to'");
$c_row = mysql_fetch_array($c_result)or die(mysql_error());
$cid = $c_row['cid'];
$cname = $c_row['first_name'];
$cname2 = $c_row['m_i'];
$cname3 = $c_row['last_name'];
benfund_connect();
$sumquery = "SELECT SUM(amount) AS paytotal FROM payments WHERE to_id='$cid'";    
$sumresult = mysql_query($sumquery) or die(mysql_error());
$sumrow = mysql_fetch_array($sumresult);
$payments = $sumrow['paytotal'];
$caddress = $c_row['address'];
$caddress2 = $c_row['address2'];
$ccity = $c_row['city'];
$cstate = $c_row['state'];
$czip = $c_row['zip'];
$date = $row[4];
$desc = $row[5];
$total = $row[6];
$shipping = $row[7];
$tax = $row[8];
$notes = $row[9];
$terms = $row[10];
$status = $row[11];
$dispute = $row[12];
$balance = $total-$payments;
benfund_connect();
$m_result = mysql_query("SELECT * FROM merchant WHERE id='$mid'");
$m_row = mysql_fetch_array($m_result)or die(mysql_error());
$m_name = $m_row['name'];
$m_contact = $m_row['contact_name'];
$m_address = $m_row['address'];
$m_address2 = $m_row['address2'];
$m_city = $m_row['city'];
$m_state = $m_row['state'];
$m_zip = $m_row['zip'];
$m_phone = $m_row['phone'];
$m_phone2 = $m_row['alt_phone'];
$m_email = $m_row['email'];
$notecell = '3';
if(isset($shipping)){
$notecell = $notecell +1;
}
if(isset($tax)){
$notecell = $notecell +1;
}
?>
<!--<?php echo $inv; ?><br />
<?php echo $cname; ?> <?php echo $cname2; ?><br />
<?php echo $date; ?><br />
<?php echo $desc; ?><br />
<?php echo $notes; ?><br />
<?php echo $terms; ?><br />
<?php echo $status; ?><br />
<?php echo $dispute; ?>Hell Yeah!<br />-->
<style type="text/css">
table.inv {
	border-width: 2px 2px 2px 2px;
	border-spacing: 2px;
	border-style: solid solid solid solid;
	border-color: black black black black;
	border-collapse: collapse;
	background-color: white;
}
table.inv th {
	border-width: 2px 2px 2px 2px;
	padding: 4px 4px 4px 4px;
	border-style: solid solid solid solid;
	border-color: black black black black;
	background-color:#F6F6F6;
	-moz-border-radius: 0px 0px 0px 0px;
}
table.inv td {
	border-width: 2px 2px 2px 2px;
	padding: 4px 4px 4px 4px;
	border-style: solid solid solid solid;
	border-color: black black black black;
	background-color: white;
	-moz-border-radius: 0px 0px 0px 0px;
}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="4" style="border: 1px solid #000000;" valign="top">
  <tr>
    <td width="50%" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td align="left" valign="top">
<img src="https://www.benfund.com/images/acct/logo/<?php echo $mid;?>.jpg" height="75" width="75">
          </td>
          <td align="left" valign="top"><b><font size="5" face="Arial, Helvetica, sans-serif"><?php echo $m_name;?></font></b><font size="4"><br />
            <font face="Arial, Helvetica, sans-serif"><?php echo $m_address;?><br />
            <?php echo $m_address2;?><br />
            <?php echo $m_city;?>, <?php echo $m_state;?> <?php echo $m_zip;?></font></font></td>
        </tr>
      </table>
    </td>
    <td align="right" valign="top"><b><font size="6" face="Arial, Helvetica, sans-serif">Invoice</font></b><br />
      <table border="0" cellspacing="0" cellpadding="0" class="inv" >
        <tr>
          <th width="140" bgcolor="#E6E6E6"><b><font size="4" face="Arial, Helvetica, sans-serif">Date</font></b></th>
          <th width="140" bgcolor="#E6E6E6"><b><font size="4" face="Arial, Helvetica, sans-serif">Invoice #</font></b></th>
        </tr>
        <tr>
          <td width="140" align="center" valign="top"><?php echo $date;?></td>
          <td width="130" align="center" valign="top"><?php echo $inv;?></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="4" class="inv" valign="top">
        <tr>
          <th bgcolor="#E6E6E6"><b><font size="4" face="Arial, Helvetica, sans-serif">Bill To </font></b></th>
        </tr>
        <tr>
          <td align="left" valign="top"><?php echo $cname;?> <?php echo $cname2;?> <?php echo $cname3;?><br />
          Acct #: <?php echo $mid;?>-<?php echo $cid;?><br />
          <?php echo $caddress;?><br />
          <?php echo $ccity;?>, <?php echo $cstate;?> <?php echo $czip;?>
          </td>
        </tr>
      </table>
    </td>
    <td>
    <?php if(isset($shipping)){ ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="4" class="inv" valign="top">
        <tr>
          <th bgcolor="#E6E6E6"><b><font size="4" face="Arial, Helvetica, sans-serif" valign="top">Ship To</font></b></th>
        </tr>
        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
      </table>
    <?php } ?>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <table width="100%" border="1" align="center" cellpadding="4" cellspacing="0" bordercolor="#000000" class="inv" style="border: 2px solid #000000">
        <tr style="background:#E6E6E6">
          <th width="15%" align="center"><b><font size="4" face="Arial, Helvetica, sans-serif">Item</font></b></th>
          <th width="40%" align="center"><b><font size="4" face="Arial, Helvetica, sans-serif">Description</font></b></th>
          <th width="15%" align="center"><b><font size="4" face="Arial, Helvetica, sans-serif">Price</font></b></th>
          <th width="15%" align="center"><b><font size="4" face="Arial, Helvetica, sans-serif">Quantity</font></b></th>
          <th width="15%" align="center"><b><font size="4" face="Arial, Helvetica, sans-serif">Amount</font></b></th>
        </tr>
<?php
$entry = explode("~", $desc);
foreach($entry as $line) {
	echo '<tr>';
	$col = explode("`", $line);
	foreach($col as $item) {
	$price = array($item[4]);
		echo "<td width='15%' valign='top'>" . $item . "</td>";
	}
echo '</tr>';
}
?>
        <tr>
          <td colspan="2" rowspan="<?php echo $notecell;?>" align="left" valign="top"><?php echo $notes; ?></td>
          <th bgcolor="#E6E6E6" valign="top"><font size="4" face="Arial, Helvetica, sans-serif"><b>Total</b></font></th>
          <td colspan="2" align="right" valign="top"><?php echo $total ;?></td>
        </tr>
        <?php if(isset($tax)){ ?>
        <tr>
          <th bgcolor="#E6E6E6" valign="top"><font size="4" face="Arial, Helvetica, sans-serif"><b>Tax</b></font></th>
          <td colspan="2" align="right" valign="top"><?php echo $tax ;?></td>
        </tr>
       <?php } ?>
       <?php if(isset($shipping)){ ?>
        <tr>
          <th bgcolor="#E6E6E6" valign="top"><font size="4" face="Arial, Helvetica, sans-serif"><b>Shipping</b></font></th>
          <td colspan="2" align="right" valign="top"><?php echo $shipping ;?></td>
        </tr>
       <?php } ?>
        <tr>
          <th bgcolor="#E6E6E6" valign="top"><font size="4" face="Arial, Helvetica, sans-serif"><b>Payments</b></font></th>
          <td colspan="2" align="right" valign="top"><?php echo $payments ;?></td>
        </tr>
        <tr>
          <th bgcolor="#E6E6E6" valign="top"><font size="4" face="Arial, Helvetica, sans-serif"><b>Balance Due </b></font></th>
          <td colspan="2" align="right" valign="top"><?php echo $balance ;?></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td>
    			<table class="inv" align="center">
    			<tr><th bgcolor="#E6E6E6" valign="top" align="center"><font size="4" face="Arial, Helvetica, sans-serif"><b>Announcements</b></font></th></tr>
          <tr><td colspan="2" align="left" valign="top">If you have questions concerning this invoice please contact the Merchant. Lorem Ipsum</td>
          </tr>
          </table>
    </td>
    <td>
    			<table class="inv" align="center">
    			<tr><th bgcolor="#E6E6E6" valign="top" align="center"><font size="4" face="Arial, Helvetica, sans-serif"><b>Questions?</b></font></th></tr>
          <tr><td colspan="2" align="left" valign="top">If you have questions concerning this invoice please contact the Merchant. Lorem Ipsum</td>
          </tr>
          </table>
   </td>
  </tr>
  <tr>
    <td colspan="2">
    	<table class="inv" align="center" width="100%">
   		<tr><td valign="top" align="center">© Copyright 2007-2008 BenFund Payment Systems<br />www.BenFund.com "Funding Financial Objectives"</td></tr>
   		</table>
   </td>
  </tr>
</table>
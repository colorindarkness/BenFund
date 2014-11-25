<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<?php
$quantity = $_POST['q'];
if ( $quantity <= 0)
{$error = "The MINIMUM quantity available is 1 ton per order";
$quantity = 1;
}

if ( $quantity > 5)
{$error = "The MAXIMUM quantity available is 5 tons per order";
$quantity = 5;
}

if (!eregi('^[0-9]+$', $quantity))
{$error = "The Quantity must be a number";
$quantity = '';
}

$subtotal = $quantity * 399.50;
$tax = $subtotal * 0.0725;
$total = $subtotal + $tax;
$tax2 = number_format($tax, 2);
$total2 = number_format($total, 2);
$subtotal2 = number_format($subtotal, 2);
?>
<head>
<title>Ameri-Brand Products Wood Pellet Sale</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center"><img src="site-logo-index.gif" width="411" height="32"> </div>
<form name="form1" method="post" action="https://www.benfund.com/pellets/cart.php">
  <table width="auto" border="0" align="center" cellpadding="0">
    <tr> 
      <td colspan="2"><div align="center"><font color="#000000"><strong> 
          <?php if (isset($error)) {echo "$error"; unset($error);}  ?>
          </strong></font></div></td>
    </tr>
    <tr> 
      <td>Tons Of Pellets:</td>
      <td> <input name="q" type="text" id="q" value="<?php echo $quantity; ?>" size="3" > 
        <input type="submit" name="Submit" value="Update Qauntity"> </td>
    </tr>
    <tr> 
      <td>Subtotal:</td>
      <td> $<?php echo "$subtotal2"; ?> </td>
    </tr>
    <tr> 
      <td>Tax (7.25%):</td>
      <td>$<?php echo "$tax2"; ?> </td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center"><strong>Total: $<?php echo "$total2"; ?></strong></div></td>
    </tr>
  </table>
</form>
<form action="https://www.benfund.com/pellets/payment.php" method="post" name="cart">
  <div align="center"> 
    <table width="auto" border="0" cellpadding="5">
      
      <tr>
        <td><input name="back" type="button" id="back2" value="Go Back" onClick="history.go(-1)"></td>
        <td><input type="submit" name="Submit3" value="Check Out"></td>
      </tr>
    </table>
    <input name="quantity" type="hidden" id="quantity" value="<?php echo "$quantity"; ?>">
    <input name="subtotal" type="hidden" id="subtotal" value="<?php echo "$subtotal"; ?>"$su">
    <input name="tax" type="hidden" id="tax" value="<?php echo "$tax"; ?>">
    <input name="total" type="hidden" id="total" value="<?php echo "$total"; ?>">
  </div>
</form>
</body>
</html>

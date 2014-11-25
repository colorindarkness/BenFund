<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="get" action="submit.php">
  <table width="73%" border="0" align="center" cellpadding="0">
    <tr> 
      <td width="56%"><div align="right">Name</div></td>
      <td width="44%"> 
        <input name="Name" type="text" id="Name" maxlength="40">
        <input name="id" type="hidden" id="id2" value="<? srand((double)microtime()*1000000); 
			$id = rand(100000,999999);  ?>">
		</td>
    </tr>
    <tr> 
      <td><div align="right">Mailing Address</div></td>
      <td><input name="addressm" type="text" id="addressm" maxlength="50"></td>
    </tr>
    <tr> 
      <td><div align="right">Shipping Address</div></td>
      <td><input name="addresss" type="text" id="addresss" maxlength="50"></td>
    </tr>
    <tr> 
      <td><div align="right">City</div></td>
      <td><input name="city" type="text" id="city" maxlength="30"></td>
    </tr>
    <tr> 
      <td><div align="right">State</div></td>
      <td><input name="state" type="text" id="state" size="2" maxlength="2"></td>
    </tr>
    <tr> 
      <td><div align="right">Zip</div></td>
      <td><input name="zip" type="text" id="zip" size="5" maxlength="5"></td>
    </tr>
    <tr> 
      <td><div align="right">Daytime Phone (Example: 123-456-7890)</div></td>
      <td><input name="phoned" type="text" id="phoned" size="12" maxlength="12"></td>
    </tr>
    <tr> 
      <td><div align="right">Evening Phone (Example: 123-456-7890)</div></td>
      <td><input name="phonee" type="text" id="phonee" size="12" maxlength="12"></td>
    </tr>
    <tr> 
      <td><div align="right">Email Address</div></td>
      <td><input name="email" type="text" id="email" maxlength="40"></td>
    </tr>
    <tr> 
      <td><div align="right">
          <input type="submit" name="Submit2" value="Submit">
        </div></td>
      <td> 
        <input type="reset" name="Reset" value="Reset"></td>
    </tr>
  </table>
  <div align="center"></div>
  <div align="center"></div>
</form>

</body>
</html>

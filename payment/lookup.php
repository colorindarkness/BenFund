<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="https://www.benfund.com/payment/livesearch.js"></script>
<script type="text/javascript">
function Append(letter)
{
var account = letter
document.hidden.h_mid.value = letter;
}
</script>
</head>

<body onload="self.focus(); document.searchform.mid.focus(); liveSearchInit(); ">
Please type in the account name or benfund number and click the account name when it has been located.
<form /*name="lookup" id="lookup"*/ name="searchform" id="searchform" method="GET">
  <p>Type Name or Benfund Number: 
    <input type="text" class="big" size="30" /*id="mid" name="mid"*/ id="mid" name="mid" onkeypress="liveSearchStart()" onchange="liveSearchStart()" onFocus="liveSearchStart()" value="<?php echo stripslashes($_GET['mid']); ?>"></td><td rowspan="2"><div id="LSResult" style="display: none;"><div id="LSShadow"></div></div></td></tr> </p> 
<p>&nbsp;</p>
</form>
<form action="https://www.benfund.com/payment/payment.php" method="post" name="hidden" id="hidden">
  <input name="h_mid" type="hidden" value="">
</form>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION[valid_client])){
	$_SESSION['error'] = "This script sucks. <br>Please try again<br>";
     header('Location:../login.php');
}
$page_title = "View Invoice";
require ("../includes/globals.php");
require($ROOT."/functions/common.php");
include($ROOT."/includes/lang/".$m_type.".php");
$mid = $_SESSION['valid_user'];
$pw = $_SESSION['pw'];
require($ROOT."functions/user_info.php");
$iid = $_GET['iid'];
$error = '<font color="#0000FF"><strong>You must be logged in to view this page</strong></font>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $page_title ?> - BenFund</title>
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
<?php include ($ROOT."/includes/head.php"); ?>
<script>
function createRequestObject() {
    var ro;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}

var http = createRequestObject();

function sndReq(op1,op2,op) {
    http.open('get', 'calculator.php?op1='+op1+'&op2='+op2+'&op='+op);
    http.onreadystatechange = handleResponse;
    http.send(null);
}

function handleResponse() {
    if(http.readyState == 4){
        var response = http.responseText;
        var update = new Array();

        if(response.indexOf('|' != -1)) {
            update = response.split('|');
            document.getElementById("result").value = update[1];
        }
    }
}
</script>
<script language="javascript">
// Last updated 2006-02-21
function addRowToTable()
{
  var tbl = document.getElementById('tblSample');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);
  
  // left cell
  var cellLeft = row.insertCell(0);
  var textNode = document.createTextNode(iteration);
  cellLeft.appendChild(textNode);
  
  // cell one
  var cell1 = row.insertCell(1);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'txtRow' + iteration;
  el.id = 'txtRow' + iteration;
  el.className = 'big';
  el.size = 6;
    
  el.onkeypress = keyPressTest;
  cell1.appendChild(el);
  
    // cell two
  var cell2 = row.insertCell(2);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'txtRow' + iteration;
  el.id = 'txtRow' + iteration;
  el.className = 'big';
   
  el.onkeypress = keyPressTest;
  cell2.appendChild(el);
   
    // cell three
  var cell3 = row.insertCell(3);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'op1';
  el.id = 'op1';
  el.className = 'big';
  el.size = 5;
   
  cell3.appendChild(el); 
  
      // cell four
  var cell4 = row.insertCell(4);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'op2';
  el.id = 'op2';
  el.className = 'big';
  el.size = 2;
    
  cell4.appendChild(el);
  
      // cell five
  var cell5 = row.insertCell(5);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'result';
  el.id = 'result';
  el.className = 'big';
  el.size = 5;
  el.readOnly = 'readonly';
  
  cell5.appendChild(el);
  
      // cell six
  var cell5 = row.insertCell(6);
  cell5.setAttribute("id","cell6");
  var el = document.createElement('input');
  el.type = 'checkbox';
  el.name = 'tax';
  el.id = 'tax';
  el.className = 'big';
  el.setAttribute("onclick", "taxrate()");
  el.value = 'true';
  
  cell5.appendChild(el);
  
      // cell seven
  var cell5 = row.insertCell(7);
  var el = document.createElement('input');
  el.type = 'checkbox';
  el.name = 'shipping';
  el.id = 'shipping';
  el.className = 'big';
  
  cell5.appendChild(el);

}
function keyPressTest(e, obj)
{
  var validateChkb = document.getElementById('chkValidateOnKeyPress');
  if (validateChkb.checked) {
    var displayObj = document.getElementById('spanOutput');
    var key;
    if(window.event) {
      key = window.event.keyCode; 
    }
    else if(e.which) {
      key = e.which;
    }
    var objId;
    if (obj != null) {
      objId = obj.id;
    } else {
      objId = this.id;
    }
    displayObj.innerHTML = objId + ' : ' + String.fromCharCode(key);
  }
}
function removeRowFromTable()
{
  var tbl = document.getElementById('tblSample');
  var lastRow = tbl.rows.length;
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
}
function openInNewWindow(frm)
{
  // open a blank window
  var aWindow = window.open('', 'TableAddRowNewWindow',
   'scrollbars=yes,menubar=yes,resizable=yes,toolbar=no,width=400,height=400');
   
  // set the target to the blank window
  frm.target = 'TableAddRowNewWindow';
  
  // submit
  frm.submit();
}
function validateRow(frm)
{
  var chkb = document.getElementById('chkValidate');
  if (chkb.checked) {
    var tbl = document.getElementById('tblSample');
    var lastRow = tbl.rows.length - 1;
    var i;
    for (i=1; i<=lastRow; i++) {
      var aRow = document.getElementById('txtRow' + i);
      if (aRow.value.length <= 0) {
        alert('Row ' + i + ' is empty');
        return;
      }
    }
  }
  openInNewWindow(frm);
}
</script>
<script type="text/javascript">
<!--
function taxrate() {
if ( document.getElementById('tax').innerHTML != null) {
{
	var answer = confirm("Specify Tax Rate?")
	if (answer){
		// create a DIV element, using the variable eDIV as a reference to it
		eDIV = document.createElement("input");
		//use the setAttribute method to assign it an id
		eDIV.setAttribute("type","text");
		eDIV.setAttribute("id","taxsp");
		eDIV.setAttribute("size","3");
		eDIV.setAttribute("class","big");
		// append your newly created DIV element to an already existing element.
		document.getElementById("cell6").appendChild(eDIV);
	}
	else{
		alert("Thanks for sticking around!")
	}
}
} else if ( document.getElementById('tax').innerHTML != 'true') {
	alert("Thanks for sticking around!")
}
}
//-->
</script>
<script type="text/javascript">womOn();</script>
<body>
<div class="container">
<table cellspacing="0" cellpadding="0" align="center">
<!--HEADER START-->
  <tr>
    <td colspan="2" valign="top">
<?php include ($ROOT."/includes/header.php"); ?>
	</td>
  </tr>
  <!--HEADER END-->
  <!--LEFT COLUMN START-->
  <tr>
    <td class="leftcolumn" width="150px" valign="top">
<?php include ($ROOT."/includes/left.php"); ?>
    </td>
	<!--LEFT COLUMN END-->
    <td valign="top">
	<!--PATHWAY START-->
<?php include ($ROOT."/includes/pathway.php"); ?>
	<!--PATHWAY END-->
	<!--MAINBODY START-->
	<?php m_menu3(); ?>
	<div class="content_outer">
	<div class="content_inner">
<span class="pagetitle">New Invoice</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr><td align="center"><a class="toolbar" href="https://www.benfund.com/client/client_manager.php"><img src="https://www.benfund.com/images/elements/icons/clients.png" border="0"/><br />Clients</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/client/invoices.php"><img src="https://www.benfund.com/images/elements/icons/invoice.png" border="0"/><br />Invoices</a></td>

</tr></table>
</td></tr></table>
<table width="100%">
<tr>
<td><span class="large bold">Client</span></td>
</tr><tr>
<td><input name="client" id="client" class="big" size="30"></td>
</tr>
<tr>
<td><span class="large bold">Items</span></td>
</tr><tr>
<td>
<form action="tableaddrow_nw.html" method="get">
<table id="tblSample" width="100%">
<tr>
<th>&nbsp;</th><th>Item</th><th>Item Description</th><th>Price</th><th>Quant</th><th>Amount</th><th>Tax</th><th>Ship</th></tr>
<tr>
<td>1</td>
<td><input name="client" id="client" class="big" size="6"></td>
<td><input name="client" id="client" class="big"></td>
<td><input class="big" size="5" id="op1" name="op1"></td>
<td><input class="big" size="2" id="op2" name="op2" onBlur="sndReq(document.getElementById('op1').value,document.getElementById('op2').value,'m')"></td>
<td><input class="big" size="5" id="result" name="result" readonly="readonly" ></td>
<td><input type="checkbox" class="big" size="5" id="tax" name="tax" onclick="taxrate()"></td>
<td><input type="checkbox" class="big" size="5" id="ship" name="ship"></td>
</tr>
</table>
<table align="right" valign="top"><tr><td align="right" valign="top">
<input type="button" value="Add" onclick="addRowToTable();" />
<input type="button" value="Remove" onclick="removeRowFromTable();" />
</tr></td>
</table>
</td>
</tr>
<tr>
<td><span class="large bold">Tax</span></td>
</tr><tr>
<td><input name="client" id="client" class="big"></td>
</tr>
<tr>
<td><span class="large bold">Shipping</span></td>
</tr><tr>
<td><input name="client" id="client" class="big"></td>
</tr>
<tr>
<td><span class="large bold">Notes and Comments</span></td>
</tr><tr>
<td><textarea rows="5" cols="50" width="100%" name="notes" id="notes" class="big"></textarea></td>
</tr>
</table>
<br />
<input type="button" value="Submit" onclick="validateRow(this.form);" />
<input type="checkbox" id="chkValidate" /> Validate Submit
</form>
	</div>
	</div>
	</td>
  </tr>
  <!--MAINBODY END-->
  <!--FOOTER START-->
  <tr>
    <td colspan="2">
      <font color="#FEFFC1">
      <?php include ($ROOT."/includes/footer.php"); ?>
	  </font></td>
  </tr>
  <!--FOOTER START-->
</table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>
</html>
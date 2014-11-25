<?php
session_start();
if (!isset($_SESSION[valid_user])){
	$_SESSION['error'] = "This script sucks. <br>Please try again<br>";
     header('Location:../login.php');
}
$page_title = "Create New Invoice";
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
<script type="text/javascript" src="http://www.benfund.com/includes/js/jqModal.js"></script>
<script type="text/javascript" src="https://www.benfund.com/includes/js/jquery.highlightFade.js"></script>
<script type="text/javascript" src="https://www.benfund.com/includes/js/jquery.livequery.js"></script>
<!--
<script type="text/javascript" src="https://www.benfund.com/includes/js/jquery.compat.js"></script>
-->
<!--  jqModal Styling -->
<link rel="stylesheet" href="https://www.benfund.com/includes/css/style.css" type="text/css" />
<link type="text/css" rel="stylesheet" media="all" href="http://www.benfund.com/includes/css/jqModal.css" />
<script type="text/javascript" language="javascript">
function getElementsByName_iefix(tag, name){     
     var elem = document.getElementsByTagName(tag);
     var arr = new Array();
     for(i = 0,iarr = 0; i < elem.length; i++){
          att = elem[i].getAttribute("name");
          if(att == name) {
               arr[iarr] = elem[i];
               iarr++;
          }
     		}
	return arr;
}
</script>
<script type="text/javascript" language="javascript">
function addRowToTable(){
	$().ready(function(){  
		//$("#InvItems tbody:last-child").clone(true).insertAfter("#InvItems tbody:last-child");
		var rowlength = $("#InvItems tbody tr").length +1;
				
		var lastrow = $("#InvItems tbody tr:last-child").clone(true);
				
		var newrow = $(lastrow.childNodes).each(function(i){ $(this).attr("id", 
			function (iter) {
				 return $(this).attr("name") + rowlength; 
					})
				});
		
		var newerrow = $(newrow.childNodes).attr("id",
			function (iter) {
				 return $(this).attr("name") + rowlength; 
				 });

		$(newrow).insertAfter("#InvItems tbody tr:last-child");
	});
}
</script>

<script type="text/javascript" language="javascript">
function addRowToTable_old(){
  var tbl = document.getElementById('InvItems');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);
  row.id = 'item' + lastRow;
  if (iteration%2){
  	row.className = "row0";
   }else{
   row.className = "row1";;
   }
  
  // cell zero
  var cell0 = row.insertCell(0);
  cell0.id = 'rem' + iteration;
  cell0.setAttribute("valign","bottom");
  var el = document.createElement('input');
  el.type = 'checkbox';
  el.name = 'remch';
  el.id = 'remch' + iteration;
  el.value = iteration;
   
  cell0.appendChild(el);
  
  
  // left cell
  var cellLeft = row.insertCell(1);
  cellLeft.id = 'iid' + iteration;
  cellLeft.setAttribute("valign","bottom");
  var textNode = document.createTextNode(iteration);
  cellLeft.appendChild(textNode);
  
  // cell one
  var cell1 = row.insertCell(2);
  cell1.id = 'inum' + iteration;
  cell1.setAttribute("valign","bottom");
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'itemnum' + iteration;
  el.id = 'itemnum' + iteration;
  el.className = 'big';
  el.size = 4;
    
  cell1.appendChild(el);
  
    // cell two
  var cell2 = row.insertCell(3);
  cell2.id = 'idesc' + iteration;
  cell2.setAttribute("valign","bottom");
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'desc' + iteration;
  el.id = 'desc' + iteration;
  el.className = 'big';
   
  cell2.appendChild(el);
   
    // cell three
  var cell3 = row.insertCell(4);
  cell3.id = 'itemprea' + iteration;
  cell3.setAttribute("valign","bottom");
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'prea' + iteration;
  el.id = 'prea' + iteration;
  el.className = 'big';
  el.size = 5;
  var money = "this.value=Monetize(this.value)";
  el.onblur = function() {this.value=Monetize(this.value)};
   
  cell3.appendChild(el); 
  
      // cell four
  var cell4 = row.insertCell(5);
  cell4.id = 'itemq' + iteration;
  cell4.setAttribute("valign","bottom");
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'quant' + iteration;
  el.id = 'quant' + iteration;
  el.className = 'big';
  el.size = 1;
    
  cell4.appendChild(el);
  
  var preaid = 'prea' + iteration;
  var quantid = 'quant' + iteration;
  var resultid = 'result' + iteration;
  var onchangeaction = "calcitem(" + "document.getElementById('" + preaid + "').value" + "," + "document.getElementById('" + quantid + "').value" + ",'m','" + iteration + "')";
  var addpreaact = document.getElementById(preaid);
  var addquantact = document.getElementById(quantid);
	addquantact.onkeyup = function(){(calcitem(document.getElementById(preaid).value, document.getElementById(quantid).value, 'm', iteration))};
	addpreaact.onkeyup = function(){(calcitem(document.getElementById(preaid).value, document.getElementById(quantid).value, 'm', iteration))};
  
      // cell six
  var cell6 = row.insertCell(6);
  cell6.id = 'itemtax' + iteration;
  cell6.setAttribute("valign","bottom");
  //cell5.setAttribute("id","cell6");
  var el = document.createElement('input');
  el.type = 'checkbox';
  el.value = iteration;
  el.className = 'tax';
  el.alt = 'https://www.benfund.com/acct/invoice_manager/prompt1.php';
  var el2 = document.createElement('input');
  el2.type = 'text';
  el2.name = 'taxsp';
  el2.id = 'taxsp' + iteration;
  el2.size = 3;
  el2.value = '';
  el2.className = 'big';
  el2.style.display = 'none';
  
  cell6.appendChild(el);
  cell6.appendChild(el2);
  
      // cell seven
  var cell7 = row.insertCell(7);
  cell7.id = 'itemship' + iteration;
  cell7.setAttribute("valign","bottom");
  var el = document.createElement('input');
  el.type = 'checkbox';
  el.name = 'ship';
  el.id = 'ship' + iteration;
  el.onclick = function(){(document.getElementById('shipsp' + iteration).style.visibility = this.checked ? 'visible' : 'hidden')};
  el.value = 'true';
  var el2 = document.createElement('input');
  el2.type = 'text';
  el2.name = 'shipsp';
  el2.id = 'shipsp' + iteration;
  el2.size = 3;
  el2.className = 'big';
  el2.style.visibility = 'hidden';
  var el3 = document.createElement('input');
  el3.type = 'hidden';
  el3.id = 'prow' + iteration;
  el3.className = 'prow';
  el3.size = 3;
  
  cell7.appendChild(el);
  cell7.appendChild(el2);
  cell7.appendChild(el3);
  
  var taxspid = 'taxsp' + iteration;
  var shipspid = 'shipsp' + iteration;
  var addtaxspact = document.getElementById(taxspid);
  var addshipspact = document.getElementById(shipspid);
  addtaxspact.onkeyup = function(){(calcitem(document.getElementById(preaid).value, document.getElementById(quantid).value, 'm', iteration))};
  addtaxspact.onblur = function(){(this.value=Monetize(this.value))};
  addshipspact.onkeyup = function(){(calcitem(document.getElementById(preaid).value, document.getElementById(quantid).value, 'm', iteration))};
  addshipspact.onblur = function(){(this.value=Monetize(this.value))};
  
  // cell five
  var cell5 = row.insertCell(8);
  cell5.id = 'itemttl' + iteration;
  cell5.setAttribute("valign","bottom");
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'result';
  el.id = 'result' + iteration;
  el.className = 'big';
  el.size = 5;
  el.readOnly = 'readonly';
  
  cell5.appendChild(el);
  
  $('#item' + iteration).highlightFade({
		speed:1000
	});
  
  if(document.getElementById('InvItems').rows.length > 1){
		document.getElementById('rembutton').style.display = 'inline';
		}

	}
</script>
<script type="text/javascript" language="javascript">
function removeRowFromTable()
{
	var tbl = document.getElementById('InvItems');
  var lastRow = tbl.rows.length;
	$().ready(function() {
		//$("input:checkbox[@name='remch']:checked").parent('tr').remove();
		var i = ""; $("input:checkbox[@name='remch']:checked").each(function() { i += $(this).val(); $("#item"+i).highlightFade({ color:'red', speed:1000 }); $("tr").remove("#item"+i); i = "";});
	});
  if(lastRow <= 2){
		document.getElementById('rembutton').style.display = 'none';
		}
}
</script>
<script type="text/javascript" language="javascript">
function checkAll(checkname, exby) {
  for (i = 0; i < checkname.length; i++)
  checkname[i].checked = exby.checked? true:false
}
</script>
<script type="text/javascript" language="javascript">
function Monetize(mnt){
    mnt -= 0;
    mnt = (Math.round(mnt*100))/100;
    return (mnt == Math.floor(mnt)) ? mnt + '.00' 
              : ( (mnt*10 == Math.floor(mnt*10)) ? 
                       mnt + '0' : mnt);
  }
</script> 
<script type="text/javascript" language="javascript">
function allinvrows(){
	var s = ''; $('.prow').each(function() { s += $(this).val(); }); $('#thetotal').val(s);
}

$().ready(function() {  
$('input[@class=tax]')
.livequery(function(){
    var t = $('#prompt1 div.jqmdMSG');
	
	$('#prompt1').jqm({ trigger: 'input.tax', ajax: '@alt', target: t, modal: true, overlay: 40, onHide: function(h) { 
			t.html('<center><br><p><img src="https://www.benfund.com/images/elements/loading.gif"><br><span class="medium bold">Please Wait...</span>');
			h.o.remove(); // remove overlay
			h.w.fadeOut(888); // hide window
		},
		onLoad: function(h) {
			var v1 = $(h.t).val();
			$('#var1').val(v1);
		}
		});
	 
	// Close Button Highlighting Javascript provided in ex3a.
	
	// Work around for IE's lack of :focus CSS selector
	if($.browser.msie)
		$('input')
			.focus(function(){$(this).addClass('iefocus');})
			.blur(function(){$(this).removeClass('iefocus');});
	});
});
</script>
<script type="text/javascript" language="javascript">
$().ready(function() {  
  $('#invnumq').toggle(
  function(){ $('#invnum').fadeIn(); },
  function(){ $('#invnum').fadeOut(); $("#invnum").val("");});  
});
</script>
<script type="text/javascript" language="javascript">
function calcitem(prea,quant,op,trgt) {
	if (op == "m") {
		itemtotal = prea * quant;
		document.getElementById('result'+trgt).value = Monetize(itemtotal);
		rowtotal(trgt);
		}			
			var Items = getElementsByName_iefix('input', 'result');
			var ItemTax = getElementsByName_iefix('input', 'taxsp');
			var ItemShip = getElementsByName_iefix('input', 'shipsp');
			var Subtotal = document.getElementById('subtotal');
			var TotalTax = document.getElementById('totaltax');
			var AddShip = document.getElementById('addship');
			var TotalShip = document.getElementById('totalshipping');
			var GrandTotal = document.getElementById('grandtotal');
			var AddShipnum = parseFloat( AddShip ) || 0;
    	var total = 0;
    	var itaxtotal = 0;
    	var ishiptotal = 0;
		for (var i=0; i<Items.length; i++) {
			//if(Items[i])
			total += parseFloat( Items[i].value ) || 0;
			}
		for (var i=0; i<ItemTax.length; i++) {
			//if(Items[i])
			itaxtotal += parseFloat( ItemTax[i].value ) || 0;
			}
		for (var i=0; i<ItemShip.length; i++) {
			//if(Items[i])
			ishiptotal += parseFloat( ItemShip[i].value ) || 0;
			}
			Subtotal.value = Monetize(parseFloat(total));
			Subt = parseFloat(total);
			TotalTax.value = Monetize(parseFloat(itaxtotal));
			shiptotal = parseFloat(AddShipnum) || 0 + parseFloat(ishiptotal) || 0;
			TotalShip.value = Monetize(shiptotal);
			TTax = parseFloat(TotalTax.value) || 0;
			TShip = parseFloat(TotalShip.value) || 0;
			postTotal = TTax + TShip;
			gTotal = Subt + postTotal;
			GrandTotal.value = Monetize(gTotal) || Monetize(0);
		}
</script>
<script type="text/javascript" language="javascript">
function rowtotal(prid) {
	var rowsum = document.getElementById('prow'+prid);
	var o1 = document.getElementById('itemnum'+prid);
	var o2 = document.getElementById('desc'+prid);
	var o3 = document.getElementById('prea'+prid);
	var o4 = document.getElementById('quant'+prid);
	var o5 = document.getElementById('result'+prid);
  rowsum.value = '^'+o1.value+'~'+o2.value+'~'+o3.value+'~'+o4.value+'~'+o5.value;
  allinvrows();
}
</script>
<script type="text/javascript" language="javascript">
	function showhide(elid, state) {
		document.getElementById(elid).style.display = state;
	}
</script>
<script type="text/javascript" language="javascript">womOn();</script>
</head>
<body>
<div class="container" id="xyz">
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
	<?php if($m_type == 1){ m_menu1(); } if($m_type == 2){ m_menu2(); } ?>
	<div class="content_outer">
	<div class="content_inner">
<!--########################################################################################################################-->
<div id="prompt1" class="jqmDialog jqmdWide">
	<div class="jqmdTL">
		<div class="jqmdTR">
			<div class="jqmdTC">
				Apply a tax to this item.
			</div>
		</div>
	</div>
	<div class="jqmdBL">
		<div class="jqmdBR">
			<div class="jqmdBC">
				<div class="jqmdMSG">

				</div>
			</div>
		</div>
	</div>
	<input type="image" src="https://www.benfund.com/images/elements/modal/close.gif" class="jqmdX jqmClose" />
</div>

<!-- nested dialog -->
<div id="prompt2" class="jqmDialog jqmdAbove">
	<div class="jqmdTL">
		<div class="jqmdTR">
			<div class="jqmdTC">
				Apply a Specific Tax Rate.
			</div>
		</div>
	</div>
	<div class="jqmdBL">
		<div class="jqmdBR">
			<div class="jqmdBC jqmdTall">
				<div class="jqmdMSG">
  
				</div>
			</div>
		</div>
	</div>
	<input type="image" src="https://www.benfund.com/images/elements/modal/close.gif" class="jqmdX jqmClose" />
</div>
</div>
<!--########################################################################################################################-->
<!--########################################################################################################################-->
<script type="text/javascript">
$().ready(function() {
	
	// notice that you can pass an element as the target 
	//  in addition to a string selector.
	var t = $('#prompt1 div.jqmdMSG');
	
	$('#prompt1').jqm({ trigger: 'input.tax', ajax: '@alt', target: t, modal: true, overlay: 40, onHide: function(h) { 
			t.html('<center><br><p><img src="https://www.benfund.com/images/elements/loading.gif"><br><span class="medium bold">Please Wait...</span>');
			h.o.remove(); // remove overlay
			h.w.fadeOut(888); // hide window			
		},
		onLoad: function(h) {
			var v1 = $(h.t).val();
			$('#var1').val(v1);
		}
		});
	 
	// Close Button Highlighting Javascript provided in ex3a.
	
	// Work around for IE's lack of :focus CSS selector
	if($.browser.msie)
		$('input')
			.focus(function(){$(this).addClass('iefocus');})
			.blur(function(){$(this).removeClass('iefocus');});
	
});
</script>
<!--########################################################################################################################-->

<span class="pagetitle">Create New Invoice</span><p>
<div class="hr"></div>
<table class="clear">
<tr><td>
<table class="toolbar" align="right">
<tr>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/client_manager.php"><img src="https://www.benfund.com/images/elements/icons/clients.png" border="0"/><br />Clients</a></td>
<td align="center"><a class="toolbar" href="https://www.benfund.com/acct/invoices.php"><img src="https://www.benfund.com/images/elements/icons/invoice.png" border="0"/><br />Invoices</a></td>
</tr></table>
</td></tr></table>
<form id="newinvoice" name="newinvoice" action="https://www.benfund.com/acct/invoice_manager.php?cmd=new" method="post">
<table width="100%">
<tr>
<td>
<div style="padding: 6px; border: 1px solid #6CD136; background-color: #E2F7D2;">
<span class="large bold">Client</span><br>
<select name="client" id="client" class="big">
<?php
benfund_connect();
$cquery = "SELECT cid, first_name, m_i, last_name, activated FROM client WHERE mid='$mid' ORDER BY last_name ASC";
//echo $cquery;
$cresult = mysql_query($cquery);
while ($crow = mysql_fetch_array($cresult)) {
$cid = $crow[0];
$first_name = $crow[1];
$m_i = $crow[2];
$last_name = $crow[3];
$active = $crow[4];
	if($active == 0){
		$stat = 'style="background-color: #FFDDDD;"';
	}elseif($active == 1){
		$stat = 'style="background-color: #CFEBC2;"';
	}
?>
<option value="<?php echo $cid; ?>" <?php echo $stat; ?>><?php echo $last_name; ?>, <?php echo $first_name; ?> <?php echo $m_i; ?> (<?php echo $cid; ?>)</option>
<?php } ?>
</select>
<p>
<input type="checkbox" id="invnumq"><span class="large bold">Specify an Invoice Number?</span><br>
<input type="text" id="invnum" style="display:none; margin-left: 20px;" class="nice" size="8">
</div>
</td>
</tr>
<tr>
<td>
<div style="padding: 6px; border: 1px solid #800000; background-color: #FFFFF0;">
<span class="large bold">Items</span><br>
	<table id="InvItems" width="100%" style="border-collapse:collapse;">
		<thead style="color: #C64934; letter-spacing: 1px; text-align: left; background: url(https://www.benfund.com/images/elements/bg_header.jpg) no-repeat; vertical-align:middle;">
		<tr style="border-right: 1px solid #DDDDDD;">
			<th width="1"><input type="checkbox" onClick="checkAll(document.getElementsByName('remch'),this)" name="chremall" id="chremall"></th>
			<th width="1">&nbsp;</th>
			<th width="1">Item #</th>
			<th width="1">Item Description</th>
			<th width="1">Price Ea.</th>
			<th width="1">Quant</th>
			<th width="1">Tax</th>
			<th width="70" style="width: 70px; min-width: 70px; _width: auto;">Ship</th>
			<th width="1">Amount</th>
			</thead>
		</tr>
		<tbody>
		<tr name="item" id="item1" class="row0">
			<td width="1" name="rem" id="rem1" valign="bottom"><input type="checkbox" size="5" id="remch1" name="remch" value="1"></td>
			<td width="1" name="iid" id="iid1" valign="bottom">1</td>
			<td width="1" name="inum" id="inum1" valign="bottom"><input name="itemnum" id="itemnum1" class="big" size="4"></td>
			<td width="1" name="idesc" id="idesc1" valign="bottom"><input name="desc" id="desc1" class="big"></td>
			<td width="1" name="itemprea" id="itemprea1" valign="bottom"><input class="big" size="5" id="prea1" name="prea" onkeyup="calcitem(document.getElementById('prea1').value,document.getElementById('quant1').value,'m','1')"  onblur="this.value=Monetize(this.value)"></td>
			<td width="1" name="itemq" id="itemq1" valign="bottom"><input class="big" size="1" id="quant1" name="quant" onkeyup="calcitem(document.getElementById('prea1').value,document.getElementById('quant1').value,'m','1')"></td>
			<td width="200" name="itemtax" id="itemtax1" valign="bottom"><center><input type="checkbox" class="tax" value="1" alt="https://www.benfund.com/acct/invoice_manager/prompt1.php"><input type="text" id="taxsp1" name="taxsp" class="big" size="3" value="" style="display: none;" onblur="this.value=Monetize(this.value)" onkeyup="calcitem(document.getElementById('prea1').value,document.getElementById('quant1').value,'m','1')"></center></td>
			<td width="70" name="itemship" id="itemship1" style="width: 70px; min-width: 70px; _width: auto;"  valign="bottom"><input type="checkbox" size="5" id="ship1" name="ship" onclick="getElementById('shipsp1').style.visibility = this.checked ? 'visible' : 'hidden'"><input type="text" id="shipsp1" name="shipsp" class="big" size="3" style="visibility: hidden;" onblur="this.value=Monetize(this.value)" onkeyup="calcitem(document.getElementById('prea1').value,document.getElementById('quant1').value,'m','1')"><input type="hidden" id="prow1" name="prow" value="" class="prow"></td>
			<td width="1" name="itemttl" id="itemttl1" valign="bottom"><input class="big" size="5" id="result1" name="result" value="" onchange="rowtotal(1);" readonly="readonly"></td>
		</tr>
		</tbody>
	</table>
	<div style="display: block; clear: both;">
	<table width="100%" valign="top"  border="0" id="rowcntrl">
		<tr>
			<td align="left" valign="top" id="remrow"><a href="javascript: removeRowFromTable();"><img src="https://www.benfund.com/images/elements/buttons/rem-sel.gif" border="0" id="rembutton" style="display: none;"/></a></td>
			<td align="right" valign="top"><input type="hidden" name="thetotal" id="thetotal" value=""><input type="hidden" id="gorg" value=""><a href="#" id="addRowToTable" onclick="addRowToTable();"><img src="https://www.benfund.com/images/elements/buttons/add-row.gif" border="0"></a></td>
		</tr>
	</table>
	<table width="568" valign="top"  border="0">
		<tr>
			<td width="6"><img src="https://www.benfund.com/images/elements/blank.gif" width="6" height="1"></td>
			<td width="1"><img src="https://www.benfund.com/images/elements/blank.gif" width="80" height="1"></td>
			<td width="1"><img src="https://www.benfund.com/images/elements/blank.gif" width="180" height="1"></td>
			<td align="right" valign="bottom"><span class="medium bold">SubTotal</span></td>
			<td width="1"><input class="big" size="5" id="subtotal" name="subtotal" readonly="readonly"></td>
			<td width="1"><img src="https://www.benfund.com/images/elements/blank.gif" width="80" height="1"></td>
			<td width="1"><img src="https://www.benfund.com/images/elements/blank.gif" width="25" height="1"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td align="right" valign="bottom"><span class="medium bold">Total Tax</span></td>
			<td><input class="big" size="5" id="totaltax" name="totaltax" onkeyup="calcitem(document.getElementById('prea1').value,document.getElementById('quant1').value,'m','1')" onblur="this.value=Monetize(this.value)" readonly="readonly"></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td align="right" valign="bottom"><span class="medium bold">Total Shipping</span></td>
			<td><input class="big" size="5" id="totalshipping" name="shippingtotal" onkeyup="calcitem(document.getElementById('prea1').value,document.getElementById('quant1').value,'m','1')" onblur="this.value=Monetize(this.value)" readonly="readonly"></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td align="right" valign="bottom"><span class="medium bold">Grand Total</span></td>
			<td><input class="big" size="5" id="grandtotal" name="grandtotal" readonly="readonly"></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</table>
	</div>
</div>
</td>
</tr>
<tr>
<td>
<div style="padding: 6px; border: 1px solid #FFA500; background-color: #FFF3DD;">
	<span class="large bold">Payment Terms</span><br>
				<select id="terms" name="terms" class="big">
					<option value="01">Immediate Payment</option>
					<option value="30">Net 30 terms</option>
					<option value="60">Net 60 terms</option>
					<option value="90">Net 90 terms</option>
				</select>
</div>

</td>
</tr>
<tr>
<td>
	<table width="100%" border="0">
		<tr>
			<td valign="top">
				<div style="padding: 6px; border: 1px solid #0000FF; background-color: #E6E6FA;">
					<span class="large bold">Notes and Comments</span><br>
						<textarea rows="5" cols="35" width="100%" name="notes" id="notes" class="big"></textarea>
					</span>
				</div>
			</td>
			<td valign="top">
				<div style="padding: 6px; border: 1px solid #0000FF; background-color: #E6E6FA; width: 240px; min-width: 240px; min-height: auto; height: auto;">
					<span class="large bold">Submission Options</span><br>
						<input type="checkbox" name="print"><img src="https://www.benfund.com/images/elements/icons/med/print.png"><span class="medium bold">&nbsp;&nbsp;Print this Invoice<br/>
						<input type="checkbox" name="send"><img src="https://www.benfund.com/images/elements/icons/med/mail-new.png">&nbsp;&nbsp;Email Invoice to client<br/>
				</span>
				</div>
			</td>
		</tr>
	</table>
</td>
</tr>
</table>
<br />
<center>
<a href="https://www.benfund.com/acct/invoice_manager.php"><img src="https://www.benfund.com/images/elements/buttons/cancel.gif" border="0"></a>
<a href="#" onclick="document.getElementById('newinvoice').reset()"><img src="https://www.benfund.com/images/elements/buttons/reset.gif" border="0"></a>
<input type="image" src="https://www.benfund.com/images/elements/buttons/submit.gif" value="Submit" onclick="validateRow(this.form);" />
</center>
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
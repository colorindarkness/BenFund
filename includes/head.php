<?php if($REMOTE_ADDR == "67.169.233.1811"){ ?>
<div style="background-color: #000000; border: 1px solid #00FF00; position: absolute; left: 0px; top: 0px; padding: 4px;"><span style="font: bold 14px 'Terminal'; color: #00FF00;">
System Diagnostics:<p>
<?php echo '$mid: '.$mid.'<br>$cid: '.$cid.'<br>$pw: '.$pw.'<br>$m_type: '.$m_type.'<br>$ref: '.$ref.'<br>$acct_verified: '.$acct_verified;?>
</span></div>
<?php } ?>
<link rel="stylesheet" href="https://www.benfund.com/includes/css/style.css" type="text/css" />
<style type="text/css">
#tooltip {
	opacity: 0.95;
	font-family: Arial;
	border: none;
	width: 200px;
	padding-top:20px;
	height: 135px;
	background: url('https://www.benfund.com/images/elements/bt.png') no-repeat top;
	text-decoration:none;
	text-align:center;
	}
	
#tooltip h3 {
	color:#3CA3FF;
	margin-bottom: 0.75em;
	font-size: 10pt;
	width: 220px;
	text-align: center;
}

#tooltip p {
	width: 190px;
	color: #4169E1;
	text-align: center;
	/*<!--background: url(https://www.benfund.com/images/elements/bt_fill.png) no-repeat top;-->*/
 }
</style>
<LINK REL="shortcut icon" HREF="https://www.benfund.com/favicon.ico">
<script type="text/javascript" src="https://www.benfund.com/includes/js/common.js"></script>
<!--<script type="text/javascript" src="https://www.benfund.com/includes/js/octopus.js"></script>-->
<script LANGUAGE="JavaScript">

function confirmDelete()
{
var agree=confirm("Are you SURE you want to Delete this Record?");
if (agree)
	return true ;
else
	return false ;
}
</script>
<script type="text/javascript">
function sfHover() {
	var sfEls = document.getElementById("nav").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
</script>
<!--<script src="https://www.benfund.com/includes/js/sleight.js"></script>-->
<!--[if IE]>
 <script src="https://www.benfund.com/includes/js/bgsleight.js" language="javascript" type="text/javascript" defer></script>
<![endif]-->
<script language="JavaScript1.2" src="https://www.benfund.com/includes/js/jquery.js" type="text/javascript"></script>
<script language="JavaScript1.2" src="https://www.benfund.com/includes/js/jquery.cookie.js" type="text/javascript"></script>
<script language="JavaScript1.2" src="https://www.benfund.com/includes/js/fontsizer.js" type="text/javascript"></script>
<script src="https://www.benfund.com/includes/js/jquery.tooltip.js" type="text/javascript"></script>
<script>
$(function() {

var options = { min: -1, max: 5};

//Initialize the font sizer for the site.
$.FontSizer.Init(options);

});
</script>

<script type="text/javascript" src="https://www.benfund.com/includes/js/wom.js"></script>
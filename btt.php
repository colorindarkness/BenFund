<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BenFund</title>
<style type='text/css'>
.stretchtoggle{
margin:4px 0;
padding:2px 8px;
cursor:pointer;
font-size: 14pt;
color: #0000CC;
text-decoration: none;
font-weight: bold;
}
.stretch_active{
margin:4px 0;
padding:2px 8px;
cursor:pointer;
font-size: 14pt;
color: #0000CC;
text-decoration: none;
font-weight: bold;
}

.stretchtoggle, .stretch_active {-moz-border-radius:4px;}
</style>
<!---->
<link rel="stylesheet" href="https://www.benfund.com/includes/css/style.css" type="text/css" />

<script language="JavaScript1.2" src="https://www.benfund.com/includes/js/styleswitcher.js" type="text/javascript"></script>

<script type="text/javascript" src="https://www.benfund.com/includes/js/common.js"></script>

<script LANGUAGE="JavaScript">

function confirmDelete()
{
var agree=confirm("Are you SURE you want to Delete this Account?");
if (agree)
	return true ;
else
	return false ;
}
</script>

<script type="text/javascript">
sfHover = function() {
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
if (window.attachEvent) window.attachEvent("onload", sfHover);
</script>
<script src="https://www.benfund.com/includes/js/sleight.js"></script>
<script src="https://www.benfund.com/includes/js/sorttable.js"></script>
<script type="text/javascript" src="https://www.benfund.com/includes/js/prototype.lite.js"></script>
<script type="text/javascript" src="https://www.benfund.com/includes/js/moo.fx.js"></script>      
<script type="text/javascript" src="https://www.benfund.com/includes/js/moo.fx.pack.js"></script>

<script type='text/javascript'>
window.onload = function()
{
  var mooTogs    = document.getElementsByClassName('stretchtoggle');
  var mooStretch = document.getElementsByClassName('stretcher');

  // must be before mooAccordion
  mooTogs.each(function(tog, i) {
    tog.onclick = function() {
      if (tog.className == 'stretch_active') {
        mooAccordion.clearAndToggle(mooStretch[i], i);
        tog.className = 'stretchtoggle';

        // automatically show the next stretcher (unless we're the last one)
        if (i+1 != mooTogs.length) {
          mooTogs[i+1].className='stretch_active';
          mooAccordion.clearAndToggle(mooStretch[i+1], i+1);
        }

        return;
      }

      // reset then all then set clicked
      mooTogs.each(function(rtog, ri) {mooTogs[ri].className = 'stretchtoggle';});
      tog.className='stretch_active';
    };
  });

  // could not get onComplete:function(el){} to achieve this effect
  var mooAccordion = new fx.Accordion(mooTogs, mooStretch, {opacity:true, width:false, height:true});

  // stretcher to open initially
  mooAccordion.showThisHideOpen(mooStretch[0]);
  mooTogs[0].className='stretch_active'
}

</script>

<script type="text/javascript" src="https://www.benfund.com/includes/js/btt.js"></script>
<script type="text/javascript">
window.onload=function(){enableTooltips()};
</script>
<link media="screen" href="https://www.benfund.com/includes/css/bt.css" rel="stylesheet" type="text/css" style="display: block;" class="undefined">
</head>
<body>
<b alt="poop on you!"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></btt>
<div id="container">
<h1>Bubble Tooltips</h1>
<p>By Alessandro Fulciniti. You may <b alt="poop on you!"><img src="https://www.benfund.com/images/elements/icons/sm/info.gif" border="0"></btt> or have some fun rolling on links.</p>
<p>Ioieoou u aiaiii eeo uuouai <a href="http://pro.html.it/">Pro</a>
euoiuo iaoieiu uue oo uoii ouau iiueoaio oieae auio eea eeuiu aiueoe i
iiueoea e iiiuooea ooa aua i uuo uuiai u ueiou uiu. Ueei eu i iuie ua
iauueo ii eiuue eaei ou iaaa ieuei eieeiui oei euoeee eoooeoe uooeo au
oiiio iouioeu uouiiia euu iaueiiu euiauoo eue ai i ioieua uuea ie oeao
o uui oeeee aoi.</p>
<p>Uiuae ueoui eoie eaeooe u uaoeieu eeoe uiuia iieuoo iui eeo ee <a href="http://web-graphics.com/mtarchive/001622.php">how to style a restaurant menu</a>
a ie e. Ooeuieo ieiouiei oieaia ueuo oaeeaio iuau ueo uu i eei eioi.
Ueeo aeaeuoi ouoeiu ieeue ouiu uaeoo uuoeu ioeou eeoui oeuiouu oouoie
eiou e oi i uio iu ieo oeouuoo u i ooueeeo e ua a oioou iio uee oi eioo
oeoou uuaaoau ueeoeoo.</p>
<p>Eeii oeo u oiao ooi oaiooo iu iuouuu <a href="http://pro.html.it/esempio/nifty">Nifty Corners</a>
uiuoe ooueee uuuu ioui u iu uu ueii iuaeo euuie iioai ieeuiii oooeoia
ie aaauuee iiau ieoiu uea iee iaeui eeouuae ieeuo eau i eiueii uoioa
eeo uu.</p>
<p>Iiaa ooooe uo oiuu uiiio oooee aooou uaeuuuu <a href="http://pro.html.it/print_articolo.asp/id_599/stampa.html">More Nifty Corners</a> ueao uuiieo iuuou. Eaeoo iioiueu oee ai aeiuuo iiua eei eo ueau oeeaiooa aui aieo oe oeoeuei euuu uiie oeiioue aiueuei .</p>
</div>
<span style="position: absolute; top: 73px; left: 577px;" id="btc"></span></body></html>
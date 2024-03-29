	/*
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 Bitflux GmbH                                      |
// +----------------------------------------------------------------------+
// | Licensed under the Apache License, Version 2.0 (the "License");      |
// | you may not use this file except in compliance with the License.     |
// | You may obtain a copy of the License at                              |
// | http://www.apache.org/licenses/LICENSE-2.0                           |
// | Unless required by applicable law or agreed to in writing, software  |
// | distributed under the License is distributed on an "AS IS" BASIS,    |
// | WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or      |
// | implied. See the License for the specific language governing         |
// | permissions and limitations under the License.                       |
// +----------------------------------------------------------------------+
// | Author: Bitflux GmbH <devel@bitflux.ch>                              |
// +----------------------------------------------------------------------+

*/
var liveSearchReq = false;
var t = null;
var liveSearchLast = "";
	
var isIE = false;
// on !IE we only have to initialize it once
if (window.XMLHttpRequest) {
	liveSearchReq = new XMLHttpRequest();
}

function liveSearchInit() {
	
	if (navigator.userAgent.indexOf("Safari") > 0) {
		document.getElementById('livesearch').addEventListener("keydown",liveSearchKeyPress,false);
//		document.getElementById('livesearch').addEventListener("blur",liveSearchHide,false);
	} else if (navigator.product == "Gecko") {
		
		document.getElementById('livesearch').addEventListener("keypress",liveSearchKeyPress,false);
		document.getElementById('livesearch').addEventListener("blur",liveSearchHideDelayed,false);
		
	} else {
		document.getElementById('livesearch').attachEvent('onkeydown',liveSearchKeyPress);
//		document.getElementById('livesearch').attachEvent("onblur",liveSearchHide,false);
		isIE = true;
	}
	
	document.getElementById('livesearch').setAttribute("autocomplete","off");

}

function liveSearchHideDelayed() {
	window.setTimeout("liveSearchHide()",400);
}
	
function liveSearchHide() {
	document.getElementById("LSResult").style.display = "none";
	var highlight = document.getElementById("LSHighlight");
	if (highlight) {
		highlight.removeAttribute("id");
	}
}

function liveSearchKeyPress(event) {
	
	if (event.keyCode == 40 )
	//KEY DOWN
	{
		highlight = document.getElementById("LSHighlight");
		if (!highlight) {
			highlight = document.getElementById("LSShadow").firstChild.firstChild;
		} else {
			highlight.removeAttribute("id");
			highlight = highlight.nextSibling;
		}
		if (highlight) {
			highlight.setAttribute("id","LSHighlight");
		} 
		if (!isIE) { event.preventDefault(); }
	} 
	//KEY UP
	else if (event.keyCode == 38 ) {
		highlight = document.getElementById("LSHighlight");
		if (!highlight) {
			highlight = document.getElementById("LSResult").firstChild.firstChild.lastChild;
		} 
		else {
			highlight.removeAttribute("id");
			highlight = highlight.previousSibling;
		}
		if (highlight) {
				highlight.setAttribute("id","LSHighlight");
		}
		if (!isIE) { event.preventDefault(); }
	} 
	//ESC
	else if (event.keyCode == 27) {
		highlight = document.getElementById("LSHighlight");
		if (highlight) {
			highlight.removeAttribute("id");
		}
		document.getElementById("LSResult").style.display = "none";
	} 
	//BACKSPACE - required for IE
	else if (event.keyCode == 8 && isIE) {
		liveSearchStart();
	}
}
function liveSearchStart() {
	if (t) {
		window.clearTimeout(t);
	}
	t = window.setTimeout("liveSearchDoSearch()",200);
}

function liveSearchDoSearch() {

	if (typeof liveSearchRoot == "undefined") {
		liveSearchRoot = "";
	}
	if (typeof liveSearchRootSubDir == "undefined") {
		liveSearchRootSubDir = "";
	}
	if (typeof liveSearchParams == "undefined") {
		liveSearchParams2 = "";
	} else {
		liveSearchParams2 = "&" + liveSearchParams;
	}
	if (liveSearchLast != document.forms.searchform.q.value) {
	if (liveSearchReq && liveSearchReq.readyState < 4) {
		liveSearchReq.abort();
	}
	if ( document.forms.searchform.q.value == "") {
		liveSearchHide();
		liveSearchLast = "";
		return false;
	}
	if (window.XMLHttpRequest) {
	// branch for IE/Windows ActiveX version
	} else if (window.ActiveXObject) {
		liveSearchReq = new ActiveXObject("Microsoft.XMLHTTP");
	}
	liveSearchReq.onreadystatechange= liveSearchProcessReqChange;
	liveSearchReq.open("GET", liveSearchRoot + "/acct/recipient.php?q=" + document.forms.searchform.q.value + liveSearchParams2);
	liveSearchLast = document.forms.searchform.q.value;
	liveSearchReq.send(null);
	}
}

function liveSearchProcessReqChange() {
	
	if (liveSearchReq.readyState == 4) {
		var  res = document.getElementById("LSResult");
		res.style.display = "block";
		var  sh = document.getElementById("LSShadow");
		
		res.innerHTML = liveSearchReq.responseText;
		 
	}
}

function liveSearchSubmit() {
	var highlight = document.getElementById("LSHighlight");
	if (highlight && highlight.firstChild) {
		window.location = liveSearchRoot + liveSearchRootSubDir + highlight.firstChild.nextSibling.getAttribute("href");
		return false;
	} 
	else {
		return true;
	}
}




/* preview comment code */


function preview(request){
    //
    var previewNode = $('previewComment');

    if (!previewNode) {
        var lastComment = $('bx_foo');
        var previewNode = document.createElement("div");
        previewNode.id = 'previewComment';
        previewNode.className = 'post_content';
        previewNode = lastComment.parentNode.insertBefore(previewNode,lastComment.nextSibling);

    }
    previewNode.innerHTML = request.responseText;
}


function previewSubmit(test) {
    var name = document.getElementById('name').value;
    var mail = document.getElementById('email').value;
    var uri = document.getElementById('openid_url').value;
    var text = document.forms['bx_foo']['comments'].value;

    var f = document.forms['commentForm'];
	if (typeof liveSearchRoot == "undefined") {
		var liveSearchRoot = "/";
	}

    body = "mail=" + encodeURIComponent(mail) + "&uri="+ encodeURIComponent(uri) + "&text="+ encodeURIComponent(text) + "&name="+ encodeURIComponent(name);
    new ajax (liveSearchRoot + 'inc/bx/php/preview.php', {
        postBody: body,
                method: 'post',
                onComplete: preview
    });


    return false;
}

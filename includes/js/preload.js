document.write('<div id="loading"><p><br><img src="https://www.benfund.com/images/elements/loading.gif"><p><span class="emphasis">Please wait while this page loads.</span></p></div>');

// Created by: Simon Willison | http://simon.incutio.com/
function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}
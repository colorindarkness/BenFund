// Javascript by Gilbert Hyatt
// http://pajaj.sourceforge.net
// In Association with Dragon Labs & Octopus Engine
// http://dragon-labs.com/articles/octopus

function addEvent(obj, evType, fn) {
    if (obj.addEventListener) {
        obj.addEventListener(evType, fn, true);
        return true;
    } else if (obj.attachEvent) {
        var r = obj.attachEvent("on"+evType, fn);
        return r;
    } else {
        return false;
    }
}

var initOctopusDone = false;

function initOctopus() {
      if (initOctopusDone) { return true; }

    classTree     = new Array(3);
    classTree[0]  = ["north","east","south","west","ne","se","sw","nw"];
    classTree[1]  = ["faux","north","south"];
    classTree[2]  = ["north", "east", "west", "south"];
    classNames    = ['octopus', 'squid', 'swordfish'];
   
    tempdivs = [];
    divs = document.getElementsByTagName('div');
    for (i=0;i<divs.length;i++) {
        for (j=0; j<3; j++) {
            cdiv = divs[i];
            if (cdiv.className.indexOf(classNames[j]) > -1) {
                tempinner = cdiv.innerHTML;
                cdiv.innerHTML = "";
                prevdiv = cdiv;
                for (a=0; a<classTree[j].length; a++) {
                    tempdivs[a]           = document.createElement('div');
                    tempdivs[a].className = classTree[j][a];
                    prevdiv.appendChild(tempdivs[a]);
                    prevdiv = tempdivs[a];
                }
                prevdiv.innerHTML = tempinner;
            }
        }
    }
      initOctopusDone = true;
}

if (document.getElementById && document.createElement) {
    addEvent(window, 'load', initOctopus);
}
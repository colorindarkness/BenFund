function alphaBackgrounds() {
 for (i=0; i<document.all.length; i++) {
  var bg = document.all[i].currentStyle.backgroundImage;
  if (bg) {
   if (bg.match(/\.png/i) != null) {
    var mypng = bg.substring(5,bg.length-2);
    document.all[i].style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+mypng+"', sizingMethod='crop')";
    document.all[i].style.backgroundImage = "url('https://www.benfund.com/images/elements/blank.gif')";
   }
  }
 }
}
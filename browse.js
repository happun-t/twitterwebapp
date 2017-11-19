//windows10 visualstudio2017

var br = navigator.userAgent.toLowerCase();
var version = navigator.appVersion.toLowerCase();


// IE(11ˆÈŠO)
var msie = (br.indexOf('msie') > -1) && (br.indexOf('opera') == -1);
// IE6
var ie6 = msie && (verion.indexOf('msie 6.') > -1);
// IE7
var ie7 = msie && (verion.indexOf('msie 7.') > -1);
// IE8
var ie8 = msie && (verion.indexOf('msie 8.') > -1);
// IE9
var ie9 = msie && (verion.indexOf('msie 9.') > -1);
// IE10
var ie10 = msie && (verion.indexOf('msie 10.') > -1);
// IE11
var ie11 = (br.indexOf('trident/7') > -1);
// IE
var ie = msie || ie11;
// Edge
var edge = (br.indexOf('edge') > -1);

// Google Chrome
var chorme = (br.indexOf('chrome') > -1) && (br.indexOf('edge') == -1);
// Firefox
var firefox = (br.indexOf('firefox') > -1);
// Safari
var safari = (br.indexOf('safari') > -1) && (br.indexOf('chrome') == -1);
// Opera
var opera = (br.indexOf('opera') > -1);


if (ie) {
    alert('IE');
}
if (ie6) {
    alert('IE6');
}
if (ie7) {
    alert('IE7');
}
if (ie8) {
    alert('IE8');
}
if (ie9) {
    alert('IE9');
}
if (ie10) {
    alert('IE10');
}
if (ie11) {
    alert('IE11');
}
if (edge) {
    alert('Edge');
}

if (chorme) {
    alert('Google Chrome');
}
if (firefox) {
    alert('Firefox');
}
if (safari) {
    alert('Safari');
}
if (opera) {
    alert('Opera');
}


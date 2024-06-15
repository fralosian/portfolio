//////////////////////////////////
// Copyright © 2003 SystemBoys  //
// Garotos de Sistema em 2003   //
// Marcos Aurélio R. Silva      //
// systemboy_marcos@hotmail.com //
// (86)99350406                 //
//////////////////////////////////

// bloquear clique inverso
<!--


function clickIE() {

if (document.all) {

return false;

}

} 

function clickNS(e) {

if (document.layers||(document.getElementById&&!document.all)) { 

if (e.which==2||e.which==3) {

return false;

}

}

} 

if (document.layers) {

document.captureEvents(Event.MOUSEDOWN);

document.onmousedown=clickNS;

} 

else{

document.onmouseup=clickNS;

document.oncontextmenu=clickIE;

} 

document.oncontextmenu=new Function("return false")
//-->

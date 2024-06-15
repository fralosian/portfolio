
function SomenteNumero(e){
  var tecla=(window.event)?event.keyCode:e.which;   
  if((tecla>47 && tecla<58)) return true;
  else{
   if (tecla==8 || tecla==0) return true;
   else  return false;
   return ""
 }
};

function downloadCurriculo(){
  var divCurriculo = $(".curriculo").text();    
  $("#orcamentoAssuntoForm").val(divCurriculo);
};

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});

$(document).ready(function () {
  $(".navbar-toggle").on("click", function () {
    $(this).toggleClass("active");
  });
});

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});

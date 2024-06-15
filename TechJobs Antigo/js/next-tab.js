$(document).ready(function() {
  /*disable non active tabs*/
  $('#navCadastro li').not('.active').addClass('disabled');
  $('#navCadastro li').not('.active').find('a').removeAttr("data-toggle");

  $('button.next').click(function(){
    $lia = $('#navCadastro  li.active');
    $li = $('#navCadastro  li.active').next('li');

    /*enable next tab*/
    $li.removeClass('disabled');
    $li.find('a').attr("data-toggle","tab");
    /*toggle tab*/
    $li.find('a').click();

    /*disable previous tab*/
    $lia.addClass('disabled');
    $lia.find('a').removeAttr("data-toggle");
  });
  $('button.previous').click(function(){
    $lia = $('#navCadastro li.active');
    $li = $('#navCadastro  li.active').prev('li');

    /*enable next tab*/
    $li.removeClass('disabled');
    $li.find('a').attr("data-toggle","tab");
    /*toggle tab*/
    $li.find('a').click();

    /*disable previous tab*/
    $lia.addClass('disabled');
    $lia.find('a').removeAttr("data-toggle");
  });
});

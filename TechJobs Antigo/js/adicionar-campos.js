$(document).ready(function() {
  var max_fields = 10; //maximum input boxes allowed
  var wrapper = $(".input_fields_wrap"); //Fields wrapper
  var add_button = $(".add_field_button"); //Add button ID

  var x = 1; //initlal text box count
  $(add_button).click(function(e) { //on add input button click
    e.preventDefault();
    var length = wrapper.find("input:text").length;

    if (x < max_fields) { //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div class="col-lg-12"><input type="text" class="form-control col-lg-10" name="Texto' + (length+1) + '" /><a href="#" class="remove_field btn btn-danger col-lg-2"><span class="glyphicon glyphicon-minus"></span> Remover</a></div>'); //add input box
    }
    //Fazendo com que cada uma escreva seu name

  });

  $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});
//INICIO Adicionar CURSOS//
$(document).ready(function() {
  var max_fields = 3; //Maximo de inputs permitidos
  var wrapper = $(".input_curso"); //Fields wrapper
  var add_button = $(".add_curso_button"); //Add button ID
  var x = 1; //contagem inicial dos input-text
  
  $(add_button).click(function(e) { //adicionar quando clicar no botao
    e.preventDefault();
    var length = wrapper.find("input:text").length;

    if (x < max_fields) { //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div class="curso"><div class="form-group col-lg-12"><div class="input-group col-xs-12"><label class="hidden-sm hidden-md hidden-lg">Curso</label><span class="input-group-addon hidden-xs ">Curso </span><input class="form-control" type="text" name="curso' + (length) + '" /></div></div><div class="form-group col-lg-12"><div class="input-group col-xs-12"><label class="hidden-sm hidden-md hidden-lg">Instituição</label><span class="input-group-addon hidden-xs ">Instituição</span><input class="form-control" name="intituicaoCurso' + (length) + '" type="text" id="intituicaoCurso1"></div></div><div class="form-group col-lg-4 col-md-6 col-sm-6"><div class="input-group"><label class="hidden-sm hidden-md hidden-lg">Ano de Conclusão</label><span class="input-group-addon hidden-xs ">Ano de Conclusão</span><select class="form-control col-lg-6" name="previsaoCurso' + (length) + '"><option value=""></option><option value="Concluído em:">Concluído em:</option><option value="Previsão de conclusão em:">Previsão de conclusão em:</option></select></div></div><div class="col-lg-4 col-md-4 col-sm-4"><input class="form-control" maxlength="4" name="' + (length) + '" type="text" id="anoCurso' + (length) + '"  placeholder="Ano"></div><a href="#" class="remove_field btn btn-danger"><span class="glyphicon glyphicon-minus"></span> Remover</a></div>'); //add input box
      if (x == 3) {
        $(".add_curso_button").hide();
      }
    }

  });

  $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
    $(".add_curso_button").show();
  })

});
//FIM Adicionar CURSOS//
//INICIO Adicionar lingua//
$(document).ready(function() {
  var max_fields = 3; //Maximo de inputs permitidos
  var wrapper = $(".input_linguas"); //Fields wrapper
  var add_button = $(".add_linguas_button"); //Add button ID
  var x = 1; //contagem inicial dos input-text
  
  $(add_button).click(function(e) { //adicionar quando clicar no botao
    e.preventDefault();
    var length = wrapper.find("select").length;

    if (x < max_fields) { //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div class="linguas col-lg-12"><div class="form-group col-lg-3"><div class="input-group col-xs-12"><label class="hidden-sm hidden-md hidden-lg">Idiomas</label><span class="input-group-addon hidden-xs ">Idiomas </span><select class="form-control" name="idioma' + (length) + '"><option value="">Selecione</option><option value="Inglês">Inglês</option><option value="Espanhol">Espanhol</option><option value="Francês">Francês</option><option value="Japonês">Japonês</option></select></div></div><div class="form-group col-lg-3"><div class="input-group col-xs-12"><label class="hidden-sm hidden-md hidden-lg">Nível</label><span class="input-group-addon hidden-xs ">Nível </span><select class="form-control" name="idiomaNivel' + (length) + '"><option value="">Selecione</option><option value="básico">Básico</option><option value="intermediário">Intermediário</option><option value="flunte">Fluente</option><option value="nativo">Nativo</option></select></div></div><a href="#" class="remove_field_linguas btn btn-danger"><span class="glyphicon glyphicon-minus"></span> Remover</a></div>'); //add input box
      if (x == 3) {
        $(".add_linguas_button").hide();
      }
    }

  });

  $(wrapper).on("click", ".remove_field_linguas", function(e) { //user click on remove text
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
    $(".add_linguas_button").show();
  })

});
//FIM Adicionar lingua//
//INICIO adicionar EXPERIENCIA
$(document).ready(function() {
  var max_fields = 3; //maximum input boxes allowed
  var wrapper = $(".input_fields_exp"); //Fields wrapper
  var add_button = $(".add_exp_button"); //Add button ID

  var x = 1; //initlal text box count
  $(add_button).click(function(e) { //on add input button click
    e.preventDefault();
    var length = wrapper.find("input:text").length;

    if (x < max_fields) { //max input box allowed        ' + (length+1) + '
      x++; //text box increment
      $(wrapper).append('<div class="form-group col-lg-12"><div class="form-group col-lg-12"><div class="input-group col-xs-12"><label class="hidden-sm hidden-md hidden-lg">Cargo</label><span class="input-group-addon hidden-xs ">Cargo</span><input name="expFuncao' + (length) + '" type="text" id="expFuncao" class="form-control"></div></div> <div class="form-group col-lg-4"><div class="input-group col-xs-12"><label class="hidden-sm hidden-md hidden-lg">Empresa</label><span class="input-group-addon hidden-xs ">Empresa</span><input name="expEmpresa' + (length) + '" type="text" id="expEmpresa" class="form-control"></div></div><div class="col-lg-4 col-md-6 col-sm-6 "><div class="input-group"><label class="hidden-sm hidden-md hidden-lg">Mês e ano de Entrada</label><span class="input-group-addon hidden-xs ">Mês e ano  de Entrada</span><input name="expEntrada' + (length) + '" type="text" id="expEntrada" maxlength="7" class="form-control" placeholder="mm/aaaa"></div></div><div class="col-lg-4 col-md-6 col-sm-6 form-group"><div class="input-group"><label class="hidden-sm hidden-md hidden-lg">Mês e ano  de Saída</label><span class="input-group-addon hidden-xs ">Mês e ano de Saída</span><input name="expSaida' + (length) + '" type="text" id="expSaida" maxlength="7" placeholder="mm/aaaa" class="form-control"></div></div><a href="#" class="remove_field_experiencias btn btn-danger text-center"><span class="glyphicon glyphicon-minus"></span> Remover</a></div>'); //add input box
      if (x == 3) {
        $(".add_exp_button").hide();
      }
    }
    //Fazendo com que cada uma escreva seu names
    /*wrapper.find("input:text").each(function() {
      $(this).val($(this).attr('name'))
    });*/
  });

  $(wrapper).on("click", ".remove_field_experiencias", function(e) { //user click on remove text
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
    $(".add_exp_button").show();
  })
});
//FIM adicionar ESPERIÊNCIA

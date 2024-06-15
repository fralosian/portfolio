<?php require_once("link.html");require_once("db.php");

//vê se nao existe seção.abre uma nova
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
  // Destrói a sessão por segurança
	session_destroy();
  // Redireciona o visitante de volta pro login
	header("Location: index.php"); exit;
}elseif($_SESSION['UsuarioNivel'] == 1){

	$verificaCadastro = mysql_query("SELECT * FROM aluno WHERE `Cadastro_id_cadastro` = '$_SESSION[UsuarioID]'");
	if(mysql_num_rows($verificaCadastro) == 1) {

		header("formInserirCadastro");

	}else{

	}
}elseif ($_SESSION['UsuarioNivel'] == 2) {
	header("Location: empresa-home.php"); exit;
}else{
   // Destrói a sessão por segurança
	session_destroy();
  // Redireciona o visitante de volta pro login
	header("Location: index.php"); exit;;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro - Techjobs</title>
	<script  src="js/mascara.js" type="text/javascript"></script>
</head>
<body>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="aluno-home.php"><img id="logonav" alt="logo" src="img/logo-br.png" style="width:90px;height:21px">
				</a>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="well">

			<ul id="navCadastro" class="nav nav-tabs">
				<li class="nav active"><a data-toggle="tab" href="#tabDados">Suas informações</a></li>
				<li ><a data-toggle="tab" href="#tabCurriculo">Curriculo</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade in active" id="tabDados" role="tabpanel">
					<div class="row ">
						<div  class="text-center">
							<!-- FORMULARIO DE INSERT DOS DADOS-->
							<form method="POST" action="" id="" name="formInformacoes">
								<div class='alert alert-warning text-center fade in'>Esse é seu primeiro login, Bem Vindo!  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><br> Antes continuar, preencha com seus dados CORRETAMENTE, pois com eles será feito o seu curriculo </div>
								<div class="col-lg-offset-2 col-lg-8 col-xs-12">               
									<div class="form-group col-lg-12">
										<h4>Suas Informações:</h4>  
										<hr>
										<div class="col-lg-6 ">
											<div class="form-group col-lg-12">
												<div class="input-group col-xs-12">
													<label class="hidden-sm hidden-md hidden-lg">RM</label>
													<span class="input-group-addon hidden-xs ">RM:</span>
													<input name="rm" id="rm" type="text" onkeypress='return SomenteNumero(event)' class="form-control"  aria-describedby="basic-addon1" required>
												</div>
											</div>
											<div class="form-group col-lg-12">
												<div class="input-group col-xs-12">
													<label class="hidden-sm hidden-md hidden-lg">CPF</label>
													<span class="input-group-addon hidden-xs ">CPF:</span>
													<input name="cpfAluno" id="cpfAluno" onkeypress="mascara(this, '###.###.###.##')" maxlength="14" type="text" class="form-control " onkeypress='return SomenteNumero(event)' data-toggle="tooltip" title="Somente Números" data-placement="bottom"  required>
												</div>
											</div>
											<div class="form-group col-lg-12">
												<div class="input-group col-xs-12">
													<label class="hidden-sm hidden-md hidden-lg">RG</label>
													<span class="input-group-addon hidden-xs ">RG: </span>
													<input onkeypress="mascara(this, '##.###.###-#')" maxlength="12" name="rgAluno" type="text" class="form-control" id="rgAluno" data-toggle="tooltip" title="Somente Números" data-placement="bottom"  required>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-xs-12">
											<div class="form-group col-lg-12">
												<div class="input-group col-xs-12">
													<label class="hidden-sm hidden-md hidden-lg ">Celular</label>
													<span class="input-group-addon hidden-xs ">Celular: </span>
													<input name="celularAluno" id="celular" type="text" class="form-control" id=""  data-toggle="tooltip" title="DDD xxxxx-xxxx Somente Números" data-placement="bottom"  onkeypress="mascara(this, '## #####-####')" maxlength="13"  required>
												</div>
											</div>
											<div class="form-group col-lg-12">
												<div class="input-group col-xs-12">
													<label class="hidden-sm hidden-md hidden-lg">Data de Nascimento</label>
													<span class="input-group-addon hidden-xs ">Data de Nascimento: </span>
													<input placeholder="" name="dataNascimento" type="date"  data-toggle="tooltip" title="dd-mm-aaaa" data-placement="bottom" class="form-control" id="dataNascimento"  onkeypress="mascara(this, '##-##-####')" maxlength="10" required>
												</div>
											</div>
											<div class="form-group col-lg-12">
												<div class="input-group col-xs-12">
													<label class="hidden-sm hidden-md hidden-lg">Sexo</label>
													<span class="input-group-addon hidden-xs ">
														Sexo 
													</span>

													<select class="form-control col-lg-12" name="sexo" id="sexo" required>
														<option value="">Selecione</option>
														<option value="M">Masculino</option>
														<option value="F">Feminino</option>
													</select>

												</div>
											</div>              
										</div>
									</div>
									<hr>
									<div class="form-group ">
										<div class="form-group col-lg-12 ">
											<h4>Endereço</h4>  
											<hr>
											<div class="col-lg-6">
												<div class="form-group col-lg-12">
													<div class="input-group col-xs-12">
														<label class="hidden-sm hidden-md hidden-lg">Rua</label>
														<span class="input-group-addon hidden-xs ">Rua </span>
														<input name="rua" type="text" class="form-control" id="rua"  required>
													</div>
												</div>
												<div class="form-group col-lg-6">
													<div class="input-group col-xs-12">
														<label class="hidden-sm hidden-md hidden-lg">Nº</label>
														<span class="input-group-addon hidden-xs ">Nº </span>
														<input  name="numeroCasa" type="text" class="form-control" id="numeroCasa" required>
													</div>
												</div>
												<div class="form-group col-lg-6">
													<div class="input-group col-xs-12">
														<label class="hidden-sm hidden-md hidden-lg">CEP</label>
														<span class="input-group-addon hidden-xs">CEP </span>
														<input name="cep" type="text" class="form-control" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" required>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group col-lg-12">
													<div class="input-group col-xs-12">
														<label class="hidden-sm hidden-md hidden-lg">Bairro</label>
														<span class="input-group-addon hidden-xs ">Bairro </span>
														<input name="bairro" type="text" class="form-control" id="bairro" required>
													</div>
												</div>
												<div class="form-group col-lg-12">
													<div class="input-group col-xs-12">
														<label class="hidden-sm hidden-md hidden-lg">Cidade</label>
														<span class="input-group-addon hidden-xs ">Cidade </span>
														<input name="cidade" type="text" class="form-control" id="cidade" required/>
													</div>
												</div>
												<div class="form-group col-lg-12">
													<div class="input-group col-xs-12">
														<label class="hidden-sm hidden-md hidden-lg">Complemento</label>
														<span class="input-group-addon hidden-xs ">Complemento </span>
														<input name="complemento" type="text" class="form-control" id="complemento"/>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div align="center" class="col-lg-12 col-xs-12">
									<hr>
									<input type="submit" class="btn btn-primary" value="Enviar" name="cadAlunoInfo" id="cadAlunoInfo"/>
								</div>
							</form>
						</div>
					</div>
				</div>

				<?php require_once('formInserirCadastro.php') ?>

				<div class="tab-pane fade" id="tabCurriculo" role="tabpanel">
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="text-center">
								<form id="curriculo" method="POST" action="formInserirCurriculo.php">
									<?php 
									echo $id_aluno."oi";
									?>
									<input  type="text" name="idAluno" value="<?php echo $id_aluno ;?>">
									
									<div id="Formacao"  class="col-lg-12">
										<div class="form-group col-lg-12"><hr/>
											<strong>Formação Acadêmica</strong><hr/>
											<div class="input-group col-xs-12">
												<label class="hidden-sm hidden-md hidden-lg">Escolaridade</label>
												<span class="input-group-addon hidden-xs ">Escolaridade</span>
												<input class="form-control" type="text" name="escolaridade" placeholder="ex: Ensino Médio Completo" />
											</div>
										</div>
										<div class="form-group col-lg-12">
											<div class="input-group col-xs-12">
												<label class="hidden-sm hidden-md hidden-lg">Instituição de Ensino</label>
												<span class="input-group-addon hidden-xs ">Instituição de Ensino</span>
												<input class="form-control" type="text" name="instEscolar" />
											</div>
										</div>

										<div class="form-group col-lg-4 col-md-6 col-sm-6">
											<div class="input-group">
												<label class="hidden-sm hidden-md hidden-lg">Ano de Conclusão</label>
												<span class="input-group-addon hidden-xs ">Ano de Conclusão</span>
												<select class="form-control col-lg-6" name="previsaoEscolar">
													<option value=""></option>
													<option value="Concluído em:">Concluído em:</option>
													<option value="Previsão de conclusão em:">Previsão de conclusão em:</option>
												</select>									
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4">
											<input class="form-control" maxlength="4" name="anoEscolar" type="text" id="anoCurso1"  placeholder="Ano">
										</div>
									</div>

									<div id="cursos" class="col-lg-12">
										<hr/>
										<label class="col-lg-12">Cursos (Opcional)</label>
										<div class="form-group col-lg-12">
											<div class="input-group col-xs-12">
												<label class="hidden-sm hidden-md hidden-lg">Curso</label>
												<span class="input-group-addon hidden-xs ">Curso </span>
												<input class="form-control" type="text" name="curso" />
											</div>
										</div>
										<div class="form-group col-lg-12">
											<div class="input-group col-xs-12">

												<label class="hidden-sm hidden-md hidden-lg">Instituição</label>
												<span class="input-group-addon hidden-xs ">Instituição</span>
												<input class="form-control" name="intituicaoCurso" type="text" id="intituicaoCurso1">
											</div>
										</div>

										<div class="form-group col-lg-4 col-md-6 col-sm-6">
											<div class="input-group">
												<label class="hidden-sm hidden-md hidden-lg">Ano de Conclusão</label>
												<span class="input-group-addon hidden-xs ">Ano de Conclusão</span>
												<select class="form-control col-lg-6" name="previsaoCurso">
													<option value=""></option>
													<option value="Concluído em:">Concluído em:</option>
													<option value="Previsão de conclusão em:">Previsão de conclusão em:</option>
												</select>									
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4">
											<input class="form-control" maxlength="4" name="anoCurso" type="text" id="anoCurso1"  placeholder="Ano">
										</div>

										<div class="form-group col-lg-12">
											<div class="input_curso">


											</div>
										</div>

										<button class="add_curso_button btn btn-success"><span class="glyphicon glyphicon-plus"></span> Adicionar outro curso </button>

									</div>
									<div class="col-lg-12">
										<hr/>
										<strong>Linguas Estrangeiras</strong>
										<hr/>
										<div class="form-group col-lg-6">
											<div class="input-group col-xs-12">
												<label class="hidden-sm hidden-md hidden-lg">Nacionalidade</label>
												<span class="input-group-addon hidden-xs ">Nacionalidade</span>
												<input class="form-control" type="text" name="nacionalidade" value="Brasileiro">
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group col-lg-3">
											<div class="input-group col-xs-12">
												<label class="hidden-sm hidden-md hidden-lg">Idiomas</label>
												<span class="input-group-addon hidden-xs ">Idiomas </span>
												<select class="form-control" name="idioma">
													<option value="">Selecione</option>
													<option value="Inglês">Inglês</option>
													<option value="Espanhol">Espanhol</option>
													<option value="Francês">Francês</option>
													<option value="Japonês">Japonês</option>
												</select>
											</div>
										</div>
										<div class="form-group col-lg-3">
											<div class="input-group col-xs-12">
												<label class="hidden-sm hidden-md hidden-lg">Nível</label>
												<span class="input-group-addon hidden-xs ">Nível </span>
												<select class="form-control" name="idiomaNivel">
													<option value="">Selecione</option>
													<option value="básico">Básico</option>
													<option value="intermediário">Intermediário</option>
													<option value="flunte">Fluente</option>
													<option value="nativo">Nativo</option>
												</select>
											</div>
										</div>
										<div class="input_linguas">

										</div>
										<div >
											<button class="add_linguas_button btn btn-success"><span class="glyphicon glyphicon-plus"></span> Adicionar outra lingua</button>
										</div>
									</div>


									<div class="col-lg-12">
										<hr/>
										<strong>Experiência Profissional</strong><br>(max. três últimas experiências) <hr/>

										<div class="form-group col-lg-12"> 
											<div class="input-group col-xs-12">
												<label class="hidden-sm hidden-md hidden-lg">Cargo</label>
												<span class="input-group-addon hidden-xs ">Cargo</span>
												<input name="expFuncao" type="text" id="expFuncao" class="form-control">
											</div>
										</div>
										<div class="form-group col-lg-4"> 
											<div class="input-group col-xs-12">
												<label class="hidden-sm hidden-md hidden-lg">Empresa</label>
												<span class="input-group-addon hidden-xs ">Empresa</span>
												<input name="expEmpresa" type="text" id="expEmpresa" class="form-control">
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-sm-6 "> 
											<div class="input-group">
												<label class="hidden-sm hidden-md hidden-lg">Mês e ano de Entrada</label>
												<span class="input-group-addon hidden-xs ">Mês e ano  de Entrada</span>
												<input name="expEntrada" type="text" id="expEntrada" maxlength="10" class="form-control" placeholder="mm/aaaa">
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-sm-6">
											<div class="input-group">
												<label class="hidden-sm hidden-md hidden-lg">Mês e ano  de Saída</label>
												<span class="input-group-addon hidden-xs ">Mês e ano de Saída</span>
												<input name="expSaida" type="text" id="expSaida" maxlength="10" class="form-control" placeholder="mm/aaaa">
											</div>
										</div>
										<div class="input_fields_exp col-lg-12">

										</div>
										<div class="col-lg-12">
											<button class="add_exp_button btn btn-success"><span class="glyphicon glyphicon-plus"></span> Adicionar Experiência</button>

										</div>

									</div>

									<div align="center" class="col-lg-12 col-xs-12">
										<hr>
										<input type="submit" class="btn btn-primary" value="Enviar" name="cadAlunoInfo" id="cadAlunoCV"/>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--<div class="social"><img src="img/iconFacebook.png"><img src="img/empresas/techpro.png" style="width:;height:32px"></div>-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/adicionar-campos.js"></script>

	</body>
	</html>
<?php require_once('php/funcoes.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Banco de Dados</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/simple-sidebar.css" rel="stylesheet">
	
	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	
	<!-- delete ajax -->
	<script src="js/delete.js"></script>
	
	<!-- inserção de frase ajax -->
	<script src="js/insertFrase.js"></script>
	
	<!-- inserção de frase ajax -->
	<script src="js/insertPessoa.js"></script>
	
	<!-- delete de frase ajax -->
	<script src="js/deleteFrase.js"></script>
	
	<script>
		$(document).ready(function() {
			$('#table-date').DataTable();
		});
		/// teste para recarregar uma tag html atravez de um onclick
		//function recarregar() {
        // removes the ruleToRemove style rule that affects the table
            //var style = document.styleSheets[0];
            //style.removeRule (0);

                // refreshes the table 
            //var table = document.getElementById ("table-date");
            //table.refresh ();
        //}
        
        
        
        
    </script>
</head>

<body>

	<div id="wrapper">

		<!-- Sidebar -->
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li class="sidebar-brand">
					<a href="restrita.php">
						HOME
					</a>
				</li>
				<li>
					<a href="#page-content-wrapper">Banco de dados</a>
				</li>
				<li>
					<a href="form.html">Enviar email</a>
				</li>
				<li>
					<a href="deslogar.php">Sair</a>
				</li>
			</ul>
		</div>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<a href="#menu-toggle" class="navbar-brand" id="menu-toggle">MENU</a>
						</div>
					</div>
				</nav>
				<div class="col-lg-12">
					
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#select">Select</a></li>
						<li><a data-toggle="tab" href="#insert">Insert</a></li>
						<li><a data-toggle="tab" href="#delete">Delete</a></li>
						<li><a data-toggle="tab" href="#update">Update</a></li>
						<li><a data-toggle="tab" href="#old">Outros</a></li>
					</ul>

					<div class="tab-content">
						
						<!-- tab select -->
						
						<div id="select" class="tab-pane fade in active">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Select</h3></div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<table id="table-date" class="table table-hover" cellspacing="0">
												<thead>
													<tr>
														<th class="text-center">id</th>
														<th class="text-center">Nome</th>
														<th class="text-center">WhatsApp</th>
														<th class="text-center">Estado</th>
													</tr>
												</thead>
												<tbody>
													<?php
													conexao('PESSOA');
													$sql = mysql_query("SELECT * FROM PESSOA");
													while ($result = mysql_fetch_assoc($sql)){
														echo "<tr>";
														echo "<td>".$result["id"]."</td>";
														echo "<td>".$result["nome"]."</td>";
														echo "<td>".$result["whatsapp"]."</td>";
														echo "<td>".$result["estado"]."</td>";
														echo "</tr>";
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- tab insert -->
						<div id="insert" class="tab-pane fade">
							<h3 class="text-muted">Insert</h3><hr />
							<form role="form" id="formInsertContatos" action="" method="post">								
								<div class="form-group">
									<label align="right" class="text-muted col-sm-2 control-label" for="txtNome">nome: </label>
									<div class="col-sm-10">
										<input type="text" name="txtNome" placeholder="seu nome..." class="form-control" id="txtNome"/><br />
									</div>
								</div>
								<div class="form-group">
									<label align="right" class="text-muted col-sm-2 control-label" for="txtWhatsapp">WhatsApp: </label>
									<div class="col-sm-10">
										<input type="number" name="txtWhatsapp" placeholder="seu WhatsApp, obrigado..." class="form-control" id="txtWhatsapp"/><br />
									</div>
								</div>
								<div class="form-group">
									<label align="right" class="text-muted col-sm-2 control-label" for="txtStado">Estado: </label>
									<div class="col-sm-10">
										<select class="form-control selectpicker" name="txtStado" id="txtStado">
											<option value="estado" selected>Selecione o Estado</option> 
											<option value="ac">Acre</option> 
											<option value="al">Alagoas</option> 
											<option value="am">Amazonas</option> 
											<option value="ap">Amapá</option> 
											<option value="ba">Bahia</option> 
											<option value="ce">Ceará</option> 
											<option value="df">Distrito Federal</option> 
											<option value="es">Espírito Santo</option> 
											<option value="go">Goiás</option> 
											<option value="ma">Maranhão</option> 
											<option value="mt">Mato Grosso</option> 
											<option value="ms">Mato Grosso do Sul</option> 
											<option value="mg">Minas Gerais</option> 
											<option value="pa">Pará</option> 
											<option value="pb">Paraíba</option> 
											<option value="pr">Paraná</option> 
											<option value="pe">Pernambuco</option> 
											<option value="pi">Piauí</option> 
											<option value="rj">Rio de Janeiro</option> 
											<option value="rn">Rio Grande do Norte</option> 
											<option value="ro">Rondônia</option> 
											<option value="rs">Rio Grande do Sul</option> 
											<option value="rr">Roraima</option> 
											<option value="sc">Santa Catarina</option> 
											<option value="se">Sergipe</option> 
											<option value="sp">São Paulo</option> 													
											<option value="to">Tocantins</option> 
										</select><br />
									</div>
								</div>
								<input type="button" class="btn btn-primary btn-lg" id="btnGravar" name="btnGravar" value="Gravar" />
								
							</form>
						</div>
						
						
						<!-- tab delete -->
						<div id="delete" class="tab-pane fade">
							<h3 class="text-muted">Delete</h3><hr />
							<form role="form" action="" id="formDeleteId" method="post">
								<div class="form-group">
									<label align="right" class="text-muted col-sm-2 control-label" for="txtId">ID: </label>
									<div class="col-sm-10">
										<input type="number" name="txtId" placeholder="Id..." class="form-control" id="txtId"/><br />
									</div>
									<label align="right" class="text-muted col-sm-2 control-label" for="txtId">Tabela: </label>
									<div class="col-sm-10">
										<select class="form-control selectpicker" name="txtTable" id="txtTable">
											<option value="" selected>Selecione a Tabela</option> 
											<option value="FRASE">Frases</option>
											<option value="PESSOA">Pessoas</option>
										</select><br />
									</div>
								</div>
								<input type="button" class="btn btn-primary btn-lg" id="btnDeletar" name="btnDeletar" value="Deletar" />
							</form>
						</div>
						
						<!-- tab outros -->
						<div id="old" class="tab-pane fade">
							<h3 class="text-muted">Outras ferramentas</h3><hr />
							<ul class="nav nav-tabs">
								<li><a data-toggle="tab" href="#paneis">Frases Mais Faladas</a></li>
								<li class="active"><a data-toggle="tab" href="#insfra">Adicionar frase</a></li>
								<li><a data-toggle="tab" href="#upload">Upload de arquivos</a></li>
							</ul>
							<div class="tab-content">
								
								<!-- tab inseri frase -->
								<div id="insfra" class="tab-pane fade">
									<h3 class="text-muted">Insira uma frase</h3><hr />
									<form role="form" action="" method="post" id="insert-frase" >
										<div class="form-group">
											<label align="right" class="text-muted col-sm-2 control-label" for="txtFrase">Frase: </label>
											<div class="col-sm-10">
												<input type="text" name="txtFrase" placeholder="Frase..." class="form-control" id="txtFrase"/><br />
											</div>
											<label align="right" class="text-muted col-sm-2 control-label" for="txtAutor">Autor da frase: </label>
											<div class="col-sm-10">
												<input type="text" name="txtAutor" placeholder="Quem fala..." class="form-control" id="txtAutor"/><br />
											</div>
										</div>
										<input type="button" class="btn btn-primary btn-lg" id="btnInsFra" name="btnInsFra" value="Gravar" />
									</form>
								</div>
								
								<!-- tab delete -->
								<div id="upload" class="tab-pane fade">
									<h3 class="text-muted">Upload</h3><hr />
									<form role="form" name="upload" enctype="multipart/form-data" action="" method="post">
										<div class="form-group">
											<label align="right" class="text-muted col-sm-2 control-label" for="txtFile">Arquivo: </label>
											<div class="col-sm-10">
												<input type="file" name="arquivo" placeholder="arquivo..." class="form-control" id="txtFile"/><br />
											</div>
										</div>
										<button type="submit" class="btn btn-primary btn-lg" id="btnUp" name="btnUp">Upar</button>
									</form>
								</div>
								
								<!-- tab select frase -->
								<div name="paineis-frase" id="paneis" class="tab-pane fade">
									<h3 class="text-muted">Frases</h3><hr />
									<div id="paneis-frase">
										<?php
										conexao('FRASE');
										$sql2 = mysql_query("SELECT * FROM FRASE");
										while ($result2 = mysql_fetch_assoc($sql2)){
											echo "<div class=col-lg-4 id=painelFrase>";
											echo "<div class='panel panel-default'>";
											echo "<div class=panel-heading><h5 class=text-muted>".$result2["autor"]."</h5>";
											echo "<form role=form id=delete-frase name=delete-frase method=post action=''>";
											echo "<input type=button name=btnDeletePainel id=btnDeletePainel class=close value=&times />";
											echo "<input type=hidden id=id name=id value=".$result2['id']." ></input>";
											echo "</form>";
											echo "</div>";
											echo "<div class=panel-body><p class=text-muted>".$result2["frase"]."</p></div>";
											echo "</div>";
											echo "</div>";
										}
										?>
									</div>
								</div>
								
							</div>
						</div>
						
						
					</div>
					
				</div>
			</div>
		</div>
		<!-- /#page-content-wrapper -->
		
		
		
		
	</div>
	<!-- /#wrapper -->
	<div class="modal-load" id="loading"><img src="css/loader.gif" class="loading-gif" style="text-align: center;"/></div>

	<!-- Menu Toggle Script -->
	<script src="js/menu-toggle.js"></script>
	
	<?php
	// EFETUA O CADASTRO SE O BOTÃO GRAVAR FOR CLICADO
		error_reporting(0); // ELIMINA OS WARNINGS E ERRORS DURANTE  EXECUÇÃO DO PHP
		
		if(isset($_POST['btnUp']))
		{
			echo upload();
			unset($_POST['btnUp']);
		}
		
		
		?>

	</body>

	</html>
	
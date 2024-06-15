<?php require_once("db.php");require_once("link.html");

//vê se nao existe seção.abre uma nova
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
  // Destrói a sessão por segurança
	session_destroy();
  // Redireciona o visitante de volta pro login
	header("Location: index.php"); exit;
}elseif($_SESSION['UsuarioNivel'] == 1){
    //Verificar se ele é aluno e manter na pagina

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
<html lang="pt-br">
<head>
	<title> Vagas - TechJobs </title>

</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navBarAluno" aria-expanded="false">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="aluno-home.php">
					<img id="logonav" alt="logo" src="img/logo-br.png" style="width:90px;height:21px">
				</a>
			</div>
			<div class="collapse navbar-collapse" id="navBarAluno">
				<ul class="nav navbar-nav">
					<li><a href="aluno-home.php"> Início</a></li>
					<li><a href="aluno-curriculo.php"> Curriculo</a></li>
					<li class="active"><a href="vagas.php"> Buscar Vagas</a></li>
					<li class="disabled"><a href="#"> Minhas Inscrições</a></li>
					<li><a href="mensagens.php"> Mensagens <!--<span class="badge">3</span>--></a></li>
					<li><a href="aluno-conta.php"> Conta</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<?php

		$id_vaga = $_POST['id'];
		if ($id_vaga == 0) {

			header("Location:vagas.php"); exit;
		}
		$vaga = mysql_query("SELECT * FROM Vagas WHERE `id_vaga` = '$id_vaga'");
		$row = mysql_fetch_row($vaga);

		?>
		<div >
			<div class="panel panel-primary" align="center">
				
				<div class="panel-heading  text-center">
					<pre><h4>Vaga: <?php echo $row[1]; ?></h4></pre>
				</div>
				<div class="panel-body text-left">
					<pre><p><label>Descrição:</label>
<?php
echo $row[5]
?>	
					</p></pre>
					<pre><p><label>Periodo:</label> 
<?php
echo $row[6]
?>
					</p></pre>
					<pre><p><label>Exigencias:</label> 
<?php
echo $row[7]
?>	
					</p></pre>
					<pre><p><label>Beneficios:</label> 
<?php
echo $row[8]
?>	
					</p></pre>
				</div>
				<div class="panel-footer">
					<div>
						<input class="form-control" type="submit" name="" value="Candidatar-se">
					</div>
				</div>
			</div>

		</div>
	</div>

</body>
</html>


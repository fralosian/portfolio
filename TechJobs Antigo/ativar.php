<?php
require_once("db.php");
require_once("link.html");
// Dados vindos pela url
$id = $_GET['id'];
$emailMd5 = $_GET['email'];
$codigoMd5 = $_GET['codigo'];

//Buscar os dados no banco
$sql = "SELECT * from cadastro where id_cadastro = '$id'";
$query = mysql_query($sql);
$rs = mysql_fetch_array($query);

// Comparar os dados que pegamos no banco, com os dados vindos pela url
$valido = true;

if( $emailMd5 !== md5($rs['email']))
	$valido = false;

if( $codigoMd5 !== md5($rs['codigo']))
	$valido = false;

// Os dados estão corretos, hora de ativar o cadastro
if( $valido === true) 
{
	if (!isset($_SESSION)) session_start();
	$_SESSION['UsuarioID'] = $id;

	$sql = "UPDATE cadastro set ativo='1' where id_cadastro='$id'";
	mysql_query($sql);
	$nav = '<nav class="navbar navbar-inverse"><div class="container-fluid"><div class="navbar-header"><a class="navbar-brand" href="aluno-home.php"><img id="logonav" alt="logo" src="img/logo-br.png" style="width:90px;height:21px"></a></div></div></nav>';
	$modal ="
	<div id=modal class='text-center' role=dialog>
		<div class='modal-dialog modal-primary'>
			<div class='modal-content'>
				<div class=modal-header>
					<h3 class=text-success>Cadastro ativado com sucesso!</h3>
				</div>
				<div class='modal-body' >
					<h4>Clique <a href='#' data-toggle='modal' data-target='#mymodal' class='btn btn-success'>aqui</a> para efetuar o login!</h4>
				</div>
				<div class='modal-footer'>

				</div> 
			</div>
		</div>
	</div>"
	;
	echo $nav;
	echo $modal;
	$query = mysql_query("SELECT email FROM Cadastro where `id_cadastro` = '$id' ");
	$result = mysql_fetch_assoc($query);
	$usuario = $result['email'];
}
//dados da url não batem com o banco
else 
{
	$nav = '<nav class="navbar navbar-inverse"><div class="container-fluid"><div class="navbar-header"><a class="navbar-brand" href="aluno-home.php"><img id="logonav" alt="logo" src="img/logo-br.png" style="width:90px;height:21px"></a></div></div></nav>';
	$modal ="
	<div id=modal class='text-center' role=dialog>
		<div class='modal-dialog modal-primary'>
			<div class=modal-content>
				<div class=modal-header>
					<h3 class='text-danger'>Informacoes invalidas!</h3>
				</div>
				<div class='modal-body'>
					<h4>Clique <a href='index.php' class='btn btn-default'>aqui</a> para voltar a pagina inicial!</h4>
				</div>
				<div class='modal-footer'>
					
				</div> 
			</div>
		</div>
	</div>"
	;
	echo $nav;
	echo $modal;

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="modal fade" id="mymodal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content text-center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">LOGIN</h4>
				</div>
				<div class="modal-body bg-primary">
					<form align="center"  method="POST" action="sessao.php">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon " id="basic-addon1">
									<span class="glyphicon glyphicon-user"></span>
								</span>
								
								<input type="email"  name="usuario"   class="form-control" value="<?php echo $usuario;?>" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon " id="basic-addon1">
									<span class="glyphicon glyphicon-lock"></span>
								</span>
								<input type="password" class="form-control"  name="senha" id="txSenha" placeholder="Senha" required>
							</div>
						</div>

						<button type="submit" class="btn btn-default">Entrar</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
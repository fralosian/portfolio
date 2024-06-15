<?php require_once('db.php'); require_once('link.html');

if (isset($_POST['cadAlunoInfo'])) {
	unset($_POST['cadAlunoInfo']);

 //dados do endereço
	$rua = $_POST['rua'];
	$numeroCasa = $_POST['numeroCasa'];
	$cep = $_POST['cep'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$complemento = $_POST['complemento'];

	// cria uma variável com a instrução sql envolvendo os dados alimentados acima
	$sql_cadastrar_endereco = "insert into endereco(rua,numero,cep,bairro,cidade,complemento) values ('$rua','$numeroCasa','$cep','$bairro','$cidade','$complemento')";

	// invoca a função logica para executar a instrução
	if(mysql_query($sql_cadastrar_endereco) or die(mysql_error()))
	{
		if (!isset($_SESSION)) session_start();
	//dados do aluno
		$id_endereço = mysql_insert_id();
		$rm = $_POST['rm'];
		$cpfAluno = $_POST['cpfAluno'];
		$rgAluno = $_POST['rgAluno'];
		$celularAluno = $_POST['celularAluno'];
		$dataNascimento = $_POST['dataNascimento'];
		$sexo = $_POST['sexo'];

		// cria uma variável com a instrução sql envolvendo os dados alimentados acima	
		$sql_cadastrar_aluno = "insert into aluno (Cadastro_id_cadastro,Endereco_id_endereco,rm,cpf,rg,dt_nascimento,celular,sexo) values 
		('$_SESSION[UsuarioID]','$id_endereço','$rm','$cpfAluno','$rgAluno','$dataNascimento','$celularAluno','$sexo')";
		$query_cadastrar_aluno = mysql_query($sql_cadastrar_aluno) or die(mysql_error()) ;
		$id_aluno = mysql_insert_id();		
		$modal ="
		<div id='modalSuccess' class='modal fade text-center' role=dialog>
			<div class='modal-dialog modal-primary'>
				<div class=modal-content>
					<div class=modal-header>
						<h3 class='text-success'>Inserido com sucesso!</h3>
					</div>
					<div class='modal-body'>
						<h4>Clique <a href='#tabCurriculo' data-toggle='tab'><button class='next btn' data-dismiss='modal'>aqui</button></a> para continuar o cadastro!</h4>
					</div>
					<div class='modal-footer'>

					</div> 
				</div>
			</div>
		</div>"
		;
		echo $modal;
		echo "<script>$('#modalSuccess').modal('show');</script>";

	}
	else
	{
		$erro = mysql_error();
		$modal = "<div id='modalCadastro' class='modal fade' role=dialog>";
		$modal .= "<div class='modal-dialog modal-primary'>";
		$modal .= "<div class=modal-content>";
		$modal .= "<div class=modal-header>";
		$modal .= "<h1 align=center>Resultado</h1>";
		$modal .= "</div>";
		$modal .= "<div class=modal-body>";
		$modal .= "<p>Registro não foi cadastrado</p>";
		$modal .= "<p>Motivo: ".$erro."</p>";
		$modal .= "</div>";
		$modal .= "<div class=modal-footer>";
		$modal .= "<button type=button class='btn btn-lg btn-primary' data-dismiss=modal>Fechar</button>";
		$modal .= "</div>";	
		$modal .= "</div>";
		$modal .= "</div>";
		$modal .= "</div><";

	}
}

?>
<script type="text/javascript" src="js/next-tab.js" language="javascript"></script>
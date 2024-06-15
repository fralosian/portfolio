<?php
/*
DESCRIÇÃO:
	Esta função recebe o nome do banco de dados por parâmetro e usa-o para efetuar a conexão
FUNÇÃO: 
	conexao
PARÂMETROS:
	$bd  : string
RETORNO:
	void
*/

function conexao($bd)
{
	// ignorar erro de Deprecated: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead in /home/u127641577/public_html/funcoes.php on line 23
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	// alimenta as variáveis de conexão	
	$host = 'localhost';
	$usuario = 'root';
	$senha = '123456';
	$bd = 'techjobs';
	
	// efetua a conexão no servidor
	$cnx = mysql_connect ($host,$usuario,$senha) or die ('Houve algum erro na conexão'.mysql_error());
	
	// seleciona o banco de dados
	mysql_select_db($bd) or die ('Houve algum erro com o Banco de Dados'.mysql_error());
	
	
	//seleciona a database e a tabela
	//mysql_select_db($db_name) or die('bando de dados selecionado');
	
	
	// para que os acentos sejam gravados no banco de dados
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET character_set_connection=utf8");
	mysql_query("SET character_set_client=utf8");
	mysql_query("SET character_set_results=utf8");
}


function upload()
{
	$diretorio = "/public_html/upload";

	if (!is_dir($diretorio)){ 
		$msg = "Pasta ".$diretorio." nao existe";
		return "<script type='text/javascript'>alert('{$msg}');</script>";
	} 

	else { 
		$msg = "Pasta ".$diretorio." existe!";
		return "<script type='text/javascript'>alert('{$msg}');</script>";

		$arquivo = $_FILES["arquivo"];

		$destino = $diretorio."/".$arquivo['name'];

		if (move_uploaded_file($arquivo['tmp_name'],$destino)) {
			$msg2 = "MOVEEEEUUUUUUU =)";
			return "<script type='text/javascript'>alert('{$msg2}');</script>";
		}
									
		else {
			$msg2 = "nao moveu =(";
			return "<script type='text/javascript'>alert('{$msg2}');</script>";
		}

	}
}


//function deletePainel()
//{
	//conexao();
	
	//$id = $_POST['id'];
	
	//$inst_sql_deletar = "DELETE FROM FRASE WHERE id = $id";
	
	//if(mysql_query($inst_sql_deletar))
	//{
		//echo "<div id=Deletou4 class='modal fade' role=dialog>";
			//echo "<div class='modal-dialog modal-primary'>";
				//echo "<div class=modal-content>";
					//echo "<div class=modal-header>";
						//echo "<h1 align=center>Resultado</h1>";
					//echo "</div>";
					//echo "<div class=modal-body>";
						//echo "<p>id ".$id." excluido com sucesso</p>";
					//echo "</div>";
					//echo "<div class=modal-footer>";
						//echo "<button type=button class='btn btn-lg btn-primary' data-dismiss=modal>Fechar</button>";
					//echo "</div>";	
				//echo "</div>";
			//echo "</div>";
		//echo "</div>";
		//return "<script type='text/javascript'>
		
		//$('#Deletou4').modal('show');
		
		//var style = document.styleSheets[0];
    //style.removeRule (0);
    //var div = document.getElementById ('painelFrase');
    //div.refresh ();
		
		//</script>";
	//}
	//else
	//{
		//$erro = mysql_error();
		//echo "<div id=Falhou4 class='modal fade' role=dialog>";
			//echo "<div class='modal-dialog modal-primary'>";
				//echo "<div class=modal-content>";
					//echo "<div class=modal-header>";
						//echo "<h1 align=center>Resultado</h1>";
					//echo "</div>";
					//echo "<div class=modal-body>";
						//echo "<p>".$id." não excluido</p>";
						//echo "<p>Motivo: ".$erro."</p>";
					//echo "</div>";
					//echo "<div class=modal-footer>";
						//echo "<button type=button class='btn btn-lg btn-primary' data-dismiss=modal>Fechar</button>";
					//echo "</div>";	
				//echo "</div>";
			//echo "</div>";
		//echo "</div>";
		//return "<script type='text/javascript'>
		
		//$('#Falhou4').modal('show');
		//var style = document.styleSheets[0];
    //style.removeRule (0);
    //var div = document.getElementById ('painelFrase');
    //div.refresh ();
		
		//</script>";
	//}
//}

?>

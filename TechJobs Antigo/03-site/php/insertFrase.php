﻿<?php
require_once('funcoes.php');

conexao('FRASE');

	$autor = $_POST['txtAutor'];
	$frase = $_POST['txtFrase'];
	
		// cria uma variável com a instrução sql envolvendo os dados alimentados acima
	$inst_sql_cadastrar = "insert into FRASE (autor,frase) values ('$autor','$frase')";
	
	// invoca a função logica para executar a instrução
	if(mysql_query($inst_sql_cadastrar))
	{
		$modal = "<div id=modal class='modal fade' role=dialog>";
			$modal .= "<div class='modal-dialog modal-primary'>";
				$modal .= "<div class=modal-content>";
					$modal .= "<div class=modal-header>";
						$modal .= "<h1 align=center>Resultado</h1>";
					$modal .= "</div>";
					$modal .= "<div class=modal-body>";
						$modal .= "<p>Frase cadastrada com ID: ".mysql_insert_id()."</p>";
					$modal .= "</div>";
					$modal .= "<div class=modal-footer>";
						$modal .= "<button type=button class='btn btn-lg btn-primary' data-dismiss=modal>Fechar</button>";
					$modal .= "</div>";	
				$modal .= "</div>";
			$modal .= "</div>";
		$modal .= "</div>";

	}
	else
	{
		$erro = mysql_error();
		$modal = "<div id=modal class='modal fade' role=dialog>";
			$modal .= "<div class='modal-dialog modal-primary'>";
				$modal .= "<div class=modal-content>";
					$modal .= "<div class=modal-header>";
						$modal .= "<h1 align=center>Resultado</h1>";
					$modal .= "</div>";
					$modal .= "<div class=modal-body>";
						$modal .= "<p>Frase não foi cadastrada</p>";
						$modal .= "<p>Motivo: ".$erro."</p>";
					$modal .= "</div>";
					$modal .= "<div class=modal-footer>";
						$modal .= "<button type=button class='btn btn-lg btn-primary' data-dismiss=modal>Fechar</button>";
					$modal .= "</div>";	
				$modal .= "</div>";
			$modal .= "</div>";
		$modal .= "</div>";

	}
	
	echo $modal;
?>
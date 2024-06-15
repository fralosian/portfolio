<?php
ob_start();

	session_start();

	//DESTRÓI  AS SESSÕES
	// O comando unset é utilizado para a remoção de variáveis declaradas.
	unset($_SESSION['UsuarioID']);
	unset($_SESSION['UsuarioNome']); 
	unset($_SESSION['UsuarioNivel']); 

	session_destroy(); //destroi a sessao

	Header("Location: index.php"); //  REDIRECIONA PARA A TELA DE LOGIN Volta para a tela de login e senha

	?>


<?php

    $nome = $_POST["voce"];
    $email = $_POST["end"];
    $fone = $_POST["fonfon"];
    $assunto = $_POST["assu"];
    $mensagem = $_POST["message"];

    global $email;

    $data = date("d/m/y");
    $ip = $_SERVER['REMOTE_ADDR'];
    $navegador = $_SERVER['HTTP_USER_AGENT'];
    $hora = date("H:i");

    mail (
	"danielalvesdasilva1998@gmail.com",
    "$assunto",
    "Nome: $nome\n
	Data: $data\n
	Ip: $ip\n
	Navegador: $navegador\n
	Hora: $hora\n
	E-mail: $email\n
	Telefone: $fone\n\n
	Mensagem: $mensagem",
    "From: $email"
    );

    $site = "grazadeus.esy.es";
    $titulo = "Teste do fale com o Teacher";
    $msg = "$nome, obrigado por entrar em contato, em breve retorno.";

    mail("$email",
    "$titulo",
    "$msg",
    "From: $site"
    );
    /* retorno */
?>

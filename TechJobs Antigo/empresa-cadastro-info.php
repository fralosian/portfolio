<?php
include("link.html");

//vê se nao existe seção.abre uma nova
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: index.php"); exit;
}elseif($_SESSION['UsuarioNivel'] == 1){
    //manda o aluno pro lugar dele
  header("Location: aluno-home.php"); exit;
}elseif ($_SESSION['UsuarioNivel'] == 2) {
  //verifica se é empresa e mantem na pagina
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
  <meta charset="utf-8"/>
  <title>Home</title>
</head>
<body>
  <label>Data de Fundação<label/>
    <input type="text"/>

    <label>CNPJ<label/>
      <input type="text"/>

      <label>Telefone<label/>
        <input type="text"/>

        <label>Telefone<label/>
          <input type="text"/>
        </br>
      </br>
      <label>Endereço</label>
    </br>
  </br>
  <label>Rua<label/>
    <input type="text"/>
    <label>Número<label/>
      <input type="text"/>
      <label>Bairro<label/>
        <input type="text"/>
        <label>CEP<label/>
          <input type="text"/>
          <label>Complemento<label/>
            <input type="text"/>
          </br>
        </br>
      </body> 
      </html>
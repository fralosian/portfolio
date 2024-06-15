<?php  require_once("db.php");require_once("link.html");


// Verifica se houve POST e se o usuário ou a senha enviados no form estão(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
  header("Location: login.php"); exit;
}

//varivavel pra identificar
$aluno = '1';
$empresa = '2';
//usuario e senha digitados no form
$usuario = mysql_real_escape_string($_POST['usuario']);
$senha = mysql_real_escape_string($_POST['senha']);

//
$query = mysql_query("SELECT * FROM Cadastro WHERE `email` = '$usuario' AND BINARY `senha` = '$senha' ");
$loginSql = mysql_num_rows($query);


if ($loginSql == 1) {
  //pega todos os dados do usuario
  $resultado = mysql_fetch_array($query) or die (mysql_error());

  if ($resultado['ativo'] == 0) {

    $acesso_negado_titulo = "Conta Inativa";
    $acesso_negado = "Se você ainda não ativou sua conta, <br> acesse o link que foi enviado para seu email";
  }
  else
  {
    if (!isset($_SESSION)) session_start();

    // Salva os dados encontrados na sessão 😕
    $_SESSION['UsuarioID'] = $resultado['id_cadastro'];
    $_SESSION['UsuarioNome'] = $resultado['nome'];
    $_SESSION['UsuarioNivel'] = $resultado['tipo'];

    if($_SESSION['UsuarioNivel'] == $aluno ){
    // Redireciona o visitante
      $query = mysql_query("SELECT * FROM aluno WHERE `id_cadastro` = '$_SESSION[usuario]' ");
      $loginSql = mysql_num_rows($query);
      header("Location: aluno-home.php"); exit;
    }elseif ($_SESSION['UsuarioNivel'] == $empresa) {
      header("Location: empresa-home.php"); exit;
    }else{
      echo "Algo deu errado... Tente novamente mais tarde" ;
    }
  }
}else{
  $query = mysql_query("SELECT * FROM Cadastro WHERE `email` = '$usuario' ");
  $resultado = mysql_fetch_array($query) ;
  if ($resultado['email'] == $usuario) {
    $acesso_negado_titulo = "Usuario ou Senha incorretos ";
    $acesso_negado = "Confira seu email e senha, <br> e tente novamente";
  }elseif ($resultado['email'] == "") {
    $acesso_negado_titulo = "Conta Inexistente!";
    $acesso_negado = 'Essa conta não está registrada em nosso site <br> se cadastre clicando
    aqui vaii ter um modal
    ';
  }
}


//erros serao inseridos aqui
$nav = '
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="aluno-home.php">
        <img id="logonav" alt="logo" src="img/logo-br.png" style="width:90px;height:21px">
      </a>
      </div
    </div>
  </nav>';
  $modal ="
  <div id=modal class='text-center' role=dialog>
    <div class='modal-dialog modal-primary'>
      <div class=modal-content>
        <div class=modal-header>
          <h3 align=center class=text-danger> " .$acesso_negado_titulo. "</h3>
        </div>
        <div class=modal-body>
          <h4>$acesso_negado</h4>
        </div>
        <div class='modal-footer text-center'>
          <a class='btn btn-primary' href='login.php'> Login</a>
          <a class='btn btn-primary' href='index.php'> Inicio</a>
        </div> 
      </div>
    </div>
  </div>";
  echo $nav;
  echo $modal;
  ?>
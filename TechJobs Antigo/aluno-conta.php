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
    <title> Conta - TechJobs </title>
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
                <li><a href="vagas.php"> Buscar Vagas</a></li>
                <li class="disabled"><a href="#"> Minhas Inscrições</a></li>
                <li><a href="mensagens.php"> Mensagens <!--<span class="badge">3</span>--></a></li>
                <li class="active"><a href="aluno-conta.php"> Conta</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <?php
    $sql = "SELECT * FROM cadastro WHERE usuario='$usuario'";
    $res = mysql_query($sql);
    $conta = mysql_num_rows($res);

    if($conta >= "1")
    {
        $dados = mysql_fetch_array($res);
        echo '
        <form action="atualiza.php" method="POST">

            Alterar Usuário: <input type="text" name="usuario" value="$dados[usuario]"><br>
            ;
            Alterar Senha: <input type="text" name="senha" value="$dados[senha]"><br>

            <input type="submit" value="Atualizar">
        </form>

        ';
    }
    ?>
    <!-- atualiza tu da um update-->
    <?php

    if($p_usuario && $p_senha)
    {
        $sql = "UPDATE tabela SET nome='$p_usuario' AND senha='$p_senha'";

        $res = mysql_query($sql);

        if($res)

        {
            echo "Seus dados foram atualizados com sucesso!";
        }
        else
        {
            echo "Não foi possível atualizar seus dados : (";
        }
    }
    ?>
</div>
<div class="container-fluid">
<div class="text-center">
     <img class="img-responsive" src="img/manutencao.png">
 </div>
</div>
<div class="panel-footer footer text-center">
    <p>
        Rua Alcântara, 113 - V Guilherme - São Paulo, SP - CEP 02110-010<br>
        techpro.desenvolvedora@gmail.com.br<br>
        <strong> <i>TechPro ®</i> - Technics Project Ltda </strong>
    </p>
</div>

</body>
</html>


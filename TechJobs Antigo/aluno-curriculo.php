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
    <title> Curriculo Aluno - TechJobs </title>
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
                    <li class="active"><a href="aluno-curriculo.php"> Curriculo</a></li>
                    <li><a href="vagas.php"> Buscar Vagas</a></li>
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
        <h3 class="text-center">Curriculo</h3>
        <div class="col-lg-offset-1"><a class="btn btn-default" href="curriculo-pdf.php">Fazer Download em PDF</a></div><br>
        <div id="curriculo" class="container  well">
            <h4 class="text-uppercase text-center"><i>Thiago Almeida da Silva</i></h4>
            <div id="informacoes" class="text-left">
                Tel.:11 2477-9931<br>
                thiagoalmeida@gmail.com<br>
                Av. Norte Sul Nº 12<br>
                Pq. São Miguel - Guarulhos - São Paulo <br>
            </div>
            <hr>
            <h4 class="text-uppercase">Objetivos</h4>
            -A disposição da empresa<br>
            <hr>
            <h4 class="text-uppercase">Escolaridade</h4>
            -Ensino Médio Completo (2013)<br>
            -Curso de Inglês avançado (2015)<br>
            -Cursando 2º Modulo do Técnico em Informática (ETEC Horácio Augusto da Silveira )<br>
            <hr >
            <h4 class="text-uppercase">Experiências</h4>
            -Empresa: <b>TechPro</b><br>
            -Periodo: 5 meses<br>
            -Cargo: Auxiliar de Informatica<br>
            <hr>
        </div>
        
        <br>
    </div>
</body>
</html>


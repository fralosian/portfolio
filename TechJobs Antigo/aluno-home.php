<?php 
require_once("db.php");
require_once("link.html");

//vê se nao existe seção.abre uma nova
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: index.php"); exit;
  
}elseif($_SESSION['UsuarioNivel'] == 1){
    //mantem o usuario na pagina

    //continuar fazendo o cadastro se nao existir
    
    $verificaCadastro = mysql_query("SELECT * FROM aluno WHERE `Cadastro_id_cadastro` = '$_SESSION[UsuarioID]'");
    if (mysql_num_rows($verificaCadastro) <> 1) {
        header("Location: aluno-cadastro-info.php"); exit;;
    }

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
    <title> Aluno - TechJobs </title>
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
                    <li class="active"><a href="aluno-home.php"> Início</a></li>
                    <li><a href="aluno-curriculo.php"> Curriculo</a></li>
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
        <div class="well">
            <div class="text-center">
                <div>Olá, <?php echo $_SESSION['UsuarioNome'];?>!</div>
                <br>
                <div align="center" id="slideshow-sec">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- indicadores -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>

                        </ol>
                        <!-- pega imagem para deslizar -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="img/portfolio/info-aluno1.jpg" alt="img1">
                            </div>

                            <div class="item">
                                <img src="img/portfolio/info-aluno2.jpg" alt="img2">
                            </div>

                            <div class="item">
                                <img src="img/portfolio/info-aluno3.jpg" alt="img3">
                            </div>
                        </div>

                        <!-- controles <esquerda e direita> -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Proximo</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--Fim do carousel -->
        <!-- SLIDESHOW SECTION END-->
        <br>
        <div class="well">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div id="bloco-curriculo" class="bloco">
                        <a href="aluno-curriculo.php">
                            <h4>Meu Currículo</h4>
                            <p>Visualize e atualize seu Currículo.</p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div id="bloco-vagas" class="bloco">
                        <a href="vagas.php">
                            <h4>Buscar Vagas</h4>
                            <p>Pesquise vagas e participe de processos seletivos.</p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div id="bloco-inscricao" class="bloco">
                        <a href="#">
                            <h4>Minhas Inscrições</h4>
                            <p>Visualize suas inscrições em vagas.</p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div id="bloco-mensagem" class="bloco">
                        <a href="#">
                            <h4>Mensagens</h4>
                            <p>Visualize suas mensagens.</p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div id="bloco-info" class="bloco">
                        <a href="#">
                            <h4>Inf. Complementares</h4>
                            <p>Preencha as informações complementares.</p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div id="bloco-config" class="bloco">
                        <a href="">
                            <h4>Configurações</h4>
                            <p>Configure seus dados em nosso site.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />
    </div>

    <div class="panel-footer text-center hidden-xs">
        <p>
            Rua Alcântara, 113 - V Guilherme - São Paulo, SP - CEP 02110-010<br>
            techpro.desenvolvedora@gmail.com.br<br>
            <strong> <i>TechPro ®</i> - Technics Project Ltda </strong>
        </p>
    </div>

</body>
</html>`;

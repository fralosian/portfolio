<?php require_once("link.html");require_once("db.php");
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
    <title> Empresa - TechJobs </title>
</head>

<body>
    <div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navBarEmpresa" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="empresa-home.php">
                        <img id="logonav" alt="logo" src="img/logo-br.png" style="width:90px;height:21px">
                    </a>
                    <a href="#" class="navbar-brand hidden-lg hidden-md hidden-sm">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navBarEmpresa">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="empresa-home.php">Início</a></li>
                        <li><a href="empresa-vagas.php">Vagas</a></li>
                        <li><a href="#">Conta</a></li>
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="#" class="navbar-brand hidden-xs">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="well text-center">
                <div class="row">
                    <div align="center" id="slideshow-sec">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- indicadores -->
                            <ol class="carousel-indicators">
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
                                <span class="sr-only">Anterior</span><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Proximo</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div id="bloco-info" class="bloco">
                                <a href="empresa-vagas.php">
                                    <h4>Inserir Vagas</h4>
                                    <p>Inserir uma nova vaga.</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div id="bloco-curriculo" class="bloco">
                                <a href="empresa-vagas.php">
                                    <h4>Minhas Vagas</h4>
                                    <p>Acesse às vagas inseridas por você.</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div id="bloco-config" class="bloco">
                                <a href="">
                                    <h4>Configurações</h4>
                                    <p>Configure seus dados em nosso site.</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div id="bloco-info" class="bloco">
                                <a href="#">
                                    <h4>notificaçoes</h4>
                                    <p>Veja aqui suas notificaçoes</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer text-center">
            <p>
                Rua Alcântara, 113 - V Guilherme - São Paulo, SP - CEP 02110-010<br>
                techpro.desenvolvedora@gmail.com.br<br>
                <strong> <i>TechPro ®</i> - Technics Project Ltda </strong>
            </p>
        </div>
    </div>
</body>
</html>


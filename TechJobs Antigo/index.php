<?php include("link.html");?>
<?php 

//vê se nao existe seção.abre uma nova
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
  // Destrói a sessão por segurança
  session_destroy();
  
}elseif($_SESSION['UsuarioNivel'] == 1){
    //redireciona o aluno pra devida pagina 
  header("Location: aluno-home.php"); exit;
  
}elseif ($_SESSION['UsuarioNivel'] == 2) {
    //redireciona a empresa pra devida pagina
  header("Location: empresa-home.php"); exit;
}else{
   // Destrói a sessão por segurança
  session_destroy();  
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title> TechJobs - Empregos</title>
</head>
<body>

    <nav class="navbar navbar-inverse headermenu">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#drop-menu" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img id="logonav" alt="logo" src="img/logo-br.png" style="width:90px;height:21px">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="drop-menu">
                <ul class="nav navbar-nav btn-md ">
                    <li class="active"><a href="index.php"> <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Início</a></li>
                    <li><a href="empresas-page1.php"><span class="glyphicon glyphicon-briefcase"></span> Empresas Parceiras</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-search"></span> Buscar Vagas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="buscar-vagas.php?area=administração&nomeVaga=&pesquisarVagas=Pesquisar">Administração</a></li>
                            <li><a href="buscar-vagas.php?area=contabilidade&nomeVaga=&pesquisarVagas=Pesquisar">Contabilidade</a></li>
                            <li><a href="buscar-vagas.php?area=eletronica&nomeVaga=&pesquisarVagas=Pesquisar">Eletrônica</a></li>
                            <li><a href="buscar-vagas.php?area=eletrotecnica&nomeVaga=&pesquisarVagas=Pesquisar">Eletrotécnica</a></li>
                            <li><a href="buscar-vagas.php?area=informática&nomeVaga=&pesquisarVagas=Pesquisar">Informática</a></li>
                            <li><a href="buscar-vagas.php?area=logistica&nomeVaga=&pesquisarVagas=Pesquisar">Logística</a></li>
                            <li><a href="buscar-vagas.php?area=mecanica&nomeVaga=&pesquisarVagas=Pesquisar">Mecânica</a></li>
                            <li><a href="buscar-vagas.php?area=mecatronica&nomeVaga=&pesquisarVagas=Pesquisar">Mecatrônica</a></li>
                            <li><a href="buscar-vagas.php?area=redes&nomeVaga=&pesquisarVagas=Pesquisar">Redes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="buscar-vagas.php">Busca Personalizada</a></li>
                            <li role="separator" class="divider"></li>
                        </ul>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <a class="btn navbar-btn btn-primary" href="login.php">Entrar</a>
                    <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Cadastrar
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation" class="dropdown-header"><strong> Cadastrar como:</strong></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a class="text-center" role="menuitem" tabindex="-1" href="cadastro-aluno.php">Aluno</a></li>
                        <li role="presentation"><a class="text-center" role="menuitem" tabindex="-1" href="cadastro-empresa.php">empresa</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation" class="dropdown-header text-center"><i>TechPro ®</i></li>
                    </ul>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div id="logo" class="header panel-heading">
        <a class="media col-sm-6 col-md-12 col-lg-12" href="index.php">
            <p align="center"><img alt="Logo" src="img/logo-pr.png"></p><!--style="width:90px;height:21px;"-->
        </a>
        <h2 align="center">SEU EMPREGO A UM CLICK DE DISTÂNCIA</h2>
    </div>

    <div class="col-lg-10 col-lg-offset-1" align="center">
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
                    <img src="img/portfolio/info-home1.jpg" alt="img1">
                    <!--<div class="carousel-caption">
                        <h1 class="wow slideInLeft" data-wow-duration="2s"> Multi Pager Template</h1>
                        <h2 class="wow slideInRight" data-wow-duration="2s">Muti Purpose Use</h2>
                    </div>-->
                </div>
                <div class="item">
                    <img src="img/portfolio/info-home3.jpg" alt="img3">
                </div>

                <div class="item">
                    <img src="img/portfolio/info-home4.jpg" alt="img4">
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
    <!--Fim do carousel -->


    <div class="panel-body ">
        <div class="col-lg-offset-1 row ">
            <div class="col-xs-12 col-sm-6 col-lg-5 ">
                <div class="caption">
                    <div class="bs-callout bs-callout-primary  background-container">
                        <h4>Vagas de Auxiliar Administrativo!</h4>
                        <p>Coca-Cola e Pepsico , Estão oferecendo vagas de emprego na área de administração, <b>confira já!</b> </p>
                        <p><a href="#" class="btn btn-primary" role="button">Conferir</a> </p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-5 ">
                <div class="caption">
                    <div class="bs-callout bs-callout-primary  background-container">
                        <h4>Vagas na Innersoft !</h4>
                        <p>Innersoft procura alguém capacitado para o trabalhar em sua empresa, <b>confira já!</b> </p>
                        <p><a href="#" class="btn btn-primary" role="button">Conferir</a> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-offset-1 row ">
            <div class="col-xs-12 col-sm-6 col-lg-5">
                <div class="caption">
                    <div class="bs-callout bs-callout-danger background-container ">
                        <h4>Precisa-se de Web Designer!</h4>
                        <p>Poucas vagas! <b>entre aqui!</b> </p>
                        <p><a href="#" class="btn btn-danger" role="button">Conferir</a> </p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-5 ">
                <div class="caption">
                    <div class="bs-callout bs-callout-warning background-container">
                        <h4>Vagas Por Pouco Tempo!</h4>
                        <p> TechPro, procura profissionais comprometidos, <b>se candidate!</b> </p>
                        <p><a href="#" class="btn btn-warning" role="button">Conferir</a> </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="panel-body" align="center">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTECHPRO.desenvolvedora&tabs&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </div> -->
    </div>
    <div class="hidden-xs">
        <div class="panel-footer text-center ">
            <p>
                Rua Alcântara, 113 - V Guilherme - São Paulo, SP - CEP 02110-010<br>
                techpro.desenvolvedora@gmail.com.br<br>
                <strong> <i>TechPro ®</i> - Technics Project Ltda </strong>
            </p>
        </div>
    </div>
</body>

</html>

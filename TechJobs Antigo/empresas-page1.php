<?php require_once("link.html");

//vê se nao existe seção.abre uma nova
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
  // Destrói a sessão por segurança
  session_destroy();
  
}elseif($_SESSION['UsuarioNivel'] == 1){
    //Verificar se ele é aluno e manter na pagina
  header("Location: aluno-home.php"); exit;
}elseif ($_SESSION['UsuarioNivel'] == 2) {
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

    <nav class="navbar navbar-inverse">
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
                    <li><a href="index.php"> <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Início</a></li>
                    <li class="active"><a href="empresas-page1.php"><span class="glyphicon glyphicon-briefcase"></span> Empresas Parceiras</a></li>
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
<div class="background panel-heading">
       <!-- <nav aria-label="Page navigation" >
            <ul class="pagination text-center">
                <li class="disabled">
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="active"><a href="empresas-page1.php">1</a></li>
                <li><a href="empresas-page2.html">2</a></li>
                <li><a href="empresas-page3.html">3</a></li>
                <li><a href="empresas-page4.html">4</a></li>
                <li>
                    <a href="empresas-page2.html" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>-->
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4 col-lg-offset-1">
                <div class="thumbnail">
                    <img src="img/empresas/cometa.png" alt="logo_empresa_cometa" class="img-thumbnail" width="200" height="200">
                    <div class="caption">
                        <h3>Viação Cometa S.A</h3>
                        <p>A Viação Cometa S.A. é uma das empresas de ônibus rodoviários mais tradicionais do Brasil. Por décadas, operou linhas na região sudeste do Brasil, baseada num modelo norte-americano, inspirando-se em uma empresa norte-americana.</p>
                        <p class=" text-center"><a href="http://www.viacaocometa.com.br/" target="_blank" class="btn btn-primary" role="button">Ir para o site</a></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4 col-lg-offset-1 ">
                <div class="thumbnail">
                    <img src="img/empresas/irani.gif" alt="logo_empresa_irani" class="img-thumbnail" width="200" height="200">
                    <div class="caption">
                        <h3>Celulose Irani S.A</h3>
                        <p>É uma das principais indústrias nacionais dos segmentos papel para embalagens e embalagens de papelão ondulado.
                            Há mais de 70 anos, fabricam produtos provenientes de base florestal renovável, 100% recicláveis, com absoluto respeito às pessoas e ao meio ambiente.</p>
                            <p class=" text-center"><a href="http://www.irani.com.br/" target="_blank" class="btn btn-primary" role="button">Ir para o site</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-4 col-lg-offset-1">
                    <div class="thumbnail">
                        <img src="img/empresas/nube.jpg" alt="logo_empresa_nube" class="img-thumbnail" width="200" height="200">
                        <div class="caption">
                            <h3>Nube</h3>
                            <p>O Nube é uma das maiores organizações privadas de colocação de jovens no mercado de trabalho. Começou atuando como agente de integração entre estudantes, empresas e instituições de ensino. A partir daí, passou a oferecer vagas para aprendizagem, por meio de instituições parceiras.</p>
                            <p class=" text-center"><a href="https://www.nube.com.br/" target="_blank" class="btn btn-primary" role="button">Ir para o site</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-4 col-lg-offset-1">
                    <div class="thumbnail">
                        <img src="img/empresas/ciee.jpg" alt="..." class="img-thumbnail" width="200" height="200">
                        <div class="caption">
                            <h3>CIEE</h3>
                            <p>O CIEE (Centro de Integração Empresa-Escola ) é uma associação brasileira, de direito privado, sem fins lucrativos, beneficente de assistência social e reconhecida de utilidade pública, que, dentre vários programas, possibilita aos jovens estudantes brasileiros, uma formação integral, ingressando-os ao mercado de trabalho, por meio de treinamentos e programas de estágio e aprendizagem.</p>
                            <p class=" text-center"><a href="http://www.ciee.org.br/portal/index.asp" target="_blank" class="btn btn-primary" role="button">Ir para o site</a></p>
                        </div>
                    </div>
                </div>
            </div>
            
        <!-- <nav aria-label="Page navigation" align="center">
            <ul class="pagination">
                <li class="disabled">
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="active"><a href="empresas-page1.php">1</a></li>
                <li><a href="empresas-page2.html">2</a></li>
                <li><a href="empresas-page3.html">3</a></li>
                <li><a href="empresas-page4.html">4</a></li>
                <li>
                    <a href="empresas-page2.html" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav> -->
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

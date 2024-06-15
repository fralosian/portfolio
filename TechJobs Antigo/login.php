<?php require_once("link.html");?>
<?php 
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED ^ E_WARNING);
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
    <title> Entrar - TechJobs</title>
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
                    <li><a href="index.php"> <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Início</a></li>
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
    <div class="container-fluid">
        <div class="col-md-3 col-xs-2 col-sm-3 col-lg-3"></div>
        <div class="col-md-6 col-xs-8 col-sm-6 col-lg-6 ">
            <div class="row">
                <div class="well text-center">
                    <!-- Entra na pagina sessao e redireciona o usuario pra pagina correta-->
                    <form method="POST" action="sessao.php">
                        <h3>Entrar</h3>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input type="email" name="usuario" maxlength="250" class="form-control" placeholder="E-mail" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon " id="basic-addon1">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input type="password" name="senha" id="txSenha" class="form-control" placeholder="Senha" required>
                            </div>
                        </div>
                        <input name="entrar" type="submit" class="btn btn-default" value="Entrar">

                    </form>


                </div>
            </div>
        </div>
        <div class="col-xs-2 col-sm-3 col-md-3 col-lg-3"></div>
    </div><!-- /.container-fluid -->

</body>
</html>




<?php require_once('funcao.php'); //INCLUI O ARQUIVO COM AS FUNÇÕES EM PHP NO HTML ?>
<?php require_once('db.php'); //INCLUI O ARQUIVO COM OS DADOS DO BANCO ?>
<?php require_once('link.html'); //INCLUI O ARQUIVO COM as libs ?>
<?php
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
    <title>Cadastrar Empresa - TechJobs</title>
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
    <div class="well">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1 ">

                <form align="center" method="POST" class="col-lg-12" action="">
                    <h3>Cadastre sua Empresa:</h3>

                    <div class=" col-lg-4">
                        <input name="nome" type="text"  class="form-control" placeholder="Nome Da Empresa"  data-toggle="tooltip" title="Nome da Empresa Completo " data-placement="bottom" required>
                    </div>
                    <div class=" col-lg-4">
                        <input name="email" type="email"  class="form-control" placeholder="Email"  data-toggle="tooltip" title="exemplo@mail.com" data-placement="bottom" required>
                    </div>

                    <div class=" col-lg-4">
                        <input name="telefone" type="text" class="form-control" id="" placeholder="Telefone "  data-toggle="tooltip" title="Somente Números" data-placement="bottom" required>
                    </div>
                </br>
                <div class=" col-lg-12">
                </br>
                <input type="submit" class="btn btn-primary" value="Cadastrar" name="cadEmpresa" >
            </div>
            <br/>
            Tem uma conta? <a href="login.php">Entre aqui</a>
        </form>
    </div>
</div>
</div>
<div class="hidden-xs">
    <div class="panel-footer text-center footer">
        <p>
            Rua Alcântara, 113 - V Guilherme - São Paulo, SP - CEP 02110-010<br>
            techpro.desenvolvedora@gmail.com.br<br>
            <strong> <i>TechPro ®</i> - Technics Project Ltda </strong>
        </p>
    </div>
</div>

<?php

// EFETUA O CADASTRO SE O BOTÃO GRAVAR FOR CLICADO

if (isset($_POST['cadEmpresa'])) 
{
    unset($_POST['cadEmpresa']);

    //DECLARANDO VARIAVEIS PARA ENVIO DE EMAIL

    $email = $_POST['email'];
    $pass = geraSenha(11);    
    $telefone = $_POST['telefone'];
    $codigo = uniqid(rand( ),true);
    $tipo = '2';                    //tipo 1 = aluno, 2= empresa 
    $nome = $_POST['nome'];
    $ativo = 0;

     //query para conferir email
    $checar_email = mysql_query("SELECT email From cadastro where email='$email'");
    $row_checar_email = mysql_num_rows($checar_email);

    //conferir se email cadastrado ja existe
    if ($row_checar_email >= 1) {

        $alert = "<div role='alert' class='alert text-danger text-center'><h4> Já existe conta com esse Email, faça login <a href='login.php'>aqui</a> </h4></div>";
        echo $alert;
    }
    else
    {
            //insere o pré-registro
        $cadastrar = "INSERT INTO cadastro(`email`,`senha`,`telefone`,`dt_cadastro`,`codigo`,`tipo`,`nome`,`ativo`)";
        $cadastrar .= " VALUES ('$email','$pass','$telefone',current_timestamp,'$codigo','$tipo','$nome','$ativo' ) ";

            //ultimo id cadastrado = id_cadastro da tbl Cadastro 
        if (!mysql_query($cadastrar)) {
            $modal = "<div id=modal class='modal fade' role=dialog>";
            $modal .= "<div class='modal-dialog modal-primary'>";
            $modal .= "<div class=modal-content>";
            $modal .= "<div class=modal-header>";
            $modal .= "<h1 align=center> Oops... </h1>";
            $modal .= "</div>";
            $modal .= "<div class=modal-body>";
            $modal .= "Houve um erro inserindo o registro<p>Erro: ".mysql_error()."</p>";
            $modal .= "</div>";
            $modal .= "<div class=modal-footer>";
            $modal .= "<button type=button class='btn btn-primary' data-dismiss=modal>Fechar</button>";
            $modal .= "</div>"; 
            $modal .= "</div>";
            $modal .= "</div>";
            $modal .= "</div>";
            echo $modal;
            echo "<script>$('#modal').modal('show');</script>";

        }
        else
        {
            //modal que aparecerá na tela
            $modal = "<div id=modal class='modal fade' role=dialog>";
            $modal .= "<div class='modal-dialog modal-primary'>";
            $modal .= "<div class=modal-content>";
            $modal .= "<div class=modal-header>";
            $modal .= "<h1 align=center> Cadastro Realizado com Sucesso! </h1>";
            $modal .= "</div>";
            $modal .= "<div class=modal-body>";
            $modal .= "Para continuar o cadastro, acesse o link enviado para seu email</br>Também enviamos seu Usuário e Senha";
            $modal .= "</div>";
            $modal .= "<div class=modal-footer>";
            $modal .= "<button type=button class='btn btn-primary' data-dismiss=modal>Fechar</button>";
            $modal .= "</div>"; 
            $modal .= "</div>";
            $modal .= "</div>";
            $modal .= "</div>";
            echo $modal;
            echo "<script>$('#modal').modal('show');</script>";

            //variavel para validar email
            $id = mysql_insert_id( $conectar );

            $url = sprintf( 'id=%s&email=%s&codigo=%s',$id, md5($email), md5($codigo));
            $emailMsg = sprintf('http://127.0.0.1:8080/ativar.php?%s',$url);

            // enviar o email para cadastrado
            $site = "techpro.desenvolvedora@gmail.com";
            $titulo = "Confirmação de email - TECHJOBS";
            $msg = "
            E-mail: $email\n
            Senha: $pass\n
            $nome, Obrigado por se cadastrar em nosso site!\n
            Para confirmar seu cadastro acesse o link :\n
            $emailMsg ";

            mail(
                "$email",
                "$titulo",
                "$msg",
                "From: $site"
                );

            //TechPro receberá:
            $data = date("d/m/y");
            $hora = date("H:i:s");
            $assunto = 'novo cadastro em TechJobs';
            mail ("
                email.automatico@mail.com",
                "$assunto",
                "
                $nome, Cadastrou-se em TechJobs!\n
                Data: $data\n
                Hora: $hora\n
                E-mail: $email\n
                Telefone: $telefone\n
                ",
                "From: $email"
                );
        }
    }

}
    // echo 'Sua senha foi enviada para o seu e-mail';
?>
</body>

</html>

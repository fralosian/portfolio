<?php require_once("link.html"); require_once("db.php");

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
          <li><a href="empresas-page1.php"><span class="glyphicon glyphicon-briefcase"></span> Empresas Parceiras</a></li>
          <li class="active"><a href="buscar-vagas.php"><span class="glyphicon glyphicon-search"></span> Buscar Vagas</a>

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
    <form id="" method="POST" align="center">
      <div class="well">
        <div class="row">
          <div class="form-group">
            <h4 class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12"> Procure Por Área</h4>
            <div class="row">
              <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-4">
                <select class="form-control " name="area">
                  <option value="">Selecione uma área</option>
                  <option value="administração">Administração</option>
                  <option value="contabilidade">Contabilidade</option>
                  <option value="eletronica">Eletrônica</option>
                  <option value="eletrotecnica">Eletrotécnica</option>
                  <option value="informática">Informática</option>
                  <option value="logistica">Logística</option>
                  <option value="mecanica">Mecânica</option>
                  <option value="mecatronica">Mecatrônica</option>
                  <option value="redes">Redes</option>
                </select>
              </div>
              <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="input-group" style="width:100%">
                  <input class="form-control input" id="" name="nomeVaga" placeholder="Nome da Vaga" type="text">
                </div>
              </div>
              <div class="form-group col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <input name="pesquisarVagas" type="submit" class="btn btn-warning" value="Pesquisar" />

              </div>
            </div>
          </div>
        </div>
      </div>
    </form>


    <div class="panel-group">
      <?php 
      echo "<div class='alert alert-warning text-center fade in'>Para ver detalhes das vagas, faça login em nosso site!<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
      if(isset($_POST['pesquisarVagas'])){

        $area = $_POST['area'];

        $busca = $_POST['nomeVaga'];

                if (empty($area)) { //Se nao achar nada, lança essa mensagem
                  $sql = mysql_query("SELECT * FROM vagas WHERE `vaga` LIKE '%$busca%' ORDER BY `id_vaga` DESC ")or die(mysql_error());
                } 
                elseif (empty($busca)) { //Se nao achar nada, lança essa mensagem
                  $sql = mysql_query("SELECT * FROM vagas WHERE `area` = '$area' ORDER BY `id_vaga` DESC")or die(mysql_error());
                }else{
                  $sql = mysql_query("SELECT * FROM vagas WHERE `area` = '$area' AND `vaga` LIKE '%$busca%' ORDER BY `id_vaga` DESC")or die(mysql_error());
                }
                /*WHERE nome LIKE '%$busca%' AND categoria = '$categoria'"*/
                while ($result = mysql_fetch_array($sql))echo '
                  <div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  text-center">
                      <form>
                        <div class="panel panel-primary">
                          <div class="panel-heading">
                            Vaga: <strong>'.$result['vaga'].'</strong>
                          </div>
                          <div class="panel-body">
                            Área: '.$result['area'].'
                          </div>
                          <div class="panel-footer">
                            publicado em: '
                            .$result['dt_vaga'].
                            '
                          </div>
                        </div>
                      </form>
                    </br>
                  </div>
                </div>';

                if (mysql_num_rows($sql) == 0) {
                  echo "<div class='alert alert-warning text-center fade in'>Desculpe... Não foram encontradas vagas com esses dados<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
                }
              }elseif(!empty($_GET)){
                $area = $_GET['area'];

                if (empty($area)) { //Se nao achar nada, lança essa mensagem
                  $sql = mysql_query("SELECT * FROM vagas WHERE `vaga` LIKE '%$busca%' ORDER BY `id_vaga` DESC ")or die(mysql_error());
                } 
                elseif (empty($busca)) { //Se nao achar nada, lança essa mensagem
                  $sql = mysql_query("SELECT * FROM vagas WHERE `area` = '$area' ORDER BY `id_vaga` DESC")or die(mysql_error());
                }else{
                  $sql = mysql_query("SELECT * FROM vagas WHERE `area` = '$area' AND `vaga` LIKE '%$busca%' ORDER BY `id_vaga` DESC")or die(mysql_error());
                }
                /*WHERE nome LIKE '%$busca%' AND categoria = '$categoria'"*/
                while ($result = mysql_fetch_array($sql))echo '
                  <div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  text-center">
                      <form>
                        <div class="panel panel-primary">
                          <div class="panel-heading">
                            Vaga: <strong>'.$result['vaga'].'</strong>
                          </div>
                          <div class="panel-body">
                            Área: '.$result['area'].'
                          </div>
                          <div class="panel-footer">
                            publicado em: '
                            .$result['dt_vaga'].
                            '
                          </div>
                        </div>
                      </form>
                    </br>
                  </div>
                </div>';
                if (mysql_num_rows($sql) == 0) {
                  echo "<div class='alert alert-warning text-center fade in'>Desculpe... Não foram encontradas vagas com esses dados<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
                }
              }else{
                
            //pegar TODAS as vagas do banco
                $sql = mysql_query("SELECT * FROM vagas ORDER BY `id_vaga` DESC LIMIT 6")or die(mysql_error());
                while ($result = mysql_fetch_assoc($sql))echo '
                  <div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                      <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                          Vaga: <strong>'.$result['vaga'].'</strong>
                        </div>
                        <div class="panel-body text-center">
                          Área: '.$result['area'].'
                        </div>
                        <div class="panel-footer">
                          publicado em: '
                          .$result['dt_vaga'].
                          '
                        </div>
                      </div>
                    </br>
                  </div>
                </div>'; 
              }

              ?>
              <div class="modal fade" id="detalhesModal" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content text-center">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">

                      </h4>
                    </div>
                    <div class="modal-body bg-primary">

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                  </div>
                </div>
              </div>            
            </div>
          </div>
<!--
  <?php
  if (!isset($_GET['pg'])) {
    $pg = 1;
  } else {
    $pg = $_GET['pg'];
  }

  $total_reg = "20";
  $inicio = $pg -1; 
  $inicio = $inicio * $total_reg;

  $sql_todos = "SELECT * FROM vagas ORDER BY id_vaga ASC";
  $sql       = "SELECT * FROM vagas ORDER BY id_vaga ASC LIMIT $inicio, $total_reg";

  $rs_todos = $pdo -> query($sql_todos) -> fetchAll();
    $total_registros = count($rs_todos); // verifica o número total de registros
    $total_paginas = ceil($total_registros / $total_reg); // verifica o número total de páginas
    
    $rs = $pdo -> query($sql) -> fetchAll();
    
    $anterior = $pg -1; 
    $proximo = $pg +1;
    
    require("paginacao.php");
    ?>-->
  </body>

  </html>

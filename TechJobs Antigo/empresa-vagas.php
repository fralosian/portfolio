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
  <title> Vagas - TechJobs </title> 
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
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
          <li><a href="empresa-home.php">Início</a></li>
          <li class="active"><a href="empresa-vagas.php">Vagas</a></li>
          <li class="disabled"><a href="aluno-conta.php">Conta</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="#" class="navbar-brand hidden-xs">
              <i class="fa fa-bell" aria-hidden="true"></i>
            </a>
          </li>
          <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in "></span> Sair</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="">
    <div class="container-fluid">
      <div class="col-lg-12">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#inserir">Inserir Vaga</a></li>
          <li><a data-toggle="tab" href="#verVagas">Minhas Vagas</a></li>
        </ul>

        <div class="tab-content">
          <!-- Tab inserir Vaga-->
          <div id="inserir" class="tab-pane fade in active">
            <h3 class="text-primary col-lg-12">Inserir Vaga</h3>
            <form method="POST">

              <div class="form-group col-lg-6">
                <label for="example-text-input" class="col-form-label">Nome da Vaga: </label>
                <input class="form-control" type="text" id="vaga" name="vaga">
              </div>
              <div class="form-group col-lg-6">
                <label for="example-search-input" class="">Área da vaga: </label>
                <select class="form-control " name="area" required >
                  <option value="">Selecione uma área</option>
                  <option value="Administração">Administração</option>
                  <option value="Contabilidade">Contabilidade</option>
                  <option value="Eletrônica">Eletrônica</option>
                  <option value="Eletrotécnica">Eletrotécnica</option>
                  <option value="Informática">Informática</option>
                  <option value="Logística">Logística</option>
                  <option value="Mecânica">Mecânica</option>
                  <option value="Mecatrônica">Mecatrônica</option>
                  <option value="Redes">Redes</option>
                </select>
              </div>
              <div class="form-group  col-lg-12">
                <label for="comment">Período</label><input class="form-control" type="text" name="periodo">
              </div>
              <div class="form-group  col-lg-12">
                <label for="comment">Exigências</label><textarea class="form-control" type="text" name="exigencias"></textarea>
              </div>
              <div class="form-group  col-lg-12">
                <label for="comment">Benefícios</label><textarea class="form-control" type="text" name="beneficios"></textarea>
              </div>
              <div class="form-group  col-lg-12">
                <label for="comment">Descrição da vaga</label>
                <textarea class="form-control" rows="5" id="descricao" name="descricao"></textarea>
              </div>
              <div class="col-lg-12 text-center">
                <input type="submit" class="btn btn-primary" id="btnPublicar" name="btnPublicar" value="Publicar">
              </div>
              <?php 

              $vaga = $_POST['vaga'];
              $area = $_POST['area'];
              $periodo = $_POST['periodo'];
              $exigencias = $_POST['exigencias'];
              $beneficios = $_POST['beneficios'];
              $descricao= $_POST['descricao'];

              if (!$vaga =='' && !$area =='' && !$descricao =='') 
              {
                $sql_insert_vaga = "INSERT INTO vagas (vaga,area,descricao,dt_vaga,id_cadastro,periodo,beneficios,exigencias) values ('$vaga','$area','$descricao',current_timestamp,'$_SESSION[UsuarioID]','$periodo','$beneficios','$exigencias')";
              }
              if (mysql_query($sql_insert_vaga)) {
                $modal = "<div class='modal fade' id='modal' role='dialog'>
                <div class='modal-dialog modal-primary'>
                  <div class='modal-content'>  
                    <div class='modal-body text-center'> 
                      <h3>Vaga inserida com Sucesso!</h3>
                    </div>      
                    <div class='modal-footer'> 
                     <button type=button class='btn btn-primary' data-dismiss=modal>Fechar</button>
                   </div>      
                 </div>
               </div>
             </div>";
             echo $modal;
             echo "<script>$('#modal').modal('show');</script>";

           }

           ?>
         </form>
       </div>
       <!-- Tab Ver vagas -->
       <div id="verVagas" class="tab-pane fade  text-center">
        <h3 class="text-primary  col-lg-12">Minhas Vagas</h3>
        <div class="row col-md-12">

          <?php

          $query = mysql_query("SELECT * FROM vagas where `id_cadastro` = $_SESSION[UsuarioID] ");

          while ($result = mysql_fetch_assoc($query))
            echo'

            <div class="col-xs-12 col-lg-6">
              <div class="panel panel-primary" align="center">
                <div class="panel-heading  text-center">
                  <pre>
                    <h4>Vaga:'.$result['vaga'].'</h4>'.$result['dt_vaga'].'
                  </pre>
                </div>
                <div class="panel-body text-left">
                  <pre><p><label>Descrição:</label> 
'.$result['descricao'].'</p><p><label>Periodo:</label> 
'.$result['periodo'].'</p><p><label>Exigencias:</label> 
'.$result['exigencias'].'</p><p><label>Beneficios:</label> 
'.$result['beneficios'].'</p></pre>
                  </div>
                  <div class="panel-footer">
                    <form id="formEdit" method="POST" action="php/excluir-vaga.php">
                      <input class="hidden" type="text" name="id_vaga" value="'.$result['id_vaga'].'" />
                      <input class="btn" type="button" name="" value="Editar">
                      <input class="btn" type="submit" name="" value="Excluir">
                    </form>
                  </div>
                </div>
              </div>
          
            ';
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
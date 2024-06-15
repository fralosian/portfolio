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
    <title> Vagas - TechJobs </title>

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
                    <li class="active"><a href="vagas.php"> Buscar Vagas</a></li>
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
        <form name="pesquisa" id="" method="POST" align="center">
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
                                 
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                Vaga: <strong>'.$result['vaga'].'</strong>
                                            </div>
                                            <div class="panel-body">
                                                <label class="text-right" name="id">Id: '.$result['id_vaga'].'</label> - Área: '.$result['area'].'
                                            </div>
                                            <div class="panel-footer" >
											<form method="POST" action="vagas-detalhes.php" target="_blank" >
                                                <input type="text" name="id" class="hidden" value="'.$result['id_vaga'].'"/>
												<input type="submit" name="buscar" value="Mais detalhes" class="btn btn-primary"/>
											</form>
                                            </div> 
                                        </div>
                          
                                </br>
                            </div>
                        </div>
                        '
                        ;

                        if (mysql_num_rows($sql) == 0) {
                            echo "<div class='alert alert-warning text-center'>Desculpe... Não foram encontradas vagas com esses dados<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
                        }
                    }else{

                    //pegar TODAS as vagas do banco
                        $sql = mysql_query("SELECT * FROM vagas ORDER BY `id_vaga` DESC LIMIT 6")or die(mysql_error());
                        while ($result = mysql_fetch_assoc($sql))echo '

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Vaga: <strong>'.$result['vaga'].'</strong>
                                    </div>
                                    <div class="panel-body">
                                        <i class="text-right">Id: '.$result['id_vaga'].'</i> - Área: '.$result['area'].'
                                    </div>
                                    <div class="panel-footer">
                                    <form name=form2 method="POST" action="vagas-detalhes.php" target="_top">
                                        <input type="text" name="id" class="hidden" value="'.$result['id_vaga'].'"/>
                                        <input type="submit" name="buscar" value="Mais detalhes" class="btn btn-primary"/>
                                    </form>
                                </div>
                            </div>
                        </br>
                    </div>
                '
                ; 
            }

            
            ?>
                <!--<div class="modal fade" id="detalhesModal" role="dialog">
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
            
            echo "<div class='row'>";
            echo "<tr>";

            echo "<td>".$result["vaga"]."</td>";
            echo "<td>".$result["area"]."</td>";
            echo "<td>".$result["descricao"]."</td>";
            echo "<td>".$result["dt_vaga"]."</td>";
            echo "</tr>";
            echo "</div>";-->


            <?php   
/*      $area = $_POST['area'];
        if (isset($_POST['pesquisar'])) {
            $sql = "SELECT * FROM vagas where area = $area";
        } 
        $sql = mysql_query("SELECT * FROM vagas where `user` = '$_SESSION[UsuarioID]' ");
        while ($result = mysql_fetch_assoc($sql)){

            $email = $result['user'];
            $saberr = mysql_query("SELECT * FROM usuario WHERE email='$email'");
            $saber = mysql_fetch_array($saberr);
            $nome = $saber['nome']." ";
            $id = $result["id"];
            echo '
            <div class="panel panel-default">
                <div class="panel-heading" id="'.$id.'"> 

                    <strong>'.$vaga['vaga'].'</strong> - <a href="#">'.$nome.'</a> - '.$result[dt_vaga].'
                </div>
                <div class="panel-body">
                    <span>'.$vaga['descricao'].'</span>
                </div>
            </div><br>';

            $sql = mysql_query("SELECT * FROM vagas");
            while ($result = mysql_fetch_assoc($sql)){
                echo "<div class='row'>";
                echo "<tr>";
                echo "<td>".$result["id_vaga"]."</td>";
                echo "<td>".$result["vaga"]."</td>";
                echo "<td>".$result["area"]."</td>";
                echo "<td>".$result["descricao"]."</td>";
                echo "<td>".$result["dt_vaga"]."</td>";
                echo "</tr>";
                echo "</div>";


            }*/
            ?>
            
        </div>
    </body>
    </html>


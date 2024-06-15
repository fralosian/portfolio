<?php require_once("../db.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link type="text/css" href="../css/animate.css" rel="stylesheet">
	<link type="text/css" href="../css/style.css" rel="stylesheet" >
	<link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="../css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="../js/inserirCadastro.js">//inserir cadastro de informaçoes</script>
	<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../js/jquery.flexslider.js"></script>
	<script type="text/javascript" src="../js/wow.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/javascript.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap-tooltip.js"></script>
	<script type="text/javascript" src="../js/bootstrap-popover.js"></script>
	<script type="text/javascript" src="../js/bootstrap-modal.js"></script>
</head>
<body>

	<?php

	$id = $_POST['id_vaga'];

	$query = mysql_query("DELETE FROM Vagas WHERE `id_vaga` = '$id'")or die(mysql_error());

	if ($query = TRUE){
		$nav = '<nav class="navbar navbar-inverse"><div class="container-fluid"><div class="navbar-header"><a class="navbar-brand" href="../aluno-home.php"><img id="logonav" alt="logo" src="../img/logo-br.png" style="width:90px;height:21px"></a></div></div></nav>';
		$modal = '
		<div class="modal fade" id="modal" role="dialog">
			<div class="modal-dialog modal-primary">
				<div class="modal-content">  
					<div class="modal-body text-center"> 
						<h3>Vaga Deletada!</h3>
						<img src="../img/loader.gif"></img>
					</div>      
				</div>      
			</div>
		</div>
		';
		echo $nav;
		echo $modal;
		echo "<script>$('#modal').modal('show');</script>";
		header("refresh: 5;../empresa-vagas.php");


	}else{
		echo 'vaga nao apagada';
	}

	?>

</body>
</html>

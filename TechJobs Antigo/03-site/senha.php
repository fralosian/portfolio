<?php
	ob_start();

	$login = 'daniel';
	$senha = '1509';
	
	if ($login == $_POST['usuario'] && $senha == $_POST['password'])
		{
			$validacao = '1';
			$usuario = $_POST['usuario']; 

			session_start();
			//gravo as informações das variáveis dentro das sessões
			$_SESSION['usuario'] = $usuario;
			$_SESSION['validacao'] = $validacao;

			header ("Location: restrita.php");
		}
	else
		{
			echo
				"
					<head>

						<meta charset=utf-8>
						<meta http-equiv=X-UA-Compatible content=IE=edge>
						<meta name=viewport content='width=device-width, shrink-to-fit=no, initial-scale=1'>
						<meta name=description content=>
						<meta name=author content=lorcotti>

						<title>Restrita</title>

						<!-- Bootstrap Core CSS -->
						<link href=css/bootstrap.min.css rel=stylesheet>

						<!-- Custom CSS -->
						<link href=css/simple-sidebar.css rel=stylesheet>

					</head>
					<body>
						<div id=page-content-wrapper>
							<div class=container-fluid>
								<div class=col-lg-12>
									<div class=jumbotron>
										<div class=row>
											<a href=index.html class='btn btn-default'>Voltar</a>
										</div>
										<div class=row>
											<h2>Opa nego</h2>
											Não existe <strong>cadastro</strong> com esses dados.
										</div>
									</div>
								</div>
							</div>
						</div>


								
					</body>";
		}
?>
<?php           

session_start();

	$valorparaentrar = '1';
	$teste = $_SESSION['validacao'];

	if ($valorparaentrar == $teste)

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

						<div id=wrapper>

							<!-- Sidebar -->
							<div id=sidebar-wrapper>
								<ul class=sidebar-nav>
									<li class=sidebar-brand>
										<a href=#page-content-wrapper>
											HOME
										</a>
									</li>
									<li>
										<a href=db_manager.php>Banco de dados</a>
									</li>
									<li>
										<a href=form.html>Enviar email</a>
									</li>
									<li>
										<a href=deslogar.php>Sair</a>
									</li>
								</ul>
							</div>
						
							<div id=page-content-wrapper>
								<div class=container-fluid>
									<nav class='navbar navbar-default'>
										<div class='container-fluid'>
											<div class='navbar-header'>
												<a href='#menu-toggle' class='navbar-brand' id='menu-toggle'>MENU</a>
											</div>
										</div>
									</nav>
									<div class=col-lg-12>
										<div class=container>
											<div class=jumbotron>
												<div class=row>
													<h2>Bem vindo</h2>
													à pagina <strong>secreta</strong>.
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
						<script src=js/jquery.js></script>
						<script src=js/bootstrap.min.js></script>
						<script src=js/menu-toggle.js></script>

					</body>";
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
											você não tem <strong>permissão</strong> para acessar essa pagina.
										</div>
									</div>
								</div>
							</div>
						</div>


								
					</body>";

		}
?>
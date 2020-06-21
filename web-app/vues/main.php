<html>
	<head>
		<meta http-equiv="Content-Language" content="en-ca">
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="./css/main.css" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</head>
	<body id="background">
		<div id="corps" >

		<div class="container-fluid">
			<!-- section de gauche-->
			<div class="row">
				<div class="col-sm-4">
					<div id="navBarGauche">
						<nav id="navBar" class="navbar navbar-expand-sm">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item">
									<a class="nav-link" href="#">About us</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Contact us</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>

				<!-- section de du milieu-->
				<div class="col-sm-4">
					<div id="navBarMilieu">
						<nav id="navBar" class="navbar navbar-expand-sm justify-content-center">
							<ul class="navbar-nav">
								<li class="nav-item">
									<div id="title">
										<h1>
											<a class="nav-link" href="#">UTOPIA</a>
											<hr />
										</h1>
										<h3>Fitness App</h3>
									</div>
								</li>
							</ul>
						</nav>
					</div>
				</div>

				<!-- section de droite-->
				<div class="col-sm-4">
					<div id="navBarDroite">
						<nav id="navBar" class="navbar navbar-expand-sm justify-content-center">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="#">Login</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Sign up</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>


		<div class="container">
			<div id="content">
				<?php
					// Ici sera afficher la vue
					include $vue.".php";
				?>
				<br /><br />
			</div>
		</div>


		<div class="container">
			<div class="row">
				<div id="footer">
					&copy; 2019 Utopia. Tous droits réservés.
				</div>
			</div>
		</div>
		</div>
	</body>
</html>

<?php 
	session_start();
	session_destroy(); 
	include('../model/encryp.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<header>
		<div class="container">
			
			<div class="row">
				<div class="col-xs-8 col-sm-9 col-md-10">
					<h4>ClassicByte <small>Angelo G.</small> </h4>
				</div>
				<div class="col-xs-4 col-sm-3 col-md-2">
					<a href="index.html"><h4>Volver</h4></a>
				</div>		
			</div>
		</div>		
	</header>
	<br>

	<div class="container">
		<div class="col-md-12">
			<center>
				<img src="img/skull.png" width="150" height="150">
			</center>
		</div>
		<div class="col-md-12">
			<center>
				<?php
                    error_reporting(E_ALL  ^  E_NOTICE  ^  E_WARNING); 
                    //Mensaje de validacion denegada.
                    if ($_GET['err']!="") {
                    	$resultado=decrypt($_GET['err'],"KEY");
                    	if ($resultado=="y") {
                    		echo "<h2 style='color:#F00; font-size:1.5em;'>Clave y/o usuario incorrecto </h2>";
                    	}
                    }
                ?>
			</center>
		</div>
	</div>
	<article>
		<div class="container">
		<br>
			<div class="col-xs-12 col-md-12">
				<form name="login" method="post" action="../control/login.php" enctype="application/x-www-form-urlencoded" class="">
					<div class="form-group">
						<label for="nombre">Correo:</label>
						<input class="form-control" id="nombre" type="text" placeholder="correo..." name="emm" required>
					</div>
					<div class="form-group">
						<label for="nombre">Contraseña:</label>
						<input class="form-control" id="pss" type="password" placeholder="contraseña..." name="psw" required>
					</div>
					<button class="btn btn-primary">Registrar</button>
				</form>
			</div>
		</div>
	</article>
	<br>
	<footer>
			<div class="container">
				<h6><small>Contenido para todos</small></h6>
			</div>
	</footer>
	<!--Bootstrap -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php 
include('../model/encryp.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ClassicByte</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="">
	<header>
		<div class="container">
			
			<div class="row">
				<div class="col-xs-8 col-sm-9">
					<h4>ClassicByte 
						<small>
							<?php
								session_start();
								if (isset($_SESSION['usuario'])) {
									$data= $_SESSION['usuario'];
									echo $data;
								}else{
									echo "Usuario no encontrado";
								}		
						 	?>
						</small> 
					</h4>
				</div>
				<div class="col-xs-4 col-sm-3">
					<a href="login.php"><h4>Salir</h4></a>
				</div>		
			</div>
		</div>		
	</header>
	<div class="container-fluid">
		<section class="row">
			
			<div class="color1 col-xs-12 col-sm-6 col-md-6">
				<center>
					<h3>Subir</h3>
					<!--<a href="#"><img src="img/cloud-computing.png" class="img-rounded" height="100" width="100"></a> -->
				</center>
				<br>
			</div>
			<div class="color3 col-xs-12 col-sm-6 col-md-6">
				<center>
					<h3>Buscar</h3>
					<!--<a href="#"><img src="img/search.png" class="img-rounded" height="100" width="100"></a> -->
				</center>
				<br>
			</div>
			<div class="color5 col-xs-12 col-sm-12 col-md-12">
				<center>
					<h3>Mis Archivos</h3>
					<!-- <a href="files.php"><img src="img/folder(1).png" class="img-rounded" height="100" width="100"></a> -->
				</center>
				<br>
			</div>
		</section>
	</div>
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
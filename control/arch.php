<?php 
include('../model/connected.php');
include('../model/sesion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ClassicByte</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
	<link rel="stylesheet" type="text/css" href="../view/css/estilos.css">
	<link rel="stylesheet" href="../view/css/bootstrap.min.css">
</head>
<body class="">
	<header>
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-xs-11 col-sm-10">
					<h3>ClassicByte 
						<small>
							<?php
								if (isset($_SESSION['usuario'])) {
									$data=$_SESSION['usuario'];
									echo "<p>".$data."</p>";
								}else{
									header("Location:../view/main.php");
								}							
						 	?>
						</small> 
					</h3>
				</div>
				
				<div class="colxs-1 col-sm-2">
					<a href="#"><h4>Adjuntar</h4></a>
					<a href="../model/salir.php?sal=si"><h4>Salir</h4></a>
				</div>		
			</div>
		</div>		
	</header>
	
	<section class="">
			<div class="color2 col-xs-12 col-sm-2 col-md-2">
				<center>
					<h2><a href="../view/main.php" style="text-decoration:none">Volver</a></h2>	
				</center>
			</div>
			<div class="color2 col-xs-12 col-sm-5 col-md-5">
				<center>
					<h2><a href="#" style="text-decoration:none">Adjuntar link</a></h2>	
				</center>
			</div>
			<div class="color2 col-xs-12 col-sm-5 col-md-5">
				<center>
					<h2><a href="#" style="text-decoration:none">Archivos Personales</a></h2>
				</center>
			</div>
	</section>

		<div class="color6 col-xs-12">
		<br>
			<?php
			if (!($text=$_POST['textbuscar'])) {
				header("Location:../view/main.php");
			}else{
				$text=$_POST['textbuscar'];
				$categoria=$_POST['categ'];
				$check=$_POST['op'];
				//echo "<br>".$text ."<br>".$categoria."<br>".$check."<br>".$check2;
				/*
				if ($check=="archper") {
					$resul=$_SESSION['coduser'];
				}else{
					$resul=$check;
				}
				*/
				$inn = new conexion;
				$html = $inn->tableFiles($text,$categoria,$check);
				if ($html!="") {
					echo $html;
				}
			}	
			?>
		</div>
	
	
	<footer class="container-fluid">
			<div class="container col-xs-12">
				<h6><small>Contenido para todos</small></h6>
			</div>
	</footer>
	<!--Bootstrap -->
	<script src="../view/js/jquery.min.js"></script>
	<script src="../view/js/bootstrap.min.js"></script>
</body>

</html>
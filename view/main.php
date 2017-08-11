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
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.buttonload {
		    background-color: #4CAF50; /* Green background */
		    border: none; /* Remove borders */
		    color: white; /* White text */
		    padding: 12px 24px; /* Some padding */
		    font-size: 16px; /* Set a font-size */
		}

		/* Add a right margin to each icon */
		.fa {
		    margin-left: -12px;
		    margin-right: 8px;
		}
	</style>
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
								}							
						 	?>
						</small> 
					</h3>
				</div>
				
				<div class="colxs-1 col-sm-2">
					<a href="attach.php" style="text-decoration:none"><h4>Adjuntar</h4></a>
					<a href="../model/salir.php?sal=si" style="text-decoration:none"><h4>Salir</h4></a>
				</div>		
			</div>
		</div>		
	</header>
	<section class="">
			<div class="color2 col-xs-12 col-sm-2 col-md-2">
				<center>
					<h2><a href="../model/salir.php?sal=si" style="text-decoration:none">Salir</a>	
				</center>
			</div>
			<div class="color2 col-xs-12 col-sm-5 col-md-5">
				<center>
					<h2><a href="attach.php" style="text-decoration:none">Adjuntar link</a></h2>	
				</center>
			</div>
			<div class="color2 col-xs-12 col-sm-5 col-md-5">
				<center>
					<h2><a href="archper.php" style="text-decoration:none">Archivos Personales</a></h2>
				</center>
			</div>
			<div class="color1 container-fluid">
			<p style='color:#a10054;'>.</p>
			</div>
			<div class="color1 container-fluid">
				<form class="form-horizontal" method="post" action="../control/arch.php" enctype="application/x-www-form-urlencoded">
					<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
							<input type="text" class="form-control" id="textbuscar" name="textbuscar" placeholder="Buscar..." required>
							<label class="control-label" for="categ">Por:</label>
                            <select  class="form-control" name="categ" required/>
                            	<option value="name">Nombre</option>
                            	<option value="cod_fileup">Codigo de archivo</option>
                                <option value="servidor">Servidor</option>
                                <option value="categ_fileup">Categoria</option>
                                <option value="extending">Extensión</option>
                            </select>
							<div class="radio">
							  <label>
							    <input type="radio" name="op" id="everarch" value="everarch" checked>
							    Todos los archivos
							  </label>
							</div>
							<div class="radio">
							  <label>
							    <input type="radio" name="op" id="archper" value="archper">
							    Archivos personales
							  </label>
							</div>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
						<center><button type="submit" class="btn btn-default"><img src="img/loupe.png" width="80" height="80"></button></center>
					</div>
				</form>	
			</div>
			<!--
			<div class="color1 container-fluid">
			<p style='color:#a10054;'>.</p>
			</div>
			-->
	</section>

		<div class="color6 col-xs-12">
				<?php
					$cate=0;
					$tipo="one_charge";
					$inn = new conexion;
					$html = $inn->tableFiles($_SESSION['coduser'],$cate,$tipo);
					if ($html!="") {
						echo $html;
					}
				?>
		</div>
	
	
	<footer class="container-fluid">
			<div class="container col-xs-12">
				<h6><small>Contenido para todos</small></h6>
			</div>
	</footer>
	<!--Bootstrap -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
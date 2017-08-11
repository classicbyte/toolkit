<?php 
	include('../model/connected.php');
	include('../model/sesion.php');
	//include('../model/encryp.php');
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
					<h2><a href="attach.php" style="text-decoration:none">Adjuntar link</a></h2>	
				</center>
			</div>
			<div class="color2 col-xs-12 col-sm-5 col-md-5">
				<center>
					<h2><a href="archper.php" style="text-decoration:none">Archivos Personales</a></h2>
				</center>
			</div>
	</section>

<?php
	if(isset($_GET['err'])){
		$resultado=decrypt($_GET['err'],"KEY");
		if ($resultado==1) {
			
			echo "<div class='col-md-12'><br><center><img src='img/check-sign.png' width='90' height='90'><h2 style='color:#01DF01; font-size:1.5em;'>Archivo adjuntado correctamente</h2></center></div>";
			//header("Location:attach.php");
		}elseif ($resultado==2) {
			echo "<br><center><h2 style='color:#F00; font-size:1.5em;'>Error al adjuntar link</h2></center>";
		}
    }else{              	
   
?>

	<div class="container">
		<div class="col-md-12">
		<br>
			<center>
				<img src="img/criminal-with-stolen-computers.png" width="90" height="90">
			</center>
		</div>
		<div class="col-md-12">
			<center>
				
			</center>
		</div>
	</div>
<?php 
	}
?>
	<article>
		<div class="container">
		<br>
			<div class="col-xs-12 col-md-12">
				<form name="login" method="post" action="../control/adjt.php" enctype="application/x-www-form-urlencoded" class="">

					<div class="form-group">
						<label  class="sr-only" for="nombre">Nombre de archivo:</label>
						<input class="form-control" id="nombre" type="text" placeholder="nombre..." name="name_arch" required>
					</div>

					<div class="form-group">
						<label for="categ">Seleccione categoria:</label>
						<select  class="form-control" name="categ" required/>
                            	<option value="Utilidades">Utilidades</option>
                            	<option value="Sistema Operativo">Sistema Operativo</option>
                                <option value="Drivers">Drivers</option>
                                <option value="Antivirus">Antivirus</option>
                                <option value="Libros">Libros</option>
                                <option value="Cursos  ">Cursos</option>
                        </select>
					</div>

					<div class="form-inline">
						<label class="sr-only"  for="ext">Extensión:</label>
						<input class="form-control" id="ext" type="text" placeholder="extensión..." name="ext" required>
						<label class="sr-only" for="serv">Servidor:</label>
						<input class="form-control" id="serv" type="text" placeholder="servidor..." name="serv" required>
						<label class="sr-only" for="nombre">Tamaño:</label>
						<input class="form-control" id="nombre" type="text" placeholder="tamaño..." name="taman" required>
							<div class="radio">
							  <label>
							    <input type="radio" name="op" id="KB" value="KB" checked>
							    KB <small>(Kilobyte).</small>
							  </label>
							</div>
							<div class="radio">
							  <label>
							    <input type="radio" name="op" id="MB" value="MB">
							    MB <small>(Megabyte).</small>
							  </label>
							</div>
							<div class="radio">
							  <label>
							    <input type="radio" name="op" id="GB" value="GB">
							    GB <small>(Gigabyte).</small>
							  </label>
							</div>
					</div>

					<div class="form-group ">
					<br>
						<label class="sr-only" for="url">URL Archivo:</label>
						<input class="form-control" id="url" type="text" placeholder="url..." name="url" required>
					</div>

					<div class="form-group">
					<label class="sr-only" for="descrip">Descripción:</label>
						<textarea name="descrip" class="form-control" placeholder="Breve descripción..." required></textarea>
					</div>

					<div class="form-group">
						<button class="btn btn-primary">Adjuntar</button>
					</div>
				</form>
			</div>
		</div>
	</article>
	
	
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
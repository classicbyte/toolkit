
<!-- Verificar, Redirigir el flujo a la pagina --> 
<?php
	if($_GET['sal']=='si'){
		session_start();
		session_destroy();
		header("Location:../view/login.php");
	}
?>
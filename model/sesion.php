<?php
	session_start();
	if(!$_SESSION["activo"]){
		session_destroy();
		header("Location:../model/salir.php?sal=si");
	}
?>
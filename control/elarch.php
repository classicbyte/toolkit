<?php
include('../model/connected.php');
//recibimos variable y enviamos para posterior proceso (DEL) 
	if(isset($_POST['cod_del'])){
		$inn = new conexion;
		$inn->eliminaLink($_POST['cod_del']);
		$inn->cerrar();
	}
?>
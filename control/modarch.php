<?php 
include('../model/connected.php');
include('../model/sesion.php');
include('fecha.php');

$name_arch=$_POST['name_arch'];
$categori=$_POST['categ'];
$size=$_POST['size'];
$exten=$_POST['ext'];
$servidor=$_POST['serv'];
$url=$_POST['url'];
$descrip=$_POST['desc'];
$fecha = datafecha();
$user=$_SESSION['coduser'];
$cod=$_POST['cod_f'];

if ($name_arch or $categori or $size or $exten or $servidor or $url or $descrip or $fecha or $user or $cod) {
	$inn = new conexion;
	$inn->modificaLink($name_arch,$categori,$size,$exten,$servidor,$url,$descrip,$fecha,$user,$cod);
	$inn->cerrar();	
}

?>
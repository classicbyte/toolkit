<?php 
include('../model/connected.php');
include('fecha.php');
include('../model/sesion.php');


$name_arch=$_POST['name_arch'];
$categori=$_POST['categ'];
$size=$_POST['taman'];
$option=$_POST['op'];
$concat= $size." ".$option;
$exten=$_POST['ext'];
$servidor=$_POST['serv'];
$url=$_POST['url'];
$descrip=$_POST['descrip'];
$fecha = datafecha();
$user=$_SESSION['coduser'];


if ($name_arch or $categori or $size or $concat or $exten or $servidor or $url or $descrip or $fecha or $user) {
	$inn = new conexion;
	$inn->adjuntaLink($name_arch,$categori,$concat,$exten,$servidor,$url,$descrip,$fecha,$user);
	$inn->cerrar();
	
}

?>
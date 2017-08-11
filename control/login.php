<?php 
include ('../model/connected.php');

$user = $_POST['emm'];
$pass = md5($_POST['psw']);
//echo "Email: ".$user."  // Contrseña: ".$pass. "<br>" ;
$wish = new conexion;
$wish->login($user, $pass);
$wish->cerrar();

?>
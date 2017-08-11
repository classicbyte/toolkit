<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<!-- Mostrar el temporizador de cuenta regresiva en un elemento -->
<p id="demo"></p>


<?php

//devuelve false y genera una advertencia
var_dump(time_sleep_until(time()-1));

// puede funcionar solamente en ordenadores más rápidos, dormará durante 0.2 segundos
var_dump(time_sleep_until(microtime(true)+0.2));

?>

	
</body>
</html>
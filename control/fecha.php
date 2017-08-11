<?php  
	function datafecha(){
		date_default_timezone_set('Chile/Continental');
		$dia = date('N');
				switch ($dia) {
					case '1':
						$dia = "Lunes";
						break;
					case '2':
						$dia = "Martes";
						break;
					case '3':
						$dia = "Miercoles";
						break;
					case '4':
						$dia = "Jueves";
						break;
					case '5':
						$dia = "Viernes";
						break;
					case '6':
						$dia = "Sabado";
						break;
					case '7':
						$dia = "Domingo";
						break;
				}

		$fecha_comp = "$dia" ." ". date('jS \of F Y h:i:s A');
		return $fecha_comp;
	}
?>

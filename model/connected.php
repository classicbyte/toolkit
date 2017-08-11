<?php 
include('encryp.php');
	
	class conexion{
		private $conexion;
		private $server = "localhost";
		private $usuario = "root";
		private $pass = "";
		private $db = "toolkitrneuronal";
		private $resp="y";
		private $user;
		private $password;
		private $cate;
		private $word_key;
		private $type;
		

		public function __construct(){
			//funcion creadora de conexión a BD.5
			$this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->db);

			if($this->conexion->connect_errno){
				//Si la conexion no se realiza, envia alerta con el tipo de error.
				die("Error de conexion: (". $this->conexion->connect_errno.")");
			}
		}//construct

		public function cerrar(){
			//funcion para cerrar conexion a BD.
			$this->conexion->close();
		}//cerrar

		public function login($usuario, $pass){
			$this->user = $usuario;
			$this->password = $pass;

			$query="select cod_user, name, categ_us, email, password, fecha from user where email = '".$this->user."' and password = '".$this->password."' ";

			$consulta = $this->conexion->query($query);

			if ($row = mysqli_fetch_array($consulta) ) {
				//iniciando sesión.
				session_start();
				$_SESSION['activo'] = true;

				//extracción datos DB
				$_SESSION['cod_us'] = $row['cod_user'];
				$_SESSION['categ'] = $row['categ_us'];
				$_SESSION['nam'] = $row['name'];
				$_SESSION['ema'] = $row['email'];
				$_SESSION['fec'] = $row['fecha'];
				$_SESSION['pass'] = $row['password'];

				if ($_SESSION['categ']=="Admin") {					
					header("Location:../view/main.php");
				}
			}else{
				$resultado=encrypt($this->resp,"KEY");
				header("Location:../view/login.php?err=".$resultado."");
			}
			$_SESSION['usuario'] = $_SESSION['ema'];
			$_SESSION['passw'] = $_SESSION['pass'];
			$_SESSION['coduser']=$_SESSION['cod_us'];
		}//login

		public function tableFiles($nomarch,$categoria,$tipo){
			$this->word_key=$nomarch;
			$this->cate=$categoria;
			$this->tip=$tipo;

			//selección de query según busqueda.
			if ($this->tip=="everarch") {
				$query="select cod_fileup, name, categ_fileup, size, extending, servidor, url, descripcion from file_up where ".$this->cate." like ('%".$this->word_key."%') order by cod_fileup asc";
			}elseif ($this->tip=="archper") {
				$this->tip=$_SESSION['coduser'];
				$query="select * from file_up where cod_user=".$this->tip." and categ_fileup like ('%".$this->word_key."%') order by cod_fileup asc"; 
			}elseif ($this->tip=="one_charge") {
				$query="select * from file_up order by cod_fileup desc";
			}
			
			$consulta = $this->conexion->query($query);

			if (mysqli_num_rows($consulta)==0){
				echo "<center><h1>No se encontraron resultados</h1></center>";
			}else{
				echo "<div class='table-responsive'>";
				echo "<br>";
				echo "<table class='table table-bordered table-striped' width='80%' align='center'>";
					echo "<thead>";
						echo "<tr class='success'>";	         	  
							echo "<th>Nombre</th>";
							echo "<th>Categoria</th>";
							echo "<th>Tamaño</th>";
							echo "<th>Extensión</th>";
							echo "<th>Servidor</th>";
							echo "<th>URL</th>";
							echo "<th>Descripcion</th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>"; 
				while ($row = mysqli_fetch_array($consulta)) {
						echo "<tr>";							
							echo '<td>'.$row['name'].'</td>';
							echo '<td>'. $row['categ_fileup'].'</td>';
							echo '<td>'.$row['size'].'</td>';
							echo '<td>'.$row['extending'].'</td>';
							echo '<td>'.$row['servidor'].'</td>';
							$link = $row['url'];
							echo '<td><a target="_blank" href="'.$link.'" style="text-decoration:none">Descarga Aqui</a></td>';					  
							echo '<td>'.$row['descripcion'].'</td>';
						echo "</tr>";					
				}
					echo "</tbody>"; 
				echo "</table>";
				echo "</div>";
			}	
		}//fin tableFiles

		public function adjuntaLink ($nombre,$categoria,$tamaño,$extension,$servidor,$url,$descripcion,$fecha,$coduser){
			$query="insert into file_up(name, categ_fileup, size, extending, servidor, url, descripcion, fecha, cod_user) values ('".$nombre."','".$categoria."','".$tamaño."','".$extension."','".$servidor."','".$url."','".$descripcion."','".$fecha."', '".$coduser."')";

			//$this->conexion->query($query);
			
			//Redireccion segun respuesta de la ejecucion de query
			if ($this->conexion->query($query)) {
				$resp=1;
				$resultado=encrypt($resp,"KEY");
				header("Location:../view/attach.php?err=".$resultado."");
				
			}else{
				$resp=2;
				$resultado=encrypt($resp,"KEY");
				header("Location:../view/attach.php?err=".$resultado."");
			}	
		}//fin adjuntaLink

		public function tableFilesPersonal($categoria){
			
			$query="select * from file_up where cod_user=".$categoria." order by cod_fileup desc";
			$consulta = $this->conexion->query($query);

			if (mysqli_num_rows($consulta)==0){
				echo "<center><h1>No se encontraron resultados</h1></center>";
			}else{
				echo "<div class='table-responsive'>";
				echo "<br>";
				echo "<table class='table table-bordered table-striped' width='80%' align='center'>";
					echo "<thead>";
						echo "<tr class='success'>";	         	  
							echo "<th>Nombre</th>";
							echo "<th>Categoria</th>";
							echo "<th>Tamaño</th>";
							echo "<th>Extensión</th>";
							echo "<th>Servidor</th>";
							echo "<th>URL</th>";
							echo "<th>Descripcion</th>";
							echo "<th><center>Acción</center></th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>"; 
				while ($row = mysqli_fetch_array($consulta)) {
						echo "<tr>";
							$cod= $row['cod_fileup'];							
							echo '<td>'.$row['name'].'</td>';
							echo '<td>'. $row['categ_fileup'].'</td>';
							echo '<td>'.$row['size'].'</td>';
							echo '<td>'.$row['extending'].'</td>';
							echo '<td>'.$row['servidor'].'</td>';
							$link = $row['url'];
							echo '<td><a target="_blank" href="'.$link.'" style="text-decoration:none">Descarga Aqui</a></td>';					  
							echo '<td>'.$row['descripcion'].'</td>';
							$codfileup=encrypt($row['cod_fileup'],"KEY");
							echo '<td>
									<form method="post" action="../view/modarch.php?err='.$codfileup.'" enctype="application/x-www-form-urlencoded">
										<center>
										<button type="submit" class="btn btn-default"><img src="img/pencil.png" width="20" height="20" ></button> 
										
									</form>

									<form method="post" action="../view/archperdel.php?err='.$codfileup.'" enctype="application/x-www-form-urlencoded">
										<center>
										<br>
										<button type="submit" class="btn btn-default"><img src="img/delete.png" width="20" height="20" ></button> 
										
									</form>
								  </center></td>';
						echo "</tr>";					
				}
					echo "</tbody>"; 
				echo "</table>";
				echo "</div>";
			}	
		}//fin tableFilePersonal

		public function prepareModArchivo($codigo){
			$query="select * from file_up where cod_fileup=".$codigo."";
			$consulta = $this->conexion->query($query);
			if (mysqli_num_rows($consulta)==0){
				echo "<center><h1>No se encontraron resultados</h1></center>";
			}else{

				echo "<div class='table-responsive'>";
				echo "<br>";
				echo "<table class='table table-bordered table-striped' width='80%' align='center'>";
					echo "<thead>";

					echo "</thead>";
					echo "<tbody>"; 
				while ($row = mysqli_fetch_array($consulta)) {
					
						echo "<tr>";
							echo '<form method="post" action="../control/modarch.php" enctype="application/x-www-form-urlencoded">';							
							echo '<td>Nombre<input class="form-control" name="name_arch" type="text" value="'.$row['name'].'"></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td>Categoria <select class="form-control" name="categ" required>
											      <option value="">Selecciona una categoria</option>
											      <option value="Utilidades">Utilidades</option>
											      <option value="Sistema Operativo">Sistema Operativo</option>
				                                  <option value="Drivers">Drivers</option>
				                                  <option value="Antivirus">Antivirus</option>
				                                  <option value="Libros">Libros</option>
				                                  <option value="Cursos">Cursos</option>
											    </select></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<input type="hidden" name="cod_f" value="'.$row['cod_fileup'].'">';
							echo '<td>Tamaño<input class="form-control" name="size" type="text" value="'.$row['size'].'" required></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td>Extensión<input class="form-control" name="ext" type="text" value="'.$row['extending'].'"required></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td>Servidor<input class="form-control" name="serv" type="text" value="'.$row['servidor'].'"required></td>';
							echo '<tr>';
							$link = $row['url'];
							echo '<td>URL<input class="form-control" name="url" type="text" value="'.$link.'"required></td>';					  
							echo '</tr>';
							echo '<tr>';
							echo '<td>Descripción<input class="form-control" name="desc" type="text" value="'.$row['descripcion'].'"required></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td>
									
										<center>
										<button type="submit" class="btn btn-default"><img src="../view/img/pencil.png" width="90" height="100" ></button> 		
									</form>
								  </center></td>';
						echo "</tr>";					
				}
					echo "</tbody>"; 
				echo "</table>";
				echo "</div>";
			}

		}//fin prepareModArchivo

		public function modificaLink($nombre,$categoria,$tamaño,$extension,$servidor,$url,$descripcion,$fecha,$usuario,$codigo){
			$query="update file_up set name='".$nombre."', categ_fileup='".$categoria."', size='".$tamaño."', extending='".$extension."', servidor='".$servidor."', url='".$url."', descripcion='".$descripcion."', fecha='".$fecha."' where cod_fileup='".$codigo."'";
			$consulta = $this->conexion->query($query);
			$resultado=encrypt("1","KEY");
			header("Location:../view/archper.php?err=".$resultado."");

		}//fin modificaLink

		public function eliminaLink($codigo){
			$resul=decrypt($codigo,"KEY");
			$query="delete from file_up where cod_fileup='".$resul."'";
			
			
			if (!$this->conexion->query($query)){
				echo "No elimino";
			}else{
				$resultado=encrypt("2","KEY");
				header("Location:../view/archper.php?err=".$resultado."");
			}
			
		}//fin eliminaLink 

	}//fin Class Conexion
?>
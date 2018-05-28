<?
//include('conexion.php');

//////////NUEVA JUGADA ////////////
if (isset($_POST['crear_jugada'])){
	date_default_timezone_set('America/buenos_aires');
	$idUsuario= $_SESSION['id_usuario'];
	$dia=date('Y-M-D G:i:s');
	for ($i = 1; $i <= 48; $i++){
		$idJuego = $_POST["idJuego$i"];
		$ResultadoA = $_POST["ResultadoA_$i"];
		$ResultadoB = $_POST["ResultadoB_$i"];
		
		//echo $_POST["equipoA_$i"];
		//echo '<br>';
		
		if($ResultadoA>$ResultadoB){
			$ResultadoZ=$_POST["equipoA_$i"];
		}elseif ($ResultadoB>$ResultadoA) {
			$ResultadoZ=$_POST["equipoB_$i"];
		}elseif ($ResultadoB==$ResultadoA) {
			$ResultadoZ=100;
		}

		//echo $ResultadoZ;
		

		if(!isset($idJuego)){
//			echo "No sigo";
//			echo "<br>";
		}else{
			$existente = $conexion->query("SELECT * FROM jugada where id_usuario='$idUsuario' AND id_juego='$idJuego'");
			if ($existente->rowCount()>0) {
				try {			
					$actualizarJugada=$conexion->prepare("UPDATE jugada SET ResultadoA=:ResultadoA, ResultadoB=:ResultadoB, ResultadoZ=:ResultadoZ WHERE id_usuario=:id_usuario AND id_juego=:id_juego");
					$actualizarJugada->bindParam(':ResultadoA', $ResultadoA, PDO::PARAM_INT);
					$actualizarJugada->bindParam(':ResultadoB', $ResultadoB, PDO::PARAM_INT);
					$actualizarJugada->bindParam(':ResultadoZ', $ResultadoZ, PDO::PARAM_INT);
					$actualizarJugada->bindParam(':id_juego', $idJuego, PDO::PARAM_INT);
					$actualizarJugada->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
					$actualizarJugada->execute();
				}catch (PDOException $error) { /// MENSAJE POR SI SURGE ALGÚN ERROR
     				print 'ERROR: '. $error->getMessage();
				}
				//echo "hago un update<br>";
			}else{
				try {
					$nuevaJugada = $conexion -> prepare("INSERT INTO jugada(id_usuario, id_juego, ResultadoA, ResultadoB, ResultadoZ, actualizacion) VALUES (:id_usuario, :id_juego, :ResultadoA, :ResultadoB, :ResultadoB, :dia)");
  					$nuevaJugada -> bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
 					$nuevaJugada -> bindParam(':id_juego', $idJuego, PDO::PARAM_INT);
  					$nuevaJugada -> bindParam(':ResultadoA', $ResultadoA, PDO::PARAM_INT);
  					$nuevaJugada -> bindParam(':ResultadoB', $ResultadoB, PDO::PARAM_INT);
  					$nuevaJugada -> bindParam(':ResultadoZ', $ResultadoZ, PDO::PARAM_INT);
  					$nuevaJugada -> bindParam(':dia', $dia, PDO::PARAM_STR);
					$ejecutar= $nuevaJugada -> execute();
				}catch (PDOException $error) { /// MENSAJE POR SI SURGE ALGÚN ERROR
     				print 'ERROR: '. $error->getMessage();
				}
//				echo "hago un insert<br>$dia";
			}
		}
	}
}

//////////ACTUALZAIR JUGADA ////////////
if (isset($_POST['actulizar_jugada'])){
	echo "UPDATE jugada"	;
}

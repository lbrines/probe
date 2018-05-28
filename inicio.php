<?php
error_reporting(E_ERROR);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


include('conexion.php');
include('login.php');
include('logout.php');


//session_start();
$idUsuario= $_SESSION['id_usuario'];
$nombreUsuario= $_SESSION['nombre_usuario'];//VARIABLE DE SESIÓN NOMBRE DE USUARIO


include('insertarjugada.php');

$conectados = $conexion->prepare("SELECT * FROM usuarios WHERE estado='conectado'");//LISTA DE USUARIOS CONECTADOS
$conectados->execute();

$detallesU = $conexion->prepare("SELECT * FROM usuarios WHERE nombre=:nombreUsuario");// OBTENER INFORMACIÓN DE USUARIO
$detallesU -> bindParam(':nombreUsuario', $nombreUsuario, PDO::PARAM_STR);
$detallesU->execute();



?>

<html lang="es">
	<head>
		<title>QUINELA RUSIA 2018</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilo.css">

  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  		
  		<script>
			$(document).ready(function(){ // OCULTAR LA CAJA DE REGISTRO
				$("#conectadosbox").hide();

			    $("#conectados").click(function(){ // DESAPARECER CAJA DE LOGIN Y APARECER LA DE REGISTRO
			        $("#conectadosbox").slideToggle();
			    });

			});
	    </script>


		<script>setTimeout('document.location.reload()',2000000); </script> <!-- TIEMPO EN MILISEGUNDOS PARA QUE LA PÁG SE RECARGUE TRAS INACTIVIDAD-->
	</head>

	<body>
		<header>
			<div class="alert alert-info">
			<h3>Bienvenido: <? echo $nombreUsuario; ?></h3>
			</div>
		</header>

		<div class="row">
		<div class="col-md-4 col-md-offset-2 ">
		<div class="panel panel-primary">
        <div class="panel-heading text-center" >INFORMACIÓN DE USUARIO</div>
        <div class="panel-body">

			<?
				$mostrarDetalles = $detallesU->fetch(PDO::FETCH_ASSOC);
				$idUsuario = $mostrarDetalles['id'];
				
					echo '<strong>ID Usuario: </strong>'.$mostrarDetalles['id'].'<br>';
					echo '<strong>Nombre Usuario: </strong>'.$mostrarDetalles['nombre'].'<br>';
					echo '<strong>Correo Electrónico: </strong>'.$mostrarDetalles['email'].'<br>';
					echo '<strong>último Sing In: </strong>'.$mostrarDetalles['time_login'].'<br>';
					echo '<strong>Último Logout: </strong>'.$mostrarDetalles['time_logout'].'<br>';
				
			?>
		</div>
		</div>
		<form method="post" action="logout.php">
			<input class="btn btn-danger" type="submit" name="salir" value="Cerrar Sesión">
		</form>
		</div>


		<div class="col-md-2">
		<div class="panel panel-primary">
        <div class="panel-heading text-center" ><a href="#" id="conectados">CONECTADOS</a></div>
        <div class="panel-body" id="conectadosbox">

			<?
				while($filaConectados = $conectados->fetch(PDO::FETCH_ASSOC)) 
				{
					echo '<p style="color:gray;">
							<span style="color:#40b22c;">●</span> '.$filaConectados['nombre'].'
						  </p>';
				}
			?>
		</div>
		</div>
		</div>
		<form class="form formitic" method="post">
		</div>

		
		<?

for ($i = 1; $i <= 48; $i++) {
    $id_juego=$i;

		$datosJ = $conexion->prepare("SELECT id_juego, fecha, hora, grupo FROM juegos WHERE id_juego=:id_juego");
		$datosJ -> bindParam(':id_juego', $id_juego, PDO::PARAM_INT);
		$datosJ->execute();

		$equipoA = $conexion->prepare("SELECT id_pais, pais FROM juegos, paises WHERE id_juego=:id_juego AND A=id_pais");
		$equipoA -> bindParam(':id_juego', $id_juego, PDO::PARAM_INT);
		$equipoA->execute();

		$equipoB = $conexion->prepare("SELECT id_pais, pais FROM juegos, paises WHERE id_juego=:id_juego AND B=id_pais");
		$equipoB -> bindParam(':id_juego', $id_juego, PDO::PARAM_INT);
		$equipoB->execute();

		$mostrarDatos = $datosJ->fetch(PDO::FETCH_ASSOC);
		$mostrarEquipoA = $equipoA->fetch(PDO::FETCH_ASSOC);
		$mostrarEquipoB = $equipoB->fetch(PDO::FETCH_ASSOC);

		$originalDate = $mostrarDatos['fecha'];
		$Date = date("d/m/Y", strtotime($originalDate));
		$originalHora = $mostrarDatos['hora'];
		$hora = date("H:i", strtotime($originalHora)); 

		$idJuego = $mostrarDatos['id_juego'];
		$grupo = $mostrarDatos['grupo'];
		$idPaisA=$mostrarEquipoA['id_pais'];
		$paisA=$mostrarEquipoA['pais'];
		$idPaisB=$mostrarEquipoB['id_pais'];
		$paisB=$mostrarEquipoB['pais'];
		$ResultadoA=null;
		$ResultadoB=null;
		$mensaje = null;
		//echo $idPaisA;
		$existente = $conexion->query("SELECT id_juego, ResultadoA, ResultadoB FROM jugada where id_usuario='$idUsuario' AND id_juego='$idJuego'");
			if ($existente->rowCount()>0) {
				$existente->execute();
				$mostrarExistente = $existente->fetch(PDO::FETCH_ASSOC);
				//echo "exito";

				$ResultadoA=$mostrarExistente['ResultadoA'];
		 		$ResultadoB=$mostrarExistente['ResultadoB'];

		 		//echo $ResultadoA;

			}


		
echo "		<div class=\"row\">\n"; 
echo "			<div class=\"col-md-6 col-md-offset-2 \">\n"; 
echo "				<div class=\"panel panel-primary\">\n"; 
echo "					<div class=\"panel-heading text-center\" > $Date - $hora - GRUPO $grupo</div>\n"; 
echo "        				<div class=\"col-md-6 col-md-offset-4\"></div>\n"; 
echo "        				<div class=\"panel-body\">\n"; 
echo "        					<div class=\"col-md-3 col-md-offset-2\" text-center><input type=\"text\" name=\"ResultadoA_$idJuego\" maxlength=\"2\" size=\"2\" value=\"$ResultadoA\" required> <img class=\"flag\" src=\"img/flag/$idPaisA.png\"> $paisA </div>\n"; 
echo "        					<div class=\"col-md-3 col-md-offset-2\" text-center><input type=\"text\" name=\"ResultadoB_$idJuego\" maxlength=\"2\" size=\"2\" value=\"$ResultadoB\" required> <img class=\"flag\" src=\"img/flag/$idPaisB.png\"> $paisB </div>\n"; 
echo "							<input type=\"hidden\" name=\"idJuego$i\" value=\"$idJuego\">";
echo "							<input type=\"hidden\" name=\"equipoA_$idJuego\" value=\"$idPaisA\">";
echo "							<input type=\"hidden\" name=\"equipoB_$idJuego\" value=\"$idPaisB\">";
echo "        				</div>\n"; 
echo "        			</div>\n"; 
echo "        		</div>\n"; 
echo "        	</div>\n"; 
echo "        </div>\n";


}


?>
<input class="btn btn-info form-control inpbtm" type="submit" name="crear_jugada" value="JUGAR">
</form>

	</body>
</html>



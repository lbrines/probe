<?php


$host = "localhost";
$usuario= "c0_admin";
$contraseña ="c93rip2n!q";

try {
   $conexion = new PDO("mysql:host=$host;dbname=c0_prode", $usuario, $contraseña);
   $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $conexion->exec("set names utf8");
    return$conexion;
    }
catch(PDOException $error)
    {
    echo "No se pudo conectar a la BD: " . $error->getMessage();
    }

?>

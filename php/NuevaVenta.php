<?php
require_once("Conexion.php");
session_start();

$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}else{


}


?>
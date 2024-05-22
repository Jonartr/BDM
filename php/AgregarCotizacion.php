<?php
require_once("Conexion.php");
session_start();

$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion: ".$conexion->connect_error);

}

$Usuario = $_SESSION['Correo'];
$Cotizacion = $_SESSION['Cotizacion'];
$Codigo = $Cotizacion['Codigo'];
$Nombre = $Cotizacion['Nombre'];
$Detalles = $_POST['Detalles'];
$Cantidad = $_POST['Cantidad'];
$Precio = $_POST['Cantidad'];




?>
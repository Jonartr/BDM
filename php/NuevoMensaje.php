<?php 
require_once("Conexion.php");
session_start();

$Emisor = $_SESSION['Correo'];
$Cotizar=  $_SESSION['Cotizacion'][0];
$Remitente = $Cotizar['Usuario'];
$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}

$Mensaje = $_POST['message'];
$Codigo = $_POST['Codigo'];


$Query = "Call Mensajeria('$Mensaje','$Emisor','$Remitente',$Codigo)";


$conexion->query($Query);

$conexion->close();

header("location: recuperarmensajes.php");



?> 
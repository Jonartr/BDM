<?php


require_once("Conexion.php");
session_start();

$startcon = new Conectar();
$conexion = $startcon->Conectar();

$Cotizar = $_SESSION['Cotizacion'][0];
$Codigo = $Cotizar['Codigo'];
$Usuario = $_SESSION['Correo'];

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}

$Query = "SELECT * FROM CHAT WHERE Codigo = $Codigo AND Emisor = $Usuario";

$result = $conexion->query($Query);
$Datos = array();
$_SESSION['Mensajes'] = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $Datos[] = $row;
     }
    
     $_SESSION['Mensajes'] = $Datos;
}

$conexion->close();




?>
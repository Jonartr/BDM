<?php 
//SOLO PARA TRAER CIERTOS DATOS DE LOS PRODUCTOS A APROBAR
require_once("Conexion.php");
session_start();

$startcon = new Conectar();
$conexion = $startcon->Conectar();


$Query = "SELECT * FROM aprobaciones";

$result = $conexion->query($Query);
$Datos = array();
$_SESSION['Aprobaciones'] = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $Datos[] = $row;
     }
    
     $_SESSION['Aprobaciones'] = $Datos;
}

$conexion->close();


header('location: ../aprobarProductos.php');


?>
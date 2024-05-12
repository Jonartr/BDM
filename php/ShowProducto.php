<?php 
require_once("Conexion.php");
session_start();


$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}


$Query = "SELECT * FROM producto";

$result = $conexion->query($Query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $Datos = array();
        $Datos[] = $row;
     }
     $_SESSION['Productos_show'] = array();
     $_SESSION['Productos_show'] = $Datos;
}

$conexion->close();
header("location: ../inicio.php");

?>
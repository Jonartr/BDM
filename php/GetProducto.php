<?php 
require_once("Conexion.php");
session_start();

$Usuario = $_SESSION['Correo'];
$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}



$Query = "SELECT * FROM producto WHERE Usuario = '$Usuario'";

$result = $conexion->query($Query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $Datos = array();
        $Datos[] = $row;
     }
     $_SESSION['Productos'] = array();
     $_SESSION['Productos'] = $Datos;
}

$conexion->close();
header("location: ../productos.php");

?>
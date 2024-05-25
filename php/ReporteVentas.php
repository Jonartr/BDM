<?php 


session_start();

$Usuario = $_SESSION['Correo'];

$startcon = new Conectar();
$conexion = $startcon->Conectar();


if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}

$Query = "SELECT * FROM venta WHERE Correo = '$Usuario'";



$result = $conexion->query($Query);

if ($result->num_rows > 0) {
  $Datos = array();
  $_SESSION['Ventas'] = array();
  while($row = $result->fetch_assoc()) {
     $Datos[] = $row;
  }

  $_SESSION['Ventas'] = $Datos;

}


$conexion->close();



?>
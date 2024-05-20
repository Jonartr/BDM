<?php 
//APROBAR PRODUCTOS 
require_once("Conexion.php");
session_start();

$startcon = new Conectar();
$conexion = $startcon->Conectar();

if (isset($_GET['codigo'])){
        $Codigo = $_GET['codigo'];

        $Query = "UPDATE producto SET Aprobacion = 1 WHERE Codigo = '$Codigo'";

        $result = $conexion->query($Query);

        $conexion->close();
}


header('location: AutorizarProductos.php');


?>
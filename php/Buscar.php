<?php 
require_once("Conexion.php");
session_start();

$startcon = new Conectar();
$conexion = $startcon->Conectar();


if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}

if(isset($_GET['search'])){
    $Busqueda = $_GET['search'];

    $Query = "SELECT * FROM producto WHERE Nombre LIKE '$Busqueda%'";

    
    $result = $conexion->query($Query);
    $Datos = array();
    $_SESSION['Busqueda'] = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $Datos[] = $row;
        }
        
        $_SESSION['Busqueda'] = $Datos;
    }

   
}


$conexion->close();

header('location: ../busqueda.php');


?>
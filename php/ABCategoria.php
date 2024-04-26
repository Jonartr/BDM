<?php
require_once("Conexion.php");
session_start();

$Usuario = $_SESSION['Correo'];
$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json,true);

    if (isset($data)) {

        $Nombre = $data['Name'];
        $Descripcion = $data['Desc'];

        $Query = "INSERT INTO categorias(Nombre, Descripcion, Correo) VALUES ('$Nombre','$Descripcion','$Usuario')";

        $conexion->query($Query);

        header('Location: ../categorias.php');
    }
}

$conexion->close();

?>
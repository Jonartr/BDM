<?php
require_once("Conexion.php");
session_start();

$Usuario = $_SESSION['Correo'];
$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}
else{
   
}


$NombreLista = $_POST['name'];
$Descripcion = $_POST['description'];
$TipoPriv = $_POST['private'];
$Imagen = $_FILES['avatar']['name'];
$ruta = "../img/".$Imagen;
move_uploaded_file($_FILES['avatar']['tmp_name'], $ruta);

$Query = "INSERT INTO listas (Nombre, Descripcion, Privacidad, Imagen, Usuario) 
VALUES ('$NombreLista', '$Descripcion', '$TipoPriv', '$Imagen', '$Usuario');";

$conexion->query($Query);
   
$conexion->close();



?>
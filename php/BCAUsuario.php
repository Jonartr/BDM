<?php  

require_once("Conexion.php");

$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}

session_start();

$Correo = $_SESSION['Correo'];
$Contrasena =$_POST['password'];
$Private = $_POST['private'];
$Imagen = $_POST['avatar'];
$Nombre = $_POST['fullname']; 
$Fecha = $_POST['birthdate']; 
$Sexo = $_POST['gender']; 


if($Contrasena == null){

$Contrasena = $_SESSION['Contra'];

}

//$Imagen =   base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $Imagen));   

echo $Correo;

$Query = "CALL abcusuario ('$Correo', 'hello', '$Contrasena',2, '$Imagen', '$Nombre', '$Fecha','$Sexo', '$Private', 2)";

$conexion->query($Query);

header("Location:../inicio.php");

$conexion->close();

?>
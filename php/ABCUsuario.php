<?php
require_once("Conexion.php");

$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json,true);

    if (isset($data)) {
        $Correo = $data['correo'];
        $Usuario = $data['user'];
        $Contra = $data['pass'];
        $Rol = $data['rol'];
        $Imagen = $data['imagen'];
        $Nombre = $data['nombre'];
        $Fecha = $data['fecha'];
        $Genero = $data['genre'];
        $Private = $data['private'];

   

        $nombre_archivo = basename($Imagen);

        $ruta = "../img/".$nombre_archivo;

        move_uploaded_file($nombre_archivo, $ruta);

        $Query = "CALL abcusuario ('$Correo', '$Usuario', '$Contra','$Rol', '$nombre_archivo', '$Nombre', '$Fecha','$Genero',' $Private',1)";

       /*$Query = "INSERT INTO usuarios VALUES 
       ('$Correo','$Usuario','$Contra', '$Roltype', '$Imagen', now(),null,1)";
       $conexion->query($Query);

       $Query = "INSERT INTO datospersonales VALUES ('$Nombre','$Fecha','$Genre','$Correo')";*/

     //   $conexion->query($Query);
    }


}

   //$conexion->close();
?>
<?php
require_once("Conexion.php");
session_start();
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

        $File = $_FILES['avatar']['tmp_name'];

        
        

       $nombre_archivo = basename($Imagen);

       // $ruta = "img/".$nombre_archivo;
    
       // move_uploaded_file($nombre_archivo, $ruta);

        

    

       $Query = "CALL abcusuario ('$Correo', '$Usuario', '$Contra','$Rol', '$nombre_archivo', '$Nombre', '$Fecha','$Genero','$Private',1)";

      
   //   $conexion->query($Query);
    }


}

   //$conexion->close();


?>
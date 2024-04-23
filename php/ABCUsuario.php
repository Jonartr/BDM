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
        $Roltype = 1;
        $Genre = 1;

        if($Genero == "male"){
             $Genre = 1;   

        }
        else{
            $Genre = 2;
        }

        //Conversion de imagen
        $newimage =   base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $Imagen));   


        $Query = "CALL abcusuario ('$Correo', '$Usuario', '$Contra','$Roltype', '$newimage', '$Nombre', '$Fecha','$Genre', 1,' $Private')";

       /*$Query = "INSERT INTO usuarios VALUES 
       ('$Correo','$Usuario','$Contra', '$Roltype', '$Imagen', now(),null,1)";
       $conexion->query($Query);

       $Query = "INSERT INTO datospersonales VALUES ('$Nombre','$Fecha','$Genre','$Correo')";*/

        $conexion->query($Query);
    }


}

    $conexion->close();
?>
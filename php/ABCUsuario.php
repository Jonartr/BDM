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
        $Roltype = 1;
        $Genre = 1;
        if($Rol == "Usuario"){
            $Roltype = 1;
        }
        else {
            $Roltype = 2;
        }

        if($Genero == "male"){
             $Genre = 1;   

        }
        else{
            $Genre = 2;
        }
            

       $Query = "INSERT INTO usuarios VALUES 
       ('$Correo','$Usuario','$Contra','$Roltype','$Imagen', '$Nombre','$Fecha', '$Genre','$Fecha','$Fecha',1)";     

       $conexion->query($Query);

    }


}


?>
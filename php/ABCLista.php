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


if (isset($_GET['eliminar'])){
    $_SESSION['Opcmysql'] = $_GET['eliminar'];
}

//if(isset($_POST['']))

if($_SESSION['Opcmysql'] != 3){

        $Opcion = $_SESSION['Opcmysql']; 
        
        
        if(isset($_POST['Editlista'])){
            $idlista = $_POST['Editlista'];

        }
        else{
            $idlista = 0;
        }

        if(isset( $_POST['name']) && $_POST['name'] != null){
            $NombreLista = $_POST['name'];

        }
        else{
            $NombreLista = $_SESSION['Listas']['Nombre'];
        }
           
        if(isset( $_POST['description']) && $_POST['description'] != null){
            $Descripcion = $_POST['description'];
        }
        else{
            $Descripcion = $_SESSION['Listas']['Descripcion'];    
        }

        if(isset( $_POST['private']) && $_POST['private'] != null){
            $TipoPriv = $_POST['private'];
        }
        else{
            $TipoPriv = $_SESSION['Listas']['Privacidad'];
        } 

        if(isset( $_FILES['avatar']) && $_FILES['avatar'] != null){
            $Imagen = $_FILES['avatar']['name'];

            $ruta = "../img/".$Imagen;
            move_uploaded_file($_FILES['avatar']['tmp_name'], $ruta);

        }
        else{
            $Imagen = $_SESSION['Listas']['Imagen'];
        }
          
         

        $Query = "Call ABCListas ('$NombreLista', '$Descripcion', '$TipoPriv', '$Imagen', '$Usuario', '$Opcion', '$idlista' );";

        $conexion->query($Query);
}
else if($_SESSION['Opcmysql'] == 3){
    
       $Opcion = $_SESSION['Opcmysql']; 
       $Query = "Call ABCListas ( null,  null,  null,  null, null, '$Opcion', ' $idlista' );";
       $conexion->query($Query);
}


   
$conexion->close();



?>
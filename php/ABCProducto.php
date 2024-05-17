<?php 
require_once("Conexion.php");
session_start();

$Usuario = $_SESSION['Correo'];
$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}


$Opcion = $_SESSION['Opcmysql'];

if ( $_SESSION['Opcmysql'] != 4){

        /* AGREGAR, EDITAR O ELIMINAR (TRIGGER) PRODUCTOS */

            $nombre = $_POST['namepr'];
            $descrpcion = $_POST['descpr'];
            $categoria = $_POST['cat'];
            $tipoventa = $_POST['tsell'];
            $precio = $_POST['price'];
            $cantidad = $_POST['count'];



            $imagen_1 = $_FILES['img1']['name'];
            $imagen_2 = $_FILES['img2']['name'];
            $imagen_3 = $_FILES['img3']['name'];
            $video = $_FILES['vid']['name'];

            $ruta = "../img/".$imagen_1;
            $ruta2 = "../img/".$imagen_2;
            $ruta3 = "../img/".$imagen_3;
            $ruta4 = "../img/".$video;

            move_uploaded_file($_FILES['img1']['tmp_name'], $ruta);
            move_uploaded_file($_FILES['img2']['tmp_name'], $ruta2);
            move_uploaded_file($_FILES['img3']['tmp_name'], $ruta3);
            move_uploaded_file($_FILES['vid']['tmp_name'], $ruta4);



            $Query = "CALL ABCProductos ('$nombre','$descrpcion', '$imagen_1', '$imagen_2', '$imagen_3','$video','$tipoventa',
            '$precio', '$cantidad' , 0, '$categoria','$Usuario', '$Opcion' , 0, 0);";

            $conexion->query($Query);
            
           

}
else if ($_SESSION['Opcmysql'] == 4){
    $Opcion = $_SESSION['Opcmysql'];
    $Codigo = $_SESSION['CodLista'];
    $Idlista =  $_SESSION['Opc_L']; 
    /* SOLO PARA AGREGAR SI EL PRODUCTO VA A PERTENECER A UNA LISTA DE DESEOS*/

    $Query = "CALL ABCProductos (null, null, null, null, null, null, null,
     null, null, null, null, null,'$Opcion', '$Codigo',$Idlista );";
    $conexion->query($Query);

}


$conexion->close();
 
header(0);

?>
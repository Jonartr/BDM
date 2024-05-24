<?php 
require_once("Conexion.php");
session_start();

$Usuario = $_SESSION['Correo'];
$Producto;
$Codigo; 
$startcon = new Conectar();
$conexion = $startcon->Conectar();

$_SESSION['RedirigirProducto'] = true;


if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}


if (isset($_GET['eliminar'])){
    $_SESSION['Opcmysql']= $_GET['eliminar'];
  $Opcion = $_GET['eliminar'];
}
else{
    $Opcion = $_SESSION['Opcmysql'];
}

if(isset($_GET['Indice'])){
    $Indice = $_GET['Indice'];
}



$MoveMultimedia = 0;

if ( $_SESSION['Opcmysql'] != 4 && $_SESSION['Opcmysql'] != 3 ){


        /* AGREGAR, EDITAR O ELIMINAR (TRIGGER) PRODUCTOS */

            if(isset($_POST['CodigoEditar']) && $_POST['CodigoEditar'] != null ){
                $Codigo = $_POST['CodigoEditar'];

            }
            else{
                $Codigo = 0;
            }

            if (isset($_POST['namepr']) && $_POST['namepr'] != null ){
                $nombre = $_POST['namepr'];
            }
            else{
                $nombre = $_SESSION['Productos']['Nombre'][$Indice];
            }
         

            if (isset( $_POST['descpr'])&& $_POST['descpr'] != null){
                $descrpcion = $_POST['descpr'];
            }  
            else{
                $descrpcion = $_SESSION['Productos']['Descripcion'][$Indice];
            }

         

            if (isset( $_POST['cat'])&& $_POST['cat'] != null){
                $categoria = $_POST['cat'];
            }
            else{
                $categoria =$_SESSION['Productos']['Categoria'][$Indice];
            }
          

            if (isset( $_POST['tsell'])&& $_POST['tsell'] != null){
                $tipoventa = $_POST['tsell'];
            }
            else{
                $tipoventa = $_SESSION['Productos']['TipoVenta'][$Indice];
            }
          

            if (isset( $_POST['price'])&& $_POST['price'] != null){
                $precio = $_POST['price'];
            }
            else{
                $precio = $_SESSION['Productos']['Precio'][$Indice];
            }
        


            if (isset( $_POST['count'])&& $_POST['count'] != null){
                $cantidad = $_POST['count'];
            }
            else{
                $cantidad = $_SESSION['Productos']['Existencias'][$Indice];
            }
         


            if (isset( $_FILES['img1'])&& $_FILES['img1'] != null){
                $imagen_1 = $_FILES['img1']['name'];
                $MoveMultimedia++;
            }
            else{
                $imagen_1 = $_SESSION['Productos']['Imagen_1'][$Indice];
            }
    

            if (isset( $_FILES['img2'])&& $_FILES['img2'] != null){
                $imagen_2 = $_FILES['img2']['name'];
                $MoveMultimedia++;
            }
            else{
                $imagen_2 = $_SESSION['Productos']['Imagen_2'][$Indice];
            }
        

            if (isset( $_FILES['img3'])&& $_FILES['img3'] != null){
                $imagen_3 = $_FILES['img3']['name'];
                $MoveMultimedia++;
            }
            else{
                $imagen_3 = $_SESSION['Productos']['Imagen_3'][$Indice];
            }
       

            if (isset( $_FILES['vid'])&& $_FILES['vid'] != null){
                $video = $_FILES['vid']['name'];
                $MoveMultimedia++;
            }
            else{
                $video = $_SESSION['Productos']['Video'][$Indice];
            }
     
            if ( $MoveMultimedia == 4){
                $ruta = "../img/".$imagen_1;
                $ruta2 = "../img/".$imagen_2;
                $ruta3 = "../img/".$imagen_3;
                $ruta4 = "../img/".$video;
    
                move_uploaded_file($_FILES['img1']['tmp_name'], $ruta);
                move_uploaded_file($_FILES['img2']['tmp_name'], $ruta2);
                move_uploaded_file($_FILES['img3']['tmp_name'], $ruta3);
                move_uploaded_file($_FILES['vid']['tmp_name'], $ruta4);
            }
          



            $Query = "CALL ABCProductos ('$nombre','$descrpcion', '$imagen_1', '$imagen_2', '$imagen_3','$video','$tipoventa',
            '$precio', '$cantidad' , 0, '$categoria','$Usuario', '$Opcion' , '$Codigo', 0);";

            $conexion->query($Query);
            
           

}
else if ($_SESSION['Opcmysql'] == 3){
    $Opcion = $_SESSION['Opcmysql'];

    if(isset($_GET['del_producto'])){

        $Codigo = $_GET['del_producto'];
    }


    $Query = "CALL ABCProductos (null, null, null, null, null, null, null,
     null, null, null, null, null,'$Opcion', '$Codigo',null );";
    $conexion->query($Query);

}
else if ($_SESSION['Opcmysql'] == 4){
    $Opcion = $_SESSION['Opcmysql'];
    $Codigo = $_SESSION['CodLista'];
    $Idlista =  $_SESSION['Opc_L']; 
    /* SOLO PARA AGREGAR SI EL PRODUCTO VA A PERTENECER A UNA LISTA DE DESEOS*/

    $Query = "CALL ABCProductos (null, null, null, null, null, null, null,
     null, null, null, null, null,'$Opcion', '$Codigo','$Idlista' );";
    $conexion->query($Query);

}


$conexion->close();
 
header("location: Precarga.php");

?>
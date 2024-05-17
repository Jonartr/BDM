<?php
header('Acess-Control-Allow-Origin:*');
header('Content-type: application/json');
require_once("Conexion.php");


$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}


$Query = "SELECT ID_Cat, Nombre, Descripcion, Correo FROM categorias";

$result = $conexion->query($Query);

if ($result->num_rows > 0) {

    $Categorias = array();
    $_SESSION['Categoria'] = array();//php
    while($row = $result->fetch_assoc()) {

        $Datos[] = $row;//php

        $Categorias[] = array(
            "ID" => $row['ID_Cat'],
            "Nombre" => $row['Nombre'],
            "Descripcion" => $row['Descripcion'],
            "Correo" => $row['Correo']
        );
        //php
        $_SESSION['Categoria'] = $Datos;

    } 
  
    
    echo json_encode($Categorias);

    
}else {
  
    http_response_code(404);
    echo json_encode(array("error" => "No se encontraron categorías"));
}

$conexion->close();

?>

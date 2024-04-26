<?php
require_once("Conexion.php");

$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}


$Query = "SELECT Nombre, Descripcion, Correo FROM categorias";

$Result = $conexion->query($Query);

if ($result->num_rows > 0) {

    $Categorias = array();

    while($row = $result->fetch_assoc()) {
        $Categorias[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($categorias);

}else {
  
    http_response_code(404);
    echo json_encode(array("error" => "No se encontraron categorías"));
}

$conexion->close();

?>

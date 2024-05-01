<?php
header('Acess-Control-Allow-Origin:*');
header('Content-type: application/json');
require_once("Conexion.php");

$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}


$Query = "SELECT Nombre, Descripcion, Usuario FROM categorias";

$result = $conexion->query($Query);

if ($result->num_rows > 0) {

  

    while($row = $result->fetch_assoc()) {
        $Categorias = array(
            "Nombre" => $row['Nombre'],
            "Descripcion" => $row['Descripcion'],
            "Correo" => $row['Usuario']
        );
    } 

    echo json_encode($Categorias);

    
}else {
  
    http_response_code(404);
    echo json_encode(array("error" => "No se encontraron categorías"));
}

$conexion->close();

?>

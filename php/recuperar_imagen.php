<?php
// Conexión a la base de datos
require_once("Conexion.php");

$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}

// Consulta para recuperar la imagen
$query = "SELECT Imagen FROM usuarios WHERE Correo = 'rickijtr@hotmail.com'"; // Cambia "tabla_imagenes" por el nombre de tu tabla y ajusta la condición WHERE según tus necesidades
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);
    $imagen_binaria = $fila['imagen_binaria'];

    // Devolver la imagen con las cabeceras adecuadas
    header('Content-type: image/jpeg'); // Cambia el tipo de imagen según corresponda
    echo $imagen_binaria;
} else {
    echo 'No se pudo recuperar la imagen.';
}

// Cerrar conexión
mysqli_close($conexion);
?>

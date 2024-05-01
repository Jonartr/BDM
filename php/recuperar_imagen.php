<?php
// Conexión a la base de datos
require_once("Conexion.php");
session_start();
$startcon = new Conectar();
$conexion = $startcon->Conectar();

if($conexion->connect_error){
    die("Error de conexion".$conexion->connect_error);

}

// Consulta para recuperar la imagen
$query = "SELECT Video FROM producto WHERE Codigo = '54'"; // Cambia "tabla_imagenes" por el nombre de tu tabla y ajusta la condición WHERE según tus necesidades
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    
    $fila = mysqli_fetch_assoc($resultado);
    $Foto = $_SESSION['Foto'] = $fila['Video'];
    $ruta = "../img/".$Foto;

    // Devolver la imagen con las cabeceras adecuadas
    header('Content-type: image/jpeg'); // Cambia el tipo de imagen según corresponda
    echo $ruta;
    header('Location: ../prueba.php');
} else {
    echo 'No se pudo recuperar la imagen.';
}

// Cerrar conexión
mysqli_close($conexion);
?>

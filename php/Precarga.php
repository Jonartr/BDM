<?php
//Desde aqui se mandara a refrescar toda la informacion que se vaya actualizando de la pagina 
session_start();
require_once("GetProducto.php");
require_once("GetCat.php");
require_once("GetLista.php");
require_once("ShowProducto.php");
require_once("Historial.php");
require_once("ReporteVentas.php");



if ($_SESSION['RedirigirProducto']== true){
    header("location: ../productos.php");
}
else{
    header("location: ../inicio.php");
}







?>
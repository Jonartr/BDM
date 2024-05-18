<?php
session_start();
//Solo aplicable con productos con la opcion de cotizar 
$Indice = $_POST['Cotizar'];

$_SESSION['Cotizacion'] = array();
$_SESSION['Cotizacion'][] = $_SESSION['Productos_show'][$Indice];


header("location: ../cotizaciones.php")




?>
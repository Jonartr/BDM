<?php

session_start();
$Indice = $_POST['SetCar'];




if(isset($_SESSION['Carrito'])){
    $_SESSION['Carrito'][] = $_SESSION['Productos_show'][$Indice];
}
else{
    $_SESSION['Carrito'] = array();
    $_SESSION['Carrito'][] = $_SESSION['Productos_show'][$Indice]; 
}




header("location: ../inicio.php");


?>

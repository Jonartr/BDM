<?php

session_start();
$Indice = $_POST['SetCar'];
$producto = $_SESSION['Productos_show'][$Indice];

if(isset($_SESSION['Carrito'])){
  
    foreach($_SESSION['Carrito'] as $item) {
        if($item === $producto) {
          
            header("location: ../inicio.php");
            exit();
        }
    }

  
    $_SESSION['Carrito'][] = $producto;
}
else{
    $_SESSION['Carrito'] = array();
    $_SESSION['Carrito'][] = $producto; 
}

header("location: ../inicio.php");



?>

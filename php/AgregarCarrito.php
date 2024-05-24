<?php

session_start();
$Indice = $_POST['SetCar'];
$producto = $_SESSION['Productos_show'][$Indice];
$producto['CantidadComprar'] = 1;

if(isset($_SESSION['Carrito'])){ 
  
    foreach($_SESSION['Carrito'] as $item) {// si el producto existe en el carrito no lo agrega
        if($item === $producto) {
          
            header("location: ../inicio.php");
            exit();
        }
    }

  
    $_SESSION['Carrito'][] = $producto;
}
else{//Si no existe la variable de session la crea
    $_SESSION['Carrito'] = array();
    $_SESSION['Carrito'][] = $producto; 
}

header("location: ../inicio.php");



?>

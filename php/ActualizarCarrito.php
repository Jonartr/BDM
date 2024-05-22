<?php
session_start();

if (isset($_POST['index']) && isset($_POST['quantity'])) {
    $index = $_POST['index'];
    $quantity = $_POST['quantity'];

   
    $_SESSION['Carrito'][$index]['CantidadComprar'] = $quantity;

  
    $subtotal = 0;
    foreach ($_SESSION['Carrito'] as $item) {
        $subtotal += $item['Precio'] * $item['CantidadComprar'];
    }

   

    echo json_encode([
        'success' => true,
        'subtotal' => $subtotal
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Datos inválidos'
    ]);
}
?>

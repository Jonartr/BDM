<?php
session_start();

if (isset($_POST['index']) && isset($_POST['quantity'])) {
    $index = $_POST['index'];
    $quantity = $_POST['quantity'];

    // Actualizar la cantidad en la sesión
    $_SESSION['Carrito'][$index]['CantidadComprar'] = $quantity;
    

    // Calcular el subtotal
    $subtotal = 0;
    foreach ($_SESSION['Carrito'] as $item) {
        $subtotal += $item['Precio'] * $item['CantidadComprar'];
        $item['SubtotalProducto'] = $item['Precio'] * $item['CantidadComprar'];;
    }

    // Guardar el subtotal en la sesión (opcional)
    $_SESSION['Subtotal'] = $subtotal;

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

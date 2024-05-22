<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['id'];
    $newQuantity = $_POST['quantity'];
    $subtotal = 0.00;

    foreach ($_SESSION['Carrito'] as &$producto) {
        if ($producto['ID'] == $productId) {
            $producto['Cantidad'] = $newQuantity;
        }
        $subtotal += $producto['Precio'] * $producto['Cantidad'];
    }

    echo json_encode(['subtotal' => $subtotal]);
}
?>

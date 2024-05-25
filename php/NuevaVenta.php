<?php
require_once("Conexion.php");
session_start();


$Usuario = $_SESSION['Correo'];
$startcon = new Conectar();
$conexion = $startcon->Conectar();

if ($conexion->connect_error) {
    die("Error de conexion" . $conexion->connect_error);
} else {
    if (isset($_SESSION['Carrito']) && isset($_SESSION['Subtotal'])) {
        $CarritoTotal = $_SESSION['Carrito'];
        $Total = $_SESSION['Subtotal'];

        $Query = $conexion->prepare("CALL InsertarVenta(?, ?, ?, ?, ?, ?, ?, ?, ?);");

        foreach ($_SESSION['Carrito'] as $item) {
            $CantidadVenta = $item['CantidadComprar'];
            $TotalVenta = $Total;
            $Categoria = $item['Categoria'];
            $Codigo = $item['Codigo'];
            $Correo = $item['Usuario'];
            $Comprador = $Usuario;
            $Nombre = $item['Nombre'];
            $Precio = $item['Precio'];
            $TotalProducto = $item['SubtotalProducto'];
    

            $Query->bind_param("ddiisssdd", $CantidadVenta, $TotalVenta, $Categoria, $Codigo, $Correo,$Comprador,$Nombre,$Precio,$TotalProducto);
            $Query->execute();
        }

        $Query->close();


    }

    $conexion->close();

   unset($_SESSION['Carrito']);
   unset( $_SESSION['Subtotal']);
   header('location: ../confirmaCompra.php');
}
?>

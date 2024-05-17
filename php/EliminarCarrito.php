<?php 
        session_start();

$Indice = $_POST['IndiceCar'];
$IndiceDel = $_POST['OpcionDelete'];


if ($IndiceDel == 1){
  unset( $_SESSION['Carrito'][$Indice]);
  $_SESSION['Carrito'] = array_values($_SESSION['Carrito']);
}
else if ($IndiceDel == 2){
    $_SESSION['Carrito']=array();
}




header("location: ../carrito.php");




?>
<?php
require_once("Conexion.php");

$Correo = $_POST['email'];
$Contrasena = $_POST['password'];

$startcon = new Conectar();
$conexion = $startcon->Conectar();

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

if($Correo != null && $Contrasena != null){
    $query = "SELECT Correo, NameUser, Contrasena FROM usuarios WHERE (Correo = '$Correo')
    AND Contrasena = '$Contrasena'";

}

$Result = $conexion->query($query);

    if ($Result->num_rows >0){
        session_start();

        while($row = mysqli_fetch_array($Result)){
           $_SESSION['Usuario'] = $row['NameUser'];
        }

        header("Location:../inicio.php");
    }
    else{
        echo "<script> alert('Correo y/o contraseña incorrectos, verifique nuevamente'); </script>"; 
    }


$conexion->close();


?>
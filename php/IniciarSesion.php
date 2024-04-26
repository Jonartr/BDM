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
    $query = "SELECT usuarios.Correo, usuarios.NombreUsuario, usuarios.Contrasena, usuarios.Rol, usuarios.Imagen, 
    datospersonales.Nombre, datospersonales.FechaNacimiento, 
    datospersonales.Sexo,usuarios.Privacidad
    FROM usuarios 
    INNER JOIN 
    datospersonales ON usuarios.Correo = datospersonales.Correo
    WHERE (usuarios.Correo = '$Correo')
    AND usuarios.Contrasena = '$Contrasena'";

}

$Result = $conexion->query($query);

    if ($Result->num_rows >0){
        session_start();
        $Rol = 0;
        while($row = mysqli_fetch_array($Result)){
          $_SESSION['Correo'] = $row['Correo']; 
           $_SESSION['Usuario'] = $row['NombreUsuario'];
           $_SESSION['Foto'] = $row['Imagen'];     
           $_SESSION['Rol'] = $row['Rol'];
           $_SESSION['Nombre'] = $row['Nombre'];
           $_SESSION['Fecha'] = $row['FechaNacimiento'];
           $_SESSION['Privacidad'] = $row['Privacidad'];
           $_SESSION['Contra'] = $row['Contrasena'];
           $Sexo = $row['Sexo'];

           if ($Sexo == 1){
            $_SESSION['Sexo'] = 'Masculino';
           }
           else{
            $_SESSION['Sexo'] = 'Femenino';
           }

           

        }


        header("Location:../inicio.php");
    }
    else{
        echo "<script> alert('Correo y/o contraseña incorrectos, verifique nuevamente'); </script>"; 
    }


$conexion->close();


?>
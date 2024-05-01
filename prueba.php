<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Imagen</title>
</head>
<body>
  <?php session_start(); ?>
  <img src="data:image/jpg;charset=utf8;base64,../img/<?php echo base64_encode($_SESSION['Foto']); ?>" /> 
</body>
</html>
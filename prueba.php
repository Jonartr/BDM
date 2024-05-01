<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Imagen</title>
</head>
<body>
  <?php session_start(); ?>
  <p><?php echo "img/".$_SESSION['Foto'] ?></p>
  
  <video width="320" height="240" controls>
      <source src="<?php echo "img/".$_SESSION['Foto'] ?>" type="video/mp4">
      
  </video>
  <button><a href="php/recuperar_imagen.php">Cargar foto</a></button>
</body>
</html>
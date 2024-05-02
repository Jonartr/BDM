<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Imagen</title>
</head>
<body>
  <?php session_start(); 
  //notas de imagenes 
  //Nunca cargarlas imagenes con nombres de archivos numericos, el backslash detecta si 
  //el primer parametro es un numero habra incoveniente y no se podra encontrar bien el archivo
    $Imagen = "C:\\fakepath\Silver.Wolf.full.3883657.png";
    $Hola = str_replace("\\","/",$Imagen);
    $archivo = basename($Imagen);
    $ruta = "../img/".$archivo;

  ?>
  <p><?php echo $Imagen; ?></p>
  <p><?php echo $Hola; ?></p>
  <p><?php echo $archivo; ?></p>
  <p><?php echo $ruta; ?></p>
  <img src="C:/fakepath/Silver.Wolf.full.3883657.png" /> 
</body>
</html>
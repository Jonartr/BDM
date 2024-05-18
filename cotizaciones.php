<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizaciones</title>
    <link rel="stylesheet" href="css/cotizaciones.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php include("header.php");

if (isset($_SESSION['Cotizacion'])){
    $Cotizar = $_SESSION['Cotizacion'][0];
}


?>
<div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <div class="chat-box">
          <div class="message-container">
            <div class="message">Hola, estoy interesado en obtener una cotización para este producto.</div>
            <div class="message">¿Puedes proporcionarme más información?</div>
          </div>
          <div class="message-container text-end">
            <div class="message">Claro, ¿qué información necesitas?</div>
          </div>
        
        </div>
        <form class="mt-3" action = "php/NuevoMensaje.php" method = "Post">
          <div class="mb-3">
            <label for="message" class="form-label">Escribe tu mensaje:</label>
            <textarea class="form-control" id="message" name ="message" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
      <div class="col-md-8">
        <div class="product-info">
          <h2>Producto: <?php echo $Cotizar['Nombre']; ?></h2>
          <img src="<?php echo "img/".$Cotizar['Imagen_1']?>" alt="Imagen del producto" class="product-image">
          <h4>Descripción del producto: <?php echo $Cotizar['Descripcion']?> </h4>
          <h3><strong>Precio:</strong> $<?php echo $Cotizar['Precio']?></h3>
          <h3><strong>Vendedor:</strong> <?php echo $Cotizar['Usuario']?></h3>
        </div>
      </div>
    </div>
  </div>



<?php include("footer.php");?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

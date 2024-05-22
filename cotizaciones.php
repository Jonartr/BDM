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

?>
<main role="main">


<div class="container my-5">
<h1 class="mb-4 text-center">Cotización </h1>
        <br>

    <div class="row">

    <div class="col-md-2 mb-5">
    <div class="clientes-info">
    <h4>Otros Clientes</h4>
            <ul class="list-unstyled text-center">
            <li class="mb-1"><img src="img/Cliente1.png" alt="Chat 1" class="img-thumbnail rounded" width="100px"></li>
            <li class="mb-1"><img src="img/Cliente2.jpg" alt="Chat 2" class="img-thumbnail rounded" width="100px"></li>
            <li class="mb-1"><img src="img/Cliente3.png" alt="Chat 3" class="img-thumbnail rounded" width="100px"></li>
            <li class="mb-1"><img src="img/Cliente1.png" alt="Chat 1" class="img-thumbnail rounded" width="100px"></li>
            <li class="mb-1"><img src="img/Cliente2.jpg" alt="Chat 2" class="img-thumbnail rounded" width="100px"></li>
            <li class="mb-1"><img src="img/Cliente3.png" alt="Chat 3" class="img-thumbnail rounded" width="100px"></li>
            </ul>
        </div>
        </div>



  <?php 
      if (isset($_SESSION['Cotizacion'])){
          $Cotizar = $_SESSION['Cotizacion'][0];
      
 ?>
    <div class="col-md-4">
        <div class="product-info">
          <!--Detalles del producto-->
          <h2>Producto a cotizar:</h2>
          <h4>SKU: <?php echo $Cotizar['Codigo'] ?></h4>
          <h4><?php echo $Cotizar['Nombre'] ?></h4>
          <img src="<?php echo "img/".$Cotizar['Imagen_1'] ?>" alt="Imagen del producto" class="product-image fixed-size">
          <p>Descripción del producto: <?php $Cotizar['Descripcion'] ?>. </p>
          <p><strong>Precio:</strong> Por definir</p>

          <!--Datos a llenar de cotizacion solo aparecera para el vendedor-->

        <?php if ($Cotizar['Usuario'] == $_SESSION['Correo'] && $_SESSION['Rol'] == 1){?>
         <form action="">
                <div  class="mb-3">
                  <label for="Detalles"> Detalles de cotizacion</label>
                  <textarea class="form-control" id="Detalles" name = "Detalles" rows="3"></textarea>

                </div>

                <div  class="mb-3">
                  <label for="Cantidad"> Cantidad preparar</label>
                  <input type="text" id = "Cantidad" name="Cantidad">
                </div >

                <div  class="mb-3">
                  <label for="Precio"> Precio de cotizacion</label>
                  <input type="text" id = "Precio" name = "Precio">
                </div>
                
                <button class="btn btn-success" type = "submit">Enviar Cotización</button>
          </form>       
        <?php }?>



        </div>
      </div>

  <?php }
  else{
  ?>

    <div class="col-md-4">
            <div class="product-info">
              <h2>Producto a cotizar: </h2>
              <h4></h4>
              <img src="" alt="Imagen del producto" class="product-image fixed-size">
              <p>Descripción del producto:</p>
              <p><strong>Precio:</strong> Por definir</p>
              <button class="btn btn-success">Enviar Cotización</button>
            </div>
          </div>

  <?php }
  
  ?>


      <div class="col-md-6">
        <div class="chat-box">
          <div class="message-container">
                

            <?php 
              $Mensajes;
            if (isset($_SESSION['Mensajes'])){
                $Contador = count($_SESSION['Mensajes']);

                for ($i = 0; $i < $Contador; $i++ ){

                    $Mensajes = $_SESSION['Mensajes'][$i];

                    if($Mensajes['Emisor'] == $_SESSION['Correo']){

             ?>

                      <div class="message-container text-end">
                          <div class="message"><?php echo  $Mensajes['Mensaje']; ?></div>
                      </div>

              <?php }
              else{
              
              ?>    

          <div class="message-with-avatar">
                <img src="img/Cliente1.png" alt="Perfil-Cliente" class="avatar">
                <div class="message"><?php echo  $Mensajes['Mensaje']; ?></div>
            </div>

              <?php }
                }
              ?>

          </div>
        
        </div>

        <?php } ?>

        <form class="mt-3" action="php/NuevoMensaje.php" method="post">
          <div class="mb-3">
            <?php   if (isset($_SESSION['Cotizacion'])){
                        $Code = $_SESSION['Cotizacion'][0];

                      }
            
            
            ?>
            <input type="hidden" name ="Codigo" value = "<?php echo $Code['Codigo']; ?>">
            <label for="message" class="form-label">Escribe tu mensaje:</label>
            <textarea class="form-control" id="message" name = "message" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>

    </div>

  </div>

</main>

<?php include("footer.php");?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

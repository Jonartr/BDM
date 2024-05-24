<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Piline</title>
    <link rel="stylesheet" href="css/landing.css">
    <link rel="icon" href="img/logo.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </head>
<body>

<?php include("header.php");?>

<main role="main " >

<div id="myCarousel" class="carousel slide "  data-bs-ride="carousel" >
<div class="carousel-indicators ">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <!--<img src="img/Landing1.png" class="first-slide" alt="Fondo1">-->
      <img class="first-slide" src="img/Landing1.png" alt="First slide">
      <div class="container">
              <div class="carousel-caption text-left">
                <!--<h1>Example headline.</h1>-->
               <!-- <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
                <p><a class="btn btn-lg btn-primary " href="registro.php" role="button">Registrate aquí</a></p>
              </div>
            </div>
          </div>

    <div class="carousel-item">
            <img class="second-slide" src="img/Landing2.png" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <!--<h1>Example headline.</h1>-->
               <!-- <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
               <!-- <p><a class="btn btn-lg btn-primary" href="inicio.php" role="button">Productos</a></p> -->
              </div>
            </div>
          </div>

  <div class="carousel-item">
            <img class="third-slide" src="img/Landing3.png" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <!--<h1>Example headline.</h1>-->
               <!-- <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
                <p><a class="btn btn-lg btn-primary" href="productos.php" role="button">Ver Productos</a></p>
              </div>
            </div>
          </div>

    </div>
       

  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

</div>





<div class="mt-3 container mb-5 ">
       <!-- <h1 class="text-success">Paypal</h1>
<p class="text-light">Paga comodo y seguro.</p> -->
<img src="img/Paypal.png" alt="PayPal promo" class="img-fluid">
    </div>



      <div class="container marketing">
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/Cliente1.png" alt="Cliente1" width="150" height="150">
            <h2>Alison Perez</h2>
            <p>"Esta plataforma ofrece una experiencia de compra integral. Con una amplia gama de productos y una interfaz fácil de usar, encontrar lo que necesitas es sencillo. Además, el servicio al cliente es excepcional, brindando soluciones rápidas y eficientes. ¡Altamente recomendado!".</p>
           
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/Cliente2.jpg" alt="Cliente2" width="150" height="150">
            <h2>Selene Delgado</h2>
            <p>"Me encantó esta página. Con una amplia variedad de productos para el hogar y una interfaz fácil de usar, encontrar lo que necesitas es rápido y sencillo. Además, el servicio al cliente es excepcional, proporcionando ayuda rápida y eficiente. ¡Una experiencia de compra excelente!".</p>
        
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/Cliente3.png" alt="Cliente3" width="150" height="150">
            <h2>Yuridia Cruz</h2>
            <p>"Experimenté una grata sorpresa al descubrir esta plataforma. Su diversidad de productos para el hogar y su navegación fluida la hacen destacar. El servicio al cliente es de primera calidad, brindando respuestas rápidas y soluciones eficientes. ¡Una experiencia de compra excepcional en todos los aspectos!".</p>
           
          </div>
        </div>


      

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Envíos Gratis. <span class="text-muted">Durante todo el mes.</span></h2>
            <p class="lead">¿Sabías que ahora ofrecemos envío gratuito en todas tus compras? Sí, lo has leído bien. Nos complace anunciar que hemos implementado el envío gratis en todos nuestros productos, para que puedas disfrutar aún más de tus compras en nuestra tienda en línea.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="img/LI1.png" alt="Beneficios1">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Nuevos productos. <span class="text-muted">!!!!.</span></h2>
            <p class="lead">¡Estamos emocionados de anunciar que hemos añadido una emocionante gama de nuevos productos a nuestra tienda en línea! Desde productos de última tecnología hasta artículos de moda, tenemos algo para todos los gustos y necesidades.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="img/LI2.png" alt="Beneficios2">
          </div>
        </div>

        <hr class="featurette-divider ">

        <div class="row featurette mb-5">
          <div class="col-md-7">
            <h2 class="featurette-heading">Hot Sale. <span class="text-muted">Proximamente...</span></h2>
            <p class="lead">¿Estás listo para el evento de compras más emocionante del año? El Hot Sale está a punto de llegar y estamos ansiosos por ofrecerte increíbles ofertas y descuentos en todos tus productos favoritos.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="img/LI3.png" alt="Beneficios3">
          </div>
        </div>

        <hr class="featurette-divider ">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->

</main>

<?php include("footer.php");?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

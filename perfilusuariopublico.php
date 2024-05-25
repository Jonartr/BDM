<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/perfilusuariopublico.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <?php include("header.php");
    
    ?>
</head>
<body>




<div class="container">
    <div class="main-body">

    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">

                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="img/<?php echo $_SESSION['Foto']?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $_SESSION['Usuario']; ?></h4>
                      <p class="text-secondary mb-1">Usuario</p>
                      <p>
                      <p class="text-muted font-size-sm">Hola!</p>
                      <button class="btn btn-outline-primary">
                          <a href="edicionperfil.php">Editar</a>
                      </button>
                    </div>
                  </div>

                 
                </div>
              </div>
            </div>
      
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tipo de Perfil</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Público
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                  <h6 class="mb-0">Nombre Completo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['Nombre'] ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $_SESSION['Correo'] ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Fecha de Nacimiento</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['Fecha'] ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Sexo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION['Sexo'] ?>
                    </div>
                  </div>
                  <hr>
                  
                
                  </div>
                </div>
              </div>
              </div>




    <!--PARA MOSTRAR Listas -->


<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Historial de compras</i></h6>
<!-- Agregar el div del carousel con Bootstrap -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <!-- Cada elemento de carousel-item contendrá un conjunto de productos -->
    <?php 
    // Aquí deberías insertar un loop de PHP para iterar sobre tus productos
    $total_productos = count($_SESSION['Historial']);
   
    $productos_por_slide = 5; // Número de productos por slide
    $slides = ceil($total_productos / $productos_por_slide);

    // Iterar sobre los slides
    
    for ($i = 0; $i < $slides; $i++) {
    ?>

    <div class="carousel-item <?php if ($i === 0) echo 'active'; ?>">
      <div class="container-fluid p-0 mb-3">
        <div class="row">
          <!-- Iterar sobre los productos para este slide -->
          <?php 
          $inicio = $i * $productos_por_slide;
          $fin = min(($i + 1) * $productos_por_slide, $total_productos);
          for ($j = 0; $j <  $total_productos; $j++) {
            $Historial = $_SESSION['Historial'][$j];
          ?>
          <!-- Tarjeta del producto -->
          <div class="col-md-2 mb-3">
            <div class="card h-100">
              <!-- Contenido del producto -->
              <img src="img/<?php echo  $Historial['Imagen']; ?>" class="card-img card-img-top" alt="<?php echo  $Historial['Imagen']; ?>">
              <div class="card-body">
                <h5 class="card-title">Producto: <?php echo $Historial['Nombre']; ?></h5>
                <p class="card-text">Cantidad: <?php echo $Historial['CantidadComprada']; ?></p>
                <p class="card-text">Fecha compra:<?php echo $Historial['FechaCompra']; ?></p>
                <p class="card-text">$<?php echo $Historial['Total']; ?></p>
                <!-- Agrega aquí los detalles adicionales del producto como el precio -->
              </div>
            </div>
          </div>

          
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
  </div>
    <!-- Botones de control del carrusel -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>



      <!--PARA MOSTRAR EL HISTORIAL-->
<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Lista:_</i>Historial de pedidos</h6>
<!-- Agregar el div del carousel con Bootstrap -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <!-- Cada elemento de carousel-item contendrá un conjunto de productos -->
    <?php 
    // Aquí deberías insertar un loop de PHP para iterar sobre tus productos
    $total_productos = count($productos);
    $productos_por_slide = 5; // Número de productos por slide
    $slides = ceil($total_productos / $productos_por_slide);

    // Iterar sobre los slides
    for ($i = 0; $i < $slides; $i++) {
    ?>
    <div class="carousel-item <?php if ($i === 0) echo 'active'; ?>">
      <div class="container-fluid p-0 mb-3">
        <div class="row">
          <!-- Iterar sobre los productos para este slide -->
          <?php 
          $inicio = $i * $productos_por_slide;
          $fin = min(($i + 1) * $productos_por_slide, $total_productos);
          for ($j = $inicio; $j < $fin; $j++) {
          ?>
          <!-- Tarjeta del producto -->
          <div class="col-md-2 mb-3">
            <div class="card h-100">
              <!-- Contenido del producto -->
              <img src="<?php echo $productos[$j]['imagen']; ?>" class="card-img card-img-top" alt="<?php echo $productos[$j]['nombre']; ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $productos[$j]['nombre']; ?></h5>
                <p class="card-text"><?php echo $productos[$j]['descripcion']; ?></p>
                <!-- Agrega aquí los detalles adicionales del producto como el precio -->
              </div>
            </div>
          </div>

          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
  </div>


<!-- Script para reiniciar el carousel al llegar al último item -->
<script>
  // Función para reiniciar el carousel
  $('#carouselExampleControls').on('slid.bs.carousel', function () {
    if($('.carousel-inner .carousel-item:last').hasClass('active')) {
      $('#carouselExampleControls').carousel('pause').removeData();
      $('#carouselExampleControls').carousel(0);
    }
  });
</script>



<?php include("footer.php");?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

</script>

</body>
</html>

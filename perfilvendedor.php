<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Vendedor</title>
    <link rel="stylesheet" href="css/perfilvendedor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<?php include("header.php");?>


<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb 
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
       /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">

                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="img/weon.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>  <?php echo $_SESSION['Usuario'] ?> </h4>
                      <p class="text-secondary mb-1">Vendedor</p>
                      <p>
                      <p class="text-muted font-size-sm">
                        <div class="product-rating mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star mr-0"></i>
                    </div></p>
                    <button class="btn btn-outline-primary">
                          <a href="edicionperfil.php">Editar</a>
                      </button>
                    </div>
                  </div>

                 
                </div>
              </div>
            </div>
           
           <!--   <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary">https://bootdey.com</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary">@bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                </ul>
              </div>
-->
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tipo de Perfil</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       Vendedor
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
          
            







              <!--  <div class="container-fluid p-0 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Lista:_</i>Favoritos</h6>
                     
                -->

                <?php
// Definir la variable $productos con algunos datos de ejemplo
$productos = array(
    array("nombre" => "Producto 1", "imagen" => "img/AirTag.png", "descripcion" => "Descripción del producto 1"),
  
    // Agrega más productos según sea necesario
);
?>
<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Lista:_</i>Ventas</h6>
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



    
                      </div>
                    </div>
                  </div>






                  </div>
                </div>
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

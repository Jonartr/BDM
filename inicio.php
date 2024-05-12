<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piline</title>
    <link rel="stylesheet" href="css/inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  </head>

<body>
<?php include("header.php");?>

<!--Contenido de la página asi bien chido UwU-->
<section class="main-section">
<?php $Producto =  $_SESSION['Productos_show'][0];?>
    <div class="container my-5">
        <div class="row">

            <?php for ($i = 0; $i<2; $i++){ ?>

            <div class="col-sm-6 col-lg-3 mb-2-6">
                <div class="card-wrapper mb-4">
                    <div class="card-img"><img src="<?php echo "img/".$Producto['Imagen_2']; ?>" alt="Imagen 1" width="75%" height="50%"></div>
                    <div class="card-body">
                        <div>
                            <a href="#"><i class="bg-white p-3 rounded-circle ti-shopping-cart font-weight-600"></i></a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                  
                    <h4 class="h5 mb-2"><a href="#" class="text-secondary"><?php echo $Producto['Nombre'];?></a></h4>
                    <div class="product-rating mb-2">

                    <?php for ($j = 0; $j <$Producto['Valoracion']; $j++){ ?>
                        <i class="fas fa-star"></i> 
                        <!-- <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star mr-0"></i> -->
                     <?php } ?>
                    </div>
                    <h5 class="mb-0 text-primary"><?php echo  "$".$Producto['Precio'] ?></h5>
                </div>
            </div>

            <?php } ?>

            
        </div>
    </div>
</section>




<?php include("footer.php");?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


<!-- <div class="col-sm-6 col-lg-3 mb-2-6">
                <div class="card-wrapper mb-4">
                    <div class="card-img"><img src="img/AirTag.png" alt="Producto 2"></div>
                    <div class="card-body">
                        <div>
                            <a href="#"><i class="bg-white p-3 rounded-circle ti-shopping-cart font-weight-600"></i></a>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <h4 class="h5 mb-2"><a href="#" class="text-secondary">AirTag</a></h4>
                    <div class="product-rating mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star mr-0"></i>
                    </div>
                    <h5 class="mb-0 text-primary">$899.00</h5>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2-6">
                <div class="card-wrapper mb-4">
                    <div class="card-img"><img src="img/AppleVisionPro.png" alt="Producto 3"></div>
                    <div class="card-body">
                        <div>
                            <a href="#"><i class="bg-white p-3 rounded-circle ti-shopping-cart font-weight-600"></i></a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="h5 mb-2"><a href="#" class="text-secondary">Apple Vision Pro</a></h4>
                    <div class="product-rating mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star mr-0"></i>
                    </div>
                    <h5 class="mb-0 text-primary">$39,000.00</h5>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2-6">
                <div class="card-wrapper mb-4">
                    <div class="card-img"><img src="img/AppleWatch9.png" alt="Producto 4"></div>
                    <div class="card-body">
                        <div>
                            <a href="#"><i class="bg-white p-3 rounded-circle ti-shopping-cart font-weight-600"></i></a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="h5 mb-2"><a href="#" class="text-secondary">Apple Watch Series 9</a></h4>
                    <div class="product-rating mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star mr-0"></i>
                    </div>
                    <h5 class="mb-0 text-primary">$2800.25</h5>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2-6 mb-lg-0">
                <div class="card-wrapper mb-4">
                    <div class="card-img"><img src="img/iPhone15.png" alt="Producto 5"></div>
                    <div class="card-body">
                        <div>
                            <a href="#"><i class="bg-white p-3 rounded-circle ti-shopping-cart font-weight-600"></i></a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="h5 mb-2"><a href="#" class="text-secondary">iPhone 15</a></h4>
                    <div class="product-rating mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star mr-0"></i>
                    </div>
                    <h5 class="mb-0 text-primary">$19,999.79</h5>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2-6 mb-lg-0">
                <div class="card-wrapper mb-4">
                    <div class="card-img"><img src="img/MacBookAir.png" alt="Producto 6"></div>
                    <div class="card-body">
                        <div>
                            <a href="#"><i class="bg-white p-3 rounded-circle ti-shopping-cart font-weight-600"></i></a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="h5 mb-2"><a href="#" class="text-secondary">MacBook Air</a></h4>
                    <div class="product-rating mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star mr-0"></i>
                    </div>
                    <h5 class="mb-0 text-primary">$24,558.42</h5>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2-6 mb-sm-0">
                <div class="card-wrapper mb-4">
                    <div class="card-img"><img src="img/MacBookAir.png" alt="Producto 6"></div>
                    <div class="card-body">
                        <div>
                            <a href="#"><i class="bg-white p-3 rounded-circle ti-shopping-cart font-weight-600"></i></a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="h5 mb-2"><a href="#" class="text-secondary">MacBook Air</a></h4>
                    <div class="product-rating mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star mr-0"></i>
                    </div>
                    <h5 class="mb-0 text-primary">$24,558.42</h5>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card-wrapper mb-4">
                    <div class="card-img"><img src="img/MacBookAir.png" alt="Producto 6"></div>
                    <div class="card-body">
                        <div>
                            <a href="#"><i class="bg-white p-3 rounded-circle ti-shopping-cart font-weight-600"></i></a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="h5 mb-2"><a href="#" class="text-secondary">MacBook Air</a></h4>
                    <div class="product-rating mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star mr-0"></i>
                    </div>
                    <h5 class="mb-0 text-primary">$24,558.42</h5>
                </div>
            </div> -->
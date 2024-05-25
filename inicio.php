<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piline</title>
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/inicio.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  </head>

<body>
<?php include("header.php");?>

<!--Contenido de la página asi bien chido UwU-->
<section class="main-section">
<?php 
      $IndiceP = count($_SESSION['Productos_show']);  

?>
    <div class="container my-5">
        <div class="row">

            <?php for ($i = 0; $i<$IndiceP; $i++){
                
                $Producto =  $_SESSION['Productos_show'][$i];
                ?>

                    
              
                <div class="col-sm-6 col-lg-3 mb-2-6">
                    <div class="card-wrapper mb-4">
                        <div class="card-img"><img src="<?php echo "img/".$Producto['Imagen_1']; ?>" alt="Imagen 1" width="50%" height="50%"></div>
                       <?php  if($Producto['TipoVenta'] == 1){  ?> 
                        <div class="card-body">
                            <div>
                                <!-- <a href="#"><i class="bg-white p-3 rounded-circle ti-shopping-cart font-weight-600"></i></a> -->
                                <form action="" method = "get">
                                <input type="hidden" name ="Show" value ="<?php echo $i;?>">
                                     <button class = "btn btn-primary" type="submit" formaction="singleProduct.php?Show=<?php $i;?>">Ver mas</button>

                                </form>
                               
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="text-center">
                        <!--VALORES PARA PODER AGREGARLOS AL CARRITO DE COMPRAS-->
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
                        <h5 class="mb-0 text-primary">$
                            
                                <?php 
                                if ($Producto['TipoVenta'] == 2){
                                    echo "Solo para cotizar";
                                }
                                else{
                
                                    setlocale(LC_MONETARY,'es_MX');
                                    echo number_format($Producto['Precio'],2);
                                }

                                ?>
                            
                        </h5>

                        <div>

                        <?php 
                            if($Producto['TipoVenta'] == 1 && $_SESSION['Rol'] == 2){ ?>            
                                <option value = "<?php $PSelect = $i; ?>"></option>
                                        <button class = "btn btn-primary mx-5 my-3"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Agregar a lista
                                        </button>

                                        <form action="php/AgregarCarrito.php" method="post" style="display: inline;">
                                        <input type="hidden" name="SetCar" value="<?php echo $PSelect; ?>">
                                        <button class="btn btn-secondary mx-5 my-3" type="submit" onclick="alert('Producto agregado al carrito')">
                                            Agregar al carrito
                                        </button>
                                    </form>

                        <?php 
                            }
                            else if ($Producto['TipoVenta'] == 1 && $_SESSION['Rol'] == 2){

                            ?>   
                                <option value = "<?php $PCotizar = $i; ?>"></option>
                                <form action="php/NewCotizacion.php" method="post">
                                    <input type="hidden" name="Cotizar" value="<?php echo $PCotizar; ?>">
                                        <button class = "btn btn-primary mx-5 my-3" type="submit" value="<?php echo $PCotizar;?>"
                                       
                                        >
                                            Pedir cotizacion del producto
                                        </button> 


                                </form>    

                            
                            <?php
                            }
                            
                            ?>

                        </div>

                    </div>

                </div>

           

            <?php } ?>

            
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">


     <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar a lista de deseos</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body col row">

            <div class="col row ms-2">

                <?php
                    if(isset($_SESSION['Listas'])){
                        $Indice = count($_SESSION['Listas']);
                        for($i = 0; $i < $Indice; $i++){
                            $Listau = $_SESSION['Listas'][$i];
                    
                    ?>
                    <option value="<?php echo $Listau['ID_Lista']; ?>"></option>
                    <span class ="col-9 fs-6 row "><?php echo $Listau['Nombre'];?></span>

                    <button class = "btn btn-success col-3" 

                        value = "<?php  
                        /*Fumadota chida para guardar datos apoco no*/
                        $_SESSION['Opc_L'] = $Listau['ID_Lista'];

                        $_SESSION['Opcmysql'] = 4; 

                        $_SESSION['CodLista'] = $Codigop;?>" 
                        
                        onclick="alert('Producto agregado a lista');">
                        
                        <a href="php/ABCProducto.php" class= "text-decoration-none" style="color:white;">Agregar</a> 
                        
                    </button>

                    <hr class = "mt-3" >

                    <?php } //CICLO
                     } // CONDICIONAL
                    
                    ?>
            
            </div>
            

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
            <button type="button" class="btn btn-primary "> <a class = "text-decoration-none" style = "color:white" href="Listas.php">Ver mis listas</a></button>
        </div>

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
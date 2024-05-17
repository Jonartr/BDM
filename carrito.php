<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrito.css">
    <title>Carrito</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php include("header.php");  ?>

<div class="container pb-5 mt-n2 mt-md-n3 ">
    <div class="row">
        <div class="col-xl-9 col-md-8">
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary"><span>Productos</span><a class="font-size-sm" href="inicio.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left" style="width: 1rem; height: 1rem;"><polyline points="15 18 9 12 15 6"></polyline></svg>Continuar comprando</a></h2>

                 <!-- Item-->

            <?php if (isset($_SESSION['Carrito'])){
                
                  $Si = count($_SESSION['Carrito']);

                for($i = 0 ; $i<$Si;$i++){
                    $Carrito = $_SESSION['Carrito'][$i];
                
                ?>     

            <div class="d-sm-flex justify-content-between my-4 pb-4 ">
                <div class="media d-block d-sm-flex text-center text-sm-left">
                    <a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img src="<?php echo "img/".$Carrito['Imagen_1']?>" alt="Producto 1"></a>
                    <div class="media-body pt-3">
                        <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#"><?php echo $Carrito['Nombre'] ?></a></h3>
                        <!--<div class="font-size-sm"><span class="text-muted mr-2">Size:</span>8.5</div> -->
                        <div class="font-size-sm"><span class="text-muted mr-2"><?php echo $Carrito['Descripcion'] ?></span></div>
                        <div class="font-size-lg text-primary pt-2"><?php echo "$".$Carrito['Precio']?></div>
                    </div>
                </div>
                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                    <div class="form-group mb-2">
                        <label for="quantity1">Cantidad</label>
                        <input class="form-control form-control-sm" type="number" id="quantity1" value="1">
                    </div>
                    <!-- <button class="btn btn-outline-secondary btn-sm btn-block mb-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw mr-1">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <polyline points="1 20 1 14 7 14"></polyline>
                            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                        </svg>Actualizar carrito</button> -->

                    
                    <form action="php/EliminarCarrito.php" method="post">
                    <input type="hidden" name="IndiceCar" value="<?php echo $i; ?>">
                    <input type="hidden" name="OpcionDelete" value="<?php echo $_SESSION['OpcDelCar'] = 1; ?>">
                            <button class="btn btn-outline-danger btn-sm btn-block mb-2" type="submit" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>Quitar
                            
                            </button>
                    </form>
                    
                 


                </div>
            </div>

            <?php  } //For
            
            }//Condifcion
            ?>     

         
        <!-- Sidebar-->
        <div class="col-xl-3 col-md-4 pt-3 pt-md-0">

                  <form action="php/EliminarCarrito.php" method="post">
                    <input type="hidden" name="OpcionDelete" value="<?php echo $_SESSION['OpcDelCar'] = 2; ?>">
                            <button class="btn btn-outline-danger btn-sm btn-block mb-2" type="submit" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>Eliminar todos <?php echo count($_SESSION['Carrito']); ?>
                            
                            </button>
                    </form>

            <h2 class="h6 px-4 py-3 bg-secondary text-center">Subtotal</h2>
            <?php   
                $Subtotal = 0.00;

                if (isset($_SESSION['Carrito'])){
                    $Contador = count($_SESSION['Carrito']);
                 

                    for($i = 0; $i < $Contador; $i++ ){
                        $Carrito_price =$_SESSION['Carrito'][$i];
                       $Subtotal = $Carrito_price['Precio'] + $Subtotal; 
                    }
                }
                else{
                    $Subtotal = 0.00;
                }
                  
            
            ?>

          
            <div class="h3 font-weight-semibold text-center py-3">$<?php echo $Subtotal ?></div>
            <hr>
            <h3 class="h6 pt-4 font-weight-semibold"><span class="badge badge-success mr-2">Nota</span>Comentarios</h3>
            <textarea class="form-control mb-3" id="order-comments" rows="5"></textarea>
            <a class="btn btn-primary btn-block" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card mr-2">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                    <line x1="1" y1="10" x2="23" y2="10"></line>
                </svg>Proceder al pago</a>
            <div class="pt-4">
                <div class="accordion" id="cart-accordion">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="accordion-heading font-weight-semibold"><a href="#promocode" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="promocode">Apply promo code<span class="accordion-indicator"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg></span></a></h3>
                        </div>
                        <div class="collapse show" id="promocode" data-parent="#cart-accordion">
                            <div class="card-body">
                                <form class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="cart-promocode" placeholder="Promo code" required="">
                                        <div class="invalid-feedback">Porfavor agrega un código válido!</div>
                                    </div>
                                    <button class="btn btn-outline-primary btn-block" type="submit">Aplicar código promocional</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="accordion-heading font-weight-semibold"><a class="collapsed" href="#shipping" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="shipping">Shipping estimates<span class="accordion-indicator"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg></span></a></h3>
                        </div>
                        <div class="collapse" id="shipping" data-parent="#cart-accordion">
                            <div class="card-body">
                                <form class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <select class="form-control custom-select" required="">
                                            <option value="">Elige tu país</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Finland">Finland</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="United States">United States</option>
                                        </select>
                                        <div class="invalid-feedback">Please choose your country!</div>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control custom-select" required="">
                                            <option value="">Choose your city</option>
                                            <option value="Bern">Bern</option>
                                            <option value="Brussels">Brussels</option>
                                            <option value="Canberra">Canberra</option>
                                            <option value="Helsinki">Helsinki</option>
                                            <option value="Mexico City">Mexico City</option>
                                            <option value="Ottawa">Ottawa</option>
                                            <option value="Washington D.C.">Washington D.C.</option>
                                            <option value="Wellington">Wellington</option>
                                        </select>
                                        <div class="invalid-feedback">Please choose your city!</div>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="ZIP / Postal code" required="">
                                        <div class="invalid-feedback">Please provide a valid zip!</div>
                                    </div>
                                    <button class="btn btn-outline-primary btn-block" type="submit">Calculate shipping</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include("footer.php");?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>




   <!-- <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                <div class="media d-block d-sm-flex text-center text-sm-left">
                    <a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img src="img/AppleWatch9.png" alt="Producto 2"></a>
                    <div class="media-body pt-3">
                        <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#">Apple Watch Series 9</a></h3>
                    
                        <div class="font-size-sm"><span class="text-muted mr-2">Color:</span>Gris espacial</div>
                        <div class="font-size-lg text-primary pt-2">$2,800.25</div>
                    </div>
                </div>
                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                
                    <div class="form-group mb-2">
                        <label for="quantity2">Cantidad</label>
                        <input class="form-control form-control-sm" type="number" id="quantity2" value="1">
                    </div>

                    <button class="btn btn-outline-secondary btn-sm btn-block mb-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw mr-1">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <polyline points="1 20 1 14 7 14"></polyline>
                            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                        </svg>Actualizar carrito</button>

                    <button class="btn btn-outline-danger btn-sm btn-block mb-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>Quitar</button>
                </div>
            </div>
            
          
            <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                <div class="media d-block d-sm-flex text-center text-sm-left">
                    <a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img src="img/iPhone15.png" alt="Producto 3"></a>
                    <div class="media-body pt-3">
                        <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#">iPhone 15</a></h3>
                     
                        <div class="font-size-lg text-primary pt-2">$19,999.79</div>
                    </div>
                </div>
                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                    <div class="form-group mb-2">
                        <label for="quantity3">Cantidad</label>
                        <input class="form-control form-control-sm" type="number" id="quantity3" value="1">
                    </div>
                    <button class="btn btn-outline-secondary btn-sm btn-block mb-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw mr-1">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <polyline points="1 20 1 14 7 14"></polyline>
                            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                        </svg>Actualizar carrito</button>
                    <button class="btn btn-outline-danger btn-sm btn-block mb-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>Quitar</button>
                </div>
            </div>
           

            <div class="d-sm-flex justify-content-between my-4">
                <div class="media d-block d-sm-flex text-center text-sm-left">
                    <a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img src="img/AirPodsPro2.png" alt="Producto 4"></a>
                    <div class="media-body pt-3">
                        <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#">AirPods Pro 2</a></h3>
                     
                        <div class="font-size-lg text-primary pt-2">$5,8000.99</div>
                    </div>
                </div>
                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                    <div class="form-group mb-2">
                        <label for="quantity4">Cantidad</label>
                        <input class="form-control form-control-sm" type="number" id="quantity4" value="1">
                    </div>
                    <button class="btn btn-outline-secondary btn-sm btn-block mb-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw mr-1">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <polyline points="1 20 1 14 7 14"></polyline>
                            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                        </svg>Actualizar carrito</button>
                    <button class="btn btn-outline-danger btn-sm btn-block mb-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>Quitar</button>
                </div>
            </div>
        </div> -->
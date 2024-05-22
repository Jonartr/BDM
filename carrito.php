<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrito.css">
    <title>Carrito</title>
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">




</head>
<body>

<?php include("header.php"); 

$Cantidad =1;
$Indiceglobal;
?>

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
                        <div class="font-size-lg text-primary pt-2">$<?php setlocale(LC_MONETARY,'es_MX');
                              echo number_format($Carrito['Precio'] * $Cantidad,2);?></div>
                        </div>
                        
                </div>
                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                    <div class="form-group mb-2">
                           <label for="quantity<?php echo $i; ?>">Cantidad</label>
                           <input class="form-control form-control-sm quantity-input" type="number" id="quantity<?php echo $i; ?>" data-product-id="<?php echo $i; ?>" data-price="<?php echo $Carrito['Precio']; ?>" value="<?php echo $Cantidad; ?>" min="1" max="<?php echo $Carrito['Existencias']; ?>">
                    </div>


                    
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
            else{ ?>
                <div class='container text-center mt-5'><img src='img/vacio.gif' alt='Carrito vacío'> <h3>Tan vacio como mi cartera~</h3> </div>

           <?php  } ?>     

         
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
                                </svg>Eliminar todos <?php 
                                
                                if (isset($_SESSION['Carrito'])){
                                    echo count($_SESSION['Carrito']); 
                                }
                                else{
                                    echo 0;
                                }
                               ?>
                            
                            </button>
                    </form>

            <h2 class="h6 px-4 py-3 bg-secondary text-center">Subtotal</h2>
            <?php   
                $Subtotal = 0.00;

                if (isset($_SESSION['Carrito'])){
                    $Contador = count($_SESSION['Carrito']);
                 

                    for($i = 0; $i < $Contador; $i++ ){
                        $Carrito_price =$_SESSION['Carrito'][$i];
                       $Subtotal = ($Carrito_price['Precio'] * $Cantidad) + $Subtotal; 
                    }
                }
                else{
                    $Subtotal = 0.00;
                }
                  
            
            ?>

          
                <div class="h3 font-weight-semibold text-center py-3" id="subtotal">$<?php echo number_format($Subtotal, 2); ?></div>


            <hr>
            <h3 class="h6 pt-4 font-weight-semibold"><span class="badge badge-success mr-2">Nota</span>Comentarios</h3>
            <textarea class="form-control mb-3" id="order-comments" rows="5"></textarea>
            <a class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#paymentModal">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card mr-2">
                     <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                          <line x1="1" y1="10" x2="23" y2="10"></line>
                </svg>Proceder al pago
            </a>

                                <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="paymentModalLabel">Método de Pago</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="paymentForm">
                                        <div class="mb-3">
                                            <label for="paymentMethod" class="form-label">Método de Pago</label>
                                            <select class="form-select" id="paymentMethod">
                                                <option value="tienda">Pago en tienda de conveniencia</option>
                                                <option value="tarjeta">Pago con tarjeta</option>
                                            </select>
                                        </div>
                                        <div id="cardInfo" style="display: none;">
                                            <div class="mb-3">
                                                <label for="cardNumber" class="form-label">Número de tarjeta</label>
                                                <input type="text" class="form-control" id="cardNumber">
                                            </div>
                                            <div class="mb-3">
                                                <label for="expiryMonth" class="form-label">Mes de vencimiento</label>
                                                <input type="text" class="form-control" id="expiryMonth">
                                            </div>
                                            <div class="mb-3">
                                                <label for="expiryYear" class="form-label">Año de vencimiento</label>
                                                <input type="text" class="form-control" id="expiryYear">
                                            </div>
                                            <div class="mb-3">
                                                <label for="cvv" class="form-label">CVV</label>
                                                <input type="text" class="form-control" id="cvv">
                                            </div>
                                            <h5>Datos de domicilio para envío</h5>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Dirección</label>
                                                <input type="text" class="form-control" id="address">
                                            </div>
                                            <div class="mb-3">
                                                <label for="city" class="form-label">Ciudad</label>
                                                <input type="text" class="form-control" id="city">
                                            </div>
                                            <div class="mb-3">
                                                <label for="postalCode" class="form-label">Código Postal</label>
                                                <input type="text" class="form-control" id="postalCode">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="proceedPayment">Proceder al pago</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


     
        </div>
    </div>
</div>



<?php include("footer.php");?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
<script>
    $(document).ready(function(){
        function recalculateSubtotal() {
            var subtotal = 0;
            $('.quantity-input').each(function(){
                var qty = $(this).val();
                var prc = $(this).data('price');
                subtotal += qty * prc;
            });
            $('#subtotal').text('$' + subtotal.toFixed(2));
        }

        // Manejar el cambio de cantidad
        $('.quantity-input').change(function(){
            var quantity = $(this).val();
            var maxQuantity = $(this).attr('max');
            var price = $(this).data('price');

            if(quantity < 1) {
                quantity = 1;
                $(this).val(quantity);
            } else if(quantity > maxQuantity) {
                quantity = maxQuantity;
                $(this).val(quantity);
                alert('La cantidad ingresada excede el máximo permitido de ' + maxQuantity + ' unidades.');
            }

            var total = quantity * price;

            // Actualizar el precio del producto en la interfaz
            $(this).closest('.d-sm-flex').find('.font-size-lg').text('$' + total.toFixed(2));

            // Recalcular el subtotal
            recalculateSubtotal();
        });

        // Recalcular el subtotal al cargar la página
        recalculateSubtotal();

        $.ajax({
            url: 'ActualizarCarrito.php',
            method: 'POST',
            data: {
                index: index,
                quantity: quantity,
                total: total,
                subtotal: subtotal
            },
            success: function(response) {
                console.log(response); // Aquí puedes manejar la respuesta del servidor
            }
        });

        $('#paymentMethod').change(function(){
            if ($(this).val() === 'tarjeta') {
                $('#cardInfo').show();
            } else {
                $('#cardInfo').hide();
            }
        });

        $('#proceedPayment').click(function(){
            var paymentMethod = $('#paymentMethod').val();
            if(paymentMethod === 'tarjeta') {
                var cardNumber = $('#cardNumber').val();
                var expiryMonth = $('#expiryMonth').val();
                var expiryYear = $('#expiryYear').val();
                var cvv = $('#cvv').val();


                // Aquí puedes añadir la lógica para procesar el pago con tarjeta
                console.log("Pago con tarjeta:", cardNumber, expiryMonth, expiryYear, cvv, address, city, postalCode);
            } else {
                // Aquí puedes añadir la lógica para procesar el pago en tienda de conveniencia
                console.log("Pago en tienda de conveniencia");
            }

            var address = $('#address').val();
            var city = $('#city').val();
            var postalCode = $('#postalCode').val();

            // Cerrar la ventana modal
            $('#paymentModal').modal('hide');
        });
    });
</script>





</body>
</html>



     
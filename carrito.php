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

<div class="container pb-5 mt-n2 mt-md-n3">
    <div class="row">
        <!-- Products -->
        <div class="col-xl-8 col-md-8 order-1">
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary">
                <span>Productos</span>
                <a class="font-size-sm" href="inicio.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left" style="width: 1rem; height: 1rem;">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                    Continuar comprando
                </a>
            </h2>

            <?php if (isset($_SESSION['Carrito'])):
                $Si = count($_SESSION['Carrito']);
                for($i = 0 ; $i < $Si; $i++):
                    $Carrito = $_SESSION['Carrito'][$i];
            ?>     
            <div class="d-sm-flex justify-content-between my-4 pb-4">
                <div class="media d-block d-sm-flex text-center text-sm-left">
                    <a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img src="<?php echo "img/".$Carrito['Imagen_1']?>" alt="Producto 1"></a>
                    <div class="media-body pt-3">
                        <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#"><?php echo $Carrito['Nombre'] ?></a></h3>
                        <div class="font-size-sm"><span class="text-muted mr-2"><?php echo $Carrito['Descripcion'] ?></span></div>
                        <div class="font-size-lg text-primary pt-2">Precio unitario: $<?php echo number_format($Carrito['Precio'], 2); ?></div>
                        <div class="font-size-lg text-primary pt-2">Subtotal: $<?php echo number_format($Carrito['Precio'] * $Carrito['CantidadComprar'], 2); ?></div>
                        <?php $_SESSION['Carrito'][$i]['SubtotalProducto'] = $Carrito['Precio'] * $Carrito['CantidadComprar']; ?>
                    </div>
                </div>
                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                    <div class="form-group mb-2">
                        <label for="quantity<?php echo $i; ?>">Cantidad</label>
                        <input class="form-control form-control-sm quantity-input" type="number" id="quantity<?php echo $i; ?>" data-index="<?php echo $i; ?>" data-price="<?php echo $Carrito['Precio']; ?>" value="<?php echo $Cantidad ?>" min="1" max="<?php echo $Carrito['Existencias'] ?>">
                    </div>
                    <form action="php/EliminarCarrito.php" method="post">
                        <input type="hidden" name="IndiceCar" value="<?php echo $i; ?>">
                        <input type="hidden" name="OpcionDelete" value="<?php echo $_SESSION['OpcDelCar'] = 1; ?>">
                        <button class="btn btn-outline-danger btn-sm btn-block mb-2" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                            Quitar
                        </button>
                    </form>
                </div>
            </div>
            <?php endfor; else: ?>
            <div class='container text-center mt-5'><img src='img/vacio.gif' alt='Carrito vacío'> <h3>Tan vacío como mi cartera~</h3></div>
            <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <div class="col-xl-4 col-md-4 pt-3 pt-md-0 order-2">
            <form action="php/EliminarCarrito.php" method="post">
                <input type="hidden" name="OpcionDelete" value="<?php echo $_SESSION['OpcDelCar'] = 2; ?>">
                <button class="btn btn-outline-danger btn-sm btn-block mb-2" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>Eliminar todos <?php echo isset($_SESSION['Carrito']) ? count($_SESSION['Carrito']) : 0; ?>
                </button>
            </form>

            <h2 class="h6 px-4 py-3 bg-secondary text-center">Subtotal</h2>
            <?php   
                $Subtotal = 0.00;

                if (isset($_SESSION['Carrito'])){
                    $Contador = count($_SESSION['Carrito']);
                    for($i = 0; $i < $Contador; $i++ ){
                        $Carrito_price = $_SESSION['Carrito'][$i];
                        $Subtotal += $Carrito_price['Precio'] * $Carrito_price['CantidadComprar']; 
                    }
                }
            ?>
            <div class="h3 font-weight-semibold text-center py-3" id="subtotal">$<?php echo number_format($Subtotal, 2); ?></div>

            <hr>
            <h3 class="h6 pt-4 font-weight-semibold"><span class="badge badge-success mr-2">Nota</span>Comentarios</h3>
            <textarea class="form-control mb-3" id="order-comments" rows="5"></textarea>
          






            <br>
<!--Paypal Pago-->
            <div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=AS6PFaPjFHGKhcNfFZMhbMSFoNj7R6iylaMzlq45wwewNVH4oJON4MOb5oqFdtQv_HiqDRCDIDdFv1ik&currency=MXN" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'pay',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"monas perronas","amount":{"currency_code":"MXN","value":<?php echo $_SESSION['Subtotal']?>}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
 
actions.redirect('http://localhost/BDM/php/NuevaVenta.php');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>













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
        var index = $(this).data('index'); // Asegúrate de obtener el índice correctamente
        var quantity = $(this).val();
        var price = $(this).data('price');
        
        // Validar la cantidad
        if(quantity < 1) {
            quantity = 1;
            $(this).val(quantity);
        }

        // Calcular el total del producto
        var total = quantity * price;
        $('#product-total-' + index).text('$' + total.toFixed(2));

        // Calcular el subtotal
        var subtotal = 0;
        $('.quantity-input').each(function(){
            var qty = $(this).val();
            var prc = $(this).data('price');
            subtotal += qty * prc;
        });
        $('#subtotal').text('$' + subtotal.toFixed(2));

        // Enviar los datos al servidor mediante AJAX
        $.ajax({
            url: 'php/ActualizarCarrito.php',
            method: 'POST',
            data: {
                index: index,
                quantity: quantity
            },
            success: function(response) {
                console.log(response); // Aquí puedes manejar la respuesta del servidor
                var data = JSON.parse(response);
                if(data.success) {
                    $('#subtotal').text('$' + data.subtotal.toFixed(2));
                } else {
                    alert(data.message);
                }
            }
        });
    });

    // Recalcular el subtotal al cargar la página
    recalculateSubtotal();

   

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



     
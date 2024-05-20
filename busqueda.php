<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda</title>
    <link rel="stylesheet" href="css/busqueda.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </head>
<body>

<?php include("header.php");


?>

<?php
if(isset($_SESSION['Busqueda'])){
  $IndiceP = count($_SESSION['Busqueda']);
?>
<main role="main">

<div class="container my-5">
        <div class="row">

            <?php for ($i = 0; $i<$IndiceP; $i++){
                
                $Busqueda =  $_SESSION['Busqueda'][$i];
                ?>

                    
              
                <div class="col-sm-6 col-lg-3 mb-2-6">
                    <div class="card-wrapper mb-4">
                        <div class="card-img"><img src="<?php echo "img/".$Busqueda['Imagen_1']; ?>" alt="Imagen 1" width="75%" height="50%"></div>
                        <div class="card-body">
                            <div>
                                <!-- <a href="#"><i class="bg-white p-3 rounded-circle ti-shopping-cart font-weight-600"></i></a> -->
                                <form action="" method = "get">
                                <input type="hidden" name ="Show" value ="<?php echo $i;?>">
                                     <button class = "btn btn-primary" type="submit" formaction="singleProduct.php?Show=<?php $i;?>">Ver mas</button>

                                </form>
                               
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <!--VALORES PARA PODER AGREGARLOS AL CARRITO DE COMPRAS-->
                        <h4 class="h5 mb-2"><a href="#" class="text-secondary"><?php echo $Busqueda['Nombre'];?></a></h4>
                        <div class="product-rating mb-2">

                        <?php for ($j = 0; $j <$Busqueda['Valoracion']; $j++){ ?>
                            <i class="fas fa-star"></i> 
                            <!-- <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star mr-0"></i> -->
                        <?php } ?>
                        </div>
                        <h5 class="mb-0 text-primary">$
                            
                                <?php 
                                if ($Busqueda['TipoVenta'] == 2){
                                    echo "Solo para cotizar";
                                }
                                else{
                
                                    setlocale(LC_MONETARY,'es_MX');
                                    echo number_format($Busqueda['Precio'],2);
                                }

                                ?>
                            
                        </h5>

                        <div>

                        <?php 
                            if($Busqueda['TipoVenta'] == 1){ ?>            
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
                            else{

                            ?>   
                                <option value = "<?php $PCotizar = $i; ?>"></option>
                                <form action="php/NewCotizacion.php" method="post">
                                    <input type="hidden" name="Cotizar" value="<?php echo $PCotizar; ?>">
                                        <button class = "btn btn-primary mx-5 my-3" type="submit" value="<?php echo $PCotizar;?>"
                                        onclick="alert(value)"
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





</main>
<?php
}
else{
?>

<main role="main">


<div class="container my-5">
    
        <h1 class="mb-4 text-center">Productos encontrados</h1>
        <br>  <br>
        <h1 class="mb-4 text-center">Ninguno :c </h1>

</main>

<?php }?>

<?php include("footer2.php");?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

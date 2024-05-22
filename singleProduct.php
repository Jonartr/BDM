<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/singleProduct.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </head>
<body>

<?php include("header.php");
    if(isset($_GET['Show'])){
        $Indice = $_GET['Show'];
        $Producto = $_SESSION['Productos_show'][$Indice];
    }

?>

<main role="main ">
    <div class="container mt-5">
        <div class="row mb-4">

           <!-- Carrusel de imágenes y videos -->
           <div class="col-md-6 mb-4 mb-md-0">
                <div id="mediaCarousel" class="carousel slide carousel-container" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img src="img/<?php echo $Producto['Imagen_1']?>" class="d-block w-100" alt="Imagen 1">
                          
                        </div>

                        <div class="carousel-item">
                            <img src="img/<?php echo $Producto['Imagen_2']?>" class="d-block w-100" alt="Imagen 2">
                          
                        </div>

                        <div class="carousel-item">
                            <img src="img/<?php echo $Producto['Imagen_3']?>" class="d-block w-100" alt="Imagen 2">
                           
                        </div>

                        <div class="carousel-item">
                            <video class="d-block w-100" controls>
                                <source src="img/<?php echo $Producto['Video']?>" type="video/mp4">
                                Tu navegador no soporta la etiqueta de video.
                            </video>
                          
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#mediaCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#mediaCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
    


            <div class="col-md-6">
                <h1><?php echo $Producto['Nombre']?></h1>
                <p class="text-muted">SKU: <?php echo $Producto['Codigo']?></p>
                <h2>$<?php
                
                setlocale(LC_MONETARY,'es_MX');
                echo number_format($Producto['Precio'],2);?>                
                </h2>
                <p><?php echo $Producto['Descripcion']?></p>
                <div class="mb-3">
                <p>Estatus: 
                    
                    <span class="available">

                    <?php
                    if ($Producto['Existencias'] > 0){
                        echo "Disponible";
                    }
                    else{
                        echo "Sin existencias";
                    }
                    ?>  
                    
                    </span>
            
                </p>

                    <label for="quantity" class="form-label">Cantidad: <?php echo $Producto['Existencias']?></label>
                    <input type="number" class="form-control custom-input" id="quantity" value="1">
                </div>
                <button class = "btn btn-primary mx-5 my-3"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Agregar a lista
                </button>
                <button class="btn btn-success">Agregar al Carrito</button>
            </div>
        </div>
    </div>

    <?php include("footer.php");?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</main>


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



</body>
</html>

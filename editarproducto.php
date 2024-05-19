<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregando producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>      <link rel="stylesheet" href="css/registro.css">



  </style>

</head>

<body>
    <?php include("header.php");
    $Codigopr;
    if(isset($_GET['id_producto'])){
      $idproducto = $_GET['id_producto'];
      $Producto = $_SESSION['Productos'][$idproducto];
    }
    $_SESSION['Opcmysql'] = 2;
    
    ?>
    <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Detalles del producto</h2>
        <form action="php/ABCProducto.php" method="post" enctype = "multipart/form-data">

          <div class="mb-3">
            <label for="text" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="namepr" name="namepr" >
          </div>

          <div class="mb-3">
            <label for="text" class="form-label">Descripcion del producto</label>
            <input type="text" class="form-control" id="descpr" name="descpr" >
          </div>

          <div>
          <label for="cat" class="form-label">Categoria</label>
          <select class="form-select" id="cat" name="cat">

              <?php

             if (isset($_SESSION['Categoria'])){ 
                $Indice = count($_SESSION['Categoria']);
               for ($i = 0; $i< $Indice ;$i++){ 
                  $Categoria = $_SESSION['Categoria'][$i];
              ?>

                <option value="<?php echo $Categoria['ID_Cat']; ?>"><?php echo $Categoria['Nombre'];  ?></option>

              <?php }
              }?>
            </select>
          </div>

          <br>

          <div>
          <label for="tsell" class="form-label">Tipo de venta</label>
          <select class="form-select" id="tsell" name="tsell">
              <option value="1">Venta</option>
              <option value="2">Cotizacion</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="price" class="form-label">Precio del producto</label>
            <input type="text" class="form-control" id="price" name="price" >
          </div>

          <div class="mb-3">
            <label for="count" class="form-label">Cantidad del producto</label>
            <input type="number" class="form-control" id="count" name="count" >
          </div>

          <div class="mb-3">
            <label for="img1" class="form-label">Imagen 1 del producto</label>
            <input type="file" class="form-control" id="img1" name="img1">
          </div>

          <div class="mb-3">
            <label for="img2" class="form-label">Imagen 2 del producto</label>
            <input type="file" class="form-control" id="img2" name="img2">
          </div>
          <div class="mb-3">
            <label for="img3" class="form-label">Imagen 3 del producto</label>
            <input type="file" class="form-control" id="img3" name="img3">
          </div>

          <div class="mb-3">
            <label for="vid" class="form-label">Video del producto</label>
            <input type="file" class="form-control" id="vid" name="vid">
          </div>

          <input type="hidden" name ="CodigoEditar" value="<?php echo  $Producto['Codigo']?>">
          
          <br>
        
          <button type="submit" class="btn btn-primary">Agregar producto</button>
        <br>
        </form>
      </div>
    </div>
  </div>



    <?php include ("footer.php");?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprobar Productos</title>
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </head>
<body>

<?php include("header.php");?>

<main role="main">


<div class="container my-5">
    
        <h1 class="mb-4 text-center">Administrar Productos</h1>
        <br>
        <form>
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="selectAll">
                        <label class="form-check-label" for="selectAll">Seleccionar Todos</label>
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success">Aprobar Selección</button>
                </div>
            </div>
            <hr>
            <div class="row">
        <div class="col-md-2"><h5>Imagen</h5></div>
        <div class="col-md-2"><h5>SKU<h5></div>
        <div class="col-md-2"><h5>Nombre<h5></div>  
        <div class="col-md-2"><h5>Descripción<h5></div>
        <div class="col-md-2"><h5>Precio<h5></div>
        <div class="col-md-2"><h5>Aprobar<h5></div>
    </div>
            <div class="row">
                <div class="col">
                    <div class="list-group">

                <?php 
                                
                    if(isset($_SESSION['Aprobaciones'])){

                        $Size = count($_SESSION['Aprobaciones']);

                        for($i = 0; $i < $Size; $i++){
                        
                             $Aprobar = $_SESSION['Aprobaciones'][$i];

                ?>
                        <!-- Producto 1 -->
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="img/<?php echo $Aprobar['Imagen_1']; ?>" alt="Producto 1" class="img-fluid fixed-size">
                                </div>
                                <div class="col-md-2">
                                <p><?php echo $Aprobar['Codigo']; ?></p>
                                    </div>
                                <div class="col-md-2">
                                    <h5><?php echo $Aprobar['Nombre']; ?></h5>
                                    </div>
                                <div class="col-md-2">
                                    <p><?php echo $Aprobar['Descripcion']; ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p>$
                                    <?php   
                                    
                                        setlocale(LC_MONETARY,'es_MX');
                                        echo number_format($Aprobar['Precio'],2);
                                    ?>
                                    </p>
                                </div>
                                <div class="col-md-2">

                                        <form action="">
                                            <input type="hidden" name ="codigo" value = "<?php echo $Aprobar['Codigo']; ?>">
                                            <div class="form-check">
                                                <button type="submit" class="btn btn-success" formaction="php/UpdateAprobacion.php?codigo = <?php echo $Aprobar['Codigo']; ?>">Aprobar Selección</button>
                                            </div>
                                        </form>
                                    
                                </div>
                            </div>
                        </div>

                    <?php
                    
                        }
                    }
                    ?>    
                        
                    </div>
                </div>
            </div>
        </form>
    </div>


</main>

<?php include("footer.php");?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


<!-- Producto 2 -->
<!-- <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="img/LenProduct.jpg" alt="Producto 2" class="img-fluid fixed-size">
                                </div>
                                <div class="col-md-2">
                                    <p>XHRDBZ</p>
                                    </div>
                                <div class="col-md-2">
                                    <h5>Otro Len pero azul</h5>
                                    </div>
                                    <div class="col-md-2">
                                    <p>Len 2</p>
                                </div>
                                <div class="col-md-2">
                                    <p>18/05/202</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="producto2">
                                        <label class="form-check-label" for="producto2">Aprobar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        Agregar más productos aquí -->
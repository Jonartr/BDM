<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php session_start();?>
  </head>
<body>

<!-- Barra de navegación -->
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
            <a class="navbar-brand" href="landing.php" >π-Line</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

      <div class="collapse navbar-collapse row" id="navbarNavDropdown">
        <ul class="navbar-nav mx-4">



              <li class="nav-item">
                   <?php if (isset($_SESSION['Correo'])){?>
                        <a class="nav-link" href="php/ShowProducto.php">Inicio</a>
                   <?php }
                   else{ ?> 
                        <a class="nav-link" href="login.php">Inicio</a>
                   <?php }?>
              </li>


          <?php if (isset($_SESSION['Correo'])){?>

            

              <?php if ($_SESSION['Rol'] == 1){?>
              <li class="nav-item">
                <a class="nav-link" href="productos.php">Mis productos</a>
              </li>

              <?php } ?>

              <li class="nav-item">
                <a class="nav-link" href="categorias.php">Categorías</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="cotizaciones.php">Cotizaciones</a>
              </li>

              <?php if ($_SESSION['Rol'] == 2){?>
              <li class="nav-item">
                <a class="nav-link" href="Listas.php">Mis listas</a>
              </li>
              <?php } ?>

              <?php if ($_SESSION['Rol'] == 2){?>
              <li class="nav-item">
                <a class="nav-link" href="carrito.php">Carrito</a>
              </li>
              <?php } ?>

              <?php if ($_SESSION['Rol'] == 3){?>
              <li class="nav-item">
                <a class="nav-link" href="php/AutorizarProductos.php">Aprobaciones de productos</a>
              </li>
              <?php } ?>  

           <?php } ?>   
           
           
    <!-- Formulario de búsqueda -->
    <form class="d-flex ms-auto" action="php/Buscar.php" method="GET">
        <input class="form-control me-2" type="search" name="search" placeholder="Buscar..." aria-label="Buscar">
        <button class="btn btn-outline-info" type="submit">Buscar</button>
    </form>

      


        <ul class="navbar-nav ms-auto">


            <?php if(isset($_SESSION['Correo'])){ 
                $Pagina;
                $Rol = $_SESSION['Rol'];


                switch($Rol){
                   case 1:
                      $Pagina = "perfilvendedor.php";
                    break;
                   case 2:
                      $Pagina = "perfilusuariopublico.php";
                    break;
                    case 3:
                        $Pagina = "perfiladmin.php";
                    break;

                }
                
              
              ?>


              
            <li class="nav-item" >
                <a class="btn btn-primary  me-2 my-2 my-sm-0" href="<?php echo $Pagina;?>"><?php echo $_SESSION['Usuario']?></a>
            </li>


            <li class="nav-item" style="margin-right: 36px;">
                <a class="btn btn-primary my-2 my-sm-0" href="php/CerrarSesion.php">Cerrar Sesión</a>
            </li>


            <?php }
            
            else{
            ?>  


            <li class="nav-item" >
                <a class="btn btn-outline-success  me-2 my-2 my-sm-0" href="registro.php">Registrarse</a>
            </li>


            <li class="nav-item" style="margin-right: 36px;">
                <a class="btn btn-success my-2 my-sm-0" href="login.php">Iniciar Sesión</a>
            </li>

            <?php }?>
            
            </ul>
              <!---->


        </ul>


        </div>
     </div>

</nav>

</header>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
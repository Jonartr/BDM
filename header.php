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
      <a class="nav-link" href="php/ShowProducto.php">Inicio</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="productos.php">Mis productos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="categorias.php">Categorías</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="cotizaciones.php">Cotizaciones</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="Listas.php">Mis listas</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="carrito.php">Carrito</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="php/AutorizarProductos.php">Aprobaciones de productos</a>
      </li>


<!-- Formulario de búsqueda -->
<form class="d-flex ms-auto" action="php/Buscar.php" method="GET">
    <input class="form-control me-2" type="search" name="search" placeholder="Buscar..." aria-label="Buscar">
    <button class="btn btn-outline-info" type="submit">Buscar</button>
</form>

     
<?php if (isset($_SESSION['Usuario'])){  /*---aa--- */
    
    $Rol = $_SESSION['Rol'];
    $Privacidad = $_SESSION['Privacidad'];

    switch($Rol){
        case 1:
?>    <!--case 1-->   

            <?php

            if($Privacidad == 1){
            ?>
            <li class="nav-item"> 
              <a href= "perfilvendedor.php" class= "navbar-brand" style="margin-left: 750px; color:antiquewhite">
              <?php  echo $_SESSION['Usuario'];?></a>
            </li>

            <?php }
            else{
            ?>

            <li class="nav-item"> 
              <a href= "perfilusuarioprivado.php" class= "navbar-brand" style="margin-left: 750px; color:antiquewhite">
              <?php  echo $_SESSION['Usuario'];?></a>
            </li> 

            <?php } ?>
  
            <li class="nav-item">
              <a href="php/CerrarSesion.php" class= "navbar-brand" style="margin-left: 25px;">Cerrar Sesión</a>
            </li>
          <!--case 1-->
<?php //////
        break; 
        
        case 2:
?>   
            <!--case 2-->
            <?php

              if($Privacidad == 1){
              ?>
              <li class="nav-item"> 
                <a href= "perfilvendedor.php" class= "navbar-brand" style="margin-left: 750px; color:antiquewhite">
                <?php  echo $_SESSION['Usuario'];?></a>
              </li>

              <?php }
              else{
              ?>

              <li class="nav-item"> 
                <a href= "perfilusuarioprivado.php" class= "navbar-brand" style="margin-left: 750px; color:antiquewhite">
                <?php  echo $_SESSION['Usuario'];?></a>
              </li> 

              <?php } ?>

  
            <li class="nav-item">
              <a href="php/CerrarSesion.php" class= "navbar-brand my-2 my-sm-0 " style="margin-left: 25px;">Cerrar Sesión</a>
            </li>
             <!--case 2-->
 <?php    
        break;
        
        case 3:
 ?>    
            <!--case 3-->

                        <?php

            if($Privacidad == 1){
            ?>
            <li class="nav-item"> 
              <a href= "perfilvendedor.php" class= "navbar-brand" style="margin-left: 750px; color:antiquewhite">
              <?php  echo $_SESSION['Usuario'];?></a>
            </li>

            <?php }
            else{
            ?>

            <li class="nav-item"> 
              <a href= "perfilusuarioprivado.php" class= "navbar-brand" style="margin-left: 750px; color:antiquewhite">
              <?php  echo $_SESSION['Usuario'];?></a>
            </li> 

            <?php } ?>

  
            <li class="nav-item">
              <a href="php/CerrarSesion.php" class="navbar-brand" style="margin-left: 25px;">Cerrar Sesión</a>
            </li>
             <!--case 3-->
 <?php
        break;   

        case 4:
?>    
            <!--case 4-->
            <li class="nav-item"> 
              <a href= "perfilusuarioprivado.php" class= "navbar-brand" style="margin-left: 750px; color:antiquewhite">
              <?php  echo $_SESSION['Usuario'];?></a>
            </li>
  
            <li class="nav-item">
              <a href="php/CerrarSesion.php" class="navbar-brand my-2 my-sm-0" style="margin-left: 25px;">Cerrar Sesión</a>
            </li>


<?php
        break;    
    }
      
 ?>
        <!---->  
          <li class="nav-item"> 
            <a href= "perfiladmin.php" class= "navbar-brand my-2 my-sm-0" style="margin-left: 750px; color:antiquewhite">
            <?php  echo $_SESSION['Usuario'];?></a>
          </li>

          <li class="nav-item">
            <a href="php/CerrarSesion.php" class="navbar-brand my-2 my-sm-0" style="margin-left: 25px;">Cerrar Sesión</a>
          </li>
        <!---->
      <?php 
        } 
        else{ 
       ?>

<ul class="navbar-nav ms-auto">
<li class="nav-item" >
        <a class="btn btn-outline-success  me-2 my-2 my-sm-0" href="registro.php">Registrarse</a>
    </li>
    <li class="nav-item" style="margin-right: 36px;">
        <a class="btn btn-success my-2 my-sm-0" href="login.php">Iniciar Sesión</a>
    </li>
</ul>
      <!---->
      <?php } ?>

    </ul>


    </div>
  </div>
</nav>

</header>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
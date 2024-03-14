<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body>

<!-- Barra de navegación -->
<header class="header">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
  <a class="navbar-brand"href="landing.php" style="margin-left: 15px;">π-Line</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
      <a class="nav-link" href="inicio.php">Inicio</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="productos.php">Productos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="categorias.php">Categorías</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="cotizaciones.php">Cotizaciones</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="carrito.php">Carrito</a>
      </li>

    </ul>

    
    <!-- Puedes agregar más elementos a la derecha -->
    <!-- Por ejemplo, un botón de inicio de sesión -->
    <form class="form-inline my-2 my-lg-0">
    <a href="login.php" class="btn btn-outline-success my-2 my-sm-0" style="margin-left: 750px;">Iniciar Sesión</a>
    <a href="registro.php" class="btn btn-outline-success my-2 my-sm-0" style="margin-left: 25px;">Registrarse</a>
    </form>
  </div>
</nav>

</header>








<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
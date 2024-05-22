<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>


<section class="footer">
  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: #0a4275;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
       <!-- Nuevo formulario para suscribirse al newsletter -->
       <section class="mt-4 mb-3">
        <h3>Suscribete a nuestro boletín de noticias<h3>
        <div class="d-flex justify-content-center">
            <form action="procesar_suscripcion.php" method="POST" class="form-inline justify-content-center">
                <div class="input-group">
                    <input type="email"  class="form-control-sm text-center" placeholder="Tu correo electrónico" name="email" required>
                    <button class="btn btn-outline-light" type="submit">Suscribirse</button>
                </div>
            </form>
</div>
        </section>
        <!-- Fin del formulario para suscribirse al newsletter -->

    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 " style="background-color: rgba(0, 0, 0, 0.2);">
      © 2024 Copyright:
      <a class="text-white" href="landing.php">Piline.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/registro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php include("header.php");?>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-xl-9">
        <h2 class="text-center mb-4">Registro de Usuario</h2>
        <form id="Registro"  >

          <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico*</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>

          <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario*</label>
            <input type="text" class="form-control" id="username" name="username" minlength="3" required>
            <p id = "erroruser" style="color:red"></p>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Contraseña*</label>
            <input type="password" class="form-control" id="password" name="password" minlength="8"required>
            <p id = "error" style="color:red"></p>
          </div>

          <div class="mb-3">
            <label for="role" class="form-label">Rol de usuario</label>
            <select class="form-select" id="role" name="role">
            <option value="1">Vendedor</option>
              <option value="2">Comprador</option>
              <option value="3">Administrador</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="private" class="form-label">Privacidad</label>
            <select class="form-select" id="private" name="private">
              <option value= "1" >Publica</option>
              <option value= "2" >Privada</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="avatar" class="form-label">Imagen tipo avatar</label>
            <input type="file"  accept="image/png, image/jpeg"  class="form-control" id="avatar" name="avatar">
          </div>

          <div class="mb-3">
            <label for="fullname" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" id="fullname" name="fullname">
          </div>

          <div class="mb-3">
            <label for="birthdate" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate">
          </div>

          <div class="mb-3">
            <label for="gender" class="form-label">Sexo</label>
            <select class="form-select" id="gender" name="gender">
              <option value="1">Masculino</option>
              <option value="2">Femenino</option>
              <option value="3">Otro</option>
            </select>
          </div>
          <br>
          <p id="dataleft" style="color:red;"></p>
          <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
      </div>
    </div>
  </div>




<?php include("footer.php");?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src =  "js/registro.js"></script>
</body>
</html>

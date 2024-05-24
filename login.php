<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php include("header.php");?>

<?php
require_once 'vendor/autoload.php';

include("php/ConfigGoogleApi.php");
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;


  ?>
  <div class="container">
  <div class="box">

    <div class="form-group">
      <label for="email" class="form-label">Emailid: <?php echo $email; ?></label>
      <label for="name" class="form-label">Name: <?php echo $name; ?></label>    </div>
</div>

</div>
</div>

<?php } else {?>
  

<div class="container my-5 cuadradito border border-primary rounded p-4" style="background-color: #f9f9f9">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <h2 class="text-center mb-4 ">Iniciar Sesión</h2>

        <div class="box">
  <form action="php/IniciarSesion.php" method="post" id="login">

    <div class="mb-3">
      <label for="email" class="form-label">Correo electrónico</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Contraseña</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <p id= "aviso" style = "color:red;"></p>
    <button type="submit"  class="btn btn-primary">Iniciar Sesión</button>  

   </form>
</div>

         <div class="col-md-6">
            <div class="mb-3 col-6">
              <a href="<?php echo $client->createAuthUrl() ?>">  <img src="img/gugul.png" alt="Google Login" width="256px"> </a>
            </div>
        </div>
    </div>
    </div>
   </div>





<?php include("footer.php");?>
<?php } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

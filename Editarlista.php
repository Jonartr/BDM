<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva categoria</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php include("header.php");
      $_SESSION['Opcmysql'] = 2; 

      $idlista;
      if (isset($_GET['id_lista'])){
        $idlista = $_GET['id_lista']; 
        $Lista = $_SESSION['Listas'][$idlista];
      }
      
?>


<div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Actualizar lista</h2>
        <form  id="categoria" action="php/ABCLista.php" method="post" enctype = "multipart/form-data">
          
           <input type="hidden" name ="Editlista" value = "<?php echo $Lista['ID_Lista']?>"> 
          <div class="mb-3">
            <label for="name" class="form-label">Nombre de la lista</label>
            <input type="text" class="form-control" id="name" name="name" >
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Descripcion </label>
            <input type="text" class="form-control" id="description" name="description" >
          </div>

          <div class="mb-3">
            <label for="private" class="form-label"> Privacidad lista</label>
            <select class="form-select" id="private" name="private">
              <option value="1">Publica</option>
              <option value="2">Privada</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="avatar" class="form-label">Imagen de la lista</label>
            <input type="file"  accept="image/png, image/jpeg"  class="form-control" id="avatar" name="avatar">
          </div>

          <input type="hidden" name ="ListaEditar" value="<?php echo $idlista; ?>">

          <p id= "aviso" style = "color:red;"></p>
          <button type="submit"  class="btn btn-primary">Agregar</button>
        </form>
      </div>
    </div>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src =  "js/Apicategoria.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="css/productos.css"> -->
    <title>Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php include("header.php");?>

<section><h2 style="text-align: center;">Mis productos</h2></section>

<section class = "table table-hover table-striped table-responsive row justify-content-center
col-sm-12
">
    <table style="width: 65%; ">
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Imagen</th>
        <th>Video</th>
        <th>Tipo Venta</th>
        <th>Precio</th>
        <th>Existencias</th>
        <th>Valoracion del producto</th>
    </tr>
    <tr>
        <td>Xbox One Series S</td>
        <td>Nueva Linea de la serire de xbox</td>
        <td><img src="img/Producto1.png"  width="64" height="64"></td>
        <td><video  class="object-fit-contain" width="64" height="64" src="vid/Video1.mp4" ><a href="vid/Video1.mp4"></a></video></td>
       <td>Venta</td>
       <td>9,999.00</td>
       <td>40</td>
       <td>4.6</td>
        <td><button class = "btn btn-outline-warning">Editar</button></td>
        <td><button class = "btn btn-outline-danger">Eliminar</button></td>
    </tr>
    <tr>
        <td>Playstation 5</td>
        <td>Quinta consola de la marca sony</td>
       <td><img src="img/Producto2.jpg"  width="64" height="64"></td>
       <td><video class="object-fit-contain"  width="64" height="64" src="vid/Video2.mp4" ></video></td>
       <td>Venta</td>
       <td>12,999.00</td>
       <td>30</td>
       <td>4.3</td>
       <td><button class = "btn btn-outline-warning">Editar</button></td>
        <td><button class = "btn btn-outline-danger">Eliminar</button></td>

    </tr>
    <tr>
        <td><button class = "btn btn-outline-success text-decoration-none"><a href="nuevoproducto.php "> Agregar</a></button></td>

    </tr>

    
</table>

</section>

<?php include("footer.php");?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

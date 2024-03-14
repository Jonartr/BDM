<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrito.css">
    <title>Categorias</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php include("header.php");?>

<section> <h2 style="text-align: center; "> Categorias</h2></section>
<section class = "table table-hover table-striped table-responsive row justify-content-center
col-sm-12
">
    <table style="width: 50%; ">
    <tr>
        <th>Nombre</th>
    <th>Descripcion</th>
    </tr>
    <tr>
        <td>Videojuegos</td>
        <td>Entretenimiento</td>
        <td><button class = "btn btn-outline-danger">Eliminar</button></td>
    </tr>
    <tr>
        <td>Electronica</td>
        <td>Laptops, Celulares, Etc.</td>
        <td><button class = "btn btn-outline-danger">Eliminar</button></td>

    </tr>
    <tr>
        <td><button class = "btn btn-outline-success">Agregar</button></td>

    </tr>

    
</table>

</section>


<?php include("footer.php");?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

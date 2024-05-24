<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrito.css">
    <title>Categorias</title>
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>

<?php include("header.php");?>

<section> <h2 style="text-align: center; "> Categorias</h2></section>
<section class = "table table-hover table-striped table-responsive row justify-content-center
col-sm-12
">
    <table id="Categorias" style="width: 50%; ">
    <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Autor</th>
    </tr>
  

    <tbody>

    </tbody>    


    <tr>
        <td><button class = "btn btn-outline-success"><a href="Nuevacategoria.php">Agregar</a></button></td>

    </tr>

   </table>


 <script>

    let tbody = document.querySelector('#Categorias tbody');


   fetch('php/Getcat.php', {
    method: 'GET',
    headers: {
        'Accept': 'application/json',
    },
})
.then(response => response.json())
.then(response => {
    if (Array.isArray(response)) {
        response.forEach(categoria => {
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${categoria.Nombre}</td>
                <td>${categoria.Descripcion}</td>
                <td>${categoria.Correo}</td>
            `;
            tbody.appendChild(newRow);
        });
    } else {
        console.error('La respuesta no es un array:', response);
    }
})
.catch(error => console.error('Error:', error));

    </script>

</section>


<?php include("footer2.php");?>

</body>
</html>

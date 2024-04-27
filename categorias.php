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
        // Realizar la solicitud para obtener las categorías
        fetch('php/Getcat.php', {
    method: 'GET',
    headers: {
        'Accept': 'application/json',
    },
})
   .then(response => response.json())
   .then(response => console.log(JSON.stringify(response)))
   .then(response =>{
     //   const array = JSON.parse(response);
    alert(response);
 

    response.forEach(categoria => {
                const newRow = document.createElement('tr');

                    // Agregar celdas para Nombre, Descripcion y Autor
                    newRow.innerHTML = `
                        <td>${categoria.nombre}</td>
                        <td>${categoria.descripcion}</td>
                        <td>${categoria.autor}</td>
                    `;

                    // Agregar la fila al cuerpo de la tabla
                    tbody.appendChild(newRow);



            });

    });

    </script>

</section>


<?php include("footer.php");?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

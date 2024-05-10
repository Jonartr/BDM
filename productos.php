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

<?php include("header.php");
   // session_start();
    if (isset($_SESSION['Productos'])){
        $Indice = count($_SESSION['Productos']);
    }
    else{
        $Indice = 0;
    }
  

?>

<section><h2 style="text-align: center;">Mis productos</h2></section>

<section class = "table table-hover table-striped table-responsive row justify-content-center
col-sm-12
">
    <table style="width: 90%; ">
    <tr>
        <th></th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Imagen 1</th>
        <th>Imagen 2</th>
        <th>Imagen 3</th>
        <th>Video</th>
        <th>Tipo Venta</th>
        <th>Precio</th>
        <th>Existencias</th>
        <th>Valoracion del producto</th>
    </tr>

    <?php 

            for($i = 0; $i < $Indice; $i++){
                $Lista = $_SESSION['Productos'][$i];

            ?>      
            <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo $Lista['Nombre']; ?></td>
                <td><?php echo $Lista['Descripcion']; ?></td>
                <td> <img src="<?php echo "img/".$Lista['Imagen_1']; ?>" alt="" width="64px;" height="64px;" style= "border-radius:100px"> </td>
                <td> <img src="<?php echo "img/".$Lista['Imagen_2']; ?>" alt="" width="64px;" height="64px;" style= "border-radius:100px"> </td>
                <td> <img src="<?php echo "img/".$Lista['Imagen_3']; ?>" alt="" width="64px;" height="64px;" style= "border-radius:100px"> </td>
                <td> <video src="<?php echo "img/".$Lista['Video'];  ?>" width="64px;" height="64px;"></video></td>

                <td>
                    <?php 
                    if ($Lista['TipoVenta'] == 1){
                        echo "Venta";
                     }
                     else{
                        echo "Cotizacion";
                     } 
                    ?>
                </td>

                <td><?php echo $Lista['Precio']; ?></td>
                <td><?php echo $Lista['Existencias']; ?></td>
                <td><?php echo $Lista['Valoracion']; ?></td>
            </tr>
            


     <?php        
            } 

     ?>
 
    <tr>
        <td><button class = "btn btn-outline-success"><a href="nuevoproducto.php" style="text-decoration: none; color: black"> Agregar</a></button></td>

    </tr>

    
</table>

</section>

<?php include("footer.php");?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

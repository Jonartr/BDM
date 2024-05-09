<!DOCTYPE html>
<html>

<header>
 <?php 
    include ("header.php"); 
    $Indice = count($_SESSION['Listas']);

  ?>


</header>

<body>
    <h1 class="text-center"> Mis listas</h1>
    <section class = "table table-hover table-striped table-responsive row justify-content-center col-sm-12">
    <table id="Categorias" style="width: 75%; ">
    <tr>
            <th> </th>
            <th>Nombre lista</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Privacidad</th>
            <th>Autor</th>
    </tr>
  
    <?php 

        for($i = 0; $i < $Indice; $i++){
            $Lista = $_SESSION['Listas'][0];
    
    ?>      
        <tr>
            <td><?php echo $i+1; ?></td>
            <td><?php echo $Lista['Nombre']; ?></td>
            <td><?php echo $Lista['Descripcion']; ?></td>
            <td> <img src="<?php echo "img/".$Lista['Imagen']; ?>" alt="" width="64px;" height="64px;" style= "border-radius:100px"> </td>

            <td><?php
             if($Lista['Privacidad'] == 1){
                echo "Publica";
             } 
             else{
                echo "Privada";
             }
             ?>
             </td>

            <td><?php echo $Lista['Usuario']; ?></td>
        </tr>
           


    <?php        
        } 
        
     ?>

    <tr>
        <td><button class = "btn btn-outline-success"><a href="Nuevalista.php">Agregar</a></button></td>

    </tr>

   </table>


 

</section>   
</body>

</html>
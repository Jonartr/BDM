<!DOCTYPE html>
<html>

<header>
 <?php 
    include ("header.php"); 

    if(isset($_SESSION['Listas'])){
        $Indice = count($_SESSION['Listas']);
    }
    else{
        $Indice = 0;
    }
  

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
            $Lista = $_SESSION['Listas'][$i];
    
    ?>      
             <form action="" method= "get">

             <input type="hidden" name = "id_lista" value="<?php echo $i;?>">    
            <input type="hidden" name = "eliminar" value="3">    
        <tr>
            <input type="hidden" value = "<?php echo $i ?>">
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
            <td><button class = "btn btn-outline-warning" type="submit" formaction="Editarlista.php?id_lista=<?php  $i;?>">Editar</button></td>
            <td><button class = "btn btn-outline-danger" type="submit" formaction="php/ABCLista.php?id_lista=<?php $i;?>&eliminar=3">Eliminar</button></td>
        </tr>
        </form>  
         

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
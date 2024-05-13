

<button value = "<?php echo $Hola = "Pi por radio al cuadrado"?>" onclick="alert(value)">Soy un boton</button>




<div class="col row ms-2">
                <?php $Indice = count($_SESSION['Listas']);
                     for($i = 0; $i < $Indice; $i++){
                        $Listau = $_SESSION['Listas'][$i];
                
                ?>
                <option value="<?php echo $Listau['ID_Lista']; ?>"><?php echo $i + 1; ?></option>
                <span class ="col-9 fs-6 row "><?php echo $Lista['Nombre'];?></span>
                <button class = "btn btn-success col-3"  value = "<?php echo $_SESSION['Opc_L'] = 4?>"  onclick="Agregado a la lista"><a href="">Agregar</a> </button>
                <hr class = "mt-3" >

                <?php } ?>
        
</div>
            
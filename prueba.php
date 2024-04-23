
<?php if (isset($_SESSION['Usuario'])){  /*---aa--- */
    
    $Rol = $_SESSION['Rol'];

    switch($Rol){
        case 1:
?>    <!--case 1-->   

            <li class="nav-item"> 
              <a href= "perfiladmin.php" class= "navbar-brand my-2 my-sm-0" style="margin-left: 750px; color:antiquewhite">
              <?php  echo $_SESSION['Usuario'];?></a>
            </li>
  
            <li class="nav-item">
              <a href="php/CerrarSesion.php" class="navbar-brand my-2 my-sm-0" style="margin-left: 25px;">Cerrar Sesión</a>
            </li>
          <!--case 1-->
<?php //////
        break; 
        
        case 2:
?>   
            <!--case 2-->
            <li class="nav-item"> 
              <a href= "perfiladmin.php" class= "navbar-brand my-2 my-sm-0" style="margin-left: 750px; color:antiquewhite">
              <?php  echo $_SESSION['Usuario'];?></a>
            </li>
  
            <li class="nav-item">
              <a href="php/CerrarSesion.php" class="navbar-brand my-2 my-sm-0" style="margin-left: 25px;">Cerrar Sesión</a>
            </li>
             <!--case 2-->
 <?php    
        break;
        
        case 3:
 ?>    
            <!--case 3-->

            <li class="nav-item"> 
              <a href= "perfiladmin.php" class= "navbar-brand my-2 my-sm-0" style="margin-left: 750px; color:antiquewhite">
              <?php  echo $_SESSION['Usuario'];?></a>
            </li>
  
            <li class="nav-item">
              <a href="php/CerrarSesion.php" class="navbar-brand my-2 my-sm-0" style="margin-left: 25px;">Cerrar Sesión</a>
            </li>
             <!--case 3-->
 <?php
        break;   

        case 4:
?>    
            <!--case 4-->
            <li class="nav-item"> 
              <a href= "perfiladmin.php" class= "navbar-brand my-2 my-sm-0" style="margin-left: 750px; color:antiquewhite">
              <?php  echo $_SESSION['Usuario'];?></a>
            </li>
  
            <li class="nav-item">
              <a href="php/CerrarSesion.php" class="navbar-brand my-2 my-sm-0" style="margin-left: 25px;">Cerrar Sesión</a>
            </li>


<?php
        break;    
    }
      
 ?>
        <!---->  
          <li class="nav-item"> 
            <a href= "perfiladmin.php" class= "navbar-brand my-2 my-sm-0" style="margin-left: 750px; color:antiquewhite">
            <?php  echo $_SESSION['Usuario'];?></a>
          </li>

          <li class="nav-item">
            <a href="php/CerrarSesion.php" class="navbar-brand my-2 my-sm-0" style="margin-left: 25px;">Cerrar Sesión</a>
          </li>
        <!---->
      <?php 
        } 
        else{ 
       ?>

      <li class="nav-item">
      <a href="login.php" class="btn btn-outline-success my-2 my-sm-0" style="margin-left: 750px;">Iniciar Sesión</a>
      </li>

      <li class="nav-item">
      <a href="registro.php" class="btn btn-outline-success my-2 my-sm-0" style="margin-left: 25px;">Registrarse</a>
      </li>
      <!---->
      <?php } ?>
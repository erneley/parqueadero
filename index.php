<!DOCTYPE html>
<html >
<?php
include_once("./templates/head.php");


?>


<body>
<?php
include_once("./templates/header.php");

?>

    <div id="central">

     <div class="" id="izq">


<br>


<img src='./img/logo1.jpg' style= "height: 100px; width: 90%;">   
<br>
<br><br>
     <h2>Menu principal</h2>
    
    <br>
   
     <div class="d-grid gap-2" style="width: 12rem;">

     <a class="btn btn-primary" href="?cl=1">Clientes</a> 
     <a class="btn btn-primary" href="?cl=2">Vehiculos</a>
 <a class="btn btn-primary" href="?cl=4">Ingreso Y salida</a>
 <a class="btn btn-primary" href="?cl=3">Control Celdas</a>
 <a class="btn btn-primary" href="?cl=8">Vehiculos en patio</a>
 <a class="btn btn-primary" href="?cl=9">Registro de pagos</a>


</div>
<br>
<br>


  

    </div>
     <div id="der">

      <!--  <img src="./img/parqueadero.jpg" alt="">!-->
     
<?php
       if (isset($_GET['cl']) and $_GET['cl']==1){

            include_once("vistaclientes.php");
           
        } else

        if (isset($_GET['cl']) and $_GET['cl']==2){

            include_once("vistavehiculos.php");
            
        }else
        if (isset($_GET['cl']) and $_GET['cl']==4){

            include_once("vistaingresosalida.php");
            
        }else
        if (isset($_GET['cl']) and $_GET['cl']==3){

            include_once("vistaceldas.php");
            
        }else

        if (isset($_GET['cl']) and $_GET['cl']==5){

            include_once("editclientes.php");
            
        }else if (isset($_GET['cl']) and $_GET['cl']==6){

            include_once("editvehiculo.php");
            
        }else if (isset($_GET['cl']) and $_GET['cl']==7){

            include_once("acerca.php");
            
        }else if (isset($_GET['cl']) and $_GET['cl']==8){

            include_once("vistaparqueados.php");
            
        }else if (isset($_GET['cl']) and $_GET['cl']==9){

            include_once("vistapagos.php");
            
        }
 ?>       
     </div>

    </div>
   
    <?php
include_once("./templates/footer.php");


?>

</body>
</html>

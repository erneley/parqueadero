
<script src="jquery-3.5.1.min.js"></script>


<?php



 include "conexion.php";
 
$client=$_GET['matricula'];
$sql="select  * from vehiculos where matricula='$client'";
$registros=mysqli_query($cone,$sql);
while ($row=mysqli_fetch_array($registros)){
  $marca=$row['marca'];
  $modelo=$row['modelo'];
  $color=$row['color'];
  $tipo=$row['tipo'];
  $propietario=$row['propietario'];
  



}

?>




<div class="contenedor  bg-dark">
<div class="ladoa">
   

<div class="cliente">


<div class="card" style="width: 18rem;">
 
  <div class="card-body">
  
  
  <form id="registro" >
  <div class="mb-3">

    <input type="text" class="form-control" name="matricula"  placeholder="matricula" disabled>

  </div>

  <div class="mb-3">
   
    <input type="text" class="form-control" name="marca" placeholder="marca" require>
  </div>
 <div class="mb-3">
    <input type="text" class="form-control" name="modelo"  placeholder="modelo">
   
  </div>
  <div class="mb-3">
   
    <input type="text" class="form-control" name="color" placeholder="color">
  </div>
  
  <div class="mb-3">
    <input type="text" class="form-control" name="tipo"  placeholder="tipo" require>
  
  </div>

  <div class="mb-3">
   
    <input type="text" class="form-control" name="propietario" placeholder="propietario">
  </div>

  <button type="submit" onclick="guardar()" class="btn btn-primary">Actualizar</button>
  <a  class="btn btn-primary" href="?cl=2" >Volver</a>

  </form>
 
   </div> </div>
   <div id="aviso" class="alert alert-primary" role="alert" >
  Ficha para Registrar vehiculos
</div>




</div>
</div>

<div class="ladob">
<h3 class="text-white">Editar vehiculo </h3>
<img src="./img/vehiculo.png" alt="" height="100px">
</div>

</div>




<script>
 
    function guardar() {

      
    
 // $(document).ready(function(){
  
   
        
      if ($('input[name=nitcliente]').val()==""){
        alert ("debe digitar el id")
        $('input[name=nitcliente]').focus()
        return

        }
        if ($('input[name=nombre]').val()==""){
        alert ("debe digitar el nombre")
        $('input[name=nombre]').focus()
        return
        }
        if ($('input[name=correo]').val()==""){
        alert ("debe digitar el email")
        $('input[name=correo]').focus()
        return

        } 



     

      $('#registro').submit(function(e){
            e.preventDefault(); // Evita el envío normal del formulario

            
            
            var formData = {
                'matricula': $('input[name=matricula]').val(),
                'marca': $('input[name=marca]').val(),
                'modelo': $('input[name=modelo]').val(),
                'color': $('input[name=color]').val(),
                'propietario': $('input[name=propietario]').val(),
                'tipo': $('input[name=tipo]').val()
                
            };
            
            
            // Enviar los datos mediante AJAX
            $.ajax({
                type: 'POST',
                url: 'vehiculocontroller.php', // Reemplaza con tu URL de servidor
                data: JSON.stringify(formData),
                success: async function(response){
                    // Manejar la respuesta del servidor
                   
                   
                    location.reload();
                    $("#aviso").html(response);
 
           /* $('input[name=nitcliente]').val("")
            $('input[name=nombre]').val("")
            $('input[name=correo]').val("")
            $('input[name=direccion]').val("")
            $('input[name=telefono]').val("")
            $('input[name=ciudad]').val("")*/
            
            
             },
                error: function(error){
                    // Manejar errores
                    $("#aviso").html('Hubo un error y no se guardo el registro');
                }
            });
        });
        
     
//});

}

    </script>

   

    
 





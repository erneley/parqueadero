
<script src="jquery-3.5.1.min.js"></script>

<?php



 include "conexion.php";
 
$client=$_GET['nitcliente'];
$sql="select  * from cliente where nitcliente='$client'";
$registros=mysqli_query($cone,$sql);
while ($row=mysqli_fetch_array($registros)){
  $nombre=$row['nombre'];
  $direccion=$row['direccion'];
  $correo=$row['correo'];
  $telefono=$row['telefono'];
  $ciudad=$row['ciudad'];
  $nitcliente=$row['nitcliente'];
  



}



?>


<div class="contenedor  bg-dark">
<div class="ladoa">
   

<div class="cliente">

  
<div class="card" style="width: 18rem;">
 
  <div class="card-body">
   
  
 
  <form id="registro"  >
  
  
  <div class="mb-3">

   
    <input type="text" class="form-control" name="nitcliente"  placeholder="nitcliente" value =<?php  echo $nitcliente ?> disabled>
  </div>
  
  <div class="mb-3">

   
    <input type="text" class="form-control" name="nombre"  placeholder="Nombre" value ='<?php  echo $nombre ?>' require>
  </div>
 <div class="mb-3">
  <input type="email" class="form-control" name="correo" placeholder="Email address" value =<?php  echo $correo ?>>
   
  </div>

  <div class="mb-3">
   
   <input type="text" class="form-control" name="direccion" placeholder="direccion" value ='<?php  echo $direccion ?>'>
  </div>
  
  <div class="mb-3">
  <input type="text" class="form-control" name="telefono"  placeholder="telefono" value =<?php  echo $telefono ?>>
  
  </div>

  <div class="mb-3">
   
  <input type="text" class="form-control" name="ciudad" placeholder="ciudad" value ='<?php  echo $ciudad ?>'>
  </div>
  
  <button type="submit" onclick="guardar()" class="btn btn-primary" href="?cl=1">Actualizar</button>
  <a  class="btn btn-primary" href="?cl=1" >Volver</a>

  </form>
 
 
   </div> </div>
   <div id="aviso" class="alert alert-primary" role="alert" >
  Ficha para Registrar clientes
</div>




</div>
</div>
<div class="ladob">
<h2 class="text-white">Edicion de cliente</h2>
<img src="./img/personal.png" alt="" height="100px">


</div>

</div>




<script>
  


    function guardar() {

      
    
 // $(document).ready(function(){
  
    
        
     
        
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
              'nitcliente': $('input[name=nitcliente]').val(),
                'nombre': $('input[name=nombre]').val(),
                'correo': $('input[name=correo]').val(),
                'direccion': $('input[name=direccion]').val(),
                'telefono': $('input[name=telefono]').val(),
                'ciudad': $('input[name=ciudad]').val(),
                'cl': $('input[name=cl]').val()
            };
            
            
            // Enviar los datos mediante AJAX
            $.ajax({
                type: 'PUT',
                url: 'clientecontroller.php', // Reemplaza con tu URL de servidor

                data: JSON.stringify(formData),
                success: async function(response){
                    // Manejar la respuesta del servidor
                   
                   
                    //location.reload();
                    $("#aviso").html(response);

                    

                   
                    
          //header_location("index.php")
            
            
             },
                error: function(error){
                    // Manejar errores
                    $("#aviso").html(error);
                }
            });
            
        
     
});

}

    </script>

   

    
 





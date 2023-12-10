
<script src="jquery-3.5.1.min.js"></script>

<h2 class="text-white">Clientes</h2>
<div class="contenedor  bg-dark">
<div class="ladoa">
   

<div class="cliente">

  
<div class="card" style="width: 18rem;">
 
  <div class="card-body">
    <img src="./img/personal.png" alt="" height="100px">
  
 
  <form id="registro" >
    
  <div class="mb-3">

    <input type="text" class="form-control" name="nitcliente"  placeholder="nit" require>

  </div>

  <div class="mb-3">
   
    <input type="text" class="form-control" name="nombre" placeholder="Nombre" require>
  </div>
 <div class="mb-3">
    <input type="email" class="form-control" name="correo"  placeholder="Email address">
   
  </div>
  <div class="mb-3">
   
    <input type="text" class="form-control" name="direccion" placeholder="Direccion">
  </div>
  
  <div class="mb-3">
    <input type="text" class="form-control" name="telefono"  placeholder="Telefono" require>
  
  </div>

  <div class="mb-3">
   
    <input type="text" class="form-control" name="ciudad" placeholder="Ciudad">
  </div>

  <button type="submit" onclick="guardar()" class="btn btn-primary">Enviar</button>


  </form>
 
 
   </div> </div>
   <div id="aviso" class="alert alert-primary" role="alert" >
  Ficha para Registrar clientes
</div>




</div>
</div>
<div class="ladob">
<h3 class="text-white">Listado </h3>
<table class="table  bg-white">
<tbody>
<tr>
<td>Nit</td>  
<td>Nombre</td>
<td>Email</td>
<td>Direccion</td>
<td>Telefono</td>
<td>Ciudad</td>
<td>Acciones</td>

</tr>


<?php
/*header('content-type: application/json; charset=utf-8');*/
require 'clientemodelo.php';

$clientemodelo= new clienteModelo();





$respuesta= $clientemodelo->getClientes();
//$res= json_encode($respuesta,true);


foreach ($respuesta as $value ) {
  // $array[3] se actualizará con cada valor de $array...
  ?>
 <tr>
  <td><?php echo $value['nitcliente'] ?></td>
  <td><?php echo $value['nombre'] ?></td>
  <td><?php echo $value['correo'] ?></td>
  <td><?php echo $value['direccion'] ?></td>
  <td><?php echo $value['telefono'] ?></td>
  <td><?php echo $value['ciudad'] ?></td>
  
  <!--<td><a class="btn btn-primary" href="clientecontroller.php?nitcliente='xxx'">Eliminar</a></td>!-->
  <td>
  <a class="btn btn-primary" href="?cl=5 & nitcliente=<?php echo $value['nitcliente'] ?>">Editar</a>
  
  <button class="btn btn-danger" onclick="eliminar(<?php echo $value['nitcliente'] ?>)">borrar</button>
</td>

  

</tr>
 
<?php
}




?>

</tbody>


</table>

</div>

</div>




<script>
  
  function eliminar(id) {


   


    const update = {
title: 'A blog post by Kingsley',
body: 'Brilliant post on fetch API',
nitcliente: id,
};

const options = {
method: 'DELETE',
headers: {
'Content-Type': 'application/json',
},
body: JSON.stringify(update),

};
    

     fetch('clientecontroller.php',options)
.then(data => {
  $("#aviso").html('Registro borrado');

  location.reload();

 

})






    
    }


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
                'nombre': $('input[name=nombre]').val(),
                'nitcliente': $('input[name=nitcliente]').val(),
                'correo': $('input[name=correo]').val(),
                'direccion': $('input[name=direccion]').val(),
                'telefono': $('input[name=telefono]').val(),
                'ciudad': $('input[name=ciudad]').val()
                
            };
            
            
            // Enviar los datos mediante AJAX
            $.ajax({
                type: 'POST',
                url: 'clientecontroller.php', // Reemplaza con tu URL de servidor
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

   

    
 





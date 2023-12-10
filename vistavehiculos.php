
<script src="jquery-3.5.1.min.js"></script>

<h2 class="text-white">Vehiculos</h2>
<div class="contenedor  bg-dark">
<div class="ladoa">
   

            <div class="cliente">


            <div class="card" style="width: 18rem;">
            
              <div class="card-body">
              <img src="./img/vehiculo.png" alt="" height="100px">
              
              <form id="registro" >
              <div class="mb-3">

                <input type="text" class="form-control" name="matricula"  placeholder="matricula" require>

              </div>

              
              
                <input type="text" class="form-control" name="marca" placeholder="marca" require>
            
            <div class="mb-3">
                <input type="text" class="form-control" name="modelo"  placeholder="modelo">
              
              
              
                <input type="text" class="form-control" name="color" placeholder="color">
              
                <input type="text" class="form-control" name="tipo"  placeholder="tipo" require>
              
              </div>

              <div class="mb-3">
              
                <input type="text" class="form-control" name="propietario" placeholder="propietario">
              </div>

              <button type="submit" onclick="guardar()" class="btn btn-primary">Crear</button>
              

              </form>
            
              </div> </div>
              <div id="aviso" class="alert alert-primary" role="alert" >
              Ficha para Registrar vehiculos
            </div>




</div>
</div>

<div class="ladob">
<h3 class="text-white">Listado </h3>
<table class="table  bg-white">
<tbody>
<tr>
<td>Placa</td>  
<td>Marca</td>
<td>Modelo</td>
<td>Color</td>
<td>tipo</td>
<td>propietario</td>
<td>Acciones</td>

</tr>


<?php
/*header('content-type: application/json; charset=utf-8');*/
require 'vehiculomodelo.php';

$vehiculomodelo= new vehiculoModelo();





$respuesta= $vehiculomodelo->getautos();
//$res= json_encode($respuesta,true);


foreach ($respuesta as $value ) {
  // $array[3] se actualizará con cada valor de $array...
  ?>
 <tr>
  <td><?php echo $value['matricula'] ?></td>
  <td><?php echo $value['marca'] ?></td>
  <td><?php echo $value['modelo'] ?></td>
  <td><?php echo $value['color'] ?></td>
  <td><?php echo $value['tipo'] ?></td>
  <td><?php echo $value['propietario'] ?></td>
  
  <td><a class="btn btn-primary" href="?cl=6 & nitcliente=<?php echo $value['matricula'] ?>">Editar</a>
  <button class="btn btn-danger" onclick="eliminar(<?php echo $value['id'] ?>)">Borrar</button></td>

  

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
id: id,
};

const options = {
method: 'DELETE',
headers: {
'Content-Type': 'application/json',
},
body: JSON.stringify(update),

};
    

     fetch('vehiculocontroller.php',options)
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

   

    
 





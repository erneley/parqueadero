
<script src="jquery-3.5.1.min.js"></script>

<h2 class="text-white">Celdas parqueo</h2>
<div class="contenedor  bg-dark">
<div class="ladoa">
   

<div class="cliente">


<div class="card" style="width: 18rem;">
 
  <div class="card-body">
  <img src="./img/celdas2.jpg" alt="" height="100px">
  <br>
  <br>
  <form id="registro" >
  
  <div class="mb-3">
   
  <select class="form-select" aria-label="Default select example" id="tipo">
  <option selected>Selecione el pasillo</option>
  <option value="Vehiculo grande">Vehiculo grande</option>
  <option value="Vehiculo liviano">Vehiculo liviano</option>
  <option value="Motocicletas">Motocicletas</option>
</select>
  </div>
 <div class="mb-3">
 <select class="form-select" aria-label="Default select example" id="ubicacion">
  <option selected>Selecione el pasillo</option>
  <option value="pasillo 1">pasillo 1</option>
  <option value="pasillo 2">pasillo 2</option>
  <option value="pasillo 3">pasillo 3</option>
</select>
  
   
  </div>
  

  <button type="submit" onclick="guardar()" class="btn btn-primary">Crear</button>

  </form>
 
   </div> </div>
   <div id="aviso" class="alert alert-primary" role="alert" >
  Ficha para Registrar celdas
</div>




</div>
</div>
<div class="ladob">
<h3 class="text-white">Listado </h3>
<table class="table  bg-white">
<tbody>
<tr>
<td>Id</td>  
<td>Tipo</td>
<td>Ubicacion</td>
<td>Estado</td>

</tr>


<?php
/*header('content-type: application/json; charset=utf-8');*/
require 'celdasmodelo.php';

$celdasmodelo= new celdasModelo();





$respuesta= $celdasmodelo->getCeldas();
//$res= json_encode($respuesta,true);


foreach ($respuesta as $value ) {
  // $array[3] se actualizará con cada valor de $array...
  ?>
 <tr>
  <td><?php echo $value['id'] ?></td>
  <td><?php echo $value['tipo'] ?></td>
  <td><?php echo $value['ubicacion'] ?></td>
  <td><?php echo $value['estado'] ?></td>
  <td>
  
  <button class="btn btn-danger" onclick="eliminar(<?php echo $value['id'] ?>)">borrar</button></td>

  

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
    

     fetch('celdascontroller.php',options)
.then(data => {
  $("#aviso").html('Registro borrado');

  location.reload();

 

})






    
    }


    function guardar() {

      /* Para obtener el valor */
let tipo = document.getElementById("tipo").value;
let ubicacion = document.getElementById("ubicacion").value;


 

      
      
    
 // $(document).ready(function(){
  
     

      $('#registro').submit(function(e){
            e.preventDefault(); // Evita el envío normal del formulario

            
            
            var formData = {
                'tipo': tipo,
                'ubicacion': ubicacion
               
                
            };
            
            console.log(ubicacion)
            // Enviar los datos mediante AJAX
            $.ajax({
                type: 'POST',
                url: 'celdascontroller.php', // Reemplaza con tu URL de servidor
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
        
 
}

    </script>

   

    
 





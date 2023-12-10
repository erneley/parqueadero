
<script src="jquery-3.5.1.min.js"></script>

<h2 class="text-white">Pagos</h2>



<div class="contenedor">

  <div class="ladoa">
              

    <div class="cliente">


      <div class="card" style="width: 18rem;">
              
        <div class="card-body">
                <img src="./img/vehiculo.png" alt="" height="100px">
                
          <form id="registro"  >
              <div class="mb-3">

                  <input type="text" class="form-control" name="matricula"  placeholder="matricula" require>

              </div>

                
                
                  <input type="date" class="form-control" name="fecha" placeholder="fecha" require>
              
              <div class="mb-3">
                  <input type="number" class="form-control" name="valor"  placeholder="valor">
                
                
                
                  
                comentarios:
                  <input  class="form-control" name="descripcion"  placeholder="comentarios"> 
                
                </div>

                
                

                
                <button type="submit"  class="btn btn-primary" onclick="guardar()">Registrar</button>

          </form>
              
        </div>
      </div>
                <div id="aviso" class="alert alert-primary" role="alert" >
                Ficha para Registrar pagos
              </div></div>
  </div>


  <div class="ladob">
              <h3 class="text-white">Listado pagos </h3>
    <table class="table  bg-white">
      <tbody>
              <tr>
              <td>Placa</td>  
              <td>fecha</td>
              <td>valor</td>
              <td>descripcion</td>

              </tr>


              <?php
              /*header('content-type: application/json; charset=utf-8');*/
              require 'pagosmodelo.php';

              $vehiculomodelo= new pagosmodelo();





              $respuesta= $vehiculomodelo->getpagos();
              //$res= json_encode($respuesta,true);


              foreach ($respuesta as $value ) {
                // $array[3] se actualizará con cada valor de $array...
                ?>
              <tr>
                <td><?php echo $value['matricula'] ?></td>
                <td><?php echo $value['fecha'] ?></td>
                <td><?php echo $value['valor'] ?></td>
                <td><?php echo $value['observacion'] ?></td>
                <td><?php echo $value['id'] ?></td>

                <td><a class="btn btn-primary" href="invoice.php?id=<?php echo $value['id'] ?>">Imprimir</a>
                
                

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
  
   
        
      if ($('input[name=matricula]').val()==""){
        alert ("debe digitar el id")
        $('input[name=nitcliente]').focus()
        return

        }
        if ($('input[name=valor]').val()==""){
        alert ("debe digitar el nombre")
        $('input[name=nombre]').focus()
        return
        }
        if ($('input[name=fecha]').val()==""){
        alert ("debe digitar la fecha")
        $('input[name=correo]').focus()
        return

        } 



     

      $('#registro').submit(function(e){
          //  e.preventDefault(); // Evita el envío normal del formulario

            
            
            var formData = {
                'matricula': $('input[name=matricula]').val(),
                'fecha': $('input[name=fecha]').val(),
                'valor': $('input[name=valor]').val(),
                'descripcion': $('input[name=descripcion]').val()
                
            };
            console.log (formData)
            
            // Enviar los datos mediante AJAX
            $.ajax({
                type: 'POST',
                url: 'pagoscontroller.php', // Reemplaza con tu URL de servidor
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

   

    
 





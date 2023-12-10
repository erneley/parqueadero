
<script src="jquery-3.5.1.min.js"></script>

<h2 class="text-white">Ingreso y salida de vehiculos</h2>
<div class="contenedor  bg-dark">



<div class="ladoa">
   

<div class="cliente">


<div class="card" style="width: 18rem;">
 
  <div class="card-body">
 
  <br>
  <br>
  <form  id="registro" >
  
  

  <div class="mb-3">
   
  <input type="text" class="form-control" name="matricula"  placeholder="matricula" require>

</div>


<div class="mb-3">
 
  <input type="text" class="form-control" name="celda" placeholder="Celda a ocupar">
</div>


<div class="mb-3">
   
  
<input type="text" class="form-control" name="observacion" placeholder="observacion" maxlength="20">
  

</div>


  
   
  
  

  <button type="submit"  class="btn btn-primary" onclick="guardar()">Entrada</button>
  <button type="submit"  class="btn btn-primary" onclick="salida()">Salida</button>
  <a  class="btn btn-primary" href="?cl=8" >Ver</a>

  </form>
 
   </div> </div>
   <div id="aviso" class="alert alert-primary" role="alert" >
  Ficha para Registrar celdas
</div>

</div>
</div>




<div class="ladob">
<img src="./img/celdas2.jpg" alt="" height="250px">
</div>

</div>




<script>
  
  
    function guardar() {

      /* Para obtener el valor 
let tipo = document.getElementById("tipo").value;
let ubicacion = document.getElementById("ubicacion").value;*/

     

          $('#registro').submit(function(e){
            e.preventDefault(); // Evita el envío normal del formulario

            
            
            var formData = {
                'matricula': $('input[name=matricula]').val(),
                'celda': $('input[name=celda]').val(),
                'observacion': $('input[name=observacion]').val(),
                'op': $('input[name=op]').val()
                
            };
           $.ajax({
                type: 'POST',
                url: 'ingresocontroller.php', // Reemplaza con tu URL de servidor
                data: JSON.stringify(formData),
                success: async function(response){
                    // Manejar la respuesta del servidor
                   
                   
                   // location.reload();
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



function salida() {

/* Para obtener el valor 
let tipo = document.getElementById("tipo").value;
let ubicacion = document.getElementById("ubicacion").value;*/



    $('#registro').submit(function(e){
      e.preventDefault(); // Evita el envío normal del formulario

      
      
      var formData = {
          'matricula': $('input[name=matricula]').val(),
          'observacion': $('input[name=observacion]').val()
          
      };
     $.ajax({
          type: 'PUT',
          url: 'ingresocontroller.php', // Reemplaza con tu URL de servidor
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

   

    
 





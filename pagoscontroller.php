<?php
header('content-type: application/json; charset=utf-8');
require 'pagosmodelo.php';
$pagomodelo= new pagosmodelo();
switch($_SERVER['REQUEST_METHOD']){
    CASE 'GET':
    if (isset($_GET['id']) ){
        $respuesta= $pagomodelo->getpagoId($_GET['id']);

        
    }else
        {
       $respuesta= $pagomodelo->getpagos();

}
       
echo json_encode($respuesta);
        break;

        CASE 'POST':
         $_POST=json_decode(file_get_contents('php://input',true));
         if (!isset($_POST->matricula) || is_null($_POST->matricula)){
            $respuesta=['error','debe ingresar una identificacion'];
            
         }
         else if (!isset($_POST->valor) || is_null($_POST->valor)){
            $respuesta=['error','debe ingresar un valor'];
         }
         else{
  
            $respuesta=$pagomodelo->savepagos($_POST->matricula,$_POST->fecha,$_POST->valor,$_POST->descripcion);
         }

         echo json_encode($respuesta);
        break;

        CASE 'PUT':
        $_PUT=json_decode(file_get_contents('php://input',true));
        if (!isset($_PUT->matricula) || is_null($_PUT->matricula)){
           $respuesta=['error','debe ingresar una identificacion'];
        }
        else if (!isset($_PUT->valor) || is_null($_PUT->valor)){
           $respuesta=['error','debe ingresar un nombre'];
        }
        else{
           $respuesta=$pagomodelo->updatepago($_PUT->matricula,$_PUT->fecha,$_PUT->valor,$_PUT->descripcion);
        }

        echo json_encode($respuesta);

        break;

        CASE 'DELETE':
       $_DELETE=json_decode(file_get_contents('php://input',true));
        if (!isset($_DELETE->id) || is_null($_DELETE->id)){
           $respuesta=['error','debe ingresar una identificacion a borrar'];
        }
        else{
            $respuesta=$pagomodelo->deletepago($_DELETE->id);
         }
         
         echo json_encode($respuesta);
        break;




}


?>
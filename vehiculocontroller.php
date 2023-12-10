<?php
header('content-type: application/json; charset=utf-8');
require 'vehiculomodelo.php';
$vehiculomodelo= new vehiculoModelo();
switch($_SERVER['REQUEST_METHOD']){
    CASE 'GET':
    if (isset($_GET['id']) ){
        $respuesta= $vehiculomodelo->getautoId($_GET['id']);

        
    }else
        {
       $respuesta= $vehiculomodelo->getautos();

}
       
echo json_encode($respuesta);
        break;

        CASE 'POST':
         $_POST=json_decode(file_get_contents('php://input',true));
         if (!isset($_POST->matricula) || is_null($_POST->matricula)){
            $respuesta=['error','debe ingresar una identificacion'];
         }
         else if (!isset($_POST->marca) || is_null($_POST->marca)){
            $respuesta=['error','debe ingresar un nombre'];
         }
         else{
            $respuesta=$vehiculomodelo->saveautos($_POST->matricula,$_POST->marca,$_POST->modelo,$_POST->color,$_POST->tipo,$_POST->propietario);
         }

         echo json_encode($respuesta);
        break;

        CASE 'PUT':
        $_PUT=json_decode(file_get_contents('php://input',true));
        if (!isset($_PUT->matricula) || is_null($_PUT->matricula)){
           $respuesta=['error','debe ingresar una identificacion'];
        }
        else if (!isset($_PUT->marca) || is_null($_PUT->marca)){
           $respuesta=['error','debe ingresar un nombre'];
        }
        else{
           $respuesta=$vehiculomodelo->updateauto($_PUT->matricula,$_PUT->marca,$_PUT->modelo,$_PUT->color,$_PUT->tipo,$_PUT->propietario);
        }

        echo json_encode($respuesta);

        break;

        CASE 'DELETE':
       $_DELETE=json_decode(file_get_contents('php://input',true));
        if (!isset($_DELETE->id) || is_null($_DELETE->id)){
           $respuesta=['error','debe ingresar una identificacion a borrar'];
        }
        else{
            $respuesta=$vehiculomodelo->deleteauto($_DELETE->id);
         }
         
         echo json_encode($respuesta);
        break;




}


?>
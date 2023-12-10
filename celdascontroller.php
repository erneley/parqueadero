<?php
header('content-type: application/json; charset=utf-8');
require 'celdasmodelo.php';

$celdasmodelo= new celdasModelo();
switch($_SERVER['REQUEST_METHOD']){
    CASE 'GET':
    
    if (isset($_GET['nitcliente']) ){
       $respuesta= $clientemodelo->getClientesId($_GET['nitcliente']);
       
        
    }else
        {
       $respuesta= $clientemodelo->getClientes();

}
       
echo json_encode($respuesta);
        break;

        CASE 'POST':
        /*$respuesta=['error','debe ingresar un nombre'];
        echo json_encode($respuesta);
        return($respuesta);*/


         $_POST=json_decode(file_get_contents('php://input',true));
         if (!isset($_POST->ubicacion) || is_null($_POST->ubicacion)){
            $respuesta=['error',"selecciona ubicacion"];
            return($respuesta);
         }
         else if (!isset($_POST->tipo) || is_null($_POST->tipo)){
            $respuesta=['error','debe ingresar un nombre'];
         }
         else{
            $respuesta=$celdasmodelo->saveceldas($_POST->tipo,$_POST->ubicacion);
         }

         echo json_encode($respuesta);
        break;

        CASE 'PUT':
        $_PUT=json_decode(file_get_contents('php://input',true));
        if (!isset($_PUT->nitcliente) || is_null($_PUT->nitcliente)){
           $respuesta=['error','debe ingresar una identificacion'];
        }
        else if (!isset($_PUT->nombre) || is_null($_PUT->nombre)){
           $respuesta=['error','debe ingresar un nombre'];
        }
        else{
           $respuesta=$celdasmodelo->updateceldas($_PUT->nitcliente,$_PUT->nombre,$_PUT->correo,$_PUT->direccion,$_PUT->telefono,$_PUT->ciudad);
        }

        echo json_encode($respuesta);

        break;

        CASE 'DELETE':
       $_DELETE=json_decode(file_get_contents('php://input',true));
        if (!isset($_DELETE->id) || is_null($_DELETE->id)){
           $respuesta=['error','debe ingresar una identificacion a borrar'];
        }
        else{
            $respuesta=$celdasmodelo->deleteceldas($_DELETE->id);
         }
         
         echo json_encode($respuesta);
        break;




}


?>
<?php
header('content-type: application/json; charset=utf-8');
require 'clientemodelo.php';

$clientemodelo= new clienteModelo();
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
         if (!isset($_POST->nitcliente) || is_null($_POST->nitcliente)){
            $respuesta=['error',$_POST->nitcliente];
            return($respuesta);
         }
         else if (!isset($_POST->nitcliente) || is_null($_POST->nitcliente)){
            $respuesta=['error','debe ingresar un nombre'];
         }
         else{
            $respuesta=$clientemodelo->saveclientes($_POST->nitcliente,$_POST->nombre,$_POST->correo,$_POST->direccion,$_POST->telefono,$_POST->ciudad);
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
           $respuesta=$clientemodelo->updateclientes($_PUT->nitcliente,$_PUT->nombre,$_PUT->correo,$_PUT->direccion,$_PUT->telefono,$_PUT->ciudad);
        }

        echo json_encode($respuesta);

        break;

        CASE 'DELETE':
       $_DELETE=json_decode(file_get_contents('php://input',true));
        if (!isset($_DELETE->nitcliente) || is_null($_DELETE->nitcliente)){
           $respuesta=['error','debe ingresar una identificacion a borrar'];
        }
        else{
            $respuesta=$clientemodelo->deleteclientes($_DELETE->nitcliente);
         }
         
         echo json_encode($respuesta);
        break;




}


?>
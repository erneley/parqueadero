<?php
header('content-type: application/json; charset=utf-8');
require 'ingresomodelo.php';
$ingresomodelo= new ingresoModelo();
switch($_SERVER['REQUEST_METHOD']){


    CASE 'GET':
    
        $respuesta= $ingresomodelo->getingreso();
      
       echo json_encode($respuesta);
        break;

        CASE 'POST':
         $_POST=json_decode(file_get_contents('php://input',true));
         if (!isset($_POST->matricula) || is_null($_POST->matricula)){
            $respuesta=['error','debe ingresar una placa'];
         }
        else
        if (!isset($_POST->celda) || is_null($_POST->celda)){
         $respuesta=['error','debe ingresar un numero de celda a ocupar'];
        }
         else{

            $observacion="";
            if (isset($_POST->observacion) ){
               
               $observacion=$_POST->observacion;

            }

            
            $respuesta=$ingresomodelo->saveingreso($_POST->matricula,$_POST->celda,$observacion);
         }

         echo json_encode($respuesta);
        break;

        
        CASE 'PUT':
        $_PUT=json_decode(file_get_contents('php://input',true));
        if (!isset($_PUT->matricula) || is_null($_PUT->matricula)){
           $respuesta=['error','debe ingresar una matricula'];
        }
        
        else{
           $respuesta=$ingresomodelo->updateingreso($_PUT->matricula,$_PUT->observacion);
        }

        echo json_encode($respuesta);

        break;



}


?>
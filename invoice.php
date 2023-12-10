<?php
/// Powered by Evilnapsis go to http://evilnapsis.com

$matri=$_GET['id'];
$matri=intval($matri);

require 'pagosmodelo.php';
$pagomodelo= new pagosmodelo();

$respuesta= $pagomodelo->getpagoId($matri);
              //$res= json_encode($respuesta,true);
              foreach ($respuesta as $value ) {
                // $array[3] se actualizará con cada valor de $array...
                
              
               $matricula= $value['matricula'] ;
            $fecha= $value['fecha'] ;
            $valor=$value['valor'] ;
            $descripcion= $value['observacion'] ;
              }
              

include "fpdf.php";


/*$matricula=$_POST['matricula'];
$fecha=$_POST['fecha'];
$valor=$_POST['valor'];
$descripcion=$_POST['descripcion'];*/
$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);    
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);
// Agregamos los datos de la empresa
$pdf->Cell(5,$textypos,"parqueadero central");
$pdf->SetFont('Arial','B',10); 
$pdf->setY(18);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Centro medellin");


$pdf->SetFont('Arial','B',10);    
$pdf->setY(25);$pdf->setX(10);
$pdf->Cell(5,$textypos,"FACTURA #12345");
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(10);
$pdf->Cell(5,$textypos,"fecha : $fecha");
$pdf->setY(40);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Valor pagador : $valor");

$pdf->setY(50);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Vehiculo : $matricula");
$pdf->setY(70);$pdf->setX(10);
$pdf->Cell(5,$textypos,"observaciones : $descripcion");

// Agregamos los datos del cliente

/// Apartir de aqui empezamos con la tabla de productos
$pdf->setY(100);$pdf->setX(15);
    $pdf->Ln();
/////////////////////////////
//// Array de Cabecera
    // Column widths
/////////////////////////////
//// Apartir de aqui esta la tabla con los subtotales y totales
$yposdinamic = 60 ;

$pdf->setY($yposdinamic);
$pdf->setX(235);
    $pdf->Ln();
/////////////////////////////

    $pdf->Ln();
    // Data
   
/////////////////////////////


$pdf->SetFont('Arial','B',10);    

$pdf->setY(85);$pdf->setX(10);
$pdf->Cell(5,$textypos,"TERMINOS Y CONDICIONES");
$pdf->SetFont('Arial','',10);    
$pdf->setY(95);$pdf->setX(10);
$pdf->setY(100);$pdf->setX(10);


$pdf->output('prueba.pdf', 'I');
//$respuesta= $pagomodelo->savepagos($matricula,$fecha,$valor,$descripcion);
//echo json_encode($respuesta);
echo ("cl=3");




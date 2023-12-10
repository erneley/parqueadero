<?php


 class ingresoModelo{
public $conexion;

public function __construct(){
$this->conexion = new mysqli('localhost', 'root','','data');
mysqli_set_charset($this->conexion,'utf8');

}

public function getxxClientes(){
    include "conexion.php";
    $cliente=[];
$sql="select  * from cliente";
$registros=mysqli_query($this->conexion,$sql);
while ($row=mysqli_fetch_array($registros)){
    array_push($cliente,$row);
}

return $cliente;
}


public function getingreso(){
    include "conexion.php";
    $cliente=[];
$sql="select  * from ingreso where ensitio=1";
$registros=mysqli_query($this->conexion,$sql);
while ($row=mysqli_fetch_array($registros)){
    array_push($cliente,$row);
}

return $cliente;
}



public function saveingreso($matricula,$celda,$observacion){
    $sql="select  * from celdas where id='$celda' and estado='libre'";
    $registros=mysqli_query($this->conexion,$sql);
    if ($row=mysqli_fetch_array($registros)){
        $hora= date('h:i:s A');
        $fecha = date("Ymd") ;//date("m.d.y"); 
        $ensitio="si";
        $sql="insert into ingreso(matricula,celda,fechaingreso,horaingreso,ensitio,observacion) values('$matricula',$celda,'$fecha','$hora','$ensitio','$observacion')";
        mysqli_query($this->conexion,$sql);
        $sql="update celdas set estado='ocupado' where id=$celda";
        mysqli_query($this->conexion,$sql);
        
$resultado=['success', 'registro guardado'];}
    else {
        $resultado=['error', 'La celda no esta disponible'];
    }
        
   // }
return $resultado;

}

//horasalida='$hora',ensitio=$ensitio,
public function updateingreso($matricula,$observacion){
        $hora= date('h:i:s A');
        $fecha = date("Ymd"); 
        $ensitio="no";
        $sit="si";

        $sql="select  * from ingreso where ensitio='si' and matricula='$matricula' ";
        $registros=mysqli_query($this->conexion,$sql);
        if ($row=mysqli_fetch_array($registros)){
            $cel=$row['celda'] ;

        $sql="UPDATE ingreso SET fechasalida='$fecha',observacion='$observacion',horasalida='$hora',ensitio='$ensitio' WHERE matricula='$matricula' && ensitio='si'";
        mysqli_query($this->conexion,$sql);
        
        
        $sql="update celdas set estado='libre' where id='$cel'";
        mysqli_query($this->conexion,$sql);
        
        $resultado=['success',$cel];
        }
        else{
            $resultado=['error', 'vehiculo errado no se encuentra en el sitio'];
        }


        
   
return $resultado;

}
     


}

?>
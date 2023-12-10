<?php


 class vehiculoModelo{
public $conexion;

public function __construct(){
$this->conexion = new mysqli('localhost', 'root','','data');
mysqli_set_charset($this->conexion,'utf8');

}

public function getautos(){
    include "conexion.php";
    $vehiculo=[];
$sql="select  * from vehiculos";
$registros=mysqli_query($this->conexion,$sql);
while ($row=mysqli_fetch_array($registros)){
    array_push($vehiculo,$row);
}

return $vehiculo;
}


public function getautoId($matricula){
    include "conexion.php";
    $vehiculo=[];
$sql="select  * from vehiculos where matricula='$matricula'";
$registros=mysqli_query($this->conexion,$sql);
while ($row=mysqli_fetch_array($registros)){
    array_push($vehiculo,$row);
}

return $vehiculo;
}



public function saveautos($matricula,$marca,$modelo,$color,$tipo,$propietario){
$sql="insert into vehiculos(matricula,marca,modelo,color,tipo,propietario) values('$matricula','$marca','$modelo','$color','$tipo','$propietario')";
mysqli_query($this->conexion,$sql);
$resultado=['success', 'registro guardado'];
return $resultado;

}

    

public function updateauto($matricula,$marca,$modelo,$color,$tipo,$propietario) {
    $sql="UPDATE vehiculos SET marca='$marca',modelo='$modelo',color='$color',tipo='$tipo',propietario='$propietario' WHERE matricula='$matricula'";
      mysqli_query($this->conexion,$sql);
    $resultado=['success', 'registro actualizado'];
    return $resultado;
    
    }

 public function deleteauto($id) {
        $sql="DELETE FROM  vehiculos  WHERE id='$id'";
          mysqli_query($this->conexion,$sql);
        $resultado=['success', 'registro BORRADO'];
        return $resultado;
        
        }
     


}

?>
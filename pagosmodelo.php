<?php


 class pagosModelo{
public $conexion;

public function __construct(){
$this->conexion = new mysqli('localhost', 'root','','data');
mysqli_set_charset($this->conexion,'utf8');

}

public function getpagos(){
    include "conexion.php";
    $vehiculo=[];
$sql="select  * from pagos";
$registros=mysqli_query($this->conexion,$sql);
while ($row=mysqli_fetch_array($registros)){
    array_push($vehiculo,$row);
}

return $vehiculo;
}


public function getpagoId($id){
    include "conexion.php";
    $vehiculo=[];
$sql="select  * from pagos where id=$id";
$registros=mysqli_query($this->conexion,$sql);
while ($row=mysqli_fetch_array($registros)){
    array_push($vehiculo,$row);
}

return $vehiculo;
}



public function savepagos($matricula,$fecha,$valor,$descripcion){
$valor=intval($valor);  
$sql="insert into pagos(matricula,fecha,valor,observacion) values('$matricula','$fecha','$valor','$descripcion')";
mysqli_query($this->conexion,$sql);
$resultado=['success', 'registro guardado'];


return $resultado;

}

    

public function updatepago($matricula,$fecha,$valor,$descripcion) {
    $sql="UPDATE pagos SET fecha='$fecha',valor='$valor',color='$descripcion' WHERE matricula='$matricula'";
      mysqli_query($this->conexion,$sql);
    $resultado=['success', 'registro actualizado'];
    return $resultado;
    
    }

 public function deletepago($matricula) {
        $sql="DELETE FROM  pagos  WHERE id='$matricula";
          mysqli_query($this->conexion,$sql);
        $resultado=['success', 'registro BORRADO'];
        return $resultado;
        
        }
     


}

?>
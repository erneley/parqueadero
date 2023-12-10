<?php


 class celdasModelo{
public $conexion;

public function __construct(){
$this->conexion = new mysqli('localhost', 'root','','data');
mysqli_set_charset($this->conexion,'utf8');

}

public function getCeldas(){
    include "conexion.php";
    $cliente=[];
$sql="select  * from celdas";
$registros=mysqli_query($this->conexion,$sql);
while ($row=mysqli_fetch_array($registros)){
    array_push($cliente,$row);
}

return $cliente;
}


public function getClientesId($nitcliente){
    include "conexion.php";
    $cliente=[];
$sql="select  * from celdas where nitcliente='$nitcliente'";
$registros=mysqli_query($this->conexion,$sql);
while ($row=mysqli_fetch_array($registros)){
    array_push($cliente,$row);
}

return $cliente;
}



public function saveceldas($tipo,$ubicacion){
    $estado="libre";
$sql="insert into celdas (tipo,ubicacion,estado) values('$tipo','$ubicacion','$estado')";
mysqli_query($this->conexion,$sql);
$resultado=['ok  ', 'registro guardado correctamente'];
return $resultado;

}

    

public function updateceldas($nitcliente,$nombre,$correo,$direccion,$telefono,$ciudad) {
    $sql="UPDATE cliente SET nombre='$nombre',correo='$correo',direccion='$direccion',telefono='$telefono',ciudad='$ciudad' WHERE nitcliente='$nitcliente'";
      mysqli_query($this->conexion,$sql);
    $resultado=['ok ', 'registro actualizado'];
    return $resultado;
    
    }

 public function deleteceldas($id) {
        $sql="DELETE FROM  celdas  WHERE id=$id";
          mysqli_query($this->conexion,$sql);
        $resultado=['ok ', 'registro BORRADO'];
        return $resultado;
        
        }
     


}

?>
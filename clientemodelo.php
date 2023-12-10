<?php


 class clienteModelo{
public $conexion;

public function __construct(){
$this->conexion = new mysqli('localhost', 'root','','data');
mysqli_set_charset($this->conexion,'utf8');

}

public function getClientes(){
    include "conexion.php";
    $cliente=[];
$sql="select  * from cliente";
$registros=mysqli_query($this->conexion,$sql);
while ($row=mysqli_fetch_array($registros)){
    array_push($cliente,$row);
}

return $cliente;
}


public function getClientesId($nitcliente){
    include "conexion.php";
    $cliente=[];
$sql="select  * from cliente where nitcliente='$nitcliente'";
$registros=mysqli_query($this->conexion,$sql);
while ($row=mysqli_fetch_array($registros)){
    array_push($cliente,$row);
}

return $cliente;
}



public function saveclientes($nitcliente,$nombre,$correo,$direccion,$telefono,$ciudad){
$sql="insert into cliente(nitcliente,nombre,correo,direccion,telefono,ciudad) values('$nitcliente','$nombre','$correo','$direccion','$telefono','$ciudad')";
mysqli_query($this->conexion,$sql);
$resultado=['ok  ', 'registro guardado correctamente'];
return $resultado;

}

    

public function updateclientes($nitcliente,$nombre,$correo,$direccion,$telefono,$ciudad) {
    $sql="UPDATE cliente SET nombre='$nombre',correo='$correo',direccion='$direccion',telefono='$telefono',ciudad='$ciudad' WHERE nitcliente='$nitcliente'";
      mysqli_query($this->conexion,$sql);
    $resultado=['ok ', 'registro actualizado'];
    
    return $resultado;
    
    }

 public function deleteclientes($nitcliente) {
        $sql="DELETE FROM  cliente  WHERE nitcliente=$nitcliente";
          mysqli_query($this->conexion,$sql);
        $resultado=['ok ', 'registro BORRADO'];
        return $resultado;
        
        }
     


}

?>
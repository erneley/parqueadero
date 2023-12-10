<?php
$cone = mysqli_connect('localhost', 'root','','mi_data');

$descripcion=$_POST['descripcion'];
$nombre=$_POST['nombre'];


$sql="insert into roles (descripcion,nombre) values('$descripcion','$nombre')";
mysqli_query($cone,$sql);

$resultado=['ok  ', 'registro guardado correctamente'];
return $resultado;




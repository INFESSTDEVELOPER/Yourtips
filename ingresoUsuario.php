<?php 






$nombre=$_POST['nombre'];
$correo=$_POST['correo'];


include "conexion.php"; 
$sql="INSERT INTO conexion_usuario(nombre,correo) VALUES ('$nombre','$correo')"; 
//$sql="INSERT INTO picada(nombre,direccion,lat,lng,tipo) VALUES ('sss','ss',4,4,'sd');"; 
$result=mysql_query($sql, $conexion); 
  echo mysql_errno($conexion) . ": " . mysql_error($conexion) . "\n";
echo $conexion;
echo $sql;
if($result){
echo "You have been successfully subscribed."+$result;
}else{


echo "You have been successfully subscribed."+$result;

}









include "desconectar.php"; 






?>
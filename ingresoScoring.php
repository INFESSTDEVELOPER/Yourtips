<?php 






$tips=$_POST['id_tips'];
$numero=$_POST['numero'];
$usuario=$_POST['id_usuario'];


include "conexion.php"; 
$sql="INSERT INTO scoring(id_tips,id_usuario,valoracion) VALUES ('$tips','$usuario','$numero')"; 
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
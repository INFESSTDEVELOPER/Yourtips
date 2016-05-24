<?php 


$tipo=$_GET['tipoSelect'];

//$tipo='restaurant';
include "conexion.php"; 
$sql="select * from tips where tipo='$tipo'"; 
$result=mysql_query($sql, $conexion); 
$return_arr = array();
$row_array= array();

while ($row=@mysql_fetch_array($result)) 
{ 

   $row_array['id'] = $row['id_tips'];
    $row_array['nombre'] = $row['nombre'];
    $row_array['direccion'] = $row['direccion'];
    $row_array['lat'] = $row['lat'];
    $row_array['lng'] = $row['lng'];
    $row_array['tipo'] = $row['tipo'];
    $row_array['fono'] = $row['fono'];
    $row_array['descripcion'] = $row['descripcion'];
    $row_array['correo'] = $row['correo'];
    $row_array['image'] = $row['image'];

 $vv= $row['id_tips'];

 $sql2="select ROUND(AVG(valoracion)) as valo FROM scoring where id_tips='$vv'"; 
 $result2 = mysql_query($sql2, $conexion); 
$row2 = mysql_fetch_row($result2);

 
   $row_array['valo'] = $row2[0];         

    


    array_push($return_arr,$row_array);
}

echo json_encode($return_arr);










include "desconectar.php"; 
?>
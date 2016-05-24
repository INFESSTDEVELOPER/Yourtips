<?php 

include "conexion.php"; 
$sql="select * from tips"; 
$result=mysql_query($sql, $conexion); 
$return_arr = array();
$row_array= array();
while ($row=@mysql_fetch_array($result)) 
{ 


    $row_array['nombre'] = $row['nombre'];
    $row_array['direccion'] = $row['direccion'];
    $row_array['lat'] = $row['lat'];
    $row_array['lng'] = $row['lng'];
    $row_array['tipo'] = $row['tipo'];
        $row_array['fono'] = $row['fono'];
            $row_array['image'] = $row['image'];
    array_push($return_arr,$row_array);
}

echo json_encode($return_arr);










include "desconectar.php"; 
?>
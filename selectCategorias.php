<?php 

include "conexion.php"; 
$sql="select * from categorias"; 
$result=mysql_query($sql, $conexion); 
$return_arr = array();
$row_array= array();
while ($row=@mysql_fetch_array($result)) 
{ 


    $row_array['ID_CATEGORIAS'] = $row['ID_CATEGORIAS'];
    $row_array['NOMBRE'] = $row['NOMBRE'];

    array_push($return_arr,$row_array);
}

echo json_encode($return_arr);


include "desconectar.php"; 
?>
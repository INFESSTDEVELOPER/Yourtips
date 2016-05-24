<?php 






$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$tipo=$_POST['tipo'];
$fono=$_POST['fono'];
$descripcion=$_POST['descripcion'];
$correo=$_POST['correo'];

if (isset($_FILES["file"]["name"])) {

    $name = $nombre.'.jpg';
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    $location = 'images/tips/';
    if (!empty($name)) {
        

        if  (move_uploaded_file($tmp_name, $location.$name)){
    
        }

    } else {
  
    }
}











include "conexion.php"; 
$sql="INSERT INTO tips(nombre,direccion,lat,lng,tipo,fono,descripcion,correo,image) VALUES ('$nombre','$direccion','$lat','$lng','$tipo','$fono','$descripcion','$correo','".$nombre.".jpg')"; 
//$sql="INSERT INTO picada(nombre,direccion,lat,lng,tipo) VALUES ('sss','ss',4,4,'sd');"; 
$result=mysql_query($sql, $conexion); 
 $row_array= array();
if($result){

   $row_array['categoria'] = $tipo;
    $row_array['lat'] = $lat;
    $row_array['lng'] =$lng;

echo json_encode($row_array);
}else{




}









include "desconectar.php"; 






?>
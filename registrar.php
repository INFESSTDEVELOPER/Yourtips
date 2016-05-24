<?php 

session_start();




$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$password=$_POST['password'];


include "conexion.php"; 
$sql="INSERT INTO usuario(nombre_usuario,correo,password) VALUES ('$nombre','$correo','$password')"; 
//$sql="INSERT INTO picada(nombre,direccion,lat,lng,tipo) VALUES ('sss','ss',4,4,'sd');"; 
$result=mysql_query($sql, $conexion); 
  echo mysql_errno($conexion) . ": " . mysql_error($conexion) . "\n";
echo $conexion;
echo $sql;
if($result){



         $_SESSION['login_user'] = $nombre;
         $_SESSION['loggedin'] = true;
         $_SESSION['start'] = time();
         $_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;

 header("Location: yourtips.php");

}else{


echo "You have been successfully subscribed."+$result;

}









include "desconectar.php"; 






?>
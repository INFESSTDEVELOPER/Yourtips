<?php 
session_start();
$myusername = $_POST['nombre'];
$correo =$_POST['correo']; 
$imagen =$_POST['imagen']; 



echo $_POST['nombre']; 
echo $_POST['correo']; 

echo $myusername ;
echo $correo ;
echo $imagen ;


         //session_register("myusername");
         $_SESSION['login_user'] =  $myusername;
         $_SESSION['correo'] =  $correo;
         $_SESSION['imagen'] = $imagen; 
         $_SESSION['loggedin'] = true;
         $_SESSION['start'] = time();
         $_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;

         header("location: yourtips.php");
    










?>
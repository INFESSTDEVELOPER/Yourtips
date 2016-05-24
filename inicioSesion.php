<?php 

include "conexion.php"; 


       session_start();
      $myusername = $_POST['usuario'];
      $mypassword =$_POST['password']; 


$sql=" select * FROM usuario WHERE correo = '$myusername' and password = '$mypassword'";
$result=mysql_query($sql, $conexion); 

while ($row=@mysql_fetch_array($result)) 
{ 


         //session_register("myusername");
         $_SESSION['login_user'] =  $row['nombre_usuario'];
         $_SESSION['loggedin'] = true;
         $_SESSION['start'] = time();
         $_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;

         header("location: yourtips.php");
    

    
}











include "desconectar.php"; 
?>
<?php
   include_once dirname(__FILE__) . '/../config/config.php';
   $str_datos = "";
  
   $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
   if (mysqli_connect_errno()) 
   {
       $str_datos.= "Error en la conexión: " . mysqli_connect_error();
   }
   
   $str_datos.= "<h3>Defaul<h3>";
  
   $str_datos.="<a href='../admin/adEquipment.php'> volver </a>";
   echo $str_datos;
   mysqli_close($con);
?>
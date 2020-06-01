<?php
   include_once dirname(__FILE__) . '/../config/config.php';
   $str_datos = "";
  
   $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
   if (mysqli_connect_errno()) 
   {
       $str_datos.= "Error en la conexión: " . mysqli_connect_error();
   }

   if(isset($_GET['idPaciente']) && isset($_GET['nombre']))
   {
        $str_datos = "<h1>Lista de equipos asignados a ".$_GET['nombre']."<h1>";

        $str_datos.='<table border="1" style="width:100%">';
        $str_datos.='<tr>';
             $str_datos.='<th>IdDeRecurso</th>';
             $str_datos.='<th>Nombre</th>';
        $str_datos.='</tr>';
     
         $sql = "SELECT * FROM Recursos WHERE IdPaciente = ".$_GET['idPaciente'];
         $respuesta = mysqli_query($con,$sql);
     
         while( $fila = mysqli_fetch_array($respuesta) )
         {
        
             $str_datos.='<tr>';
                 $str_datos.= "<td>".$fila['Numero']."</td>";
                 $str_datos.= "<td>".$fila['NombreDeRecurso']."</td>";
            $str_datos.= "</tr>";
         }
         $str_datos.= "</table>";
   }
 
   $str_datos.="<a href='../admin/adPacient.php'> volver </a>";
   echo $str_datos;
   mysqli_close($con);
?>
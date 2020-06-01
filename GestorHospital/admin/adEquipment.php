<?php
   include_once dirname(__FILE__) . '/../config/config.php';
   $str_datos = "";
  
   $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
   if (mysqli_connect_errno()) 
   {
       $str_datos.= "Error en la conexión: " . mysqli_connect_error();
   }

   $str_datos.='<table border="1" style="width:100%">';
   $str_datos.='<tr>';
       $str_datos.='<th>Nombre</th>';
       $str_datos.='<th>Cantidad</th>';
       $str_datos.='<th>Disponible</th>';
   $str_datos.='</tr>';
   
   $str_datos.= "<h3>Tabla de equipos disponibles<h3>";

   $sql = "SELECT * FROM Equipos WHERE Disponible = true GROUP BY NombreDeEquipo";
   $resultado = mysqli_query($con,$sql);
  
   while($fila = mysqli_fetch_array($resultado)) 
   {
       $sql_1 = "SELECT count(NombreDeEquipo), NombreDeEquipo FROM Equipos WHERE Disponible = true and NombreDeEquipo ='".$fila['NombreDeEquipo']."'";
       $resultado_1 = mysqli_query($con,$sql_1);
       $numeroDeEquipos = mysqli_fetch_row($resultado_1);
       
       $str_datos.='<tr>';
           $str_datos.= "<td>".$fila['NombreDeEquipo']."</td>";
           $str_datos.= "<td>".$numeroDeEquipos[0]."</td>";
           if( $fila['Disponible'] == 1)
           {
               $str_datos.= "<td>Sí</td>";
           }
       $str_datos.= "</tr>";
   }
   $str_datos.= "</table>";



   $str_datos.='<table border="1" style="width:100%">';
   $str_datos.='<tr>';
       $str_datos.='<th>Nombre</th>';
       $str_datos.='<th>Cantidad</th>';
       $str_datos.='<th>Disponible</th>';
   $str_datos.='</tr>';
   $str_datos.= "<h3>Tabla de no disponibles porque están en espera de ser asignados o agotados<h3>";

   $sql = "SELECT * FROM Equipos WHERE Disponible = false and IdPaciente is null GROUP BY NombreDeEquipo";
   $resultado = mysqli_query($con,$sql);
  
   while($fila = mysqli_fetch_array($resultado)) 
   {
       $sql_1 = "SELECT count(NombreDeEquipo), NombreDeEquipo FROM Equipos WHERE Disponible = false and IdPaciente is null and NombreDeEquipo ='".$fila['NombreDeEquipo']."'";
       $resultado_1 = mysqli_query($con,$sql_1);
       $numeroDeEquipos = mysqli_fetch_row($resultado_1);
       $fila_1 = mysqli_fetch_array($resultado_1);

       $str_datos.='<tr>';
           $str_datos.= "<td>".$fila['NombreDeEquipo']."</td>";
           $str_datos.= "<td>".$numeroDeEquipos[0]."</td>";
           if( $fila['Disponible'] == 0)
           {
               $str_datos.= "<td>No</td>";
           }
       $str_datos.= "</tr>";
   }
   $str_datos.= "</table>";



   $str_datos.='<table border="1" style="width:100%">';
   $str_datos.='<tr>';
       $str_datos.='<th>Nombre</th>';
       $str_datos.='<th>Disponible</th>';
       $str_datos.='<th>Paciente</th>';
       $str_datos.='<th>Prioridad</th>';
       $str_datos.='<th>asignar</th>';
   $str_datos.='</tr>';
   $str_datos.= "<h3>Tabla de no disponibles porque están asignados<h3>";

   $sql = "SELECT * FROM Equipos WHERE Disponible = false and IdFormulario is null";
   $resultado = mysqli_query($con,$sql);
  
   while($fila = mysqli_fetch_array($resultado)) 
   {
       $sql_2 = "SELECT * FROM Pacientes WHERE Identificacion =".$fila['IdPaciente'];
       $resultado_2 = mysqli_query($con,$sql_2);
       $fila_2 = mysqli_fetch_array($resultado_2);

       $str_datos.='<tr>';
           $str_datos.= "<td>".$fila['NombreDeEquipo']."</td>";
           if( $fila['Disponible'] == 0)
           {
               $str_datos.= "<td>No</td>";
           }
           $str_datos.= "<td>".$fila_2['Nombre']."</td>";
           $str_datos.= "<td>".$fila_2['Prioridad']."</td>";
           $str_datos.= "<td><a href='../equipment/assignSpecialForAdmin.php?idPaciente=".$fila_2['Identificacion']."&idEquipo=".$fila['Numero']."&prioridad=".$fila_2['Prioridad']."'> cambiar asignacion </td>";
       $str_datos.= "</tr>";
   }
   $str_datos.= "</table>";
   
   $str_datos.="<a href='../equipment/newEquipment.html'> nuevo equipo</a><br><br>";
 
   $str_datos.="<a href='admin.php'> volver </a>";
   echo $str_datos;
   mysqli_close($con);
?>

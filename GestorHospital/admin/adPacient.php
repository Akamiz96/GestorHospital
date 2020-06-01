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
        $str_datos.='<th>Identificacion</th>';
        $str_datos.='<th>Nombre</th>';
        $str_datos.='<th>Prioridad</th>';
        $str_datos.='<th>Medico</th>';
        $str_datos.='<th>Habitacion</th>';
        $str_datos.='<th>Cama</th>';
        $str_datos.='<th>Recursos</th>';
        $str_datos.='<th>Equipos</th>';
   $str_datos.='</tr>';
   
   $str_datos.= "<h3>Tabla de equipos disponibles<h3>";

    $sql = "SELECT * FROM Pacientes";
    $respuesta = mysqli_query($con,$sql);

    while( $fila = mysqli_fetch_array($respuesta) )
    {
        $sql_1 = "SELECT h.Numero as id FROM Camas as c, Habitaciones as h WHERE c.Numero = ".$fila['IdCama']." and c.HabNumero = h.Numero";
        $respuesta_1 = mysqli_query($con,$sql_1);
        $fila_1 = mysqli_fetch_array($respuesta_1);

        $str_datos.='<tr>';
            $str_datos.= "<td>".$fila['Identificacion']."</td>";
            $str_datos.= "<td>".$fila['Nombre']."</td>";
            $str_datos.= "<td>".$fila['Prioridad']."</td>";
            $str_datos.= "<td>".$fila['NombreMedico']."</td>";
            $str_datos.= "<td>".$fila_1['id']."</td>";
            $str_datos.= "<td>".$fila['IdCama']."</td>";
            $str_datos.= "<td><a href='../pacient/listResource.php?idPaciente=".$fila['Identificacion']."&nombre=".$fila['Nombre']."'>ver recursos</td>";
            $str_datos.= "<td><a href='../pacient/listEquipment.php?idPaciente=".$fila['Identificacion']."&nombre=".$fila['Nombre']."'>ver equipos</td>";
       $str_datos.= "</tr>";
    }
    $str_datos.= "</table>";
 
   $str_datos.="<a href='admin.php'> volver </a>";
   echo $str_datos;
   mysqli_close($con);
?>
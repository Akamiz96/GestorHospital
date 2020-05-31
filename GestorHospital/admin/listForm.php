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
        $str_datos.='<th>IdFormulario</th>';
        $str_datos.='<th>NombreMedico</th>';
        $str_datos.='<th>NombrePaciente</th>';
        $str_datos.='<th>FechaDeSolicitud</th>';
        $str_datos.='<th>Responder</th>';
    $str_datos.='</tr>';
    
    $str_datos.= "<h3>Tabla de formularios para pedir recursos<h3>";

    $sql = "SELECT * FROM Formularios WHERE Tipo = 'Recursos' and Aprobado = false";
    $resultado = mysqli_query($con,$sql);
   
    while($fila = mysqli_fetch_array($resultado)) 
    {        
        $str_datos.='<tr>';
            $str_datos.= "<td>".$fila['Id']."</td>";
            $str_datos.= "<td>".$fila['NombreMedico']."</td>";
            $str_datos.= "<td>".$fila['NombrePaciente']."</td>";
            $str_datos.= "<td>".$fila['FechaYHoraDeSolicitud']."</td>";
            $str_datos.="<td><a href='../form/answerFormResource.php?idFormulario=".$fila['Id']."'> responder </a></td>";
        $str_datos.= "</tr>";
    }
    $str_datos.= "</table>";


    $str_datos.='<table border="1" style="width:100%">';
    $str_datos.='<tr>';
        $str_datos.='<th>IdFormulario</th>';
        $str_datos.='<th>NombreMedico</th>';
        $str_datos.='<th>NombrePaciente</th>';
        $str_datos.='<th>Prioridad</th>';
        $str_datos.='<th>FechaDeSolicitud</th>';
    $str_datos.='</tr>';
    
    $str_datos.= "<h3>Tabla de formularios para pedir equipos<h3>";

    $sql = "SELECT * FROM Formularios WHERE Tipo = 'Equipos' ORDER BY FechaYHoraDeSolicitud";
    $resultado = mysqli_query($con,$sql);
   
    while($fila = mysqli_fetch_array($resultado)) 
    {   
        $sql_1 = "SELECT * FROM Pacientes WHERE Identificacion = ".$fila['IdPaciente']." and Prioridad = 'alta' ";
        $resultado_1 = mysqli_query($con,$sql_1);    
        $fila_1 = mysqli_fetch_array($resultado_1);
        
        if($fila_1 != null)
        {
            $str_datos.='<tr>';
                $str_datos.= "<td>".$fila['Id']."</td>";
                $str_datos.= "<td>".$fila['NombreMedico']."</td>";
                $str_datos.= "<td>".$fila['NombrePaciente']."</td>";
                $str_datos.= "<td>".$fila_1['Prioridad']."</td>";
                $str_datos.= "<td>".$fila['FechaYHoraDeSolicitud']."</td>";
            $str_datos.= "</tr>";
        }
    }


    $resultado = mysqli_query($con,$sql);
    while($fila = mysqli_fetch_array($resultado)) 
    {   
        $sql_1 = "SELECT * FROM Pacientes WHERE Identificacion = ".$fila['IdPaciente']." and Prioridad = 'media' ";
        $resultado_1 = mysqli_query($con,$sql_1);    
        $fila_1 = mysqli_fetch_array($resultado_1);
        
        if($fila_1 != null)
        {
            $str_datos.='<tr>';
                $str_datos.= "<td>".$fila['Id']."</td>";
                $str_datos.= "<td>".$fila['NombreMedico']."</td>";
                $str_datos.= "<td>".$fila['NombrePaciente']."</td>";
                $str_datos.= "<td>".$fila_1['Prioridad']."</td>";
                $str_datos.= "<td>".$fila['FechaYHoraDeSolicitud']."</td>";
            $str_datos.= "</tr>";
        }
    }

    $resultado = mysqli_query($con,$sql);
    while($fila = mysqli_fetch_array($resultado)) 
    {   
        $sql_1 = "SELECT * FROM Pacientes WHERE Identificacion = ".$fila['IdPaciente']." and Prioridad = 'baja' ";
        $resultado_1 = mysqli_query($con,$sql_1);    
        $fila_1 = mysqli_fetch_array($resultado_1);
        
        if($fila_1 != null)
        {
            $str_datos.='<tr>';
                $str_datos.= "<td>".$fila['Id']."</td>";
                $str_datos.= "<td>".$fila['NombreMedico']."</td>";
                $str_datos.= "<td>".$fila['NombrePaciente']."</td>";
                $str_datos.= "<td>".$fila_1['Prioridad']."</td>";
                $str_datos.= "<td>".$fila['FechaYHoraDeSolicitud']."</td>";
            $str_datos.= "</tr>";
        }
    }

    $str_datos.= "</table>";

    $str_datos.="<a href='admin.php'> volver </a>";
    echo $str_datos;
    mysqli_close($con);
?>
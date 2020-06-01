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
        $str_datos.='<th>Comprar</th>';
    $str_datos.='</tr>';
    
    $str_datos.= "<h3>Tabla de recursos disponibles<h3>";

    $sql = "SELECT * FROM Recursos WHERE Disponible = true GROUP BY NombreDeRecurso";
    $resultado = mysqli_query($con,$sql);
   
    while($fila = mysqli_fetch_array($resultado)) 
    {
        $sql_1 = "SELECT count(NombreDeRecurso), NombreDeRecurso FROM Recursos WHERE Disponible = true and NombreDeRecurso ='".$fila['NombreDeRecurso']."'";
        $resultado_1 = mysqli_query($con,$sql_1);
        $numeroDeRecusos = mysqli_fetch_row($resultado_1);
        
        $str_datos.='<tr>';
            $str_datos.= "<td>".$fila['NombreDeRecurso']."</td>";
            $str_datos.= "<td>".$numeroDeRecusos[0]."</td>";
            if( $fila['Disponible'] == 1)
            {
                $str_datos.= "<td>Sí</td>";
            }
            $str_datos.= "<td><a href='../resource/buy.php?nombre=".$fila['NombreDeRecurso']."'> comprar ".$fila['NombreDeRecurso']."</td>";
        $str_datos.= "</tr>";
    }
    $str_datos.= "</table>";



    $str_datos.='<table border="1" style="width:100%">';
    $str_datos.='<tr>';
        $str_datos.='<th>Nombre</th>';
        $str_datos.='<th>Cantidad</th>';
        $str_datos.='<th>Disponible</th>';
        $str_datos.='<th>Comprar</th>';
    $str_datos.='</tr>';
    $str_datos.= "<h3>Tabla de no disponibles porque están en espera de ser asignados o agotados<h3>";

    $sql = "SELECT * FROM Recursos WHERE Disponible = false and IdPaciente is null GROUP BY NombreDeRecurso";
    $resultado = mysqli_query($con,$sql);
   
    while($fila = mysqli_fetch_array($resultado)) 
    {
        $sql_1 = "SELECT count(NombreDeRecurso), NombreDeRecurso FROM Recursos WHERE Disponible = false and IdPaciente is null and NombreDeRecurso ='".$fila['NombreDeRecurso']."'";
        $resultado_1 = mysqli_query($con,$sql_1);
        $numeroDeRecusos = mysqli_fetch_row($resultado_1);
        $fila_1 = mysqli_fetch_array($resultado_1);

        $str_datos.='<tr>';
            $str_datos.= "<td>".$fila['NombreDeRecurso']."</td>";
            $str_datos.= "<td>".$numeroDeRecusos[0]."</td>";
            if( $fila['Disponible'] == 0)
            {
                $str_datos.= "<td>No</td>";
            }
            $str_datos.= "<td><a href='../resource/buy.php?nombre=".$fila['NombreDeRecurso']."'> comprar ".$fila['NombreDeRecurso']."</td>";
        $str_datos.= "</tr>";
    }
    $str_datos.= "</table>";
    
    $str_datos.="<a href='../resource/newResource.html'> nuevo recurso</a><br><br>";
    $str_datos.="<a href='admin.php'> volver </a>";
    echo $str_datos;
    mysqli_close($con);
?>

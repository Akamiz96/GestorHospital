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
        $str_datos.='<th>Comprar</th>';
    $str_datos.='</tr>';
    
    $sql = "SELECT * FROM Recursos GROUP BY NombreDeRecurso";
    $resultado = mysqli_query($con,$sql);
   
    
    while($fila = mysqli_fetch_array($resultado)) 
    {
        $sql_1 = "SELECT count(NombreDeRecurso) FROM Recursos WHERE NombreDeRecurso ='".$fila['NombreDeRecurso']."'";
        $resultado_1 = mysqli_query($con,$sql_1);
        $numeroDeRecusos = mysqli_fetch_row($resultado_1);
        
        $str_datos.='<tr>';
            $str_datos.= "<td>".$fila['NombreDeRecurso']."</td>";
            $str_datos.= "<td>".$numeroDeRecusos[0]."</td>";
            $str_datos.= "<td><a href='../resource/buy.php?nombre=".$fila['NombreDeRecurso']."'> comprar ".$fila['NombreDeRecurso']."</td>";
        $str_datos.= "</tr>";
    }
    $str_datos.= "</table>";
    
    $str_datos.="<a href='../resource/newResource.html'> nuevo recurso</a>";
    echo $str_datos;
    mysqli_close($con);
?>

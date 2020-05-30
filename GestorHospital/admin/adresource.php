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
    
    $sql = "SELECT * FROM Recursos Order by Cantidad asc";
    $resultado = mysqli_query($con,$sql);
    
    while($fila = mysqli_fetch_array($resultado)) 
    {
        $str_datos.='<tr>';
            $str_datos.= "<td>".$fila['NombreDeRecurso']."</td>";
            $str_datos.= "<td>".$fila['Cantidad']."</td>";
            $str_datos.= "<td><a href='../resource/buy.php?id=".$fila['Numero']."'>".$fila['NombreDeRecurso']."</td>";
        $str_datos.= "</tr>";
    }
    $str_datos.= "</table>";
    
    $str_datos.="<a href='../resource/newResource.html'> nuevo recurso</a>";
    echo $str_datos;
    mysqli_close($con);
?>

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
        $str_datos.='<th>Disponible</th>';
        $str_datos.='<th>Editar asignacion</th>';
    $str_datos.='</tr>';
    
    $sql = "SELECT * FROM Equipos";
    $resultado = mysqli_query($con,$sql);
    
    while($fila = mysqli_fetch_array($resultado)) 
    {
        $str_datos.='<tr>';
            $str_datos.= "<td>".$fila['NombreDeEquipo']."</td>";
            $str_datos.= "<td>".$fila['Disponible']."</td>";
            $str_datos.= "<td><a href='../equipment/buy.php?id=".$fila['Numero']."'>Editar asignacion</td>";
        $str_datos.= "</tr>";
    }
    $str_datos.= "</table>";
    
    $str_datos.="<a href='../equipment/newEquipment.html'> nuevo equipo</a>";
    echo $str_datos;
    mysqli_close($con);
?>

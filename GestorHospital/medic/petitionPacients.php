
<?php
    $idMedico = $_GET['idMed'];
    $str_datos = "";
    $str_datos.="<h1>Pacientes del ".$idMedico."</h1>";


    include_once dirname(__FILE__) . '/../config/config.php';
    include_once dirname(__FILE__) . '/sqlqueries/pacients.php';
    
   
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (mysqli_connect_errno()) 
    {
        $str_datos.= "Error en la conexión: " . mysqli_connect_error();
    }

    $str_datos.='<table border="1" style="width:100%">';
    $str_datos.='<tr>';
        $str_datos.='<th>Identificacion</th>';
        $str_datos.='<th>Nombre</th>';
        $str_datos.='<th>Apellido</th>';
        $str_datos.='<th>asignar equipo </th>';
        $str_datos.='<th>asignar recurso </th>';
    $str_datos.='</tr>';
    
    $sql = 'SELECT * FROM PACIENTES';
    $resultado = mysqli_query($con,$sql);

    while($fila = mysqli_fetch_array($resultado)) 
    {
        if( $fila['NombreMedico'] == $idMedico)
        {
            $str_datos.='<tr>';
                $str_datos.= "<td>".$fila['Identificacion']."</td>";
                $str_datos.= "<td>".$fila['Nombre']."</td>";
                $str_datos.= "<td>".$fila['Apellido']."</td>";
                $str_datos.= "<td><a href='../form/formEquipment.php?idPaciente=".$fila['Identificacion']."&nombrePaciente=".$fila['Nombre']."&nombreMedico=".$idMedico."'>Asignar equipo</td>";
                $str_datos.= "<td><a href='../form/formResource.php?idPaciente=".$fila['Identificacion']."&nombrePaciente=".$fila['Nombre']."&nombreMedico=".$idMedico."'>Asignar recurso</td>";

            $str_datos.= "</tr>";
        }
    }
    $str_datos.= "</table>";
    
    $str_datos.="<a href='medic.php'> volver </a><br><br>";
    
    echo $str_datos;
    mysqli_close($con);
?>
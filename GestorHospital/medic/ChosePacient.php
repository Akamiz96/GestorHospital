<h1>Pacientes en espera de ser atendidos</h1>

<?php
    include_once dirname(__FILE__) . '/../config/config.php';
    include_once dirname(__FILE__) . '/sqlqueries/pacients.php';
    $str_datos = "";
   
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (mysqli_connect_errno()) 
    {
        $str_datos.= "Error en la conexión: " . mysqli_connect_error();
    }

    $idCama = $_GET['bed'];
    $idMedico = $_GET['idMedico2'];

    $str_datos.='<table border="1" style="width:100%">';
    $str_datos.='<tr>';
        $str_datos.='<th>Identificacion</th>';
        $str_datos.='<th>Nombre</th>';
        $str_datos.='<th>Apellido</th>';
        $str_datos.='<th>asignar cama</th>';
    $str_datos.='</tr>';
    
    $sql = 'SELECT * FROM PACIENTES';
    $resultado = mysqli_query($con,$sql);

    while($fila = mysqli_fetch_array($resultado)) 
    {
        if( $fila['Prioridad'] == null )
        {
            $str_datos.='<tr>';
                $str_datos.= "<td>".$fila['Identificacion']."</td>";
                $str_datos.= "<td>".$fila['Nombre']."</td>";
                $str_datos.= "<td>".$fila['Apellido']."</td>";
                $str_datos.= "<td><a href='infobed.php?bed=".$_GET['bed']."&id=".$fila['Identificacion']."&nombre=".$fila['Nombre']."&apellido=".$fila['Apellido']."&idMedico3=".$idMedico."'>Asignar paciente a la cama ".$_GET['bed']."</td>";
            $str_datos.= "</tr>";
        }
    }
    $str_datos.= "</table>";
    
    $str_datos.="<a href='medic.php'> volver </a><br><br>";
    $str_datos.= "<td><a href='infobed.php?bed=".$_GET['bed']."&idMedico3=".$idMedico."'> Crear un nuevo paciente para la cama ".$_GET['bed']."</td>";

    echo $str_datos;
    mysqli_close($con);
?>
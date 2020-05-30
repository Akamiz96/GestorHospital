<h1>Lista de camas disponibles</h1>

<?php
    include_once dirname(__FILE__) . '/../config/config.php';
    $str_datos = "";
   
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (mysqli_connect_errno()) 
    {
        $str_datos.= "Error en la conexión: " . mysqli_connect_error();
    }

    $idHabitacion = $_GET['idHab'];
    $idMedico = $_GET['idMedico'];

    $str_datos.='<table border="1" style="width:100%">';
    $str_datos.='<tr>';
        $str_datos.='<th>Numero de cama</th>';
        $str_datos.='<th>Disponible</th>';
        $str_datos.='<th>Asignar</th>';
    $str_datos.='</tr>';
    
    $sql = "SELECT * FROM Camas";
    $resultado = mysqli_query($con,$sql);
    
    while($fila = mysqli_fetch_array($resultado)) 
    {
        if($idHabitacion == $fila['HabNumero'])
        {
            $str_datos.='<tr>';
                $str_datos.= "<td>".$fila['Numero']."</td>";
                if($fila['Disponible'] == 1)
                {
                    $str_datos.= "<td>Sí</td>";
                }
                else
                {
                    $str_datos.= "<td>No</td>";
                }
                $str_datos.= "<td><a href='ChosePacient.php?bed=".$fila['Numero']."&idMedico2=".$idMedico."'>Asignar paciente a la cama ".$fila['Numero']."</td>";
            $str_datos.= "</tr>";
        }
    }
    $str_datos.= "</table>";
    
    $str_datos.="<a href='medic.php'> volver </a>";
    echo $str_datos;
    mysqli_close($con);
?>
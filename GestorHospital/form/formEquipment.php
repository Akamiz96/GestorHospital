<?php
    $str_pantalla = "";
    $str_pantalla.="<h1>Formulario para asignar equipos</h1>";

    include_once dirname(__FILE__) . '/../config/config.php';
    
   
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (mysqli_connect_errno()) 
    {
        $str_datos.= "Error en la conexión: " . mysqli_connect_error();
    }

    if(isset($_GET['idPaciente']) == 1 && isset($_GET['nombrePaciente']) == 1 && isset($_GET['nombreMedico']) == 1)
    {
        $idPaciente = $_GET['idPaciente'];
        $nombrePaciente = $_GET['nombrePaciente'];
        $nombreMedico = $_GET['nombreMedico'];

        $str_pantalla.='<form action="infobed.php method="post">';

        $str_pantalla.='<input type="hidden" name="idPaciente" id="idPaciente" value="'.$_GET['idPaciente'].'" autocomplete="off"><br>';

        $str_pantalla.='<h3>Nombre del paciente</h3>';
        $str_pantalla.='<input type="text" name="nombrePaciente" id="nombrePaciente" value="'.$_GET['nombrePaciente'].'" autocomplete="off"><br>';

        $str_pantalla.='<h3>Nombre del medico</h3>';
        $str_pantalla.='<input type="text" name="nombreMedico" id="nombreMedico" value="'.$_GET['nombreMedico'].'" autocomplete="off"><br>';      
        
        $hoy = getdate();
        $hora = ($hoy['hours']+17).":".$hoy['minutes'].":".$hoy['seconds'];
        $fecha = ($hoy['year'])."-".$hoy['mon']."-".($hoy['mday']-1)." ".($hoy['hours']+17).":".$hoy['minutes'].":".$hoy['seconds'];
        
        $fecha = date("Y-m-d H:i:s", strtotime($fecha)); PDO::PARAM_STR;

        $str_pantalla.='<input type="hidden" name="fecha" id="fecha" value="'.$fecha.'" autocomplete="off"><br>'; 
        
        $str_pantalla.='<h3>fecha y hora</h3>';
        $str_pantalla.='<input type="text" name="hora" id="hora" value="'.$fecha.'" autocomplete="off"><br>';
        
        
        $sql = "SELECT * FROM Equipos GROUP BY NombreDeEquipo";
        $resultado = mysqli_query($con,$sql);
        $numeroDeOpciones = mysqli_num_rows($resultado);
    
        $str_pantalla.='<h3>¿Cuantos equipos va a seleccionar?</h3>';
        $str_pantalla.='<select name="cantidadOpciones" id="cantidadOpciones">';
            $num = 0;
            while($num <= $numeroDeOpciones)
            {
                $num++;
                $str_pantalla.='<option value="'.$num.'">'.$num.'</option>';
            }
        $str_pantalla.='</select>';

        while($fila = mysqli_fetch_array($resultado)) 
        {
            $sql_1 = "SELECT count(NombreDeEquipo) FROM Equipos WHERE DISPONIBLE = true and NombreDeEquipo ='".$fila['NombreDeEquipo']."'";
            $resultado_1 = mysqli_query($con,$sql_1);
            $numeroDeRecusos = mysqli_fetch_row($resultado_1);           
        }
    }
   
    $str_pantalla.="<a href='../medic/medic.php'> volver </a><br><br>";
    
    echo $str_pantalla;
    mysqli_close($con);
?>
<?php
    $str_pantalla = "";
    $str_pantalla.="<h1>Formulario para asignar recursos</h1>";

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

        $str_pantalla.='<form action="sendFormResourceToAdmin.php" method="post">';

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
        
        
        $sql = "SELECT * FROM Recursos GROUP BY NombreDeRecurso";
        $resultado = mysqli_query($con,$sql);
        $numeroDeOpciones = mysqli_num_rows($resultado);
    
        $str_pantalla.='<input type="hidden" name="numeroDeOpciones" id="numeroDeOpciones" value="'.$numeroDeOpciones.'" autocomplete="off"><br>';

        $str_pantalla.='<h3>Seleccione los recursos que quiere asignar</h3>';
        $n = 0;  
        $aux = '"';  
        while($fila = mysqli_fetch_array($resultado)) 
        {
            $sql_1 = "SELECT count(NombreDeRecurso) FROM Recursos WHERE Disponible = true and NombreDeRecurso ='".$fila['NombreDeRecurso']."'";
            $resultado_1 = mysqli_query($con,$sql_1);
            $numeroDeRecusos = mysqli_fetch_row($resultado_1);

            $n++;
            $str_pantalla.= $fila['NombreDeRecurso'].": <input type='checkbox' id='opcion".$n."' name='opcion".$n."' value='".$fila['NombreDeRecurso']."' onchange='javascript:showContent(".$aux."opcion".$n."".$aux.", ".$aux."opcionPara".$n."".$aux.")'/>    ";           
            
            $str_pantalla.='<div id="opcionPara'.$n.'" style="display: none;">';
            $str_pantalla.='Cantidad disponible de '.$fila['NombreDeRecurso'].', seleccione la cantidad que necesite: ';
            
            $str_pantalla.='<select name="'."select".$n.'" id="prioridad">';
            $cantidadDeRecursoDisponible = 0;
            while($cantidadDeRecursoDisponible < $numeroDeRecusos[0])
            {
                $cantidadDeRecursoDisponible++;
                $str_pantalla.='<option value="'.$cantidadDeRecursoDisponible.'">'.$cantidadDeRecursoDisponible.'</option>';
            }
            $str_pantalla.='</select>';

            $str_pantalla.='</div>';
            $str_pantalla.='<br>';
        }

        $str_pantalla.='<input type="submit" value="Enviar">';
        $str_pantalla.='</form>';

        $str_pantalla.='<script type="text/javascript">';
        $str_pantalla.='function showContent(idChek, idElementoAMostrar)'; 
        $str_pantalla.='{';
        $str_pantalla.='element = document.getElementById(idElementoAMostrar);';
        $str_pantalla.='check = document.getElementById(idChek);';
        $str_pantalla.='if (check.checked) {';
        $str_pantalla.='element.style.display="block";';
        $str_pantalla.= '}else {  element.style.display="none";}}';
        $str_pantalla.='</script>';
    }

    $str_pantalla.="<a href='../medic/medic.php'> volver </a><br><br>";
    
    echo $str_pantalla;
    mysqli_close($con);
?>
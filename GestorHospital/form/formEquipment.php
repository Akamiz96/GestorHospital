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
        
        $sql = "SELECT * FROM Formularios WHERE IdPaciente = ".$idPaciente." and Tipo = 'Equipos' ";
        $resultado = mysqli_query($con,$sql);
        $numeroDeFormulariosParaElPaciente = mysqli_num_rows($resultado);
        $numeroDeEquiposEnProceso = 0;
        $numeroDeEquiposEnProcesoFinal = 0;

        if($numeroDeFormulariosParaElPaciente > 0)
        {
            while($fila = mysqli_fetch_array($resultado)) 
            {
                $sql_1 = "SELECT * FROM Equipos WHERE IdFormulario = ".$fila['Id']."";
                $resultado_1 = mysqli_query($con,$sql_1);
                $numeroDeEquiposEnProceso = mysqli_num_rows($resultado_1);
                $numeroDeEquiposEnProcesoFinal = $numeroDeEquiposEnProcesoFinal + $numeroDeEquiposEnProceso;
            }
        }

        echo "numero de equipos que estan en formularios: ".$numeroDeEquiposEnProcesoFinal."<br>";

        $sql = "SELECT * FROM Equipos WHERE IdPaciente = ".$idPaciente."";
        $resultado = mysqli_query($con,$sql);
        $numeroDeEquiposYaAsignadosAlPaciente = mysqli_num_rows($resultado);

        $numeroDeEquiposEnProcesoFinal = $numeroDeEquiposEnProcesoFinal + $numeroDeEquiposYaAsignadosAlPaciente;

        $sql = "SELECT * FROM Pacientes WHERE Identificacion = ".$idPaciente;
        $resultado = mysqli_query($con,$sql);
        $finalUnica = mysqli_fetch_array($resultado);
        $numeroDeEquiposPermitidos = 0;

        if($finalUnica['Prioridad'] == "alta")
        {
            $numeroDeEquiposPermitidos = 3;
        }
        else if($finalUnica['Prioridad'] == "media")
        {
            $numeroDeEquiposPermitidos = 2;
        }
        else if($finalUnica['Prioridad'] == "baja")
        {
            $numeroDeEquiposPermitidos = 1;
        }

        if($numeroDeEquiposEnProcesoFinal < $numeroDeEquiposPermitidos)
        {
            $str_pantalla.="Se pueden agregar ".($numeroDeEquiposPermitidos-$numeroDeEquiposEnProcesoFinal)." equipos<br>";
            $str_pantalla.='<form action="sendFormEquipmentToAdmin.php" method="post">';

            $str_pantalla.='<input type="hidden" name="limiteDeEquipos" id="limiteDeEquipos" value='.($numeroDeEquiposPermitidos-$numeroDeEquiposEnProcesoFinal).' autocomplete="off"><br>';

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
        
            $str_pantalla.='<input type="hidden" name="numeroDeOpciones" id="numeroDeOpciones" value="'.$numeroDeOpciones.'" autocomplete="off"><br>';

            $str_pantalla.='<h3>Seleccione los recursos que quiere asignar</h3>';
            $n = 0;  
            $aux = '"';  
            while($fila = mysqli_fetch_array($resultado)) 
            {
                $sql_1 = "SELECT count(NombreDeEquipo) FROM Equipos WHERE Disponible = true and NombreDeEquipo ='".$fila['NombreDeEquipo']."'";
                $resultado_1 = mysqli_query($con,$sql_1);
                $numeroDeEquipos = mysqli_fetch_row($resultado_1);

                $n++;
                $str_pantalla.= $fila['NombreDeEquipo'].": <input type='checkbox' id='opcion".$n."' name='opcion".$n."' value='".$fila['NombreDeEquipo']."' onchange='javascript:showContent(".$aux."opcion".$n."".$aux.", ".$aux."opcionPara".$n."".$aux.")'/>    ";           
                
                $str_pantalla.='<div id="opcionPara'.$n.'" style="display: none;">';
                $str_pantalla.='Cantidad disponible de '.$fila['NombreDeEquipo'].', seleccione la cantidad que necesite: ';
                
                $str_pantalla.='<select name="'."select".$n.'" id="prioridad">';
                $cantidadDeEquiposDisponible = 0;
                while($cantidadDeEquiposDisponible < $numeroDeEquipos[0])
                {
                    $cantidadDeEquiposDisponible++;
                    $str_pantalla.='<option value="'.$cantidadDeEquiposDisponible.'">'.$cantidadDeEquiposDisponible.'</option>';
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
        else
        {
            $str_pantalla.="No se puede agregar otro equipo<br>";
        }
    }

    $str_pantalla.="<a href='../medic/medic.php'> volver </a><br><br>";
    
    echo $str_pantalla;
    mysqli_close($con);
?>
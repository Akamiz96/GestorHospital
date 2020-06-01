<?php
   include_once dirname(__FILE__) . '/../config/config.php';
   $str_datos = "";
  
   $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
   if (mysqli_connect_errno()) 
   {
       $str_datos.= "Error en la conexión: " . mysqli_connect_error();
   }
   
   $str_datos.= "<h3>Special<h3>";

   if(isset($_GET['idPaciente']) && isset($_GET['idEquipo']) && isset($_GET['prioridad']))
   {
        $nivelDePrioridad = 0;

        if($_GET['prioridad'] == 'alta')
        {
            $nivelDePrioridad = 3;
        }
        else if($_GET['prioridad'] == 'media')
        {
            $nivelDePrioridad = 2;
        }
        else if($_GET['prioridad'] == 'baja')
        {
            $nivelDePrioridad = 1;
        }

        $str_datos.='<table border="1" style="width:100%">';
        $str_datos.='<tr>';
            $str_datos.='<th>Nombre</th>';
            $str_datos.='<th>Prioridad</th>';
            $str_datos.='<th>asignar</th>';
        $str_datos.='</tr>';
        $str_datos.= "<h3>Tabla de pacientes con prioridad mayor o igual<h3>";

        $sql =  "SELECT * FROM Pacientes WHERE Identificacion != ".$_GET['idPaciente'];
        $respuesta = mysqli_query($con,$sql);
        $nivelDePrioridadContrincante = 0;

        while($fila = mysqli_fetch_array($respuesta))
        {
            if($fila['Prioridad'] == 'alta')
            {
                $nivelDePrioridadContrincante = 3;
            }
            else if($fila['Prioridad'] == 'media')
            {
                $nivelDePrioridadContrincante = 2;
            }
            else if($fila['Prioridad'] == 'baja')
            {
                $nivelDePrioridadContrincante = 1;
            }

            if($nivelDePrioridadContrincante >= $nivelDePrioridad)
            {
                $sql_1 = "SELECT * FROM Equipos WHERE IdPaciente =".$fila['Identificacion'];
                $respuesta_1 = mysqli_query($con,$sql_1);
                $cantidadDeEqiposAsignados = mysqli_num_rows($respuesta_1);

                //echo "el paciente ".$fila['Nombre']." tiene ".$cantidadDeEqiposAsignados." equipos asignados.<br>";

                $sql_2 = "SELECT e.NombreDeEquipo as nombre FROM Formularios as f, Equipos as e WHERE e.IdFormulario = f.Id and f.IdPaciente = ".$fila['Identificacion'];
                $respuesta_2 = mysqli_query($con,$sql_2);
                $cantidadDeEqiposEnFormularios = mysqli_num_rows($respuesta_2);

                //echo "el paciente ".$fila['Nombre']." tiene ".$cantidadDeEqiposEnFormularios." equipos en formularios. ";

                $limitePermitido = $cantidadDeEqiposAsignados + $cantidadDeEqiposEnFormularios;

                //echo "limite: ".$limitePermitido." prioridad: ".$nivelDePrioridadContrincante."<br><br>";

                if($limitePermitido < $nivelDePrioridadContrincante)
                {
                    $str_datos.='<tr>';
                        $str_datos.= "<td>".$fila['Nombre']."</td>";
                        $str_datos.= "<td>".$fila['Prioridad']."</td>";
                        $str_datos.= '  <td>
                                            <form action="assignSpecialForAdmin.php" method="post">
                                            <input type="hidden" name="idEquipo"  value="'.$_GET['idEquipo'].'">
                                            <input type="hidden" name="idPaciente"  value="'.$fila['Identificacion'].'">
                                            <input type="submit" value="asignar equipo">
                                            </form>
                                        </td>';
                    $str_datos.= "</tr>";
                }
            }
        }
   }
  
   $str_datos.="<a href='../admin/adEquipment.php'> volver </a>";
   echo $str_datos;
   mysqli_close($con);
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        include_once dirname(__FILE__) . '/../config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            if(isset($_POST['idEquipo']) && isset($_POST['idPaciente']))
            {
                $sql = "UPDATE Equipos 
                        SET IdPaciente = ".$_POST['idPaciente'];
                $sql.=" WHERE Numero = ".$_POST['idEquipo'];

                if(mysqli_query($con,$sql))
                {
                    echo "Se ha pasado el equipo al paciente: ".$_POST['idPaciente']."<br>";
                }
                else
                {
                    echo "Error pasando el equipo al paciente: ".mysqli_error($con)."<br>";
                }
            }
            mysqli_close($con);
        }
    }
?>
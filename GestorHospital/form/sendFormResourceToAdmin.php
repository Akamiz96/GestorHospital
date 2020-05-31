<?php
include_once dirname(__FILE__) . '/../config/config.php';
   
$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
if (mysqli_connect_errno()) 
{
    $str_datos.= "Error en la conexión: " . mysqli_connect_error();
}
    $str_pantalla = "";
    $str_pantalla.="<h1>Envio de formulario al administrador</h1>";

    $nombreMedico = $_POST['nombreMedico'];
    echo $nombreMedico."<br>";

    $nombrePaciente = $_POST['nombrePaciente'];
    echo $nombrePaciente."<br>";

    $idPaciente = $_POST['idPaciente'];
    echo $idPaciente."<br>";

    $fecha = $_POST['fecha'];
    echo $fecha."<br>";

    $numeroDeOpciones = $_POST['numeroDeOpciones'];
    echo $numeroDeOpciones."<br>";

    $sql = "SELECT * FROM Formularios";
    $resultado = mysqli_query($con,$sql);
    $idDelProximoFormulario = mysqli_num_rows($resultado)+1;

    $n = 0;
    while($n < $numeroDeOpciones)
    {
        $n++;
        if(isset($_POST['opcion'.$n]))
        {
            $recursosSolicitados = 0;
            $sql = "SELECT * FROM Recursos WhERE NombreDeRecurso = '".$_POST['opcion'.$n]."'";
            $resultado = mysqli_query($con,$sql);

            while($fila = mysqli_fetch_array($resultado)) 
            {
                if($recursosSolicitados < $_POST['select'.$n])
                {
                    $sql = "UPDATE Recursos 
                            SET Disponible = false,
                                IdFormulario = ".$idDelProximoFormulario."
                            WhERE Numero = '".$fila['Numero']."'";

                    if(mysqli_query($con,$sql))
                    {
                        echo "Se ha actualizado la tupla";
                    }
                    else
                    {
                        echo "Error actualizado la tupla";
                    }

                }
                $recursosSolicitados++;
            }
        }
    }

    $sqlInsert = 'INSERT INTO Formularios (IdPaciente, NombrePaciente, NombreMedico, FechaYHoraDeSolicitud, Aprobado)'; 
    $sqlInsert.= "VALUES ( '".$idPaciente."', '".$nombrePaciente."' , '".$nombreMedico."', CAST('".$fecha."' AS DATETIME), false)";
    
    if (mysqli_query($con, $sqlInsert)) 
    {
        echo "<br><div class=\"result_query success_text\"> Inserción de formulario correcta. </div>";
    } 
    else 
    {
        echo "<br><div class=\"result_query error_text\"> Error en la inserción de formulario en la tabla formularios: " . mysqli_error($con) . "</div>";
    }

    $str_pantalla.="<a href='../medic/medic.php'> volver </a><br><br>";
    
    echo $str_pantalla;
    mysqli_close($con);
?>
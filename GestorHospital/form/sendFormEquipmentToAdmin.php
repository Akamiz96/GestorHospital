<?php
    include_once dirname(__FILE__) . '/../config/config.php';
   
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (mysqli_connect_errno()) 
    {
        $str_datos.= "Error en la conexión: " . mysqli_connect_error();
    }

    $str_pantalla = "";
    $str_pantalla.="<h1>Envio de formulario de equipos al administrador</h1>";

    $nombreMedico = $_POST['nombreMedico'];
 

    $nombrePaciente = $_POST['nombrePaciente'];
    

    $idPaciente = $_POST['idPaciente'];
    

    $fecha = $_POST['fecha'];

    $numeroDeOpciones = $_POST['numeroDeOpciones'];

    $limiteDeEquipos = $_POST['limiteDeEquipos'];

    $sql = "SELECT * FROM Formularios";
    $resultado = mysqli_query($con,$sql);
    $idDelProximoFormulario = mysqli_num_rows($resultado)+1;

    $totalDeEquiposPedidos = 0;

    $n = 0;
    while($n < $numeroDeOpciones)
    {
        $n++;
        if(isset($_POST['opcion'.$n]))
        {
            $totalDeEquiposPedidos = $totalDeEquiposPedidos + $_POST['select'.$n];
        }
    }

    if($totalDeEquiposPedidos <= $limiteDeEquipos)
    {
        $n = 0;
        while($n < $numeroDeOpciones)
        {
            $n++;
            if(isset($_POST['opcion'.$n]))
            {
                $recursosSolicitados = 0;
                $sql = "SELECT * FROM Equipos WhERE Disponible = true and NombreDeEquipo = '".$_POST['opcion'.$n]."'";
                $resultado = mysqli_query($con,$sql);

                while($fila = mysqli_fetch_array($resultado)) 
                {
                    if($recursosSolicitados < $_POST['select'.$n])
                    {
                        $sql = "UPDATE Equipos 
                                SET Disponible = false,
                                    IdFormulario = ".$idDelProximoFormulario."
                                WhERE Numero = '".$fila['Numero']."'";

                        if(mysqli_query($con,$sql))
                        {
                            echo "Se ha actualizado la tupla<br>";
                        }
                        else
                        {
                            echo "Error actualizado la tupla<br>";
                        }
                    }
                    $recursosSolicitados++;
                }
            }
        }
        
        $sqlInsert = 'INSERT INTO Formularios (IdPaciente, NombrePaciente, NombreMedico, FechaYHoraDeSolicitud, Tipo, Aprobado)'; 
        $sqlInsert.= "VALUES ( '".$idPaciente."', '".$nombrePaciente."' , '".$nombreMedico."', CAST('".$fecha."' AS DATETIME),"."'Equipos'".", false)";
        
        if (mysqli_query($con, $sqlInsert)) 
        {
            echo "<br><div class=\"result_query success_text\"> Inserción de formulario correcta. </div>";
        } 
        else 
        {
            echo "<br><div class=\"result_query error_text\"> Error en la inserción de formulario en la tabla formularios: " . mysqli_error($con) . "</div>";
        }
    }
    else
    {
        $str_pantalla.="Al parecer el formulario no es valido, el limite de equipos es ".$limiteDeEquipos.", pero ingresaron ".$totalDeEquiposPedidos."<br>";
    }
    $str_pantalla.="<a href='../medic/medic.php'> volver </a><br><br>";
    
    echo $str_pantalla;
    mysqli_close($con);
?>
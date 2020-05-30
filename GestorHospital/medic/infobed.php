<?php

    include_once dirname(__FILE__) . '/../config/config.php';
    include_once dirname(__FILE__) . '/../model/pacient.php';
    include_once dirname(__FILE__) . '/../model/pacientXcama.php';
    include_once dirname(__FILE__) . '/sqlqueries/pacients.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (isset($_POST["cama"]) && isset($_POST["identificacion"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["diagnostico"]) && isset($_POST["prioridad"]) && isset($_POST["ingreso"]) && isset($_POST["dias"])) 
        {
            include_once dirname(__FILE__) . '/../config/config.php';
            $str_datos = "";
           
            $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
            if (mysqli_connect_errno()) 
            {
                $str_datos.= "Error en la conexión: " . mysqli_connect_error();
            }
        
            $sql = "SELECT * FROM Pacientes";
            $resultado = mysqli_query($con,$sql);
            $actualizo = false;
            
            while($fila = mysqli_fetch_array($resultado)) 
            {
                if($_POST['identificacion'] == $fila['Identificacion'])
                {
                    $sql = "";
                    $sql.="UPDATE Pacientes SET ";
                    $sql.= "Prioridad = '".$_POST['prioridad']."',";
                    $sql.= "Diagnostico = '".$_POST['diagnostico']."',";
                    $sql.= "IdCama = ".$_POST['cama'].",";
                    $sql.= "FechaDeIngreso = CAST('".$_POST['ingreso']."' AS DATETIME),";
                    $sql.= "DuracionEnDias = ".$_POST['dias']." ";                         
                    $sql.=" WHERE Identificacion = ".$_POST['identificacion'];
            
                    if(mysqli_query($con,$sql))
                    {
                        $actualizo = true;
                        echo "Se ha actualizado el paciente: ".$_POST['nombre']."<br>";
                    }
                    else
                    {
                        echo "Error actualizado al paciente: ".mysqli_error($con)."<br>";
                    }
                }
            }

            if($actualizo === false)
            {
                $sql = "";
                $sql.="UPDATE Pacientes SET ";
                $sql.= "Prioridad = '".$_POST['prioridad']."',";
                $sql.= "Diagnostico = '".$_POST['diagnostico']."',";
                $sql.= "FechaDeIngreso = CAST('".$_POST['ingreso']."' AS DATETIME),";
                $sql.= "DuracionEnDias = ".$_POST['dias']." ";                         
                $sql.=" WHERE Identificacion = ".$_POST['identificacion'];
        
                $sql = "INSERT INTO Pacientes (Identificacion, Nombre, Apellido, Prioridad, Diagnostico, FechaDeIngreso, DuracionEnDias, IdCama, NombreMedico)"; 
                $sql.=" VALUES ( ".$_POST['identificacion']." ,'".$_POST['nombre']."', '".$_POST['apellido']."' , '".$_POST['prioridad']."', '".$_POST['diagnostico']."', CAST('".$_POST['ingreso']."' AS DATETIME), ".$_POST['dias'].", ".$_POST['cama'].", null )";
                
                if (mysqli_query($con, $sql)) 
                {
                    echo "<br><div class=\"result_query success_text\"> Inserción de paciente ".$_POST['identificacion']." correcta. </div>";
                } 
                else 
                {
                    echo "<br><div class=\"result_query error_text\"> Error en la inserción de paciente ".$_POST['identificacion']." en la tabla Pacientes: " . mysqli_error($con) . "</div>";
                } 
            }

    
            echo $str_datos;
            mysqli_close($con);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information of bed</title>
</head>

<body>

    <?php

    if (isset($_GET['bed'])) 
    {
        echo '<h1>Información del paciente que ocupará la cama ' . $_GET['bed'] . ' </h1>';
    } 
    else 
    {
        echo '<h1>Información del paciente que ocupará la cama</h1>';
    }
    ?>
    <?php
        echo '<form action="infobed.php?bed='. $_GET["bed"] .'"method="post">';
    ?>
        <a href="medic.php">Regresar</a>
    <?php
        $srt_pantalla='';

        if(isset($_GET['apellido']) == 1 && isset($_GET['nombre']) == 1 && isset($_GET['id']) == 1)
        {
            $srt_pantalla.='<h3>Id cama</h3>';
            $srt_pantalla.='<input type="number" name="cama" id="cama" value="'.$_GET['bed'].'" autocomplete="off"><br>';

            $srt_pantalla.='<h3>Identificación</h3>';
            $srt_pantalla.='<input type="number" name="identificacion" id="identificacion" value="'.$_GET['id'].'" autocomplete="off"><br>';

            $srt_pantalla.='<h3>Nombre del paciente</h3>';
            $srt_pantalla.='<input type="text" name="nombre" id="nombre" value="'.$_GET['nombre'].'" autocomplete="off"><br>';

            $srt_pantalla.='<h3>Apellido del paciente</h3>';
            $srt_pantalla.='<input type="text" name="apellido" id="apellido" value="'.$_GET['apellido'].'" autocomplete="off"><br>';

           
        }
        else
        {
            $srt_pantalla.='<h3>Id cama</h3>';
            $srt_pantalla.='<input type="number" name="cama" id="cama" value="'.$_GET['bed'].'" autocomplete="off"><br>';

            $srt_pantalla.='<h3>Identificación</h3>';
            $srt_pantalla.='<input type="number" name="identificacion" id="identificacion" placeholder="Identificación" autocomplete="off"><br>';
        
            $srt_pantalla.='<h3>Nombre del paciente</h3>';
            $srt_pantalla.='<input type="text" name="nombre" id="nombre" placeholder="Nombre del paciente" autocomplete="off"><br>';
        
            $srt_pantalla.='<h3>Apellido del paciente</h3>';
            $srt_pantalla.='<input type="text" name="apellido" id="apellido" placeholder="Apellido del paciente" autocomplete="off"><br>';
        }
        echo $srt_pantalla;
    ?>

        <h3>Diagnostico del paciente</h3>
        <textarea name="diagnostico" id="diagnostico" cols="30" rows="5" placeholder="Diagnostico del paciente" autocomplete="off"></textarea><br>
        <h3>Prioridad</h3>
        <select name="prioridad" id="prioridad">
            <option value="alta">Alta</option>
            <option value="media">Media</option>
            <option value="baja">Baja</option>
        </select><br>
        <h3>Fecha de ingreso</h3>
        <input type="date" name="ingreso" id="ingreso"><br>
        <h3>Duración en la cama (Días)</h3>
        <input type="number" name="dias" id="dias"><br>
        <input type="submit" value="Enviar">
    </form>
    
</body>

</html>
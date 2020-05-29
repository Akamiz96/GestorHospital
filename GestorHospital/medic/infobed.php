<?php
    include_once dirname(__FILE__) . '/../config/config.php';
    include_once dirname(__FILE__) . '/../model/pacient.php';
    include_once dirname(__FILE__) . '/../model/pacientXcama.php';
    include_once dirname(__FILE__) . '/sqlqueries/pacients.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["identificacion"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["diagnostico"]) && isset($_POST["prioridad"]) && isset($_POST["ingreso"]) && isset($_POST["dias"])) {
            $pacient = new Pacient();
            $pacient->id = $_POST["identificacion"];
            $pacient->nombre = $_POST["nombre"];
            $pacient->apellido = $_POST["apellido"];
            $resultPaciente = addPaciente($pacient);
            if($resultPaciente == true){
                $pacientXcama = new PacientXCama();
                $pacientXcama->id = $_POST["identificacion"];
                $pacientXcama->numCama = $_GET["bed"];
                $pacientXcama->fecha = $_POST["ingreso"];
                $pacientXcama->duracion = $_POST["dias"];
                $pacientXcama->prioridad = $_POST["prioridad"];
                //$pacientXcama->medico = $_POST["identificacion"];
                $pacientXcama->diagnostico = $_POST["diagnostico"];
                $resultPacientXCama = addPacienteXCama($pacientXcama);
                if($resultPacientXCama != true){
                    echo $GLOBALS['sqlerror'];
                }
            } 
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
    if (isset($_GET['bed'])) {
        echo '<h1>Información del paciente que ocupará la cama ' . $_GET['bed'] . ' </h1>';
    } else {
        echo '<h1>Información del paciente que ocupará la cama</h1>';
    }
    ?>
    <a href="medic.php">Regresar</a>
    <?php
        echo '<form action="infobed.php?bed='. $_GET["bed"] .'"method="post">';
    ?>
        <h3>Identificación</h3>
        <input type="number" name="identificacion" id="identificacion" placeholder="Identificación" autocomplete="off"><br>
        <h3>Nombre del paciente</h3>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre del paciente" autocomplete="off"><br>
        <h3>Apellido del paciente</h3>
        <input type="text" name="apellido" id="apellido" placeholder="Apellido del paciente" autocomplete="off"><br>
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
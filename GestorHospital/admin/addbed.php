<?php
include_once dirname(__FILE__) . '/utils/validate.php';
include_once dirname(__FILE__) . '/../config/config.php';
include_once dirname(__FILE__) . '/sqlqueries/beds.php';
include_once dirname(__FILE__) . '/../model/bed.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["number"]) && isset($_POST["hab"])) {
        if (validateNumber($_POST["number"])) {
            if (validateRoomNumber($_POST["hab"])) {
                $bed = new Bed();
                $bed->number = $_POST["number"];
                $bed->room_number = $_POST["hab"];
                $GLOBALS['result'] = createBed($bed);
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
    <title>New Bed</title>
</head>

<body>
    <h1>Adicionar nueva cama</h1>

    <a href="admin.php">Regresar</a>

    <form action="addbed.php" method="post">
        <h3>Número de la cama: </h3>
        <input id="number" name="number" type="number" placeholder="Numero de la cama" autocomplete="off" /><br>
        <?php
            include_once dirname(__FILE__) . '/utils/validate.php';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["number"] == "" || !validateNumber($_POST["number"])) {
                    echo '<div class="failure message">Favor ingrese un número de cama válido.</div>';
                }
            } 
        ?>

        <h3>Número de la habitación: </h3>
        <select name="hab" id="hab">
            <?php
            include_once dirname(__FILE__) . '/../config/config.php';
            include_once dirname(__FILE__) . '/sqlqueries/habs.php';
            $beds = list_habs();
            while ($fila = mysqli_fetch_array($beds)) {
                $output = '<option value="';
                $output .= $fila['Numero'];
                $output .= '">';
                $output .= $fila['Numero'];
                $output .= '</option>';
                echo $output;
            }
            ?>
        </select><br>
        <?php
            include_once dirname(__FILE__) . '/utils/validate.php';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["hab"] == "" || !validateRoomNumber($_POST["hab"])) {
                    echo '<div class="failure message">Favor ingrese un número de habitación válido.</div>';
                }
            } 
        ?>
        <input type="submit" value="Crear">
    </form>
    <?php
        if (isset($GLOBALS['result'])) {
            if ($GLOBALS['result'] == 1) {
                echo '<div class="success message">Creación de la habitación exitosamente</div>';
            } else {
                echo '<div class="failure message">' . $GLOBALS['result'] . '</div>';
            }
        }
    ?>
</body>

</html>
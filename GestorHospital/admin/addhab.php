<?php
    include_once dirname(__FILE__) . '/utils/validate.php';
    include_once dirname(__FILE__) . '/../config/config.php';
    include_once dirname(__FILE__) . '/sqlqueries/habs.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["numberhab"])) {
            if(validateNumber($_POST["numberhab"])){
                $GLOBALS['result'] = createHab($_POST["numberhab"]);
            }    
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Hab</title>
</head>

<body>
    <h1>Adicionar nueva habitación</h1>

    <a href="admin.php">Regresar</a>

    <form action="addhab.php" method="post">
        <h3>Número de la habitación: </h3>
        <input id="numberhab" name="numberhab" type="number" placeholder="Numero de la habitación" autocomplete="off" /><br>
        <input type="submit" value="Crear">
    </form>

    <?php
        if(isset($GLOBALS['result'])){
            if($GLOBALS['result'] == 1){
                echo '<div class="success message">Creación de la habitación exitosamente</div>';
            }else{
                echo '<div class="failure message">'. $GLOBALS['result'].'</div>';
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST["numberhab"] == "" || !validateNumber($_POST["numberhab"])) {
                echo '<div class="failure message">Favor ingrese un número válido.</div>';
            }
        }
    ?>
</body>

</html>
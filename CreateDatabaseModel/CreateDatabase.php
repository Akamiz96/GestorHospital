<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/titles.css">
    <link rel="stylesheet" type="text/css" href="css/back.css">
    <title>Creacion de base de datos</title>
</head>

<body>
    <h1>Creación de base de datos</h1>
    <h2>Proyecto Programación web</h2>
    <h3>Mayo 2020</h3>
    <div>

    </div>
    <?php
    include_once dirname(__FILE__) . '/config/config.php';
    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS);
    if (!$con) {
        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
    }else{
        $sql = "CREATE DATABASE " . DATABASE_NAME;
        if (mysqli_query($con, $sql)) {
            echo "<br><div class=\"result_query success_text\"> Base de datos " . DATABASE_NAME . " creada </div>";
        } else {
            echo "<br><div class=\"result_query error_text\"> Error en la creacion " . mysqli_error($con) . "</div>";
        }
        mysqli_close($con);
    }
    ?>
    
    <br><br>
    <div>
        <a class="back" href="index.php">Regresar</a>
    </div>


</body>

</html>
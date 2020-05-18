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
    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (!$con) {
        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
    }else{
        $sqlAdministradores = "CREATE TABLE Administradores ( UserName VARCHAR(50) NOT NULL, PRIMARY KEY(UserName), Email VARCHAR(100), Contrasenia CHAR(60), Activo BOOLEAN )";
        if (mysqli_query($con, $sqlAdministradores)) {
            echo "<br><div class=\"result_query success_text\"> Tabla Administradores creada correctamente </div>";
        } else {
            echo "<br><div class=\"result_query error_text\"> Error en la creacion de la tabla Adminsitradores: " . mysqli_error($con) . "</div>";
        }
        mysqli_close($con);
    }
    ?>
    <br>
    <?php
    include_once dirname(__FILE__) . '/config/config.php';
    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (!$con) {
        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
    } else {
        $sqlMedicos = "CREATE TABLE Medicos ( UserName VARCHAR(50) NOT NULL, PRIMARY KEY(UserName), Email VARCHAR(100), Contrasenia CHAR(60), Activo BOOLEAN )";
        if (mysqli_query($con, $sqlMedicos)) {
            echo "<br><div class=\"result_query success_text\"> Tabla Medicos creada correctamente </div>";
        } else {
            echo "<br><div class=\"result_query error_text\"> Error en la creacion de la tabla Medicos: " . mysqli_error($con) . "</div>";
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
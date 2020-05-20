<?php
    //header('Location: signup.php');
    $user_name = $_POST["username"];
    echo $_POST["username"];
    echo $_POST["password"];
    include_once dirname(__FILE__) . '/config/config.php';
    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (!$con) {
        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
    } else {
        $sqlSearchUser = "SELECT * FROM Administradores WHERE UserName = \"$user_name\"";
        if (mysqli_query($con, $sqlSearchUser)) {
            if (mysqli_affected_rows($con) > 0) {
                echo "<br><div class=\"result_query success_text\"> " . $_POST['username'] . " found </div>";
            }else{
                echo "<br><div class=\"result_query error_text\">Error en la actualización: " . mysqli_error($con)  . "</div>"; 
            }
        } else {
            echo "<br><div class=\"result_query error_text\"> Error " . mysqli_error($con) . "</div>";
        }
        mysqli_close($con);
    }
?> 
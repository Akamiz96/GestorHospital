<?php
include_once dirname(__FILE__) . '/utils/validateform.php';
include_once dirname(__FILE__) . '/sqlqueries/signin/validatesignin.php';
include_once dirname(__FILE__) . '../config/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        if (validateUserNameField($_POST["username"]) && validatePasswordField($_POST["password"])) {
            if (signIn($_POST["username"], $_POST["password"])) {
                $GLOBALS['signin'] = true;
                if($GLOBALS['Rol'] == 'MEDICO'){
                    header('Location: medic/medic.php');
                }
                if ($GLOBALS['Rol'] == 'ADMIN') {
                    header('Location: admin/admin.php');
                }
            } else {
                $GLOBALS['signin'] = false;
            }
            $GLOBALS['validate'] = true;
        } else {
            $GLOBALS['signin'] = false;
            $GLOBALS['validate'] = false;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/titles.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&display=swap" rel="stylesheet">
    <title>Salud Sis</title>
</head>

<body>
    <div class="title_page">
        <h1>Gestor del Hospital</h1>
    </div>
    <?php
    if (isset($GLOBALS['signin']) && isset($GLOBALS['validate'])) {
        if ($GLOBALS['signin'] == false && $GLOBALS['validate'] == true) {
            echo $GLOBALS['return_text'];
        }
    }
    ?>
    <div class="login">
        <div class="login-form">
            <form action="index.php" method="post">
                <h3>Nombre de usuario:</h3>
                <?php
                include_once dirname(__FILE__) . '/utils/validateform.php';
                if (isset($_POST["username"]) && $GLOBALS['signin'] == false) {
                    echo '<input id="username" name="username" type="text" placeholder="Nombre de usuario" autocomplete="off" value="' . $_POST["username"] .  '"/><br>';
                    if ($GLOBALS['validate'] == true) {
                        // NOTHING
                    } else {
                        if (!validateUserNameField($_POST["username"])) {
                            echo "<div class=\"error-message\">";
                            echo "Nombre de usuario no válido.";
                            echo "</div>";
                        }
                    }
                } else {
                    echo '<input id="username" name="username" type="text" placeholder="Nombre de usuario" autocomplete="off" /><br>';
                }

                ?>
                <h3>Contraseña:</h3>
                <?php
                include_once dirname(__FILE__) . '/utils/validateform.php';
                if (isset($_POST["password"]) && $GLOBALS['signin'] == false) {
                    echo '<input id="password" name="password" type="password" placeholder="Constraseña" autocomplete="off" value="' . $_POST["password"] . '"/><br>';
                    if ($GLOBALS['validate'] == true) {
                        // NOTHING
                    } else {
                        if (!validatePasswordField($_POST["password"])) {
                            echo "<div class=\"error-message\">";
                            echo "Constraseña inválida";
                            echo "</div>";
                        }
                    }
                } else {
                    echo '<input id="password" name="password" type="password" placeholder="Constraseña" autocomplete="off" /><br>';
                }
                ?>
                <br><br>
                <input type="submit" value="Login" class="login-button" />
                <br><br>
                <a class="sign-up" href="signup.php">Registro</a>
            </form>
        </div>
    </div>

</body>

</html>
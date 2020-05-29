<?php
    include_once dirname(__FILE__) . '/utils/validateform.php';
    include_once dirname(__FILE__) . '/model/medic.php';
    include_once dirname(__FILE__) . '/sqlqueries/signup/validatesignup.php';
    include_once dirname(__FILE__) . '../config/config.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["emailconfirm"]) && isset($_POST["password"])){
            if(validateUserNameField($_POST["username"]) && validateEmailField($_POST["email"]) && validateEmailField($_POST["emailconfirm"]) && validateConfirmEmail($_POST["email"], $_POST["emailconfirm"]) && validatePasswordField($_POST["password"])){
                $medic = new Medic();
                $medic->username = $_POST["username"];
                $medic->email = $_POST["email"];
                $medic->password = $_POST["password"];
                if(addNewMedic($medic)){
                    $GLOBALS['agregado'] = true;
                }else{
                    $GLOBALS['agregado'] = false;
                }
                $GLOBALS['add'] = true;
            }else{
                $GLOBALS['agregado'] = false;
                $GLOBALS['add'] = false;
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
    <title>Sign up Salud Sis</title>
</head>

<body>
    <div class="title_page">
        <h1>Gestor del Hospital</h1>
    </div>
    <?php
        if(isset($GLOBALS['agregado'])&&isset($GLOBALS['add'])){
            if ($GLOBALS['agregado'] == false && $GLOBALS['add'] == true) {
                echo $GLOBALS['sqlerror'];
            }
        }  
    ?>
    <div class="login">
        <div class="login-form">
            <form action="signup.php" method="POST">
                <h3>Nombre de usuario:</h3>
                <?php
                include_once dirname(__FILE__) . '/utils/validateform.php';
                if (isset($_POST["username"]) && $GLOBALS['agregado'] == false) {
                    echo '<input id="username" name="username" type="text" placeholder="Nombre de usuario" autocomplete="off" value="' . $_POST["username"] . '"/><br>';
                    if($GLOBALS['add'] == true){
                        // echo "<div class=\"error-message\">";
                        // echo "Error en la creación del usuario con este nombre de usuario.";
                        // echo "</div>";
                    }else{
                        if (!validateUserNameField($_POST["username"])){
                            echo "<div class=\"error-message\">";
                            echo "Nombre de usuario no válido.";
                            echo "</div>";
                        }
                    }
                    
                }else{
                    echo '<input id="username" name="username" type="text" placeholder="Nombre de usuario" autocomplete="off"/><br>';  
                }
                ?>
                <h3>Email:</h3>
                <?php
                include_once dirname(__FILE__) . '/utils/validateform.php';
                if (isset($_POST["email"]) && $GLOBALS['agregado'] == false) {
                    echo '<input id="email" name="email" type="text" placeholder="Correo electrónico" autocomplete="off" value="' . $_POST["email"] . '"/><br>';
                    if ($GLOBALS['add'] == true) {
                        // echo "<div class=\"error-message\">";
                        // echo "Error en la creación del usuario con este email.";
                        // echo "</div>"; 
                    } else {
                        if(!validateEmailField($_POST["email"])){
                            echo "<div class=\"error-message\">";
                            echo "Correo electrónico no válido.";
                            echo "</div>";
                        } 
                    }
                }else{
                    echo '<input id="email" name="email" type="text" placeholder="Correo electrónico" autocomplete="off"/><br>'; 
                }
                ?>
                <h3>Confirmar email:</h3>
                <?php
                include_once dirname(__FILE__) . '/utils/validateform.php';
                if (isset($_POST["emailconfirm"]) && $GLOBALS['agregado'] == false) {
                    echo '<input id="emailconfirm" name="emailconfirm" type="text" placeholder="Confirmar correo electrónico" autocomplete="off" value="' . $_POST["emailconfirm"] . '"/><br>';
                    if ($GLOBALS['add'] == true) {
                        // echo "<div class=\"error-message\">";
                        // echo "Error en la creación del usuario con este email.";
                        // echo "</div>";
                    } else {
                        if(!validateEmailField($_POST["emailconfirm"])){
                            echo "<div class=\"error-message\">";
                            echo "Correo electrónico no válido.";
                            echo "</div>";
                        }else{
                            if (!validateConfirmEmail($_POST["email"], $_POST["emailconfirm"])) {
                                echo "<div class=\"error-message\">";
                                echo "Correo electrónico no coincide con el email ingresado en el campo anterior.";
                                echo "</div>"; 
                            }
                        }
                    }
                }else{
                    echo '<input id="emailconfirm" name="emailconfirm" type="text" placeholder="Confirmar correo electrónico" autocomplete="off"/><br>';
                }
                ?>
                <h3>Contraseña:</h3>
                <?php
                include_once dirname(__FILE__) . '/utils/validateform.php';
                if (isset($_POST["password"]) && $GLOBALS['agregado'] == false) {
                    echo '<input id="password" name="password" type="password" placeholder="Contraseña" autocomplete="off" value="' . $_POST["password"] . '"/><br>';
                    if ($GLOBALS['add'] == true) {
                        // echo "<div class=\"error-message\">";
                        // echo "Error en la creación del usuario con esta contraseña.";
                        // echo "</div>";
                    } else {
                        if(!validatePasswordField($_POST["password"])){
                            echo "<div class=\"error-message\">";
                            echo "Contraseña no válida.";
                            echo "</div>";
                        } 
                    }
                }else{
                    echo '<input id="password" name="password" type="password" placeholder="Contraseña" autocomplete="off"/><br>';
                }
                ?>
                <br>
                <input type="submit" value="Registrarse" class="login-button" />
                <br><br>
                <a class="sign-up" href="index.php">Regresar</a>
            </form>
        </div>
    </div>

</body>

</html>
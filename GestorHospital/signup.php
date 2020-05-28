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

    <div class="login">
        <div class="login-form">
            <form action="signup.php" method="POST">
                <h3>Nombre de usuario:</h3>
                <?php
                include_once dirname(__FILE__) . '/utils/validateform.php';
                if (isset($_POST["username"])) {
                    if (validateUserNameField($_POST["username"])) {
                        echo '<input id="username" name="username" type="text" placeholder="Nombre de usuario" /><br>';
                    } else {
                        echo '<input id="username" name="username" type="text" placeholder="Nombre de usuario" value="' . $_POST["username"] . '"/><br>';
                        echo "<div class=\"error-message\">";
                        echo "Nombre de usuario no válido.";
                        echo "</div>";
                    }
                }else{
                    echo '<input id="username" name="username" type="text" placeholder="Nombre de usuario" /><br>';  
                }
                ?>
                <h3>Email:</h3>
                <?php
                include_once dirname(__FILE__) . '/utils/validateform.php';
                if (isset($_POST["email"])) {
                    if (validateEmailField($_POST["email"])) {
                        echo '<input id="email" name="email" type="text" placeholder="Correo electrónico" /><br>';
                    } else {
                        echo '<input id="email" name="email" type="text" placeholder="Correo electrónico" value="' . $_POST["email"] . '"/><br>';
                        echo "<div class=\"error-message\">";
                        echo "Correo electrónico no válido.";
                        echo "</div>";
                    }
                }else{
                    echo '<input id="email" name="email" type="text" placeholder="Correo electrónico" /><br>'; 
                }
                ?>
                <h3>Confirmar email:</h3>
                <?php
                include_once dirname(__FILE__) . '/utils/validateform.php';
                if (isset($_POST["emailconfirm"])) {
                    if (validateEmailField($_POST["emailconfirm"])) {
                        if (validateConfirmEmail($_POST["email"], $_POST["emailconfirm"])) {
                            echo '<input id="emailconfirm" name="emailconfirm" type="text" placeholder="Confirmar correo electrónico" /><br>';
                        }else{
                            echo '<input id="emailconfirm" name="emailconfirm" type="text" placeholder="Confirmar correo electrónico" value="' . $_POST["emailconfirm"] . '"/><br>';
                            echo "<div class=\"error-message\">";
                            echo "Correo electrónico no coincide con el email ingresado en el campo anterior.";
                            echo "</div>"; 
                        }
                    } else {
                        echo '<input id="emailconfirm" name="emailconfirm" type="text" placeholder="Confirmar correo electrónico" value="' . $_POST["emailconfirm"] . '"/><br>';
                        echo "<div class=\"error-message\">";
                        echo "Correo electrónico no válido.";
                        echo "</div>";
                    }
                }else{
                    echo '<input id="emailconfirm" name="emailconfirm" type="text" placeholder="Confirmar correo electrónico" /><br>';
                }
                ?>
                <h3>Contraseña:</h3>
                <?php
                include_once dirname(__FILE__) . '/utils/validateform.php';
                if (isset($_POST["password"])) {
                    if (validatePasswordField($_POST["password"])) {
                        echo '<input id="password" name="password" type="password" placeholder="Contraseña" /><br>';
                    } else {
                        echo '<input id="password" name="password" type="password" placeholder="Contraseña" value="' . $_POST["password"] . '"/><br>';
                        echo "<div class=\"error-message\">";
                        echo "Contraseña no válida.";
                        echo "</div>";
                    }
                }else{
                    echo '<input id="password" name="password" type="password" placeholder="Contraseña" /><br>';
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
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

    <div class="login">
        <div class="login-form">
            <form action="index.php" method="post">
                <h3>Nombre de usuario:</h3>
                <?php
                    include_once dirname(__FILE__) . '/utils/validateform.php';
                    if(isset($_POST["username"])){
                        if(validateUserNameField($_POST["username"])){
                            echo '<input id="username" name="username" type="text" placeholder="Nombre de usuario" autocomplete="off" /><br>';
                        }else{
                            echo '<input id="username" name="username" type="text" placeholder="Nombre de usuario" autocomplete="off" value="' . $_POST["username"] .  '"/><br>';
                            echo "<div class=\"error-message\">";
                            echo "Nombre de usuario no válido.";
                            echo "</div>"; 
                        }
                    }else{
                        echo '<input id="username" name="username" type="text" placeholder="Nombre de usuario" autocomplete="off" /><br>';
                    }
                    
                ?>
                <h3>Contraseña:</h3>
                <?php
                    include_once dirname(__FILE__) . '/utils/validateform.php';
                    if (isset($_POST["password"])) {
                        if (validatePasswordField($_POST["password"])) {
                            echo '<input id="password" name="password" type="password" placeholder="Constraseña" autocomplete="off" /><br>';
                        } else {
                            echo '<input id="password" name="password" type="password" placeholder="Constraseña" autocomplete="off" value="'. $_POST["password"] . '"/><br>';
                            echo "<div class=\"error-message\">";
                            echo "Constraseña inválida";
                            echo "</div>";   
                        }
                    }else{
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
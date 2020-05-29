<?php
    function signIn($username, $password){
        $sqlSearchUser = "SELECT * FROM Usuarios WHERE UserName = \"$username\"";
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        // Verify connection
        if (mysqli_connect_errno()) {
            return false;
        } else {
            //Insert value
            if (mysqli_query($con, $sqlSearchUser)) {
                if (mysqli_affected_rows($con) > 0) {
                    $resultado = mysqli_query($con, $sqlSearchUser);
                    $fila = mysqli_fetch_array($resultado);
                    if (password_verify($password, $fila['Contrasenia'])) {
                        $return_text = '<div class="error-message error-insert">Medico/Administrador encontrado';
                        $return_text .= '</div>';
                        $GLOBALS['return_text'] = $return_text;
                        mysqli_close($con);
                        return true; 
                    }else{
                        $return_text = '<div class="error-message error-insert">Contraseña inválida.';
                        $return_text .= '</div>';
                        $GLOBALS['return_text'] = $return_text;
                        mysqli_close($con);
                        return false; 
                    }
                }else{
                    $return_text = '<div class="error-message error-insert">Medico/Administrador no encontrado';
                    $return_text .= '</div>';
                    $GLOBALS['return_text'] = $return_text;
                    mysqli_close($con);
                    return false;
                }
            } else {
                $return_text = '<div class="error-message error-insert">Error en la búsqueda del médico. Error en la base de datos: ';
                $return_text .= mysqli_error($con);
                $return_text .= '</div>';
                $GLOBALS['return_text'] = $return_text;
                mysqli_close($con);
                return false;
            }
        }
        mysqli_close($con);
    }
?>
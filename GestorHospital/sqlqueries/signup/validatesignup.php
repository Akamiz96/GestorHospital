<?php
    function addNewMedic($medic){
        $sql = 'INSERT INTO Usuarios (UserName, Email, Contrasenia, Rol, Activo) VALUES (';
        $sql .= '\'' . $medic->username . '\'';
        $sql .= ', ';
        $sql .= '\'' . $medic->email . '\'';
        $sql .= ', ';
        $sql .= '\'' . password_hash($medic->password, PASSWORD_DEFAULT) . '\'';
        $sql .= ', ';
        $sql .= '\'MEDICO\'';
        $sql .= ', ';
        $sql .= 'false';
        $sql .= ')';
        // Create connection
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        // Verify connection
        if (mysqli_connect_errno()) {
            return false;
        } else {
            //Insert value
            if (mysqli_query($con, $sql)) {
                $return_text = '<div class="success-message error-insert">Creación del usuario exitosamente';
                $return_text .= '</div>';
                $GLOBALS['sqlerror'] = $return_text;
                mysqli_close($con);
                return true;
            }else{
                $return_text = '<div class="error-message error-insert">Error en la creación del médico. Error en la base de datos: ';
                $return_text .= mysqli_error($con);
                $return_text .= '</div>';
                $GLOBALS['sqlerror'] = $return_text;
                mysqli_close($con);
                return false;
            }
        }
        mysqli_close($con);
    }

function addNewAdmin($medic)
{
    $sql = 'INSERT INTO Usuarios (UserName, Email, Contrasenia, Rol, Activo) VALUES (';
    $sql .= '\'' . $medic->username . '\'';
    $sql .= ', ';
    $sql .= '\'' . $medic->email . '\'';
    $sql .= ', ';
    $sql .= '\'' . password_hash($medic->password, PASSWORD_DEFAULT) . '\'';
    $sql .= ', ';
    $sql .= '\'ADMIN\'';
    $sql .= ', ';
    $sql .= 'false';
    $sql .= ')';
    // Create connection
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    // Verify connection
    if (mysqli_connect_errno()) {
        return false;
    } else {
        //Insert value
        if (mysqli_query($con, $sql)) {
            $return_text = '<div class="success-message error-insert">Creación del administrador exitosamente';
            $return_text .= '</div>';
            $GLOBALS['sqlerror'] = $return_text;
            mysqli_close($con);
            return true;
        } else {
            $return_text = '<div class="error-message error-insert">Error en la creación del administrador. Error en la base de datos: ';
            $return_text .= mysqli_error($con);
            $return_text .= '</div>';
            $GLOBALS['sqlerror'] = $return_text;
            mysqli_close($con);
            return false;
        }
    }
    mysqli_close($con);
}
?>
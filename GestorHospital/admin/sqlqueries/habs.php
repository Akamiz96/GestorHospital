<?php
    function list_habs()
    {
        $sqlSearch = "SELECT * FROM Habitaciones ORDER BY Numero ASC";
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        // Verify connection
        if (mysqli_connect_errno()) {
            $GLOBALS['Result'] = 'Error conexión base de datos.' . mysqli_error($con);
            return false;
        } else {
            //Insert value
            if (mysqli_query($con, $sqlSearch)) {
                if (mysqli_affected_rows($con) > 0) {
                    $resultado = mysqli_query($con, $sqlSearch);
                    mysqli_close($con);
                    return $resultado;
                }else{
                    $GLOBALS['Result'] = 'No existen camas en el sistema.';
                    mysqli_close($con);
                    return false;
                }
            }else{
                $GLOBALS['Result'] = 'Error búsqueda de camas.' . mysqli_error($con);
                mysqli_close($con);
                return false;
            }
        }
    }

    function createHab($number){
        $sqlInsert = "INSERT INTO Habitaciones (Numero) VALUES (";
        $sqlInsert .= $number . ')';
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        // Verify connection
        if (mysqli_connect_errno()) {
            return 'Error conexión base de datos.' . mysqli_error($con);
        } else {
            //Insert value
            if (mysqli_query($con, $sqlInsert)) {
                mysqli_close($con);
                return true;
            } else {
                
                $r = 'Error inserción de la habitación.' . mysqli_error($con);
                mysqli_close($con);
                return $r;
            }
        }
    }
?>

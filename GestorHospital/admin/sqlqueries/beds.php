<?php
    include_once dirname(__FILE__) . '/../../model/bed.php';

    function list_beds(){
        $sqlSearch = "SELECT * FROM Camas ORDER BY HabNumero ASC";
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

    function createBed($bed){
        $sqlInsert = "INSERT INTO Camas (Numero, HabNumero) VALUES (";
        $sqlInsert .= $bed->number . ',' . $bed->room_number . ')';
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

                $r = 'Error en la inserción de la cama.' . mysqli_error($con);
                mysqli_close($con);
                return $r;
            }
        }
    }
?>
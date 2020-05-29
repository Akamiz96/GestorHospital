<?php
    include_once dirname(__FILE__) . '/../../model/pacient.php';
    function addPaciente($pacient){
        $sql = 'INSERT INTO Pacientes (Identificacion, Nombre) VALUES (';
        $sql .= $pacient->id;
        $sql .= ', ';
        $sql .= '\'' . $pacient->nombre . ' ' . $pacient->apellido. '\'';
        $sql .= ')';
        // Create connection
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        // Verify connection
        if (mysqli_connect_errno()) {
            return false;
        } else {
            //Insert value
            if (mysqli_query($con, $sql)) {
                $return_text = '<div class="success-message error-insert">Creación del paciente exitosamente';
                $return_text .= '</div>';
                $GLOBALS['sqlerror'] = $return_text;
                mysqli_close($con);
                return true;
            } else {
                $return_text = '<div class="error-message error-insert">Error en la creación del paciente. Error en la base de datos: ';
                $return_text .= mysqli_error($con);
                $return_text .= '</div>';
                $GLOBALS['sqlerror'] = $return_text;
                mysqli_close($con);
                return false;
            }
        }
        mysqli_close($con);
    }


    function addPacienteXCama($pacientXcama){
        $sql = 'INSERT INTO PacientesXCamas (NumeroCama, PacienteId, FechaIngreso, Duracion, Prioridad, Diagnostico) VALUES (';
        $sql .= $pacientXcama->numCama;
        $sql .= ', ';
        $sql .= $pacientXcama->id;
        $sql .= ', ';
        $sql .= '\'' . $pacientXcama->fecha . '\'';
        $sql .= ', ';
        $sql .= $pacientXcama->duracion;
        $sql .= ', ';
        $sql .= '\'' . $pacientXcama->prioridad . '\'';
        $sql .= ', ';
        $sql .= '\'' . $pacientXcama->diagnostico . '\'';
        $sql .= ')';
        // Create connection
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        // Verify connection
        if (mysqli_connect_errno()) {
            return false;
        } else {
            //Insert value
            if (mysqli_query($con, $sql)) {
                $return_text = '<div class="success-message error-insert">Creación del paciente exitosamente';
                $return_text .= '</div>';
                $GLOBALS['sqlerror'] = $return_text;
                mysqli_close($con);
                return true;
            } else {
                $return_text = '<div class="error-message error-insert">Error en la creación del paciente. Error en la base de datos: ';
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

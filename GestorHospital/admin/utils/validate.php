<?php
    include_once dirname(__FILE__) . '/../sqlqueries/habs.php';

    function validateNumber($number){
        $REGEX_number = "/^[0-9]+$/";
        if (preg_match($REGEX_number, $number)) {
            return true;
        } else {
            return false;
        }
    }

    function validateRoomNumber($number){
        if(validateNumber($number)){
            $habs = list_habs();
            while ($fila = mysqli_fetch_array($habs)) {
                if($number == $fila['Numero']){
                    return true;
                }
            }
            return false;
        }else{
            return false;
        }
    }
?>
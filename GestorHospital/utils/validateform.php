<?php
    function validateUserNameField($username){
        $REGEX_username = "/^[a-zA-Z][a-zA-Z0-9]+$/";
        if (strlen($username) < 5) {
            return false;
        }
        if (preg_match($REGEX_username, $username)) {
            return true;
        } else {
            return false;
        }
    }

    function validatePasswordField($password)
    {
        $REGEX_username = "/^[a-zA-Z0-9][a-zA-Z0-9]+$/";
        if (strlen($password) < 5) {
            return false;
        }
        if (preg_match($REGEX_username, $password)) {
            return true;
        } else {
            return false;
        }
    }
?>
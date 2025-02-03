<?php 
    require("database.php");

    //Returns value passed through URL
    function getURLValue($parameter) {
        // Check if the parameter exists in the URL
        if (isset($_GET[$parameter])) {
            return $_GET[$parameter];
        } else {
            return null;
        }
    }

    //First letter uppercase and rest lower case
    function caseFormat($str) {
        $str = ucfirst(strtolower($str));
        return $str;
    }
?>
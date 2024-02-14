<?php

// error_reporting(E_ALL);
// ini_set("display_errors" , 1);

include("DBO.php");

class loginClass {
    function getData($username, $tableName) {
        $db = new loginDBO();
        return $db->getCredentials($username, $tableName);
    }
}

?>
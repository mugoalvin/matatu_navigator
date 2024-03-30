<?php
include("DBO.php");

class indexClass {
    var $stmt;
    var $conn;

    function ifDatabaseExists($databaseName) {
        $dboObj = new indexDBO;
        return $dboObj->checkDatabase($databaseName);
    }
}
?>
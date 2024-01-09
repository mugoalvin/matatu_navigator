<?php

echo "<br>CLASS<br>";

// error_reporting(E_ALL);
// ini_set("display_errors" , 1);

include("registerDBO.php");

class registrationClass {
    function addToTable($obj) {
        $w = new registerDBO;
        $w->insert($obj);
    }
}
?>
<?php
include ("model/class.php");

$indexClassObj = new indexClass;
$doesDatabaseExists = $indexClassObj->ifDatabaseExists($_SESSION["databaseName"]) ? true : false;
?>
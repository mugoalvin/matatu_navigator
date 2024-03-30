<?php
include("DB.php");
include("controller/checkDatabase.php");
if (!$doesDatabaseExists) {
    foreach( file("database.sql") as $line ) {
        $line = trim($line);
        if (empty($line) || substr($line, 0, 2) == '--' || substr($line, 0, 2) == '/*') {
            continue;
        }
        echo $line;
        echo "<br>";
        echo "<br>";
        (new DatabaseConnection)->getConnection()->query($line);
    }
    (new DatabaseConnection)->closeConnection();
}
header("Location: php/login.php")
?>
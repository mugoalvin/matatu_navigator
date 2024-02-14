<?php

// error_reporting(E_ALL);
// ini_set("display_errors" , 1);

include("../../DB.php");

class loginDBO {
    public $conn;
    public $stmt;

    function __construct() {
        $db = new DatabaseConnection;
        $this ->conn = $db->getConnection();
    }

    function getCredentials($username, $tableName) {
        if ($tableName == 'managers'){
            $fetchCommand = "SELECT * FROM managers WHERE username = :username";
        }
        elseif ($tableName == "travellers"){
            $fetchCommand = "SELECT * FROM travellers WHERE username = :username";
        }
        $stmt = $this->conn->prepare($fetchCommand);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
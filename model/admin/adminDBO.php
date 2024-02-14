<?php

// error_reporting(E_ALL);
// ini_set("display_errors" , 1);


include("../../DB.php");

class adminDBO{
    var $conn;
    var $stmt;

    public function __construct() {
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();
    }

    function descTable($tableName) {
        $command = "DESC $tableName";
        $stmt = $this->conn->prepare($command);
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        }
        
        catch(Throwable $th) {
            throw $th;
        }
    }

    function getTables() {
        $getTablesCommand = "SHOW TABLES";
        $stmt = $this->conn->prepare($getTablesCommand);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        catch (Throwable $th) {
            throw $th;
        }
    }

    function selectAll($tableName) {
        // $command = "SELECT * FROM $tableName";
        $command = "SELECT * FROM $tableName";
        $stmt = $this->conn->prepare($command);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        catch (Throwable $th) {
            throw $th;
        }
    }

    function getLastCompanyId($tableName) {
        $command = "SELECT company_id FROM $tableName ORDER BY id DESC LIMIT 1";
        $stmt = $this->conn->prepare($command);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        catch (Throwable $th) {
            throw $th;
        }
    }

    function insertToManagers($obj) {
        $command = "INSERT INTO managers(company_id, first_name, last_name, username) VALUES(:company_id, :first_name, :last_name, :username)";
        // $command = "INSERT INTO managers(company_id, first_name, last_name, username) VALUES($obj->company_id, '$obj->first_name', '$obj->last_name', '$obj->username')";

        $stmt = $this->conn->prepare($command);
        $stmt->bindParam(":company_id", $obj->company_id);
        $stmt->bindParam(":first_name", $obj->first_name);
        $stmt->bindParam(":last_name", $obj->last_name);
        $stmt->bindParam(":username", $obj->username);
        try {
            $stmt->execute();
            return true;
        }
        catch (Throwable $th) {
            return false;
        }
    }
}
?>
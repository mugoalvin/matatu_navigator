<?php

class DatabaseConnection {

    private $host;
    private $username;
    private $password;
    private $dbName;
    private $conn;
        
    public function __construct() {
        $this->host = "localhost";
        $this->username = "alvin";
        $this->password = "";
        $this->dbName = "alvin";

        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbName";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            die("Connection Failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }
}
?>
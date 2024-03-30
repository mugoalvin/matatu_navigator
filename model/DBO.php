<?php
class indexDBO {
    var $stmt;
    var $conn;

    function __construct() {
        $connectToDatabase = new DatabaseConnection;
        $this->conn = $connectToDatabase->getConnection();
    }

    function checkDatabase($databaseName) {
        $sqlCommand = "SHOW DATABASES LIKE :databaseName";
        $this->stmt = $this->conn->prepare($sqlCommand);
        $this->stmt->bindParam(":databaseName", $databaseName);
        try {
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        catch (Throwable $th) {
            throw $th;
        }
    }
}
?>
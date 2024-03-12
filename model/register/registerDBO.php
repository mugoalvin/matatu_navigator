<?php
@include("../../DB.php");
$error = error_get_last();

if ($error !== null) {
    include("../DB.php");
}

class registerDBO {
    public $conn;
    public $stmt;

    function __construct() {
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();
    }

    function getAllUsers() {
        $sqlCommand = "SELECT username, email FROM travellers";
        $this->stmt = $this->conn->prepare($sqlCommand);
        try {
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        catch (PDOException $e) {
            echo "<br>Failed: ". $e->getMessage() ."<br>";
        }
    }

    function insert($obj) {
        $command = "INSERT INTO travellers (first_name, last_name, username, email, password, age) VALUE(:fname, :lname, :username, :email, md5(:password), :age)";
        $stmt = $this->conn->prepare($command);
        $stmt->bindParam(":fname", $obj->first_name);
        $stmt->bindParam(":lname", $obj->last_name);
        $stmt->bindParam(":username", $obj->username);
        $stmt->bindParam(":email", $obj->email);
        $stmt->bindParam(":password", $obj->password);
        $stmt->bindParam(":age", $obj->age);

        try {
            $stmt->execute();
            echo "Successfully Done";
        }
        catch (PDOException $e) {
            echo "<br>Failed: ". $e->getMessage() ."<br>";
        }
    }
}
?>
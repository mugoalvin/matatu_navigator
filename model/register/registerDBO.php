<?php
echo "<br>DBO<br>";

// error_reporting(E_ALL);
// ini_set("display_errors" , 1);

include("../../DB.php");

class registerDBO {
    public $conn;
    public $stmt;

    function __construct() {
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();
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
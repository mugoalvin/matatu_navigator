<?php
// error_reporting(E_ALL);
// ini_set("display_errors" , 1);

include('../../DB.php');

class DBO {

    var $conn;
    var $stmt;

    function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();
    }

    function descTable($tableName) {
        $descCommand = "DESC $tableName ";
        $stmt = $this->conn->prepare($descCommand);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        catch (Throwable $th) {
            die ("Error: Could not retrieve table description.");
        }
    }

    function insertProfile($obj) {
        $insertCommand = "INSERT INTO `matatuCompanies`(name, latitude, longitude, city) VALUES(:name, :latitude, :longitude, :city)";
        $stmt = $this->conn->prepare($insertCommand);
        $stmt->bindParam(':name', $obj->name);
        $stmt->bindParam(':latitude', $obj->latitude);
        $stmt->bindParam(':longitude', $obj->longitude);
        $stmt->bindParam(':city', $obj->city);
        try {
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo ''. $e->getMessage() .'';
        }
    }

    function selectAll($tableName) {
        $getMatatuDetailsCommand = "SELECT * FROM $tableName";
        $stmt = $this->conn->prepare($getMatatuDetailsCommand);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Throwable $th) {
            die("Error in retrieving details: " . $th->getMessage());
        }
    }

    function select($tableName) {
        $getMatatuDetailsCommand = "SELECT * FROM $tableName WHERE id = 10";
        $stmt = $this->conn->prepare($getMatatuDetailsCommand);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        catch (Throwable $th) {
            die ("Error in retrieving details: " . $th->getMessage());
        }
    }

    function update($obj, $tableName) {
        $updateCommand = "UPDATE $tableName
        SET 
            name = '$obj->name',
            latitude = $obj->latitude,
            longitude = $obj->longitude,
            city = '$obj->city'

        WHERE id = $obj->id";

        $stmt = $this->conn->prepare($updateCommand);
        try {
            $stmt->execute();
        }
        catch (Throwable $th) {
            throw $th;
        }
    }

    function delete($tableName, $id) {
        $deleteCommand = "DELETE FROM $tableName WHERE id = $id";
        $stmt = $this->conn->prepare($deleteCommand);
        // $stmt->bindParam(1,$id);
        try {
            $stmt->execute();
        }
        catch (Throwable $th) {
            throw $th;
        }
    }

}

?>
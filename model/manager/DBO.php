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
        $insertCommand = "INSERT INTO `matatuCompanies`(id, name, latitude, longitude, city) VALUES(:id, :name, :latitude, :longitude, :city)";
        $stmt = $this->conn->prepare($insertCommand);
        $stmt->bindParam(':id', $obj->company_id);
        $stmt->bindParam(':name', $obj->name);
        $stmt->bindParam(':latitude', $obj->latitude);
        $stmt->bindParam(':longitude', $obj->longitude);
        $stmt->bindParam(':city', $obj->city);
        print_r($stmt->queryString);
        try {
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo ''. $e->getMessage() .'';
        }
    }

    function selectAllExcept($tableName, $city) {
        $getMatatuDetailsCommand = "SELECT * FROM $tableName";
        $stmt = $this->conn->prepare($getMatatuDetailsCommand);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Throwable $th) {
            die("Error in retrieving details: " . $th->getMessage());
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
    function select($tableName, $id) {
        $getMatatuDetailsCommand = "SELECT * FROM $tableName";
        $stmt = $this->conn->prepare($getMatatuDetailsCommand);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        catch (Throwable $th) {
            die ("Error in retrieving details: " . $th->getMessage());
        }
    }

    function selectID($tableName, $id) {
        $getMatatuDetailsCommand = "SELECT * FROM $tableName WHERE id = $id";
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
        try {
            $stmt->execute();
            return true;
        }
        catch (Throwable $th) {
            throw $th;
        }
    }
// =================================================================================================================



function selectManagerAndCompany () {
    $selectCommand = " SELECT
            matatuCompanies.id,
            matatuCompanies.name,
            matatuCompanies.latitude,
            matatuCompanies.longitude,
            matatuCompanies.city,
            managers.first_name,
            managers.last_name,
            managers.username,
            managers.password
        FROM matatuCompanies
        INNER JOIN managers
        ON matatuCompanies.id = managers.company_id ";
        $stmt = $this->conn->prepare($selectCommand);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Throwable $th) {
            throw $th;
        }
        
    }
    
    function insertToRoutes($obj) {
        print_r($obj);
        $insertCommand = "INSERT INTO routes (departure_id, destination_id, price, eta) VALUES ($obj->departure, $obj->destination, $obj->price, '$obj->eta')";
        echo '<br>';

        echo $insertCommand;
        $stmt = $this->conn->prepare($insertCommand);
        
        try {
            $stmt->execute();
            return true;
        }
        catch (Exception $e){
            echo '<br>';
            echo 'Message: ' .$e->getMessage();
        }
    }


function updateManagersDetails($obj) {
    // 1. Validate input object properties
    if (!is_object($obj) || !property_exists($obj, 'first_name') || !property_exists($obj, 'last_name') || !property_exists($obj, 'username') || !property_exists($obj, 'password') || !property_exists($obj, 'id')) {
        throw new InvalidArgumentException('Missing required properties in input object.');
    }

    // 2. Build dynamic SQL statement with placeholders
    $updateCommand = "UPDATE managers SET";
    $bindings = [];
    $isFirst = true; // Flag for initial comma handling
    foreach (['first_name', 'last_name', 'username', 'password'] as $field) {
        if (!empty($obj->$field)) { // Check if property has a value
            if (!$isFirst) {
                $updateCommand .= ', '; // Add comma for subsequent fields
            }
            $isFirst = false;
            $updateCommand .= " $field = :$field";
            $bindings[":$field"] = $obj->$field;
        }
    }

    // 3. Add WHERE clause with bound parameter
    $updateCommand .= " WHERE id = :id";
    $bindings[":id"] = $obj->id;

    try {
        // 4. Prepare and execute statement using bindings
        $stmt = $this->conn->prepare($updateCommand);
        $stmt->execute($bindings);

        // 5. Check for affected rows and return success
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            // Handle no rows affected (e.g., record not found)
            throw new Exception('No managers were updated.');
        }
    } catch (\Throwable $th) {
        // 6. Handle exceptions gracefully
        throw $th;
    }
}
}
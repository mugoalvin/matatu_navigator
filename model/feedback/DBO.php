<?php

class feedbackDBO{
    var $conn;
    var $stmt;

    function __construct() {
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();
    }

    function selectAllWhere($id) {
        $selectCommand = "SELECT username, rating, feedback, name, route_id FROM rating JOIN routes ON rating.route_id = routes.id JOIN matatuCompanies ON matatuCompanies.id = routes.departure_id JOIN travellers ON travellers.id = rating.user_id WHERE route_id = :id";
        $stmt = $this->conn->prepare($selectCommand);
        $stmt->bindParam(':id', $id);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        catch (Throwable $th) {
            throw $th;
        }
    }

}
?>
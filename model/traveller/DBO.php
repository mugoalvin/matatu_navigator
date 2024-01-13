<?php
include('../../DB.php');

class DBO {

    var $conn;  // Declare $conn as a class property

    function __construct() {
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();  // Assign the connection to $this->conn
    }

    function getMatatuRoutes($departure, $destination) {
        $selectCommand = "
            SELECT
                matatuCompanies.id AS matatu_company_id,
                matatuCompanies.name AS matatu_company_name,
                matatuCompanies.latitude,
                matatuCompanies.longitude,
                matatuCompanies.city AS departure_city,
                departure.name AS departure_name,
                departure.latitude AS departure_latitude,
                departure.longitude AS departure_longitude,
                routes.id AS route_id,
                routes.price,
                routes.eta,
                destination.name AS destination_name,
                destination.latitude AS destination_latitude,
                destination.longitude AS destination_longitude,
                destination.city AS destination_city
            FROM matatuCompanies
            JOIN routes ON matatuCompanies.id = routes.departure_id
            JOIN matatuCompanies AS departure ON routes.departure_id = departure.id
            JOIN matatuCompanies AS destination ON routes.destination_id = destination.id
            WHERE departure.city = :departure_city AND destination.city = :destination_city OR 
                departure.city = :destination_city AND destination.city = :departure_city
            ";
        $stmt = $this->conn->prepare($selectCommand);
        try {
            $stmt->bindParam(':departure_city', $departure, PDO::PARAM_STR);
            $stmt->bindParam(':destination_city', $destination, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Throwable $th) {
            throw $th;
        }
    }
}
?>
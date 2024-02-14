<?php
include('DBO.php');

class travellerClass {

    function getMatatuResults($departure, $destination) {
        $newObj = new DBO;
        return $newObj->getMatatuRoutes($departure, $destination);
    }
    
    function addFeedback($obj) {
        $newObj = new DBO;
        $newObj->addFeedback($obj);
    }
    
    function selectWhereId($id) {
        $newObj = new DBO;
        return $newObj->selectAllWhere($id);
    }
}
?>
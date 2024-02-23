<?php
include('DBO.php');

class travellerClass {

    function getMatatuResults($departure, $destination) {
        $newObj = new DBO;
        return $newObj->getMatatuRoutes($departure, $destination);
    }
    
    function addFeedback($obj) {
        $newObj = new DBO;
        return $newObj->addFeedback($obj);
    }
    
    function selectByUserNameAndPassword($obj) {
        $newObj = new DBO;
        return $newObj->selectByUserNameAndPassword($obj);
    }
}
?>
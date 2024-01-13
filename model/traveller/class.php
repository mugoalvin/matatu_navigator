<?php
include('DBO.php');

class travellerClass {

    function getMatatuResults($departure, $destination) {
        $newObj = new DBO;
        return $newObj->getMatatuRoutes($departure, $destination);
    }
}
?>
<?php
error_reporting(E_ALL);
ini_set("display_errors" , 1);

include('../../model/manager/class.php');
$objManager=new managerClass;
// return $objManager->select('managers');
print_r($objManager->selectAll('managers'))

?>
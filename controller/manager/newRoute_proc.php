<?php
session_start();
include('../../model/manager/class.php');

$finalInput = array();

foreach ($_SESSION['matatuCompanies'] as $matatuCompany) {
    if ($matatuCompany->name == explode(', ', $_POST['departure'])[0] && $matatuCompany->city == explode(', ', $_POST['departure'])[1]) {
        $finalInput['departure'] = $matatuCompany->id;
    }

    if ($matatuCompany->name == explode(', ', $_POST['destination'])[0] && $matatuCompany->city == explode(', ', $_POST['destination'])[1]) {
        $finalInput['destination'] = $matatuCompany->id;
    }    
}
$finalInput['price'] = $_POST['price'];
$finalInput['eta'] = $_POST['eta'];

print_r($finalInput);

$classObj = new managerClass;
$classObj->insertToRoutes((object)$finalInput);

header('Location: ../../php/manager/new_route.php');
?>
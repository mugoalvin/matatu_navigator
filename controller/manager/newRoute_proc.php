<?php
session_start();
include('../../model/manager/class.php');

$finalInput = array();

foreach ($_SESSION['matatuCompanies'] as $matatuCompany) {
    print_r($matatuCompany);
    echo "<br>";
    if ($matatuCompany->name == explode(', ', $_POST['departure'])[0] && $matatuCompany->city == explode(', ', $_POST['departure'])[1]) {
        echo "Departure Found<br>";
        $finalInput['departure'] = $matatuCompany->id;
    }
    
    if ($matatuCompany->name == explode(', ', $_POST['destination'])[0] && $matatuCompany->city == explode(', ', $_POST['destination'])[1]) {
        echo "Destination Found<br>";
        $finalInput['destination'] = $matatuCompany->id;
    }    
}


$finalInput['price'] = $_POST['price'];
$finalInput['eta'] = $_POST['eta'];

print_r($finalInput['departure']);
print_r($finalInput['destination']);

echo "<br>";
$classObj = new managerClass;
if ($classObj->insertToRoutes((object)$finalInput)) {
    $_SESSION['isRouteAdded'] = true;   
    header('Location: ../../php/manager/new_route.php');
}
?>
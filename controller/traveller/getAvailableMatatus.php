<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors" , 1);

include('../../model/traveller/class.php');
include('../../model/feedback/class.php');

print_r($_POST);

// foreach($_SESSION["allMatatus"] as $matatu) {
//     if ($matatu->name == explode(', ', $_POST['departure'])[0] && $matatu->city == explode(', ', $_POST['departure'])[1] ) {
//         $departure = $matatu;
//     }

//     if ($matatu->name == explode(', ', $_POST['destination'])[0] && $matatu->city == explode(', ', $_POST['destination'])[1]) {
//         $destination = $matatu;
//     }
// }

$departure = $_POST['departure'];
$destination = $_POST['destination'];

$_SESSION['departureCity'] = $_POST['departure'];
$_SESSION['destinationCity'] = $_POST['destination'];

echo '<br>';
echo '<br>';
print_r($departure);
echo '<br>';
print_r($destination);
echo '<br>';
echo '<br>';


$newClassObj = new travellerClass;
$feedbackObject = new feedbackClass;
$_SESSION['availableMatatus'] = $newClassObj->getMatatuResults($departure, $destination);

$feedbackArray = [];
foreach ($_SESSION['availableMatatus'] as $matatu) {
    $answers = $feedbackObject->selectWhereId($matatu->route_id);
    foreach ($answers as $answer) {
        print_r($answer);
        array_push($feedbackArray, $answer);
        echo '<br>';
    }
    $_SESSION['feedbacks'] = $feedbackArray;
    echo '<br>';
}

header('Location: ../../php/traveller/dashboard.php')
?>
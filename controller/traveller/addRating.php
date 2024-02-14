<?php
// error_reporting(E_ALL);
// ini_set("display_errors" , 1);

include('../../model/traveller/class.php');

print_r((object)$_POST);

$traveller = new travellerClass;
$traveller->addFeedback((object)$_POST);
$_SESSION['isRaringSaved'] = true;

header("Location: ../../php/traveller/rating.php");

?>
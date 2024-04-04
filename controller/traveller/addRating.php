<?php
// error_reporting(E_ALL);
// ini_set("display_errors" , 1);
session_start();

include('../../model/traveller/class.php');

print_r((object)$_POST);

$traveller = new travellerClass;
if ($traveller->addFeedback((object)$_POST)) {
    $_SESSION['isRatingSaved'] = true;
    echo $_SESSION['isRatingSaved'];
    header("Location: ../../php/traveller/dashboard.php");
}

?>
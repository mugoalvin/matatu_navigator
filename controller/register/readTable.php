<?php
session_start();

include("../../model/traveller/class.php");

$readTable = new travellerClass;
$_SESSION["loginInUser"] = $readTable->selectByUserNameAndPassword($_SESSION["loginInUser"])[0];

header("Location: ../../php/traveller/dashboard.php");
?>
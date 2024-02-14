<?php

// error_reporting(E_ALL);
// ini_set("display_errors" , 1);

session_start();

include("../../model/register/regiterClass.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = (object)$_POST;

    foreach ($userInput as $key => $value) {
        echo  $key." = ". $value."<br>";
    }
    $newUser = new registrationClass;
    $newUser->addToTable($userInput);

    $_SESSION["loginInUser"] = $userInput;

    header("Location: ../../php/traveller/dashboard.php");
}
?>
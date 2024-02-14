<?php

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

session_start();

include("../../model/login/class.php");


if (isset($_POST)) {
    $usersInput = (object)$_POST;
    $obj = new loginClass;
    
    function getAllUsersAndManagers($object, $usersInput, $tableName) {
        return $object->getData($usersInput->username, $tableName);
    }
    
    if (strpos($usersInput->username, "mng") !== false) {
        $dbCredentials = getAllUsersAndManagers($obj, $usersInput, 'managers');
        if (!$dbCredentials) {
            header("Location: ../../php/login.php");
        } 
        else {
            foreach ($dbCredentials as $credential) {
                if ($usersInput->username == $credential->username) {
                    if ($usersInput->password == $credential->password) {
                        $_SESSION["loginInManager"] = $credential;
                        print_r($_SESSION["loginInManager"]);
                        header("Location: ../../php/manager/home.php");
                    } else {
                        header("Location: ../../php/login.php");
                    }
                }
            }
        }
    }
    elseif (strpos($usersInput->username, "admin") !== false) {
        header("Location: ../../php/admin/home.php");
    }
    else {
        $dbCredentials = getAllUsersAndManagers($obj, $usersInput, 'travellers');
        foreach ($dbCredentials as $credential) {
            if ($usersInput->username == $credential->username) {
                if ($usersInput->password == $credential->password) {
                    $_SESSION["loginInUser"] = $credential;
                    header("Location: ../../php/traveller/dashboard.php");
                } else {
                    header("Location: ../../php/login.php");
                }
            }
        }
    }
} else {
    echo '5';
    // header("Location: ../../php/login.php");
}

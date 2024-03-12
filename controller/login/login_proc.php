<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

include("../../model/login/class.php");


if (isset($_POST)) {
    $usersInput = (object)$_POST;

    foreach ($usersInput as $key => $value) {
        echo $key . ' = ' . $value . '<br>';
    }

    $obj = new loginClass;
    
    function getAllUsersAndManagers($object, $usersInput, $tableName) {
        return $object->getData($usersInput->username, $tableName);
    }
    
    if ($usersInput->userCategory == 'manager') {
        $dbCredentials = getAllUsersAndManagers($obj, $usersInput, 'managers');
        if (!$dbCredentials) {
            header("Location: ../../php/login.php");
        } 
        else {
            foreach ($dbCredentials as $credential) {
                if ($usersInput->username == $credential->username) {
                    if (md5($usersInput->password) == $credential->password || md5($usersInput->password) == md5($credential->password)) {
                        $_SESSION["loggedInManager"] = $credential;
                        header("Location: ../../php/manager/home.php");
                    } else {
                        header("Location: ../../php/login.php");
                    }
                }
            }
        }
    }
    elseif ($usersInput->userCategory == 'traveller') {
        $dbCredentials = getAllUsersAndManagers($obj, $usersInput, 'travellers');
        foreach ($dbCredentials as $credential) {
            if ($usersInput->username == $credential->username) {
                if (md5($usersInput->password) == $credential->password) {
                    $_SESSION["loginInUser"] = $credential;
                    header("Location: ../../php/traveller/dashboard.php");
                } else {
                    header("Location: ../../php/login.php");
                }
            }
        }
    }
    elseif ($usersInput->userCategory == 'administrator') {
        if ($usersInput->username == 'admin' && $usersInput->password == 'a') {
            header("Location: ../../php/admin/home.php");
        }
    }
}
if ($_POST['username'] == null && $_POST['password'] == null) {
    header("Location: ../../php/login.php");
}
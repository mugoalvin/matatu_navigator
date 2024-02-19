<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

session_start();
include('../../model/manager/class.php');

$updatedDataObj = (object)$_POST;
$updatedDataObj->id = $_SESSION['matatuDetails']->id;
print_r($updatedDataObj);
$classObj = new managerClass;
$classObj->updateProfile($updatedDataObj, 'matatuCompanies');
$_SESSION['isMatatuProfileUpdated'] = true;
header('Location: ../../php/manager/update_details.php');
?>
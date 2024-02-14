<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

include('../../model/manager/class.php');

$updatedDataObj = (object)$_POST;

$classObj = new managerClass;
$classObj->updateProfile($updatedDataObj, 'matatuCompanies');
header('Location: ../../php/manager/update_details.php');
?>
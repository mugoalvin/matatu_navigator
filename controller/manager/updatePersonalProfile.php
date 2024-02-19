<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

session_start();

include('../../model/manager/class.php');
$managersUpdateInput = (object)$_POST;
$managersUpdateInput->id = $_SESSION['managersId'];
$managersUpdateInput->password = md5($managersUpdateInput->password);
print_r($managersUpdateInput);
$classObj = new managerClass;

if ($classObj->updateManagersDetails($managersUpdateInput)) {
    $_SESSION['isManagersProfileUpdated'] = true;
    echo 'Done';
    header("Location: ../../php/manager/manager_details.php");
}

?>
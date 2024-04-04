<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

session_start();

include('../../model/manager/class.php');
$managersUpdateInput = (object)$_POST;
$managersUpdateInput->id = $_SESSION['managersId'];
$managersUpdateInput->password = md5($managersUpdateInput->password);
if ($managersUpdateInput->password == 'd41d8cd98f00b204e9800998ecf8427e') {
    $managersUpdateInput->password = $_SESSION["loggedInManager"]->password;
}
$classObj = new managerClass;

if ($classObj->updateManagersDetails($managersUpdateInput)) {
    $_SESSION['isManagersProfileUpdated'] = true;
    header("Location: ../../php/manager/manager_details.php");
}
?>
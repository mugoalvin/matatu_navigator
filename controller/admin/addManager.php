<?php
include("../../model/admin/adminClass.php");

session_start();
print_r($_POST);

$insertObj = new adminClass;
if ($insertObj->insertToManagers((object)$_POST) ) {
    $_SESSION['isManagerAdded'] = true;
    header("Location: ../../php/admin/createManager.php");
}

?>
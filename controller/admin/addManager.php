<?php
include("../../model/admin/adminClass.php");

session_start();
$_POST['company_id'] = $_SESSION['newCompanyID'];

$insertObj = new adminClass;
if ($insertObj->insertToManagers((object)$_POST) ) {
    $_SESSION['isManagerAdded'] = true;
    header("Location: ../../php/admin/createManager.php");
}

?>
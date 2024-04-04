<?php
include("../../model/admin/adminClass.php");

session_start();
$_POST['company_id'] = $_SESSION['newCompanyID'];
$_POST["password"] = md5($_POST["password"]);

$insertObj = new adminClass;
if ($insertObj->insertToManagers((object)$_POST) ) {
    $_SESSION['isManagerAdded'] = true;
    header("Location: ../../php/admin/createManager.php");
}
?>
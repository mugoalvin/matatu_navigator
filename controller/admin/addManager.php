<?php
include("../../model/admin/adminClass.php");

print_r($_POST);

$insertObj = new adminClass;
if ($insertObj->insertToManagers((object)$_POST) ) {
    header("Location: ../../php/admin/createManager.php");
}

?>
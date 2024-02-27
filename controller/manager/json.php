<?php
session_start();
include("../../model/manager/class.php");

if ( !$_SESSION["loginInManager"] ) {
    header("Location: ../../php/login.php");
}

$managerClassObj = new managerClass;
return $managerClassObj->selectID('matatuCompanies', $_SESSION["loginInManager"]->company_id);
?>
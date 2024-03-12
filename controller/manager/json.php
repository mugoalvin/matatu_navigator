<?php
session_start();
include("../../model/manager/class.php");

if ( !$_SESSION["loggedInManager"] ) {
    header("Location: ../../php/login.php");
}

$managerClassObj = new managerClass;
return $managerClassObj->selectID('matatuCompanies', $_SESSION["loggedInManager"]->company_id);
?>
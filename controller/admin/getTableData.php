<?php
include ("../../model/admin/adminClass.php");
session_start();

$adminClassObj = new  adminClass;
$_SESSION['tableData'] = $adminClassObj->getData($_POST['selectedTable']);



$adminClassDesk = new  adminClass;
$_SESSION['tableColumns'] = $adminClassDesk->descTable($_POST['selectedTable']);

header("Location: ../../php/admin/home.php");
?>
<?php
include('../../model/manager/class.php');

session_start();
$classObj = new managerClass;

if ( $classObj->deleteFromTable('matatuCompanies', $_SESSION['idToDelete'] )) {
    $_SESSION['isProfileDataDeleted'] = true;
    header('Location: ../../php/manager/home.php');
}
?>
<?php
session_start();
include('../../model/manager/class.php');

$classObj = new managerClass;
print_r((object) $_POST);
if ($_POST['updateRoute']) {
    echo 'Update';
    if ($classObj->updateRoute((object) $_POST)) {
        $_SESSION['isRouteUpdated'] = true;
        header("Location: ../../php/manager/edit_route.php");
    }
}

if ($_POST['deleteRoute']) {
    if ($classObj->deleteRoute(((object) $_POST)->id)) {
        $_SESSION['isRouteDeleted'] = true;
        header("Location: ../../php/manager/edit_route.php");
    }
}

?>
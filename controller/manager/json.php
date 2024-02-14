<?php
session_start();
include("../../model/manager/class.php");

$managerClassObj = new managerClass;
// print_r($_SESSION["loginInManager"]);

// foreach ($managerClassObj->selectID('matatuCompanies', $_SESSION["loginInManager"]->company_id) as $data) {
//     print_r($data);
//     echo "<br>";
// }

return $managerClassObj->selectID('matatuCompanies', $_SESSION["loginInManager"]->company_id);
?>
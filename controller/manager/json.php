<?php

include("../../model/manager/class.php");

$managerClassObj = new managerClass;
$matatuDetails = $managerClassObj->select('matatuCompanies')[0];

?>
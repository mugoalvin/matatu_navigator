<?php

include("../../model/manager/class.php");

$managerClassObj = new managerClass;
return $managerClassObj->select('matatuCompanies', $_SESSION["loginInManager"]->company_id)[0];

?>
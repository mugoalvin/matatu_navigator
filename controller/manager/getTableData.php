<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// include('../../model/manager/class.php');

$classObj = new managerClass;
// print_r($classObj->getMatatuDetails('matatuCompanies')[0]);
return $classObj->select('matatuCompanies')[0];

?>
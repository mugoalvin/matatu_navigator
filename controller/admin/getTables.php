<?php
include ("../../model/admin/adminClass.php");

$adminClassObj = new  adminClass;
return $adminClassObj->getAllTables();
?>
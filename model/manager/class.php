<?php
// error_reporting(E_ALL);
// ini_set("display_errors" , 1);

include('DBO.php');

class managerClass {

    function add($obj) {
        $newObj = new DBO;
        $newObj->insertProfile($obj);
        return true;
    }

    function selectAll($tableName) {
        $newObj = new DBO;
        return $newObj->selectAll($tableName);
    }

    function select($tableName, $id) {
        $dboObj = new DBO;
        return $dboObj->select($tableName, $id);
    }

    function descTable($tableName) {
        $dboObj = new DBO;
        return $dboObj->descTable($tableName);
    }

    function updateProfile($obj, $tableName) {
        $dboObj = new DBO;
        $dboObj->update($obj, $tableName);
    }
    
    function deleteFromTable($tableName, $id) {
        $dboObj = new DBO;
        $dboObj->delete($tableName, $id);
    }
    
    function selectManagerAndCompany() {
        $dboObj = new DBO;
        return $dboObj->selectManagerAndCompany();
    }

    function insertToRoutes($obj) {
        $dboObj = new DBO;
        $dboObj->insertToRoutes($obj);
    }
}
?>
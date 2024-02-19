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

    // ==========Traveller's===============================
    function selectWhereId($id) {
        $newObj = new DBO;
        return $newObj->selectAllWhere($id);
    }
    // ===============================================

    function selectAllExcept($tableName, $city) {
        $newObj = new DBO;
        return $newObj->selectAllExcept($tableName, $city);
    }

    function selectAll($tableName) {
        $newObj = new DBO;
        return $newObj->selectAll($tableName);
    }
    function selectID($tableName, $id) {
        $dboObj = new DBO;
        return $dboObj->selectID($tableName, $id);
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
        return $dboObj->delete($tableName, $id);
    }
    
    function selectManagerAndCompany() {
        $dboObj = new DBO;
        return $dboObj->selectManagerAndCompany();
    }

    function insertToRoutes($obj) {
        $dboObj = new DBO;
        return $dboObj->insertToRoutes($obj);
    }
    
    function updateManagersDetails($arrayOfObjs) {
        $dboObj = new DBO;
        return $dboObj->updateManagersDetails($arrayOfObjs);
    }
}
?>
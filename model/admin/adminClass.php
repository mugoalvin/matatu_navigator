<?php

// error_reporting(E_ALL);
// ini_set("display_errors" , 1);

include("adminDBO.php");

class adminClass {
    function getData($tableName) {
        $db = new adminDBO;
        return $db->selectAll($tableName);
    }

    function getAllTables() {
        $db = new adminDBO;
        return $db->getTables();
    }

    function descTable($tableName) {
        $db = new adminDBO;
        return $db->descTable($tableName);
    }

    function getLastCompanyId($tableName) {
        $db = new adminDBO;
        return $db->getLastCompanyId($tableName);
    }

    function insertToManagers($obj) {
        $db = new adminDBO;
        return $db->insertToManagers($obj);
    }
}

?>
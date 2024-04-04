<?php

include('DBO.php');

class feedbackClass{
    function selectWhereId($id) {
        $newObj = new feedbackDBO;
        return $newObj->selectAllWhere($id);
    }
}
?>
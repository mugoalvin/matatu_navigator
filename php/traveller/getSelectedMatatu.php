<?php
session_start();

if (isset($_POST)) {
    $selectedMatatuData = json_decode(file_get_contents('php://input'));
    die;
}
?>
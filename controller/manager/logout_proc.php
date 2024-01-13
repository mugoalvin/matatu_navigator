<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();


print_r( $_SESSION['loginInManager']);
echo '<br>';
print_r($_SESSION['matatuDetails']);

session_destroy();

header('Location: ../../php/manager/home.php')

?>
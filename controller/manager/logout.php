<?php
session_start();

print_r( $_SESSION["loginInManager"] );

session_destroy();

header('Location: ../../php/manager/navbar.php')

?>
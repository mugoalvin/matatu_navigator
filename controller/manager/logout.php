<?php
session_start();

print_r( $_SESSION["loggedInManager"] );

session_destroy();

header('Location: ../../php/manager/navbar.php')

?>
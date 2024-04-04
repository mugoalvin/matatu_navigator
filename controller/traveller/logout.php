<?php
session_start();

print_r( $_SESSION["loginInUser"] );

session_destroy();

header('Location: ../../php/traveller/navbar.php')
?>
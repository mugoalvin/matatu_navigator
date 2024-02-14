<?php
session_start();

print_r( $_SESSION["loginInUser"]);
echo '<br>';

session_destroy();

header('Location: ../../php/traveller/navbar.php')

?>
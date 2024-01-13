<?php
session_start();
if (!$_SESSION["loginInUser"]) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/desktop/dashboard.css">
    <link rel="stylesheet" href="../../css/desktop/traveller/navbar.css">
    <link rel="stylesheet" href="../../css/desktop/traveller/dashboard.css">


    <link rel="stylesheet" href="https://js.arcgis.com/4.28/esri/themes/light/main.css" />
    <script src="https://js.arcgis.com/4.28/"></script>

</head>

<body>

    <?php
    // if ( $_SESSION['availableMatatus'] ) {

    // }
    include('navbar.php');
    ?>

    <main>
        <!-- <p id='latitude'>Alvin</p>
        <p id='longitude'>Mugo</p> -->
        <div id="map"></div>

    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="../../javascript/traveller/home.js"></script>
</body>

</html>
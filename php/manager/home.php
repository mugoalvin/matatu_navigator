<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/desktop/manager/home.css">

    <!-- Reference API Key -->
    <link rel="stylesheet" href="https://js.arcgis.com/4.28/esri/themes/light/main.css" />
    <script src="https://js.arcgis.com/4.28/"></script>

</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION["loginInManager"])) {
        header("Location: ../login.php");
    }

    include("navbar.php");
    
    ?>
    <script>
        let selectedMatatu = <?php echo json_encode($matatuDetails); ?>;
        </script>
    <main>
        <div id="map"></div>
        <button id="getDirectionBtn">Get Directions</button>
    </main>
    <script src="../../javascript/manager/home.js"></script>
    <script>
        let getDirectionsCalled = false

        displayMap(selectedMatatu).then(function(createdMap) {
            document.getElementById("getDirectionBtn").addEventListener("click", function() {
                getDirections(createdMap);
            });
        });
    </script>
</body>

</html>
<?php
include("navbar.php");
$descTableResult = include('../../controller/manager/descMatatuCompanies.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Matatu Details</title>

    <link rel="stylesheet" href="../../css/desktop/manager/create_profile.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <link rel="stylesheet" href="https://js.arcgis.com/4.28/esri/themes/light/main.css" />
    <script src="https://js.arcgis.com/4.28/"></script>

</head>

    <script>
        let selectedMatatu = <?php echo json_encode($matatuDetails); ?>;
    </script>
    <main>
        <div id="formDiv">
            <form class="form" action="../../controller/manager/update_profile.php" method="post">
                <h2>Update Matatu Details</h2>
                <?php
                foreach ($descTableResult as $key => $value) :
                    if ($value->Field == 'id') {
                        continue;
                    }
                    $valueField = $value->Field;
                    $inputBoxValue = $_SESSION['matatuDetails']->$valueField;

                ?>
                <div id='<?php echo $value->Field.$value->Field?>'>
                    <label><?php echo $value->Field?></label>
                    <input
                        type='text' 
                        id='<?php echo $value->Field?>' 
                        name='<?php echo $value->Field?>' 
                        value='<?php echo $inputBoxValue?>'
                    >
                </div>
                
                <?php endforeach ?>
                <div>
                    <input type="submit" value="Submit" class="formBtn" id="submitBtn">
                </div>
            </form>
            <div id="mapDiv">
                <section id="map"></section>
            </div>
        </div>
        <div>
            <p><strong>NB: </strong>Locate on the map presented to fill the Latitude and the Longitude inputs.</p>
        </div>
    </main>
    <script src="../../javascript/manager/home.js"></script>

</html>
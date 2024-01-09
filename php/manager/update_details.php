<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../css/color.css">
    <link rel="stylesheet" href="../../css/desktop/manager/dashboard.css">
    <link rel="stylesheet" href="../../css/desktop/manager/create_profile.css">


    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <link rel="stylesheet" href="https://js.arcgis.com/4.28/esri/themes/light/main.css" />
    <script src="https://js.arcgis.com/4.28/"></script>


</head>

<body>
    <?php

    include("navbar.php");
    $descTableResult = include('../../controller/manager/desc_table.php');

    $selectedMatatuResults = include('../../controller/manager/getTableData.php');
    ?>
    <script>
        let selectedMatatu = <?php echo json_encode($matatuDetails); ?>;
    </script>
    <main>
        <form action="../../controller/manager/update_profile.php" method="post">
            <h2>Update Matatu Details</h2>
            <?php

            foreach ($descTableResult as $key => $value) {
                if ($value->Field == 'id') {
                    $disabled = 'disabled';
                } else {
                    $disabled = '';
                }
                $valueField = $value->Field;
                $inputBoxValue = $selectedMatatuResults->$valueField;
                echo "
                <div id='$value->Field$value->Field'>
                    <label>$value->Field</label>
                    <input
                        type='text' 
                        id='$value->Field' 
                        name='$value->Field' 
                        value='$inputBoxValue'
                    >
                </div>
                ";
            }
            ?>
            <input type="submit" value="Submit" class="formBtn" id="submitBtn">
        </form>
        <div>
            <section id="map"></section>
        </div>
    </main>
    <script src="../../javascript/manager/update_profile.js"></script>
    <script src="../../javascript/manager/home.js"></script>
    <script>
        document.getElementById('idid').style.display = 'none';


        displayMap(selectedMatatu).then(function(createdMap) {
            view = createdMap.view
            view.on('click', () => {
                attachClickEventToMap(createdMap.view);
            })
        })

        const id = (ID) => {
            return document.getElementById(ID);
        }

        function onMapClick(e) {

            var lat = e.mapPoint.latitude;
            var lng = e.mapPoint.longitude;

            const latitudeInput = id('latitude')
            const longitudeInput = id('longitude')

            latitudeInput.value = lat
            longitudeInput.value = lng
        }

        function attachClickEventToMap(view) {
            view.on('click', (event) => {
                onMapClick(event, view);
            });
        }
    </script>
</body>

</html>
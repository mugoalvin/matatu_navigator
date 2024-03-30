<head>
    <title>Create Profile</title>
    <link rel="stylesheet" href="../../css/desktop/manager/create_profile.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<?php
include("navbar.php");
?>

<main>
    <div id="formDiv">
        <form class="form" action="../../controller/manager/newProfile_proc.php" method="post">
            <h2>Create Matatu Profile</h2>
            <div >
                <label 
                    style="
                        display: none;
                    ">Matatu Company id</label>
                <input type="number" name="company_id" readonly value=<?php echo $_SESSION["loggedInManager"]->id ?>
                    style="
                        color: transparent;
                        border: 0;
                        height: 0;
                    ">
            </div>
            <div>
                <label>Matatu Company Name</label>
                <input type="text" name="name">
            </div>
            <div>
                <label>Location's Latitude</label>
                <input type="text" name="latitude" id="latitude">
            </div>
            <div>
                <label>Location's Longitude</label>
                <input type="text" name="longitude" id="longitude">
            </div>
            <div>
                <label>City</label>
                <input type="text" name="city">
            </div>
            <div>
                <input type="submit" value="Create Profile" class="formBtn" id="createBtn">
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
<script src="../../javascript/manager/createProfile.js"></script>

</html>
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

</head>
<body>
    <?php 
    include("navbar.php");
    ?>
    <main>
        <form action="../../controller/manager/newProfile_proc.php" method="post">
            <h2>Create Matatu Profile</h2>
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
            <input type="submit" value="Create Profile" class="formBtn" id="createBtn">
        </form>
        <div>
            <section id="map"></section>
        </div>
    </main>
    <script src="../../javascript/manager/createProfile.js"></script>
</body>
</html>
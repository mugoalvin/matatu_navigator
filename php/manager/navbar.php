<?php
include("../../controller/manager/json.php");

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/desktop/manager/navbar.css">
    <title>Manager Navbar</title>
</head>

<body>
    <header>
        <div>
            First Div
        </div>

        <div id="selectedMatatu">
            <?php
            if ($_SESSION['isMatatuSelected']) {
                echo $matatuDetails->name . ' - ';
                echo $matatuDetails->city;
            } else {
                echo 'Not Logged In';
            }

            ?>
        </div>
        <div>
            <ion-icon name="moon-outline"></ion-icon>
            <ion-icon name="person-outline"></ion-icon>
        </div>
    </header>


    <!-- If Not Logged in -->
    <?php
    if ($_SESSION['isMatatuSelected']) {
        echo '
        <div id="sideBar">
        <div>
            <h2>SideBar</h2>
        </div>
        <div>
            <a href="home.php">Home</a href="#">
        </div>
        <hr>
        <div>
            <a href="new_route.php">Create New Route</a href="#">
        </div>
        <hr>
        <div>
            <a href="update_details.php">Update Matatu Details</a href="#">
        </div>
        <hr>
        <div>
            <a href="delete_profile.php">Delete Matatu Profile</a href="#">
        </div>
        <hr>
        <div>
            <a href="manager_details.php">Managers Details</a href="#">
        </div>
        <hr>
        <div>
            <a href="logout.php">Logout From Company</a href="#">
        </div>
        <hr>
    </div>
    ';
    } else {
        echo '
        <div id="sideBar">
        <div>
            <h2>SideBar</h2>
        </div>
            <div>
                <a href="create_profile.php">Create New Matatu Profile</a href="#">
            </div>
            <div>
                <a href="login2company.php">Login To Company</a href="#">
            </div>
            <div>
                <a href="manager_details.php">Managers Details</a href="#">
                </div>
                </div>
                ';
    }
    ?>
    <!-- <div id="sideBar">
        <div>
            <h2>SideBar</h2>
        </div>
        <div>
            <a href="home.php">Home</a href="#">
        </div>
        <hr>
        <div>
            <a href="new_route.php">Create New Route</a href="#">
        </div>
        <hr>
        <div>
            <a href="update_details.php">Update Matatu Details</a href="#">
        </div>
        <hr>
        <div>
            <a href="delete_profile.php">Delete Matatu Profile</a href="#">
        </div>
        <hr>
        <div>
            <a href="manager_details.php">Managers Details</a href="#">
        </div>
        <hr>
        <div>
            <a href="logout.php">Logout From Company</a href="#">
        </div>
        <hr>
    </div> -->


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
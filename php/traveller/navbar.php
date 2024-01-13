<?php
session_start();

include('../../model/manager/class.php');

if (!$_SESSION["loginInUser"]) {
    header("Location: ../login.php");
}


$_SESSION["allMatatus"] = include('../../controller/manager/getTableData.php');

?>
<script>
    var allMatatus = <?php echo json_encode($_SESSION["allMatatus"]) ?>;
    console.log(allMatatus);
</script>

<head>
    <link rel="stylesheet" href="../../css/desktop/traveller/navbar.css">
</head>
<header>
    <h3>
        Welcome, <?php echo $_SESSION["loginInUser"]->first_name . ' ' . $_SESSION["loginInUser"]->last_name ?>
    </h3>
    <form action="../../controller/traveller/getAvailableMatatus.php" method="post">
        <select name="departure" id="departure">
            <option selected disabled>Choose Departure</option>
            <?php
            $cities = array();

            foreach ($_SESSION["allMatatus"] as $matatu) {
                if (in_array($matatu->city, $cities)) {
                    continue;
                } else {
                    $cities[] = $matatu->city;
                }
            }
            foreach ($cities as $city) {
                echo "
                <option>$city</option>
                ";
            }
            ?>
        </select>
        <select name="destination" id="destination">
            <option selected disabled>Choose Destination</option>
            <?php
            foreach ($cities as $city) {
                echo "
                <option>$city</option>
                ";
            }
            ?>
        </select>
        <!-- <button id='searchBtn'>Search</button>  -->
        <input type="submit" value='Search'>
    </form>
    <div>
        <ion-icon name="moon-outline"></ion-icon>
        <ion-icon name="person-outline"></ion-icon>
    </div>
</header>
<section id="sideBar">
    <h3>Available Matatus</h3>
    <hr>
    <div id='matatuOptions'>
        <?php
        // print_r($_SESSION['availableMatatus']);
        foreach ($_SESSION['availableMatatus'] as $availableMatatu) {
            echo "
                <div id='matatuOption'>
                    <img src='../images/cool-background.png' alt=''>
                    <div id='details'>
                        <snap>$availableMatatu->departure_name</snap>
                        <p>$availableMatatu->price/=</p>
                    </div>
                </div>
            ";
        }
        ?>
    </div>
</section>
<script src="../../javascript/traveller/navbar.js"></script>
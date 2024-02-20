<?php
session_start();
include('../../model/manager/class.php');
$feedback = $_SESSION['feedbacks'];


if (!$_SESSION["loginInUser"]) {
    header("Location: ../login.php");
}
// ==========================If rating is saved==========================
if ($_SESSION['isRatingSaved']) { ?>
    <script>
        alert('Feedback is successfully saved')
    </script>
<?php }
$_SESSION['isRatingSaved'] = false;
// ================================================================

$_SESSION["allMatatus"] = include('../../controller/manager/getTableData.php');
?>
<html lang="en">

<script>
    var feedbacks = <?php echo json_encode($feedback) ?>;
</script>

<script>
    var allMatatus = <?php echo json_encode($_SESSION["allMatatus"]) ?>;
    var departureCity = <?php echo json_encode($_SESSION['departureCity']) ?>;
    var destinationCity = <?php echo json_encode($_SESSION['destinationCity']) ?>;
</script>

<head>
    <link rel="stylesheet" href="../../css/color.css">
    <link rel="stylesheet" href="../../css/desktop/traveller/navbar.css">
    <link rel="stylesheet" href="../../css/mobile/traveller/navbar.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Neonderthaw&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Waterfall&display=swap" rel="stylesheet">
</head>



<header id="navbarHeader">
    <div>
        <ion-icon name="menu"></ion-icon>
        <h3>Matatu Navigator</h3>
    </div>
    <form action="../../controller/traveller/getAvailableMatatus.php" method="post" id="formDesDep">
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
        <button type="submit" id="searchRouteBtn" class="input"><ion-icon name="search"></ion-icon></button>
    </form>
    <div>
        <ion-icon id="darkModeToggle" name="moon"></ion-icon>
        <div id="userAndDropDown" style='position: relative'>
            <div id='user'>
                <?php echo $_SESSION["loginInUser"]->first_name . ' ' . $_SESSION["loginInUser"]->last_name ?>
                <ion-icon name="person-outline"></ion-icon>
                <ion-icon name="chevron-down-outline" id="chevron-down-outline"></ion-icon>
            </div>
            <form id='dropDown' action="../../controller/traveller/logout.php">
                <button><ion-icon name="log-out-outline"></ion-icon>Log Out</button>
            </form>
        </div>
    </div>
</header>


<!-- =======================SIDE BAR=========================== -->
<section id="sideBar">
    <h3>Available Matatus</h3>
    <hr>
    
    <!-- Will remove the styling below -->
    <div id='matatuOptions' style="font-size: 12px">
        <script>
            var availableMatatusObj = <?php echo json_encode($_SESSION['availableMatatus']) ?>
        </script>

        <?php
        $integer = 0;
        foreach ($_SESSION['availableMatatus'] as $availableMatatu): 
        // print_r($availableMatatu);
        // echo "../../images/$availableMatatu->departure_image";
        ?>
            <div id='matatuOption'>
                <img src='../../images/<?php echo ($availableMatatu->departure_image) ? $availableMatatu->departure_image :  $availableMatatu->destination_image?>' alt='Matatu Image Here'>
                <div id='details'>
                    <snap id='departure_name' class='departure_name'>
                        <?php echo $availableMatatu->departure_name ?>
                    </snap>
                    <p id='price' class='price'>Price:
                        <?php echo $availableMatatu->price ?>/=
                    </p>
                    <p id='route_id' class='route_id' style="height: 0; color: transparent">
                        <?php echo $availableMatatu->route_id ?>
                    </p>
                    <div id="starsDiv">
                        <p id="paragraph<?php echo $integer ?>" class="paragraph<?php echo $integer ?>">Div</p>
                        <div id="stars" class="stars<?php echo $integer ?>">
                            <span class="starRating" data-value="1">&#9733;</span>
                            <span class="starRating" data-value="2">&#9733;</span>
                            <span class="starRating" data-value="3">&#9733;</span>
                            <span class="starRating" data-value="4">&#9733;</span>
                            <span class="starRating" data-value="5">&#9733;</span>
                        </div>
                    </div>
                </div>
            </div>

            <?php $integer += 1; endforeach; ?>

    </div>
</section>
<script>

</script>
<script src="../../javascript/traveller/home.js"></script>
<script src="../../javascript/traveller/navbar.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
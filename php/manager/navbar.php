<?php

session_start();

$matatuDetails = (include ("../../controller/manager/json.php"))[0];
include ('../../controller/manager/getRoutesData.php');

if (!isset ($_SESSION["loggedInManager"])) {
    header("Location: ../login.php");
}

if ($matatuDetails) {
    $_SESSION['isMatatuSelected'] = true;
    $_SESSION['matatuDetails'] = $matatuDetails;
} else {
    $_SESSION['isMatatuSelected'] = false;
}

// If matatu profile was deleted
if ($_SESSION['isProfileDataDeleted']): ?>
    <script>
        alert("Profile Successfully Deleted");
    </script>
<?php endif;
$_SESSION['isProfileDataDeleted'] = false;

// If matatu profile is updated
if ($_SESSION['isMatatuProfileUpdated']): ?>
    <script>
        alert("Matatu Profile Updated Successfully")
    </script>
<?php endif;
$_SESSION['isMatatuProfileUpdated'] = false; ?>

<!-- If managers profile is updated -->
<?php if ($_SESSION['isManagersProfileUpdated']): ?>
    <script>
        alert("Managers Details Was Successfully Updated")
    </script>
<?php endif;
$_SESSION['isManagersProfileUpdated'] = false ?>

<!-- If new route was added -->
<?php if ($_SESSION['isRouteAdded']): ?>
    <script>
        alert("New Route Was Successfully Added")
    </script>
<?php endif;
$_SESSION['isRouteAdded'] = false ?>

<!-- If image wasn't uploaded -->
<?php if ($_SESSION['noImageUploaded']): ?>
    <script>
        alert("No image was uploaded or there is an error with the image file")
    </script>
<?php endif;
$_SESSION['noImageUploaded'] = false ?>

<!-- If Route was Updated -->
<?php if ($_SESSION['isRouteUpdated']): ?>
    <script>
        alert("Route Data Was Successfully Updated")
    </script>
<?php endif;
$_SESSION['isRouteUpdated'] = false ?>

<!-- If Route Was Deleted -->
<?php if ($_SESSION['isRouteDeleted']): ?>
    <script>
        alert("Route Data Was Successfully Updated")
    </script>
<?php endif;
$_SESSION['isRouteDeleted'] = false ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/color.css">
    <link rel="stylesheet" href="../../css/desktop/manager/navbar.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Neonderthaw&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Waterfall&display=swap" rel="stylesheet">

    <!-- Reference API Key -->
    <link rel="stylesheet" href="https://js.arcgis.com/4.28/esri/themes/light/main.css" />
    <script src="https://js.arcgis.com/4.28/"></script>
</head>

<body>
    <header>
        <div>
            <!-- <ion-icon name="menu"></ion-icon> -->
            <h3>Matatu Navigator</h3>
        </div>

        <div id="selectedMatatu">
            <?php
            echo ($_SESSION['isMatatuSelected']) ? $matatuDetails->name . ' - ' . $matatuDetails->city : 'No Matatu Logged In';
            ?>
        </div>
        <div>
            <ion-icon id="darkModeToggle" name="moon"></ion-icon>
            <div id="userAndDropDown" style='position: relative'>
                <div id='user'>
                    <?php echo $_SESSION["loggedInManager"]->first_name . ' ' . $_SESSION["loggedInManager"]->last_name ?>
                    <ion-icon name="person-outline"></ion-icon>
                    <ion-icon name="chevron-down-outline" id="chevron-down-outline"></ion-icon>
                </div>
                <form id='dropDown' action="../../controller/traveller/logout.php">
                    <button><ion-icon name="log-out-outline"></ion-icon>Log Out</button>
                </form>
            </div>
        </div>
    </header>

    <?php if ($_SESSION['isMatatuSelected']): ?>
        <div id="sideBar">
            <div>
                <h2>SideBar</h2>
            </div>
            <a class="links" href="home.php">
                <ion-icon name="home"></ion-icon>
                <span>Home</span>
            </a>
            <a class="links" href="new_route.php">
                <ion-icon name="add"></ion-icon>
                <span>Create New Route</span>
            </a>
            <a class="links" href="edit_route.php">
                <ion-icon name="pencil"></ion-icon>
                <span>Edit Route</span>
            </a>
            <a class="links" href="update_details.php">
                <ion-icon name="trending-up"></ion-icon>
                <span>Update Matatu Details</span>
            </a>
            <a class="links" href="delete_profile.php">
                <ion-icon name="trash"></ion-icon>
                <span>Delete Matatu Profile</span>
            </a>
            <a class="links" href="manager_details.php">
                <ion-icon name="information"></ion-icon>
                <span>Managers Details</span>
            </a>
        </div>
    <?php else: ?>
        <div id="sideBar">
            <div>
                <h2>SideBar</h2>
            </div>
            <a class="links" href="create_profile.php">
                <ion-icon name="create"></ion-icon>
                <span>Create Matatu Profile</span>
            </a>
            <a class="links" href="manager_details.php">
                <ion-icon name="information"></ion-icon>
                <span>Managers Details</span>
            </a>
        </div>
    <?php endif ?>

    <script>
        document.getElementById('user').addEventListener('click', () => {
            const dropDown = document.getElementById('dropDown');
            const dropDownButton = document.querySelector('#dropDown button');
            const dropDownIonIcon = document.querySelector('#dropDown ion-icon');
            const dropDownArror = document.getElementById('chevron-down-outline')
            const isHidden = dropDownButton.style.color == 'transparent';

            dropDownButton.style.padding = isHidden ? '5px 10px' : '0';
            dropDownButton.style.height = isHidden ? '30px' : '0';
            dropDownButton.style.color = isHidden ? 'var(--black)' : 'transparent';
            dropDownIonIcon.style.color = isHidden ? 'var(--black)' : 'transparent';
            dropDownArror.style.transform = isHidden ? 'rotateZ(180deg)' : 'rotateZ(0deg)'
        });

        document.querySelector('ion-icon[name=menu]').addEventListener('click', () => {
            const sideBar = document.getElementById('sideBar')
            const mainTag = document.getElementById('main')
            if (sideBar.style.width != '0%') {
                sideBar.style.width = '0%'
                mainTag.style.width = '100%'
            }
            else {
                sideBar.style.width = '20%'
                mainTag.style.width = '80%'
            }
        })
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
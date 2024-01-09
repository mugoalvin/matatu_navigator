<?php
session_start();    
if (!$_SESSION["loginInUser"]){
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
</head>
<body>
    <header>
        <h3>APP NAME</h3>
        <form>
            <select name="departure" id="">
                <option selected disabled>Choose Departure</option>
                <option value="">Option1</option>
                <option value="">Option1</option>
                <option value="">Option1</option>
            </select>
            <select name="destination" id="">
                <option selected disabled>Choose Destination</option>
                <option value="">Option1</option>
                <option value="">Option1</option>
                <option value="">Option1</option>
            </select>
            <input type="submit" value="Search">
        </form>
        <div>
            <ion-icon name="moon-outline"></ion-icon>
            <ion-icon name="person-outline"></ion-icon>
        </div>
    </header>
    <section>
        <main id="sideBar">
            <h3>Available Matatus</h3>
            <hr>
            <div id='matatuOptions'>
            <!-- Matatu Options -->
                <?php
                $max = 20;
                for($i = 0; $i <= $max; $i++ ) {
                    echo "
                    <div id='matatuOption'>
                        <img src='../images/cool-background.png' alt=''>
                        <div id='details'>
                            <snap>Mololine Sacco</snap>
                            <p>500/=</p>
                        </div>
                    </div>
                    ";
                }
                ?>
            </div>


        </main>
        <iframe>Maps</iframe>
    </section>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
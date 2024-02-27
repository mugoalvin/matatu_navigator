<?php
session_start();
if (!$_SESSION["loginInUser"]) {
    header("Location: login.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveller Home</title>

    <link rel="stylesheet" href="../../css/desktop/traveller/dashboard.css">

    <link rel="stylesheet" href="https://js.arcgis.com/4.28/esri/themes/light/main.css" />
    <script src="https://js.arcgis.com/4.28/"></script>
</head>

<?php
include('navbar.php');
?>
<main id="main">
    <div id="map"></div>
    <section id="feedbackSection">

        <!-- ======================Cards====================== -->
        <div class="card">
            <h3>Mololine Sacco</h3>
            <div class="individualFeedback">
                <h4>mugoalvin</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos facere dolore eius earum et repellat
                    perspiciatis at rerum in sunt.</p>
            </div>
            <div class="individualFeedback">
                <h4>maureen</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, earum?</p>
            </div>
        </div>
        <!-- ============================================= -->
    </section>
    <section id="directionSection">
        <h3>Directions Below</h3>
        <div id="directionSectionDiv"></div>
    </section>

    <div id="toggleComment"><ion-icon id="toggleCommentIcon" name="play-back"></ion-icon></div>
    <div id="toggleDirections"><ion-icon id="toggleDirectionsIcon" name="compass-outline"></ion-icon></div>
</main>

<script>
    var feedbackSection = document.getElementById('feedbackSection')
    clearFeedbackSection()
    feedbackSection.innerHTML = generateFeedbackCards(feedbacks);

    document.addEventListener('DOMContentLoaded', function () {
        integer = 0
        var individualFeedback = document.querySelectorAll('.individualFeedback')

        individualFeedback.forEach(individualFeed => {
            var stars = document.querySelectorAll('.stars' + integer + ' .feedbackstarRating');

            stars.forEach(function (star, index) {
                console.log(feedbacks[integer].rating);
                if (index < feedbacks[integer].rating) {
                    star.classList.add("active");
                } else {
                    star.classList.remove("active");
                }
            });

            integer += 1
        })
    });
</script>
<script src="../../javascript/traveller/dashboard.js"></script>

</html>
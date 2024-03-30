<?php
session_start();
if (!$_SESSION["loginInUser"]) {
    header("Location: login.php");
}
include('navbar.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveller Home</title>

    <link rel="stylesheet" href="../../css/desktop/traveller/dashboard.css">
</head>
<main id="main">
    <div id="map"></div>
    <section id="feedbackSection"></section>
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
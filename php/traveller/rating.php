<?php
include("navbar.php");
?>
<head>
    <link rel="stylesheet" href="../../css/desktop/traveller/rating.css">
</head>

<main>
    <form action="../../controller/traveller/addRating.php" method="post" id="ratingForm" class="form">
        <div>
            <label>Route ID:</label>
            <input name="route_id" id="route_id_value" type="number">
        </div>
        <div>
            <label>User ID:</label>
            <input name="user_id" id="user_id_value" type="number" value="<?php echo $_SESSION["loginInUser"]->id ?>">
        </div>
        <div>
            <label>Stars:</label>
            <input name="rating" id="rating" type="number" max="5" min="0">
            <div id="stars">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div>
        </div>
        <div>
            <label>Feedback:</label>
            <input name="feedback" type="textarea" id="feedback" placeholder="Leave a short comment (optional)" />
        </div>
        <div>
            <button id="submit" class="formBtn">Confirm</button>
        </div>
    </form>
</main>
<script src="../../javascript/traveller/rating.js"></script>
</html>
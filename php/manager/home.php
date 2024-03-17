<?php
include("navbar.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../../css/desktop/manager/home.css">
</head>
<script>
    let selectedMatatu = <?php echo json_encode($matatuDetails); ?>;
</script>
<main>
    <?php if (!$_SESSION['isMatatuSelected']): ?>
        <h2>Hi there, you must be the new manager.</h2>
        <p>You currently don't have a Matatu Profile. Kindly go and create one. You can do this by clicking on the "Create
            Matatu Profile" in the sidebar section. Make sure to fill in all the inputs.</p>
    <?php else: ?>
        <div id="map"></div>
    <?php endif; ?>
</main>
<script src="../../javascript/manager/home.js"></script>
<script>
    let getDirectionsCalled = false

    displayMap(selectedMatatu).then(function (createdMap) {
        document.getElementById("getDirectionBtn").addEventListener("click", function () {
            getDirections(createdMap);
        });
    });
</script>

</html>
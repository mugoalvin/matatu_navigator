<?php
include("navbar.php");
$descTableResult = include('../../controller/manager/descMatatuCompanies.php');
$_SESSION['isMatatuSelected'] = !$matatuDetails && $descTableResult ? false : true;
?>
<head>
    <title>Delete Profile</title>
    <link rel="stylesheet" href="../../css/color.css">
    <link rel="stylesheet" href="../../css/desktop/manager/create_profile.css">
</head>

<main>
    <form class="form" action="../../controller/manager/deleteProfile_proc.php" method="post">
        <h2>What you are about to delete</h2>
        <?php
        foreach ($descTableResult as $key => $value) {
            if ($value->Field == 'id') {
                $_SESSION['idToDelete'] = $matatuDetails->{$value->Field};
                continue;
            }
            $inputBoxValue = $matatuDetails->{$value->Field};
            ?>
            <style>
                #data {
                    flex-direction: row;
                }
                /* #data label {
                    width: 25%;
                } */
            </style>
            <div id='data'>
            <!-- <div> -->
                <label id='label'><?php echo $value->Field?>:</label>
                <span><?php echo $inputBoxValue?></span>
                <!-- <input type="text" value="<?php echo $inputBoxValue?>"> -->
            </div>
        <?php } ?>
        <div id='buttonDiv'>
            <input type="submit" value="Delete" class="formBtn" id="deleteBtn">
            <input type="button" value="Cancel" class="formBtn" onclick="cancelDelete()">
        </div>
    </form>
</main>
<script>
    document.querySelectorAll('#label').forEach(label => {
        label.innerText = label.innerText.charAt(0).toUpperCase() + label.innerText.slice(1);
    });

    function cancelDelete() {
        alert('Delete operation canceled.');
        location.href = "home.php"
    }
</script>

</html>
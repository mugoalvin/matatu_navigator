<?php
include('navbar.php');
?>

<head>
    <link rel="stylesheet" href="../../css/desktop/manager/create_profile.css">
    <link rel="stylesheet" href="../../css/desktop/admin/home.css">
    <title>Edit Route</title>
</head>
<style>
    main {
        overflow-y: scroll;
    }
</style>
<main>
    <h2>Edit Routes</h2>
    <form action="" method="post">
        <select name="matatuToEdit">
            <option selected disabled>Select Matatu To Edit</option>
            <?php
            foreach ($routeData as $data) {
                echo "
                <option value='$data->city'>$data->city</option>
                ";
            }
            ?>
        </select>
        <button>Click Me</button>
    </form>

    <?php
    foreach ($routeData as $data) {
        if ($data->city == $_POST['matatuToEdit']):
            foreach ($data as $key => $value):
                $dataType = 'text';
                if ($key == 'departureCity' || $key == 'destinationCity') {
                    continue;
                }
                if ($key == 'id' || $key == 'price') {
                    $dataType = 'number';
                }
                if ($key == 'id') {
                    $_SESSION["routeId"] = $value;
                    continue;
                }
                ?>
                <form class="form" action="../../controller/manager/editRoutes.php" method="post">
                    <div>
                        <label>
                            <?php echo $key ?>
                        </label>
                        <input type="<?php echo $dataType ?>" name="<?php echo $key ?>" value="<?php echo $value ?>">
                    </div>
                <?php endforeach; ?>
                <div id='buttonDiv'>
                    <input type="submit" value="Update Route" class="formBtn" name="updateRoute">
                    <input type="submit" value="Delete Route" class="formBtn" name="deleteRoute">
                </div>
            </form>
        <?php endif;
    }
    ?>
</main>
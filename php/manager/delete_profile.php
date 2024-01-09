<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../css/color.css">
    <link rel="stylesheet" href="../../css/desktop/manager/dashboard.css">
    <link rel="stylesheet" href="../../css/desktop/manager/create_profile.css">

</head>

<body>
    <!-- <h2>Manager Dashboard</h2> -->
    <?php

    // error_reporting(E_ALL);
    // ini_set("display_errors" , 1);

    include("navbar.php");


    $descTableResult = include('../../controller/manager/desc_table.php');

    $selectedMatatuResults = include('../../controller/manager/getTableData.php');

    if (!$selectedMatatuResults && $descTableResult) {
        $_SESSION['isMatatuSelected'] = false;
    } else {
        $_SESSION['isMatatuSelected'] = true;
    }


    ?>
    <main>
        <style>
            #data {
                display: block;
            }

            #data label {
                margin-inline-end: 3%;
            }

            #buttonDiv {
                flex-direction: row;
                justify-content: center;
                gap: 10%;
            }

            #buttonDiv>.btns {
                min-width: auto;
                padding: 1% 2% 1% 2%;
                border: solid 1px var(--black);
            }
        </style>
        <form action="../../controller/manager/deleteProfile_proc.php" method="post">
            <h2>What you are about to delete</h2>

            <?php

            foreach ($descTableResult as $key => $value) {
                // if ($value->Field == 'id') {
                //     continue;
                // }
                $valueField = $value->Field;
                $inputBoxValue = $selectedMatatuResults->$valueField;
                echo "
                <div id='data'>
                    <label id='label'>$valueField: </label>
                    <input name='$valueField' value = '$inputBoxValue'>
                </div>
                ";
            }
            ?>
            <div id='buttonDiv'>
                <input type="submit" value="Delete" class="btns" id="deleteBtn">
                <input type="button" value="Cancel" class="btns" onclick="cancelDelete()">
            </div>
        </form>
    </main>
    <script>
        document.querySelectorAll('#label').forEach(label => {
            label.style.fontWeight = 900
            label.innerText = label.innerText.charAt(0).toUpperCase() + label.innerText.slice(1);
        });

        function cancelDelete() {
            alert('Delete operation canceled.');
        }
    </script>
</body>

</html>
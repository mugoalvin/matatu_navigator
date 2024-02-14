<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/desktop/manager/dashboard.css">
    <link rel="stylesheet" href="../../css/desktop/manager/create_profile.css">

</head>

<body>
    <!-- <h2>Manager Dashboard</h2> -->
    <?php
    include("navbar.php");

    $descTableResult = include('../../controller/manager/descManagerDetails.php');


    ?>
    <main>
        <style>
            #data {
                display: block;
            }

            #data label {
                margin-inline-end: 3%;
                font-weight: 900;
            }
        </style>
        <form action="../../controller/manager/deleteProfile_proc.php" method="post">
            <h2>Managers Details</h2>

            <?php
            
            foreach ($descTableResult as $result) {

                if ($result->Field == 'company_id') {
                    $result->Field = 'company_name';
                    $inputBoxValue = $matatuDetails->name;
                } else {
                    $inputBoxValue = $_SESSION["loginInManager"]->{$result->Field};
                }

                if ($result->Field == 'id') {
                    continue;
                }

                echo "
                <div id='data'>
                    <label id='label'>$result->Field: </label>
                    <span>$inputBoxValue</span>
                </div>
                ";
            }
            echo "
            <div id='data'>
                <label id='label'>city: </label>
                <span>$matatuDetails->city</span>
            </div>
            ";
            ?>
        </form>

    </main>
    <script>
        document.querySelectorAll('#label').forEach(label => {
            label.style.fontWeight = 900
            label.innerText = label.innerText.charAt(0).toUpperCase() + label.innerText.slice(1);

            label.innerText = label.innerText.replace('_', ' ')
            if (label.innerText[label.innerText.indexOf(' ') + 1] !== undefined) {
                label.innerText = label.innerText.replace('_', ' ');

                const secondWordStart = label.innerText.indexOf(' ') + 1;
                if (secondWordStart !== -1) {
                    label.innerText = label.innerText.substr(0, secondWordStart) +
                    label.innerText[secondWordStart].toUpperCase() +
                    label.innerText.substr(secondWordStart + 1);
                }
            }
        });
    </script>
</body>

</html>
<?php
session_start();
include("navbar.php");
$descTableResult = include('../../controller/manager/descManagerDetails.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Details</title>

    <link rel="stylesheet" href="../../css/desktop/manager/create_profile.css">
</head>

<main>
    <style>
        .form {
            overflow-y: scroll;
        }
    </style>
    <form class="form" action="../../controller/manager/updatePersonalProfile.php" method="post">
        <h2>Managers Details</h2>
        <?php
        foreach ($descTableResult as $result) :
            if ($result->Field == 'id') {
                $_SESSION['managersId'] = $_SESSION["loginInManager"]->{$result->Field};
                continue;
            }

            if ($result->Field == 'company_id') {
                $result->Field = 'company_name';
                $inputBoxValue = $matatuDetails->name;
                continue;
            }

            if ($result->Field == 'password') {
                $inputBoxValue = '';
            }

            else {
                $inputBoxValue = $_SESSION["loginInManager"]->{$result->Field};
            }
            ?>
            <div>
                <label id='label'><?php echo $result->Field?>: </label>
                <input name=<?php echo $result->Field ?> value=<?php echo $inputBoxValue ?>></input>
            </div>
        <?php endforeach; ?>
        <div>
            <button class="formBtn">Update Personal Profile</button>
        </div>
    </form>

</main>
<script>
    document.querySelectorAll('#label').forEach(label => {
        // label.style.fontWeight = 100
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

</html>
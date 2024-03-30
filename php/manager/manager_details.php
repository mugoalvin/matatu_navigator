<?php
session_start();
include("navbar.php");
include("../../controller/manager/getAllManagerUsernames.php");
$descTableResult = include('../../controller/manager/descManagerDetails.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Details</title>
    <link rel="stylesheet" href="../../css/color.css">
    <link rel="stylesheet" href="../../css/desktop/manager/create_profile.css">
</head>
<script>
    var managerUsernames = <?php echo json_encode($managerUsernames)?>
</script>
<main>
    <style>
        .form {
            overflow-y: scroll;
        }
        .form div p{
            font-size: 12px;
            color: var(--errorText);
        }
    </style>
    <form class="form" action="../../controller/manager/updatePersonalProfile.php" method="post">
        <h2>Managers Details</h2>
        <?php
        foreach ($descTableResult as $result) :
            if ($result->Field == 'id') {
                $_SESSION['managersId'] = $_SESSION["loggedInManager"]->{$result->Field};
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
                $inputBoxValue = $_SESSION["loggedInManager"]->{$result->Field};
            }

            
            ?>
            <div>
                <label id='label'><?php echo $result->Field?>: </label>
                <input name=<?php echo $result->Field ?> id="<?php echo $result->Field ?>Input" value=<?php echo $inputBoxValue ?>></input>
                <?php if ($result->Field == "username") : ?>
                    <p class="errorMessages" id="usernameError"></p>
                    <?php endif; ?>
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

    managerUsernames.forEach(usernames => {
        errorMsg = ""
        if (usernames.username == document.getElementById("usernameInput").value) {
            errorMsg = "Username already exists"
            console.log("Found");
            break
        }
        document.getElementById("usernameError").innerText = errorMsg
    });
    // document.getElementById("usernameInput").addEventListener("input", () => {
    // })
</script>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/color.css">

    <link rel="stylesheet" href="../../css/desktop/manager/navbar.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Neonderthaw&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Waterfall&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</head>

<body>
    <?php
    session_start();
    $tables = include("../../controller/admin/getTables.php");
    ?>
    <header>
        <div>Welcome, Admin</div>
        <div>
            <h3>Matatu Navigator</h3>
        </div>
        <div>
            <ion-icon id="darkModeToggle" name="moon"></ion-icon>
            <div id="userAndDropDown" style='position: relative'>
                <div id='user'>
                    <?php echo $_SESSION["loginInManager"]->first_name . ' ' . $_SESSION["loginInManager"]->last_name ?>
                    <ion-icon name="person-outline"></ion-icon>
                    <ion-icon name="chevron-down-outline" id="chevron-down-outline"></ion-icon>
                </div>
                <form id='dropDown' action="../../controller/traveller/logout.php">
                    <button><ion-icon name="log-out-outline"></ion-icon>Log Out</button>
                </form>
            </div>
        </div>
    </header>

    <div id="sideBar">
        <div>
            <h2>Side Bar</h2>
        </div>
        <a class="links" href="home.php">
            <ion-icon name="cloud"></ion-icon>
            <span>Databases</span>
        </a>
        <a class="links" href="createManager.php">
            <ion-icon name="person-add"></ion-icon>
            <span>Create Manager</span>
        </a>
    </div>


    <script>
        document.getElementById('user').addEventListener('click', () => {
            const dropDown = document.getElementById('dropDown');
            const dropDownButton = document.querySelector('#dropDown button');
            const dropDownIonIcon = document.querySelector('#dropDown ion-icon');
            const dropDownArror = document.getElementById('chevron-down-outline')
            const isHidden = dropDownButton.style.color == 'transparent';

            dropDownButton.style.padding = isHidden ? '5px 10px' : '0';
            dropDownButton.style.height = isHidden ? '30px' : '0';
            dropDownButton.style.color = isHidden ? 'var(--black)' : 'transparent';
            dropDownIonIcon.style.color = isHidden ? 'var(--black)' : 'transparent';
            dropDownArror.style.transform = isHidden ? 'rotateZ(180deg)' : 'rotateZ(0deg)'
        });

        document.querySelector('ion-icon[name=menu]').addEventListener('click', () => {
            const sideBar = document.getElementById('sideBar')
            const mainTag = document.getElementById('main')
            if (sideBar.style.width != '0%') {
                sideBar.style.width = '0%'
                mainTag.style.width = '100%'
            }
            else {
                sideBar.style.width = '20%'
                mainTag.style.width = '80%'
            }
        })
    </script>
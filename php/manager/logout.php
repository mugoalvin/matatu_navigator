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
    <?php
    include("navbar.php");
    ?>
    <main>
        <form action="../../controller/manager/logout_proc.php" method="post">
            <input type="submit" value="Click to Logout">
        </form>
    </main>
</body>

</html>
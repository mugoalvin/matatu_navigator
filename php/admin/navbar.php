<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="../../css/desktop/admin/navbar.css">
</head>
<body>
    <?php
    session_start();
    $tables = include("../../controller/admin/getTables.php");
    ?>
    <header>
        <div>Welcome, Admin</div>
        <div>Second</div>
        <div>Third</div>
    </header>
    <section>
        <h3>Side Bar</h3>
        <ul>
            <li><a href="home.php">Databases</a></li>
            <li><a href="createManager.php">Create Manager</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
        </ul>
    </section>
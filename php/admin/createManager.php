<?php
include('navbar.php');
?>
<head>
    <link rel="stylesheet" href="../../css/color.css">
    <link rel="stylesheet" href="../../css/desktop/manager/dashboard.css">
    <link rel="stylesheet" href="../../css/desktop/manager/create_profile.css">
</head>
<main>
    <?php
    include("../../controller/admin/getLastCompanyID.php");
    ?>
    <h2>Create Manager</h2>
    <form action="../../controller/admin/addManager.php" method="post">
        <div>
            <label>Company Id:</label>
            <input type="number" name="company_id" readonly value="<?php echo $company_id+1 ?>">
        </div>
        <div>
            <label>First Name:</label>
            <input type="text" name="first_name">
        </div>
        <div>
            <label>Last Name:</label>
            <input type="text" name="last_name">
        </div>
        <div>
            <label>username:</label>
            <input type="text" name="username">
        </div>
        <!-- <div>
            <label>Password:</label>
            <input type="text" name="password">
        </div> -->
        <input type="submit" value="Submit" class="formBtn" id="submitBtn">
    </form>

</main>
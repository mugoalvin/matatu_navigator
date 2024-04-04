<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/color.css">
    <link rel="stylesheet" href="../css/desktop/register.css">
    <link rel="stylesheet" href="../css/mobile/register.css">
    <title>Registration</title>
</head>
<body>
    <form action="../controller/login/login_proc.php" method="post">
        <h2>Login Page</h2>
        <div>
            <label>Category:</label>
            <select name="userCategory" id="userCategory">
                <option selected disabled>Select From The Options</option>
                <option value="administrator">Administrator</option>
                <option value="manager">Manager</option>
                <option value="traveller">Traveller</option>
            </select>
        </div>
        <div>
            <label>Username:</label>
            <input type="text" name="username" id="usernameInput">
            <p id="usernameError" class="errorMessages"></p>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" id="password">
            <ion-icon id="showPassIcon" name="eye-outline"></ion-icon>
        </div>
        <div>
            <input id="button" type="submit" value="Login" name="action" disabled>
        </div>
        <a href="registration.php">Dont Have An Account? Sign Up</a>
    </form>

    <?php if($_SESSION['isCredentialsInvalid']) :?>
        <script>
            alert("Confirm Login Credentials")
        </script>
    <?php endif; $_SESSION['isCredentialsInvalid'] = false?>

    <script src="../javascript/register.js"></script>
    <script src="../javascript/login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
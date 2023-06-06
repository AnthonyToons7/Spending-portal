<?php 
session_start();
if ($_SESSION["PORTAL_LOGGEDIN"] != true){
    header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account settings</title>
</head>
<body>
    <main>
        <div class="update-box">
            <form action="create-process.php" method="POST">
                <input type="text" name="username" placeholder="username" required>
                <input type="email" name="email" placeholder="email" required>
                <input type="password" name="password" placeholder="password" required>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </main>
    <script src="../js/script.js"></script>
</body>
</html>
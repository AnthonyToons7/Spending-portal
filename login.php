<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="login-box">
            <form action="crud-pages/process-login.php" method="POST">
                <input type="text" name="username" placeholder="username" required>
                <input type="email" name="email" placeholder="email" required>
                <input type="password" name="password" placeholder="password" required>
                <input type="submit" name="submit" value="Login">
            </form>
            <!-- User can create an account if they don't have one -->
            <div class="no-account">
                <p>Don't have an account?</p>
                <a href="crud-pages/create-account.php" class="button-blue">Make one!</a>
            </div>
        </div>
    </main>
</body>
</html>
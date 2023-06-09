<?php
include "../dbpasswords.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (isset($_POST["submit"])) {
    $mysqli = new mysqli($one, $two, $three, $four, "3306");
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $qry = "SELECT USER_ID FROM users WHERE USER_USERNAME = ? AND USER_EMAIL = ? AND USER_PASSWORD = ?";
        $mysqli_stmt = $mysqli->prepare($qry);
        $mysqli_stmt->bind_param('sss', $username, $email, $password);
        $mysqli_stmt->execute();

        $result = $mysqli_stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["PORTAL_LOGGEDIN"] = true;
            header('Location: ../pages/dashboard.php?id=' . $row["USER_ID"]);
            exit();
        } else {
            $_SESSION["PORTAL_LOGGEDIN"] = false;
            header('Location: ../login.php');
            exit();
        }
    }
}
?>

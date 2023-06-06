<?php
include "../dbpasswords.php";
session_start();
if (isset($_POST["submit"])) {
    $mysqli = new mysqli($one,$two,$three,$four, "3306");
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $qry = "INSERT INTO users (USER_USERNAME, USER_EMAIL, USER_PASSWORD) VALUES (?, ?, ?);";
        $mysqli_stmt = $mysqli->prepare($qry);
        $mysqli_stmt->bind_param('sss', $username, $email, $password);
        $mysqli_stmt->execute();

        $result = $mysqli_stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION["PORTAL_LOGGEDIN"] = true;
            header('Location: ../pages/dashboard.php');
        }
        else {
            $_SESSION["PORTAL_LOGGEDIN"] = false;
            header('Location: ../login.php');
        }
    }
}
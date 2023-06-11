<?php
include "../dbpasswords.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = $_GET["id"];
$title = $_GET["title"];
$date = $_GET["date"];
$amount = $_GET["amount"];
$desc = $_GET["desc"];

$mysqli = new mysqli($one, $two, $three, $four, "3306");

$qry = "INSERT INTO spendings (SPENDING_AMOUNT, SPENDING_DATE, SPENDING_TITLE, SPENDING_DESCRIPTION, USER_ID) VALUES (?,?,?,?,?)";
$mysqli_stmt = $mysqli->prepare($qry);
$mysqli_stmt->bind_param('isssi', $amount, $date, $title, $desc, $id);
$mysqli_stmt->execute();
$result = $mysqli_stmt->get_result();
$mysqli->close();
header("Location:../pages/dashboard.php");
?>
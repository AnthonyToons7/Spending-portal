<?php 
include "../dbpasswords.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if ($_SESSION["PORTAL_LOGGEDIN"] != true){
    header("Location:../login.php");
}
$id = $_GET["id"];
$mysqli = new mysqli($one, $two, $three, $four, "3306");
$qry = "SELECT SPENDING_AMOUNT, SPENDING_DATE, SPENDING_TITLE, SPENDING_DESCRIPTION FROM spendings WHERE USER_ID = ? AND SPENDINGS_ID=?;";
$mysqli_stmt = $mysqli->prepare($qry);
$mysqli_stmt->bind_param('i', $id);
$mysqli_stmt->execute();
$result = $mysqli_stmt->get_result();
$spendings = array(); // Initialize the array
if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) {
        $array = array(); // Create a subarray for each row
        $array["SPENDING_AMOUNT"] = $row["SPENDING_AMOUNT"];
        $array["SPENDING_DATE"] = $row["SPENDING_DATE"];
        $array["SPENDING_TITLE"] = $row["SPENDING_TITLE"];
        $array["SPENDING_TITLE"] = $row["SPENDING_TITLE"];
    }
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($array);
?>

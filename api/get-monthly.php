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
$qry = "SELECT SPENDING_AMOUNT, SPENDING_DATE, SPENDING_TITLE FROM spendings WHERE USER_ID = ? ORDER BY SPENDING_DATE DESC;";
$mysqli_stmt = $mysqli->prepare($qry);
$mysqli_stmt->bind_param('i', $id);
$mysqli_stmt->execute();
$result = $mysqli_stmt->get_result();
$spendings = array(); // Initialize the array
if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) {
        $subArray = array(); // Create a subarray for each row
        $subArray["SPENDING_AMOUNT"] = $row["SPENDING_AMOUNT"];
        $subArray["SPENDING_DATE"] = $row["SPENDING_DATE"];
        $subArray["SPENDING_TITLE"] = $row["SPENDING_TITLE"];
        $spendings[] = $subArray; // Append the subarray to the main array
    }
}

// Sort the spendings by month
usort($spendings, function($a, $b) {
    $dateA = strtotime($a["SPENDING_DATE"]);
    $dateB = strtotime($b["SPENDING_DATE"]);
    return $dateA - $dateB;
});

// Group spendings by month
$groupedSpendings = array();
foreach ($spendings as $spending) {
    $month = date("F Y", strtotime($spending["SPENDING_DATE"]));
    $groupedSpendings[$month][] = $spending;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($groupedSpendings);
?>

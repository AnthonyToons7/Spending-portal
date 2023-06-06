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
$mysqli = new mysqli($one,$two,$three,$four, "3306");
$qry = "SELECT SPENDING_AMOUNT, SPENDING_DATE, SPENDING_TITLE FROM spendings WHERE USER_ID = ? ORDER BY SPENDING_DATE DESC LIMIT 3 ;";
$mysqli_stmt = $mysqli->prepare($qry);
$mysqli_stmt->bind_param('i', $id);
$mysqli_stmt->execute();
$result = $mysqli_stmt->get_result();
$content = "";
if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) {
        $content .= '<div class="container recent-spending d-flex align-items-center mb-3">';
        $content .= '<div class="date col-3">'.$row["SPENDING_DATE"].'</div>';
        $content .= '<div class="reason col-3">'.$row["SPENDING_TITLE"].'</div>';
        $content .= '<div class="amount col-3">&euro;'.$row["SPENDING_AMOUNT"].'</div>';
        $content .= '<div class="col-3 buttons-edit-remove d-flex justify-content-evenly">';
        $content .= '<a class="button button-edit">Edit</a>';
        $content .= '<a class="button button-remove">Remove</a>';
        $content .= '</div>';
        $content .='</div>';
    }
}
?>
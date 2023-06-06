<?php 
include "../dbpasswords.php";
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
        $content .= '<a class="button button-view">View</a>';
        $content .= '<a class="button button-edit">Edit</a>';
        $content .= '<a class="button button-remove">Remove</a>';
        $content .= '</div>';
        $content .='</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.6.1.js"></script>
</head>
<body>
    <header>
        <ul class="nav mobile-nav flex-column mb-4">
            <li><a href="dashboard.php?id=<?=$id?>">Dashboard</a></li>
            <li><a href="#">All spendings</a></li>
            <li><a href="#">Create new</a></li>
            <li><a href="#">Add note</a></li>
            <li><a href="profile.php">Account</a></li>
            <li><a href="https://anthonytoons.nl">Main site</a></li>
        </ul>
    </header>
    <main>
        <div class="amount-spent-month">
            <p>Amount spent this month:</p>
            <h5 id="amount-spent">€1000</h5>
        </div>
        <div class="d-flex">
            <section class="container sidebar d-flex justify-content-between flex-column col-2">
                <div class="row">
                    <div class="col-2"></div>
                    <ul class="col-10 pt-3">
                        <li><a href="dashboard.php?id=<?=$id?>">Dashboard</a></li>
                        <li><a href="#">All spendings</a></li>
                        <li><a href="#">Create new</a></li>
                        <li><a href="#">Add note</a></li>
                        <li><a href="profile.php">Account</a></li>
                        <li><a href="https://anthonytoons.nl">Main site</a></li>
                    </ul>
                </div>
                <div class="row">
                <div class="col-2"></div>
                <ul class="col-10 pb-3">
                        <li>Log out</li>
                    </ul>
                </div>
            </section>
            <section class="dashboard-content col-10">
                <div class="col-12 top-bar mb-4"></div>
                <div class="container">
                    <div class="row mx-auto">
                        <h1>Statistics <?= date("Y"); ?></h1>
                    </div>
                    <div class="row stat-row">
                        <div class="statistics col-12 mb-3">
                            <div class="container">
                                <div class="row">
                                    <div class="container col-1 stats-container-cash d-flex flex-column-reverse"></div>
                                    <div class="col-11 container">
                                        <div class="row bar-container d-flex align-items-end col-11"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container d-grid justify-items-center col-11" style="padding:unset;">
                                        <div class="container col-11 stats-container d-flex mx-auto">
                                            <div class="row col-12"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="recent-spendings col-12">
                            <div class="container col-12 d-flex align-items-center mb-4">
                                <div class="content col-10 mx-auto">
                                    <h1>Recent spendings</h1>
                                </div>
                                <div class="container col-2 d-flex justify-content-end">
                                    <div class="add-new d-flex justify-content-center align-items-center">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" style="fill:#fff;" width="30px" height="30px" viewBox="0 0 122.875 122.648"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M108.993,47.079c7.683-0.059,13.898,6.12,13.882,13.805 c-0.018,7.683-6.26,13.959-13.942,14.019L75.24,75.138l-0.235,33.73c-0.063,7.619-6.338,13.789-14.014,13.78 c-7.678-0.01-13.848-6.197-13.785-13.818l0.233-33.497l-33.558,0.235C6.2,75.628-0.016,69.448,0,61.764 c0.018-7.683,6.261-13.959,13.943-14.018l33.692-0.236l0.236-33.73C47.935,6.161,54.209-0.009,61.885,0 c7.678,0.009,13.848,6.197,13.784,13.818l-0.233,33.497L108.993,47.079L108.993,47.079z"/></g></svg>
                                    </div>
                                </div>
                            </div>
                            <?=$content?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <footer>

    </footer>
    <input type="hidden" value="<?=$id?>" id="id">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>
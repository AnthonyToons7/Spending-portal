<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <ul class="nav mobile-nav d-flex flex-column mb-4">
            <li>Dashboard</li>
            <li>Create new</li>
            <li>Add note</li>
            <li>Account</li>
            <li>Log out</li>
        </ul>
    </header>
    <main>
        <div class="content">
            <section class="sidebar d-flex flex-column col-3">
                <ul>
                    <li>Dashboard</li>
                    <li>Create new</li>
                    <li>Add note</li>
                    <li>Account</li>
                </ul>
                <ul>
                    <li>Log out</li>
                </ul>
            </section>
            <section class="dashboard-content col-9">
                <div class="content">
                    <div class="statistics col-5">
                        <div class="d-grid">
                            <div class="col-1"></div>
                            <div class="col-11 stats-container"></div>
                            <div class="col-11"></div>
                        </div>
                    </div>
                    <div class="recent-spendings col-5"></div>
                </div>
            </section>
        </div>
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>
</html>
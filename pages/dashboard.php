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
            <li>Dashboard</li>
            <li>All spendings</li>
            <li>Create new</li>
            <li>Add note</li>
            <li>Account</li>
            <li>Log out</li>
        </ul>
    </header>
    <main>
        <div class="content d-flex">
            <section class="sidebar d-flex flex-column col-3">
                <ul>
                    <li>Dashboard</li>
                    <li>All spendings</li>
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
                    <div class="statistics col-12 mb-3">
                        <div class="d-grid">
                            <div class="col-1"></div>
                            <div class="col-11 stats-container"></div>
                            <div class="col-11"></div>
                        </div>
                    </div>
                    <div class="recent-spendings col-12">
                        <div class="content col-12 d-flex align-items-center mb-4">
                            <div class="content col-9">
                                <h1>Recent spendings</h1>
                            </div>
                            <div class="content col-2 d-flex justify-content-center">
                                <div class="add-new"></div>
                            </div>
                            <div class="content col-1"></div>
                        </div>
                        <div class="content recent-spending d-flex">
                            <div class="date col-3">6-6-2023</div>
                            <div class="reason col-3"><p>Gamecube controller</p></div>
                            <div class="amount col-3">&euro;20,00</div>
                            <div class="col-3 buttons-edit-remove d-flex">
                                <button>Edit</button>
                                <button>Remove</button>
                            </div>
                        </div>
                        <div class="content recent-spending d-flex">
                            <div class="date col-3">6-6-2023</div>
                            <div class="reason col-3"><p>Double dash</p></div>
                            <div class="amount col-3">&euro;40,00</div>
                            <div class="col-3 buttons-edit-remove d-flex">
                                <button>Edit</button>
                                <button>Remove</button>
                            </div>
                        </div>
                        <div class="content recent-spending d-flex">
                            <div class="date col-3">6-6-2023</div>
                            <div class="reason col-3"><p>Gamecube</p></div>
                            <div class="amount col-3">&euro;120,00</div>
                            <div class="col-3 buttons-edit-remove d-flex">
                                <button>Edit</button>
                                <button>Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>
</html>
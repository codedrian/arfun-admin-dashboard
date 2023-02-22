<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('locationguard.php');
    ?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Arfun | Create Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        #quizzes .view-quiz{
            position:relative;
            left:80%;
            margin:20px 0 0 0;
        }
        
        #quizzes a:link, a:visited{
            background-color: #06357A;
            color: white;
            padding: 8px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size:13px;
            border-radius:3px;
        }

        #quizzes a:hover, a:active {
        background-color: blue;
        }

    </style>
    </head>

<body class="sb-nav-fixed">
    <?php
    include('authentication.php');
    ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">
            <img src="assets/img/logo.png" alt="logo" width="50" height="50" class="logo">ArFun E-Learning</a>
        <!-- Sidebar Toggle-->

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div> -->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i> <span id="dispName">User</span></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="account.php">Edit Account</a>
                        <a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <?php
        include('side-nav.php');
        ?>
        <div id="layoutSidenav_content">
            <main>

            <div id="quizzes">
                    <a href="quiz-edit.php" class="view-quiz">View Created Quizzes</a>
                    </div>

                <div class="container-fluid px-4">
                    <div class="container mt-3 d-flex justify-content-center">
                    
                        <form class="w-100" id="main-form">
                            <div class="rounded-3 my-4 p-4 bg-light border border-2 shadow ">
                                <div class="rowd-flex flex-column">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="inp-quiz-name" class="form-label h6 mb-3">Quiz name</label>
                                            <input type="text" class="form-control" id="inp-quiz-name"
                                                placeholder="Quiz 1">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="inp-quiz-instruct"
                                                class="form-label h6 mb-3">Instruction</label>
                                            <input type="text" class="form-control" id="inp-quiz-instruct"
                                                placeholder="Choose the correct answer...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question-container">
                            </div>
                            <div class="add-question">
                                <a class="btn btn-outline-success w-100 p-2 shadow-sm my-4 rounded-3"
                                    onclick="addQuestion()" role="button">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-plus me-1" viewBox="0 0 16 16">
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                        <span class="fw-bold">New Question</span>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex justify-content-end align-items-center">
                                <button role="button" type="submit" class="btn btn-warning">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="spinner-border spinner-border-sm me-2" role="status"
                                            style="display: none;" id="sbm-loader">
                                        </div>
                                        <span>Submit</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-right-short ms-2"
                                            viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">ArFun E-Learning Copyright 2022</div>
                        <div>
                            <?php
                            if (isset($_SESSION['dispName'])) {
                                echo ucwords($_SESSION['dispName']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
        var sessionData = <?php echo json_encode($_SESSION);?>;
    </script>
    <div id="sessionDataContainer" data-session="<?php echo htmlentities(json_encode($_SESSION)); ?>"></div>
    <div id="section-sdc" data-session-section=""></div>
    <script>
        var sessionData = document.getElementById("sessionDataContainer").dataset.session;
        sessionData = JSON.parse(sessionData);
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <!-- firebase sdk -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
    <script type="module" src="https://www.gstatic.com/firebasejs/9.14.0/firebase-firestore.js"></script>
    <!-- quiz js -->
    <script src="./js/frb-config.js"></script>
    <script src="./js/quiztemplates.js"></script>
    <script src="./js/mkquiz.js"></script>
    <script src="./js/mkquiz-sub.js" type="module"></script>
    <script src="./js/getCurrentUserData.js" type="module"></script>
    <script src="js/getCurrentUserData.js" type="module"></script>
    
</body>

</html>
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
    <title>Arfun | Dashboard</title>
    <link href="https://cdn.jsdelivr    et/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed">
    <?php
    include('authentication.php');
    ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->

        <a class="navbar-brand ps-3" href="index.php">
            <img src="assets/img/logo.png" alt="logo" width="56" height="56" class="logo">ArFun E-Learning</a>
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
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </li>
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
                <?php
                    if (isset($_SESSION['status'])) {
                        echo "<h5 class='alert alert-status alert-success  
                        ' role='alert' id='message'>" . $_SESSION['status'] . " 
                        </h5>";
                        unset($_SESSION['status']);
                    }
                ?>
                <!-- <div class="body-image"> </div> -->
                <div class="header-main">
                    <label>
                        <img src="assets/img/schlogo.png" alt="schlogo"     
                        width="95" height="95" class="schlogo">
                        San Jose Del Monte Bulacan Cornerstone College  
                    </label>
                </div>

                <div class="school">
                    <h3>Schoool Overview</h3>
                    <p>The SJDM Cornerstone College is a non-sectarian higher education institution in San Jose Del Monte Bulacan founded in 2004. It is
                        accredited by the Technical Education and skill Development Authority (TESDA),
                        Department of Education (DepEd) and the Commission on Higher Education (CHED).
                        SJDM Cornerstone College offers programs in pre-school, elementary, junior high school,senior high and college</p>
                </div>

                <div class="app">
                    <h3>About Application</h3>
                    <p>ARFUN is an e-learning mobile application that contains lessons about the Araling Panlipunan subject.The web and mobile applications offers features that
            can help the students and teachers studying the subject and also it will give them great experience while learning.
                    </p>
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

    
    <script src="js/getCurrentUserData.js" type="module"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script>
    var message = document.getElementById('message');
    message.onclick = setTimeout (function() {
        message.style.display = "none";
    }, 3000)
</script>
</body>

</html>
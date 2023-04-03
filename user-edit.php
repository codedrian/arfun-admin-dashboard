<?php
    include('authentication.php');
    ?>
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
    <title>Arfun | User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/user-edit.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">
            <img src="assets/img/logo.png" alt="logo" width="56" height="56" class="logo">ArFun E-Learning</a>
        <!-- Sidebar Toggle-->

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
                    echo "<h5 class='alert alert-status '>" . $_SESSION['status'] . "</h5>";
                    unset($_SESSION['status']);
                }
                ?>
                <div class="container-fluid px-4">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">

                                <?php
                                if (isset($_SESSION['status'])) {
                                    echo "<h5 class='alert alert-status '>" . $_SESSION['status'] . "</h5>";
                                    unset($_SESSION['status']);
                                }
                                ?>

                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h4>
                                            Edit Profile
                                            <a href="user-list.php" class="btn btn-danger float-end">Back</a>
                                        </h4>

                                    </div>
                                    <div class="card-body ">
                                        <form action="code.php" method="POST" class="formBody">
                                            <?php
                                            include('dbcon.php');

                                            if (isset($_GET['id'])) {
                                                $uid = $_GET['id'];

                                                try {
                                                    $user = $auth->getUser($uid);
                                            ?>
                                            <input type="hidden" name="user_id" value="<?= $uid; ?>">

                                            <div class="form-group mb-3">
                                                <label for="fullName">Full Name:</label>
                                                <input type="text" name="fullName" value="<?= $user->displayName; ?>"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="phone">Phone:</label>
                                                <input type="text" name="phone" value="<?= $user->phoneNumber; ?>"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-3">
                                                <button type="submit" name="update_user_button"
                                                    class="btn btn-primary btn-sm">Update</button>

                                            </div>
                                            <?php

                                                } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                                                    echo $e->getMessage();
                                                }
                                            }



                                            ?>



                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h4>Enable or Disable User Account</h4>
                                        </div>

                                        <div class="card-body">
                                            <form action="code.php" method="POST">
                                                <?php
                                                if (isset($_GET['id'])) {
                                                    $uid = $_GET['id'];
                                                    try {
                                                        $user = $auth->getUser($uid);
                                                ?>
                                                <input type="hidden" value="<?= $uid; ?>" name="ena_dis_user_id">

                                                <div class="input-group mb-3">
                                                    <select name="select_disable_enable" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="disable">Disable</option>
                                                        <option value="enable">Enable</option>
                                                    </select>
                                                    <button type="submit" name="enable_disable_user"
                                                        class="input-group-text btn btn-primary btn-sm ml-2"
                                                        id="basic-addon2">Submit</button>
                                                </div>

                                                <?php
                                                    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                                                        echo $e->getMessage();
                                                    }

                                                } else {
                                                    echo "No user found";
                                                }

                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-4">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
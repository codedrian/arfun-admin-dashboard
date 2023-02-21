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
    <title>Arfun | Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php
    include('authentication.php');
    ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">ArFun E-Learning</a>
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
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i> <span id="dispName">User</span></a>
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
        <?php include('side-nav.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <?php
                if (isset($_SESSION['status'])) {
                    echo "<h5 class='alert alert-status '>" . $_SESSION['status'] . "</h5>";
                    unset($_SESSION['status']);
                }
                ?>
                <div class="container-fluid px-4">


                    <div class="row mt-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 mb-2">

                                </div>
                            </div>
                        </div>


                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Total Student:
                                                <?php
                                                include('dbcon.php');
                                                $ref_table = 'students';
                                                $count_student = $database->getReference($ref_table)->getSnapshot()->numChildren();
                                                echo $count_student;
                                                ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>

                                                <a href="add-student.php" class="btn btn-primary">Add Student</a>
                                                <a href="index.php" class="btn btn-danger float-end">Back</a>
                                            </h4>
                                        </div>
                                        <div class="card-body ">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Email Adress</th>
                                                        <th>Section</th>
                                                        <th>LRN Number</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php //always include db connection
                                                    include('dbcon.php');
                                                    $ref_table = 'students';
                                                    $fetch_students = $database->getReference($ref_table)->getValue();


                                                    if ($fetch_students > 0) {
                                                        $i = 1;
                                                        foreach ($fetch_students as $key => $row) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $i++; ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['fname']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['lname']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['email']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['section']; ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['lrn_number']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="edit-student.php?id=<?= $key; ?>"
                                                                class="btn btn-primary">Edit</a>
                                                        </td>
                                                        <td>
                                                            <!-- <a href="edit-student.php" class="btn btn-danger btn-sm">Delete</a> -->
                                                            <form action="code.php" method="post">
                                                                <button type="submit" class="btn btn-primary"
                                                                    name="delete_button"
                                                                    value="<?= $key ?>">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="7">No Record Found</td>
                                                    </tr>
                                                    <?php
                                                    }

                                                    ?>


                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


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
    
    <script src="js/getCurrentUserData.js" type="module"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
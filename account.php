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
  <title>Arfun | Student</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/quiz-edit.css" rel="stylesheet" />
  <!-- <link href="css/student.css" rel="stylesheet" /> -->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
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
      <div class="input-group">
        <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
          aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
          <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
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
      <main class="main-content">
        <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="container">
              <div class="row">
                <div class="col-md-6 mb-2">
                </div>
              </div>
            </div>

            <div class="card w-50 p-3">
              <div class="card-header">
                <h4>
                  Edit User Profile
                  <!-- <a href="index.php" class="btn btn-danger float-end btn-sm">Back</a> -->
                </h4>
              </div>
              <div id="main-form" class="add-body">
                <div class="col-xs-4">
                  <p>Profile Picture</p>
                  <img width="100px" src="" class="dp">
                  <button id="upload-btn" disabled>Upload Photo</button>
                </div>
                <div class="col-xs-4">
                  <label for="firstName">First Name</label>
                  <input type="text" class="form-control" id="firstName" placeholder="First name" name="firstName"
                    required disabled>
                </div>

                <div class="col-xs-4">
                  <label for="midName">Middle Name</label>
                  <input type="text" class="form-control" id="midName" placeholder="Middle name" name="midName"
                    required disabled>
                </div>

                <div class="col-xs-4">
                  <label for="lastName">Last Name</label>
                  <input type="text" class="form-control" id="lastName" placeholder="Last name" name="lastName"
                    required disabled>
                </div>
                <div class="col-xs-4">
                  <label for="lastName">Email</label>
                  <input type="text" class="form-control" id="email" placeholder="Email" name="email"
                    required disabled>
                </div>
                <div class="col-xs-4">
                  <label for="lastName">Mobile Number</label>
                  <input type="number" class="form-control" id="mnos" placeholder="Mobile Number" name="mnos"
                    required disabled>
                </div>
                <div class="form-group col-xs-4">
                  <span class="section">section</span><br>
                  <span class="uid">uid</span>
                </div>

                <button type="button" class="btn btn-primary submitEdits mt-4 btn-sm" name="submit_edits"
                  id="submitEdits" disabled>Submit Edits</button>
                <button type="button" class="btn btn-primary startEdits mt-4 btn-sm" name="start_edits"
                  id="startEdits">Edit Data</button>
              </div>
            </div>

            <?php

            if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
              echo '';
            }
            ?>

            <!-- Student list table starts here... -->
            
          </div>

      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">ArFun E-Learning Copyright 2022</div>
            <div>

            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <div class="floating-window">
    <div class="window">
      <img src="" width="100px" class="dp">
      <form id="submitFDP" action="javascript:void(0)">
        <input type="file" name="profilePicture" id="uDp">  
        <span class="progress"><span id="upd-bytes">0</span>b/<span id="tt-bytes">0</span>b</span>
        <span id="perc-prog">0%</span>
        <span id="up-status">Waiting</span>
      </form>
      <button id="changeDp">Confirm</button>
      <button id="resetDp">Reset</button>
      <button id="closeSectionSort">Close</button>
    </div>
  </div>

  <script>
    var sessionData = <?php echo json_encode($_SESSION);?>;
  </script>
  <div id="sessionDataContainer" data-session="<?php echo htmlentities(json_encode($_SESSION)); ?>"></div>

  <script>
    var sessionData = document.getElementById("sessionDataContainer").dataset.session;
    sessionData = JSON.parse(sessionData);
  </script>

  <script src="js/getUserData.js" type="module"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</body>

</html>
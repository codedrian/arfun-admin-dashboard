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
  <title>Arfun | Student</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/section-list.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

  <style>

  #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        border: none;
        outline: none;
        background-color:rgb(3, 20, 97) ;
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 10px;
        font-size: 18px;
        }

        #myBtn:hover {
        background-color: blue;
        }

  </style>
</head>

<body class="sb-nav-fixed">

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
      <main class="main-content">
        <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="container">
              <div class="row">
                <div class="col-md-6 mb-2">
                </div>
              </div>
            </div>

          <div class="form-body">
            <div class="card w-50 p-3">
              <div class="card-header">
                <h3>
                  Add Section
                  <!-- <a href="index.php" class="btn btn-danger float-end btn-sm">Back</a> -->
                </h3>
              </div>
              <form id="main-form" class="add-body" data-type="section">
                <div class="form-group col-xs-4">
                  <label for=""></label>
                  <input type="text" class="form-control" id="section" placeholder="Section" name="section"
                    required>
                </div>

                <button type="button" class="btn btn-primary registerbtn mt-4 btn-sm" name="register_button"
                  id="submitData">Submit</button>
              </form>
            </div>
      </div>
            <?php

            if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
              echo '';
            }
            ?>

            <!-- Student list table starts here... -->
            <div class="container mt-3">
              <div class="">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header section-header">
                      <h3>
                        Section List
                        <!-- <a href="index.php" class="btn btn-danger float-end">Back</a> -->
                      </h3>
                      <button id="archive">Archive Selected</button><!-- <a href="index.php" class="btn btn-danger float-end">Back</a> -->
                      <button id="select-all">Select All</button><!-- <a href="index.php" class="btn btn-danger float-end">Back</a> -->
                      <button id="deselect-all">Deselect All</button><!-- <a href="index.php" class="btn btn-danger float-end">Back</a> -->
                      <button id="archive-all">Archive All</button>
                      <button id="download-table">Download Table Data</button>
                      <div class="download-link"></div>

                    </div>
                    <div class="card-body">
                      <table class="table table-bordered table-striped">
                        <thead>
                          <th>Section</th>
                          <th>Number of Students</th>

                        </thead>
                        <tbody id="tbody1"></tbody>
                      </table>
                    </div>
                    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

                    <script>
                          // Get the button:
                          let mybutton = document.getElementById("myBtn");

                          // When the user scrolls down 20px from the top of the document, show the button
                          window.onscroll = function() {scrollFunction()};

                          function scrollFunction() {
                          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                              mybutton.style.display = "block";
                          } else {
                              mybutton.style.display = "none";
                          }
                          }

                          // When the user clicks on the button, scroll to the top of the document
                          function topFunction() {
                          document.body.scrollTop = 0;
                          document.documentElement.scrollTop = 0;
                      }
                      </script>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>




            <!-- Student list table ends here... -->



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

  <script>
    var sessionData = <?php echo json_encode($_SESSION);?>;
  </script>
  <div id="sessionDataContainer" data-session="<?php echo htmlentities(json_encode($_SESSION)); ?>"></div>

  <script>
    var sessionData = document.getElementById("sessionDataContainer").dataset.session;
    sessionData = JSON.parse(sessionData);
  </script>

  <script type="module" src="js/fetch-section.js"></script>
  <script src="js/get-section.js" type="module"></script>
  <script src="js/getCurrentUserData.js" type="module"></script>
  <script src="js/createsection.js" type="module"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="js/convertTableToExcel.js"></script>
</body>

</html>

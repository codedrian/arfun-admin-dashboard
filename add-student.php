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
  <!-- <link href="css/student.css" rel="stylesheet" /> -->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

  <style>

.addStud-header button{
  position: relative;
  display: inline-block;
  padding: 5px;
  background: rgb(3, 20, 97);
  border:none;
  border-radius: 10px;
  color:white;
  font-size:18px;
}

/*
  #archive-all{
  position: relative;
  display: inline-block;
  padding: 8px 15px;
  background: rgb(3, 20, 97);
  border:none;
  border-radius: 10px;
  color:white;
  font-size:18px;
  }

  #archive-all:hover{
    background:blue;
  }
  #download-table{
  position: relative;
  display: inline-block;
  padding: 8px 15px;
  background: rgb(3, 20, 97);
  border:none;
  border-radius: 10px;
  color:white;
  font-size:18px;
  }
  #download-table:hover{
      background:blue;
  } */

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

  /* table td:last-child:hover{
  background-color:lightblue;
  border-radius: 10px;
  } */

  table td:last-child{
    cursor:pointer;
  }

  .arch-status {
    position: fixed;
    bottom: 3%;
    right: 3%;
    padding: 1em;
    background-color: #bababa;
    color: black;
    display: none;
  }

.table-responsive table {
  display: table;
  width: 100%;
  border-collapse: collapse;
}

.table-responsive thead, .table-responsive tbody, .table-responsive th, .table-responsive td, .table-responsive tr {
  display: table-row;
}

.table-responsive th, .table-responsive td {
  width: auto;
  display: table-cell;
  vertical-align: top;
  border: none;
  border-bottom: 1px solid #ddd;
  position: relative;
  text-align: left;
  white-space: nowrap;
  padding: 8px;
  min-width: 150px; Add min-width for columns
  box-sizing: border-box;
  word-break: break-word;
}

.table-responsive th::before {
  content: attr(data-th);
  position: absolute;
  left: 0;
  top: -32px;
  background-color: #f8f9fa;
  font-weight: bold;
  text-align: left;
  border: none;
  border-bottom: 1px solid #ddd;
  width: 100%;
  padding: 8px;
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
                  Add Student
                  <!-- <a href="index.php" class="btn btn-danger float-end btn-sm">Back</a> -->
                </h3>
              </div>
              <form id="main-form" class="add-body" data-type="student">
                <div class="col-xs-4">
                  <label for="firstName"></label>
                  <input type="text" class="form-control" id="firstName" placeholder="First name" name="firstName"
                    required>
                </div>

                <div class="col-xs-4">
                  <label for="midName"></label>
                  <input type="text" class="form-control" id="midName" placeholder="Middle name" name="midName"
                    required>
                </div>

                <div class="col-xs-4">
                  <label for="lastName"></label>
                  <input type="text" class="form-control" id="lastName" placeholder="Last name" name="lastName"
                    required>
                </div>
                <div class="form-group col-xs-4">
                  <label for=""></label>
                  <input type="text" class="form-control " id="email" aria-describedby="emailHelp" placeholder="Email"
                    name="email" required>
                </div>
                <div class="form-group col-xs-4">
                  <label for=""></label>
                  <input type="text" class="form-control" id="idnum" placeholder="Learner Reference Number" name="idNum"
                    required>
                </div>
                <div class="form-group col-xs-4">
                  <label for=""></label>
                  <select class="form-control" id="section" name="section" required>
                      <option value="0">Select a Section</option>
                  </select>
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
                    <div class="addStud-header">
                      <h3>
                        Students List
                        <!-- <a href="index.php" class="btn btn-danger float-end">Back</a> -->

                      </h3>
                        <button id="archive">Archive Selected</button><!-- <a href="index.php" class="btn btn-danger float-end">Back</a> -->
                        <button id="select-all">Select All</button><!-- <a href="index.php" class="btn btn-danger float-end">Back</a> -->
                        <button id="deselect-all">Deselect All</button><!-- <a href="index.php" class="btn btn-danger float-end">Back</a> -->
                      <button id="archive-all">Archive All</button>

                        <button id="download-table">Download Table Data</button>
                        <div class="download-link"></div>
                    </div>
                    <div class="card-body table-responsive">
                      <table class="table table-bordered table-striped">
                        <thead>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Learner Reference Number</th>
                          <th>Section</th>
                          <th>School Year</th>
                          <th>Archive</th>

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

            <!-- Student list table ends here... -->
            <br>
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

  <!-- Add archiving status -->
  <div class="arch-status">
    <p>Archiving started!</p>
    <span class="as">Archived <span class="as-proc">0</span> out of <span class="as-total">?</span></span>
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

  <script type="module" src="js/fetch-student.js"></script>
  <script src="js/get-section.js" type="module"></script>
  <script src="js/getCurrentUserData.js" type="module"></script>
  <script src="js/convertTableToExcel.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="js/createuser.js"></script>
</body>

</html>

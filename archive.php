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
  <!-- <link href="css/quiz-edit.css" rel="stylesheet" /> -->
  <!-- <link href="css/student.css" rel="stylesheet" /> -->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

  <style>

.base {
    display: grid;
    grid-template-rows: auto;
    grid-template-columns: 1fr;
    grid-gap: 1em;
    /* background-color: #198754;
    color: white; */
    padding: 20px;
    border-radius: 5px;
}

.base h4, h2{
    text-align: center;
}
.base span{
    background: darkgreen;
    font-size: x-large;
    width: 20%;
    text-align: center;
    color: white;
    font-weight: 400;
    border-radius: 4px;
}

.base span:hover{
    background:#198754 ;
}
.floating-window {
    display: flex;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.8);
    z-index: 10;
    display: none;
}
.floating-window > .window {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 450px;
    height: 250px;
    background-color: #198754;
    z-index: 11;
    border-radius: 4px;
    padding: 10px;
}

/* @media (max-width:500){
  .floating-window{
   flex-direction: column;
   align-items:center;
  }
} */

.archive-header button{
position:relative;
padding:5px;
background:rgb(3, 20, 97);
border:none;
border-radius:10px;
color:white;
font-size:18px;
margin-bottom: 5px;
}


.window button{
  display:inline-block;
  position:relative;
  margin-right: 5px;
  padding:5px;
  background:rgb(3, 20, 97);
  border:none;
  border-radius:5px;
  color:white;
  font-size:18px;
  font-weight:bold;
  width:160px;
  font-family: "Roboto", sans-serif;
  box-shadow: 0 0 10px rgba (0, 0, 0, 0.1);
  -webkit-transition-duration:0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: box-shadow, transform;
  transition-property:box-shadow, transform;

}

.window button:hover{
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
  -webkit-transform: scale(1.1);
  transform:scale(1.1);
  }

.window .buttons{
display: flex;
flex: 1;
justify-content: center;
padding: 20px;
}

@media (max-width:500px){
  .floating-window {
    display: flex;
}
.floating-window > .window {
  display:fixed;
  align-items:center;
  width:325px;
  
}
.window button{
  font-size:14px;
}
.window .selects{
 left:40%;
}


}
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
                    <div class="archive-header">
                      <h3>
                        Archived Accounts (Students)
                       <!-- <a href="index.php" class="btn btn-danger float-end">Back</a> -->
                       </h3>
                        <button id="unarchive">Unarchive Selected</button><!-- <a href="index.php" class="btn btn-danger float-end">Back</a> -->
                        <button id="select-all">Select All</button><!-- <a href="index.php" class="btn btn-danger float-end">Back</a> -->
                        <button id="deselect-all">Deselect All</button><!-- <a href="index.php" class="btn btn-danger float-end">Back</a> -->
                      
                      <button id="sort-data">Sort Data</button>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered table-striped">
                        <thead>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Learner Reference Number</th>
                          <th>Section</th>
                          <th>School Year</th>

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
            <!-- Student list table ends here... -->
           
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
    <p>Unarchiving started!</p>
    <span class="as">Unarchived <span class="as-proc">0</span> out of <span class="as-total">?</span></span>
  </div>

  <div class="floating-window">
    <div class="window">
<div class="selects">
      <select name="section" id="section">
        <option>Select a section</option>
      </select>

      <input type="number" required placeholder="School Year" id="school-year">
      </div>
      <div class="buttons">
          <button id="submitSectionSort">Sort Data (Section Only)</button>
          <button id="submitSySort">Sort Data (School Year Only)</button>
          <button id="submitBothSort">Sort Data (Both)</button>
          <button id="resetSectionSort">Reset</button>
          <button id="closeSectionSort">Close</button>
      </div>              
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

  <script type="module" src="js/archive.js"></script>
  <script src="js/get-section.js" type="module"></script>
  <script src="js/getCurrentUserData.js" type="module"></script>
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
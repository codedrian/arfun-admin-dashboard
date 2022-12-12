<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
       <link href="css/teacher.css" rel="stylesheet" />
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
            
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                        <a class="nav-link" href="index.php">
                               <i class="fas fa-home fa-lg"></i>
                                <span> Dashboard</span>
                            </a>
                            
                            <a class="nav-link collapsed" href="register.php" > 
                               <i class="fas fa-users fa-lg"></i>
                               <span> Admin Users  </span>
                            </a>
                            
                            <a class="nav-link collapsed" href="add-student.html">
                               <i class="fas fa-user-graduate fa-lg"></i>
                                <span>Student</span>
                            </a>
                            <a class="nav-link collapsed" href="add-teacher.php">
                                <i class="fas fa-chalkboard-teacher fa-lg"></i>
                                <span>Teachers</span>
                            </a>
                            <a class="nav-link collapsed" href="lesson.html">
                               <i class="fas fa-book-open fa-lg"></i>
                                <span>Lesson</span>
                            </a>
                            <a class="nav-link collapsed" href="create-quiz.html">
                                <i class="fas fa-book-open fa-lg"></i>
                                <span>Quiz</span>
                            </a>
                            <a class="nav-link collapsed" href="user-list.php">
                               <i class="fas fa-user-edit fa-lg"></i>
                                <span>User list</span>
                            </a>


                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            
            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    
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
        <div class="col-md-12">
            </div>
          </div>
          <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>

          </div>
        </nav>
      </div>
      <div id="layoutSidenav_content">
        <main class="main-content">
          <div class="container-fluid px-4">
            <div class="row mt-4">
              <div class="card w-50 p-3">
                <div class="card-header">
                  <h4>Add Teacher</h4>
                </div>
                <form id="main-form" class="add-body" data-type="teacher">
                  <div class="col-xs-4">
                    <label for=""></label>
                    <input type="text" class="form-control" id="firstName" placeholder="Full name" name="fullName"
                      required>
                  </div>
                  <div class="form-group col-xs-4">
                    <label for=""></label>
                    <input type="text" class="form-control " id="lastName" aria-describedby="emailHelp"
                      placeholder="Phone number" name="phone" required>
                  </div>
                  <div class="form-group col-xs-4">
                    <label for=""></label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                  </div>
                  <button type="button" class="btn btn-primary registerbtn mt-4 btn-sm" name="register_button"
                    id="submitData">Submit</button>
                </form>
              </div>
              <!-- Teacher list table starts here... -->
              <div class="container mt-3">
                <div class="">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>
                          Teacher List
                          <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered table-striped">
                          <thead>
                            <th>User ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </thead>
                          <tbody id="tbody1">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Teacher list table ends here... -->
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
    <script type="module" src="./js/fetch-teacher.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="js/createuser.js"></script>
  </body>
</html>
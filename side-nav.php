<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <a class="nav-link" href="index.php">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-home fa-lg"></i>
                        <span> Dashboard</span>
                    </a>

                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

                        echo '<a class="nav-link collapsed" href="register.php">
                            <i class="fas fa-users fa-lg"></i>
                            <span> Admin User </span>
                            </a>';
                            echo '<a class="nav-link collapsed" href="student-list.php">
                            <i class="fas fa-users fa-lg"></i>
                            <span> Student </span>
                            </a>';

                            echo '<a class="nav-link collapsed" href="quiz-score.php">
                            <i class="fas fa-users fa-lg"></i>
                            <span> Quiz </span>
                            </a>';
                    }
                    ?>
                    <!-- Both teacher and admin can access this -->
                    <!-- <a class="nav-link collapsed" href="student-list.php">
                        <i class="fas fa-user-graduate fa-lg"></i>
                        <span>Student</span>
                    </a> -->

                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                        echo '<a class="nav-link collapsed" href="add-teacher.php">
                                <i class="fas fa-chalkboard-teacher fa-lg"></i>
                                <span>Teachers</span>
                            </a>';
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
                        
                        echo '<a class="nav-link collapsed" 
                        href="add-student.php">
                        <i class="fas fa-book-open fa-lg"></i>
                        <span>Student</span>
                        </a>

                        <a class="nav-link collapsed" 
                        href="lesson.php">
                        <i class="fas fa-book-open fa-lg"></i>
                        <span>Lesson</span>
                        </a>
                        
                        <a class="nav-link collapsed" href="create-quiz.php">
                            <i class="fas fa-book-open fa-lg"></i>
                            <span>Create Quiz</span>
                        </a>
                        
                        <a class="nav-link collapsed" href="quiz-score.php">
                            <i class="fas fa-users fa-lg"></i>
                            <span> Quiz Scores</span>
                            </a>';
                    }
                    ?>

                   

                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                aria-controls="pagesCollapseAuth">
                                Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="login.html">Login</a>
                                    <a class="nav-link" href="register.php">Register</a>
                                    <a class="nav-link" href="password.html">Forgot Password</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseError" aria-expanded="false"
                                aria-controls="pagesCollapseError">
                                Error
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
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
        <div class="sb-sidenav-footer d-flex flex-row justify-content-between">
            <div class="small">Logged in as:</div>
            <?php
            if (isset($_SESSION['role'])) {
                echo '<div class="small">' . ucwords($_SESSION['role']) . '</div>';
            }
            ?>
        </div>
    </nav>
</div>
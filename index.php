<?php 
session_start(); 
include('includes/header.php');?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
        <!-- method to show the status from code.php add student status message -->
        <?php 
        if(isset($_SESSION['status'])){
            echo "<h5 class='alert alert-status '>".$_SESSION['status']."</h5>";
            unset($_SESSION['status']);
        }
        ?>
        <div class="card">
                <div class="card-header">
                    <h4>
                        <a href="" class="btn btn-primary float-end">Class</a>
                        <a href="register.php" class="btn btn-primary float-end">Admin Users</a>
                        <a href="manage-student.php" class="btn btn-primary float-end">Students</a>
                        <a href="" class="btn btn-primary float-end">Teachers</a>
                        <a href="add-lesson.php" class="btn btn-primary float-end">Add Lesson</a>
                        <a href="add-quiz.php" class="btn btn-primary float-end">Add Quiz</a>
                        <a href="" class="btn btn-danger float-end">Logout</a>
                        </h4>
                        <div class="card-body">
                            
                        </div>
                        
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
    
<!-- 


<div class="container-fluid">
    <div class="row">
        <div class="">
        <!-- method to show the status from code.php add student status message -->
        <?php 
        if(isset($_SESSION['status'])){
            echo "<h5 class='alert alert-status '>".$_SESSION['status']."</h5>";
            unset($_SESSION['status']);
        }
        ?>
            <div class="sidebar-sticky">

            </div>
        </nav>
        
        <div class="sidebar-sticky">
                <div class="card-header">
                    <h4>
                        <a href="" class="btn btn-primary float-end p-2">Class</a>
                        <a href="register.php" class="btn btn-primary float-end p-2">Admin Users</a>
                        <a href="manage-student.php" class="btn btn-primary float-end p-2">Students</a>
                        <a href="add-teacher.php" class="btn btn-primary float-end p-2">Teachers</a>
                        <a href="lesson.html" class="btn btn-primary float-end p-2">Add Lesson</a>
                        <a href="add-quiz.php" class="btn btn-primary float-end p-2">Add Quiz</a>
                        </h4>
                        <div class="card-body">
                            
                        </div>
                        
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
     -->
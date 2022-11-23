<?php 
include('authentication.php');
include('includes/header.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <?php 
        if(isset($_SESSION['status'])){
            echo "<h5 class='alert alert-status '>".$_SESSION['status']."</h5>";
            unset($_SESSION['status']);
        }
        ?>

            <div class="card">
                <div class="card-header">
                    <h4>
                        Add Users
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                    
                </div>
                <div class="card-body ">
                    <form action="code.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="first_name">First Name:</label>
                            <input type="text" name="f_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="last_name">Last Name:</label>
                            <input type="text" name="l_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password:</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="register_button" class="btn btn-primary ">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
<?php 
include('includes/header.php');
session_start(); 

if (isset($_SESSION['verified_user_id'])){ //user cant access this when already looged in
    $_SESSION['status'] = "You are already logged in";
    header('Location: index.php');
    exit();
}
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

            <div class="card" style="width: 25rem">
                <?php 
                if(isset($_SESSION['status'])){
                echo "<h5 class='alert alert-status '>".$_SESSION['status']."</h5>";
                unset($_SESSION['status']);
            }
        ?>
                <div class="card-header " >
                    <h4>
                        Please Login
                </div>
                <div class="card-body" >
                    <form action="adminLoginCode.php" method="POST">
                
                        <div class="form-floating mb-3">
                            <label for="email"></label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="password"></label>
                            <input type="text" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login_button" class="btn btn-primary primary"><a href="index.php"></a>Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>


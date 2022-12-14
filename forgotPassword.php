<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Forgot Password</title>
    <link href="./css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url('./cornerstonebg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: left;
        }
    </style>
</head>
<?php
include('includes/header.php');
session_start();
if (isset($_SESSION['verified_user_id'])) { //user cant access this when already looged in
    $_SESSION['status'] = "You are already logged in";
    header('Location: index.php');
    exit(); 
}
?>
<?php
if (isset($_SESSION['status'])) {
    echo "<h5 class='alert alert-status alert-success w-25 ml-5' role='alert' id='message'>" . $_SESSION['status'] . "</h5>";
    unset($_SESSION['status']);
}
?>

<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 float-right ">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <?php
                            if (isset($_SESSION['status'])) {
                                echo "<h5 class='alert alert-status '>" . $_SESSION['status'] . "</h5>";
                                unset($_SESSION['status']);
                            }
                            ?>
                            <div class="card-header bg-success">
                                <div class="mx-auto"><i class="fa fa-solid fa-lock fa-3x"></i></div>
                            </div>
                            <div class="card-body ">
                                <h4 class="mx-auto">Forgot Password?</h4>
                                <p class="text-center">Enter your registered email address to reset password.</p>

                                <!-- action="adminLoginCode.php" method="POST" -->
                                <form>
                                    <div class="row d-flex flex-column">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" name="email" type="email"
                                                    placeholder="name@example.com" required />
                                                <label for="email">Email address</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                           
                                        </div>

                                    </div>

                                    <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                        <button role="button" name="login_button" type="submit" class="btn btn-primary w-100">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="spinner-border spinner-border-sm me-2" role="status"
                                                    style="display: none;" id="sbm-loader">
                                                </div>
                                                <span>Email me link</span>
                                            </div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="js/rolelog.js"></script>

<script> //this is for the message to disappear after 3 seconds
var message = document.getElementById('message');
message.onclick = setTimeout(function() {
  message.style.display = 'none';
}, 3000);
</script>

</body>

</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - ArFun Admin</title>
    <link href="./css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        
        .bg-image{
            min-height:100vh;
            /* display:flex; */
            justify-content:center;
            align-items:center;
            position:relative;
        }
        .bg-image::before{
            content:'';
            background-image: url('./cornerstonebg.jpg') ;
            background-repeat:no-repeat;
            background-size:cover;
            background-position:center;
            position:absolute;
            top:0;
            left:0;
            bottom:0;
            right:0;
            opacity:0.8;
        }
        .card-body .form-control{
        height: 12%;
         }

        nav{
            width:100%;
            height:75px;
            line-height:75px;
            padding:0px 100px;
            position:fixed;
            background-image:linear-gradient(#033747,#012733);
            opacity:0.7;
        }

        nav .logo{
            font-size:30px;
            font-weight:bold;
            float:left;
            color:white;
            text-transform:uppercase;
            letter-spacing:1.5px;
            cursor:pointer;
        }

        nav ul{
            float:right;
        }

        nav li{
            display:inline-block;
            list-style:none;
        }

        nav li a{
            font-size:18px;
            text-transform:uppercase;
            padding:0px 30px;
            color:white;
            text-decoration:none
        }

        nav li a:hover{
            color:green;
            transition: all 0.4s ease 0s;
        }

        .card{
            position:relative;
            top:20%;
        }

        .card-header h3{
            text-transform:uppercase;
            color:white;
            font-weight:bolder;
        }

        img{
            position:relative;
            top:11px;
        }
        
    </style>
</head>

<div class="bg-image">
<nav>
      <div class="logo">
      <p><img src="assets/img/logo.png" alt="logo" width="56" height="56" class="logo">ArFun</p>
      </div>
      <ul>
            <li><a href="adminLogin.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <!-- <li><a href="#">Services</a></li> -->
            <!-- <li><a href="#">Contact</a></li> -->
      </ul>
</nav>



<?php
include('includes/header.php');
if (isset($_SESSION['verified_user_id'])) { //user cant access this when already looged in
    $_SESSION['status'] = "You are already logged in";
    header('Location: index.php');
    exit(); 
}
?>

<br><br>
<div id="layoutAuthentication">

    <?php
if (isset($_SESSION['status'])) {
    echo "<h5 class='alert alert-status alert-success w-25 ml-5' role='alert' id='message'>" . $_SESSION['status'] . "</h5>";
    unset($_SESSION['status']);
}
?>
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 float-right ">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
 
                                    <div class="card-header bg-success">
                                        <h3 class="text-center font-weight-light my-2 ">Login</h3>
                                    </div>
                                    <div class="card-body ">

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
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="password" name="password"
                                                            type="password" placeholder="Password" required />
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>
                                                <div class=" form-check">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="inputRememberPassword"
                                                            type="checkbox" value="" />
                                                        <label class="form-check-label" for="inputRememberPassword">Remember
                                                            me</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <button role="button" name="login_button" type="submit" class="btn btn-primary w-100">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <div class="spinner-border spinner-border-sm me-2" role="status"
                                                            style="display: none;" id="sbm-loader">
                                                        </div>
                                                        <span>Sign in</span>
                                                    </div>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="">Forgot password?</a></div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="#">Forgot password?</a></div>
                            </div>
                        </div>
                    </div>  
                </main>
            </div>
        </div>
 </div> <!-- end of background -->
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



</html>
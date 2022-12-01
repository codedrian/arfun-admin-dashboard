<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    
    
     <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <title>ARFUN ADMIN</title>
</head>
<body>
    
    <div class="nav">
        <div class="logo">
            <img src="./arfunlogo.png" width="50" height="50">
        </div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Developers</a></li>
        </ul>
    </div>

    
    <div class="top"></div>
    <div class="container">
        <div class="card-header"><h3 class="text-center font-weight- ">Login</h3></div>
            <div class="card-body">
                <form action="adminLoginCode.php" method="POST">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" />
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                        <label for="password">Password</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                        <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a class="small" href="password.html">Forgot Password?</a>
                        <button type="submit" name="login_button" class="btn btn-primary primary"><a href="index.php"></a>Sign in</button>
                    </div>
                </form>
            </div>
        <div class="card-footer text-center py-3">
        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
        </div>
</div>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
</body>
</html>
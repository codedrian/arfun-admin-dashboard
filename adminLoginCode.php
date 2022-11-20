<?php
session_start();
include('dbcon.php'); //for database connection

//METHOD
if(isset($_POST['login_button'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
    $user = $auth->getUserByEmail($email);
    $user = $auth->getUserByPhoneNumber('+49-123-456789');
} catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
    echo $e->getMessage();
}
}
else {
    $_SESSION = "Login Failed: Please enter email and password";
    header('Location: adminLogin.php');
    exit();
}

?>
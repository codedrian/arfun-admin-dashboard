<?php
session_start();
include('dbcon.php'); //for database connection

if (isset($_SESSION['verified_user_id'])) {
    
    $uid = $_SESSION['verified_user_id'];
    $idTokenString = $_SESSION['idTokenString'];

    try {
        $verifiedIdToken = $auth->verifyIdToken($idTokenString);
    } catch (Exception $e) {
        $_SESSION['expiry_status'] = "Token Expired. Please Login again.";
        header('Location: logout.php'); 
        exit();
    } catch(\InvalidArgumentException $e) {
        $_SESSION['status'] = "Token Expired. Please Login again.";
        header('Location: logout.php'); 
        exit();
    }
}
else {
    $_SESSION['status'] = "Login to access this page";
    header('Location: adminLogin.php'); 
    exit();
}

?>
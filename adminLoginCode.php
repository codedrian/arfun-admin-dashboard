<?php
session_start();
include('dbcon.php'); //for database connection

function retNoEmailPass() {
    $_SESSION['status'] = "Login Failed: Please enter email and password";
    header('Location: adminLogin.php');
    exit();
}

//METHOD to check if the button is set or not
if(isset($_POST['login_button'])){
    $email = $_POST['email'];
    $clearTextPassword = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($clearTextPassword)) {
        retNoEmailPass();
    }

    try { // to check if the email is in the Firebase Authentication
        $user = $auth->getUserByEmail("$email");
        $uid = 'tArC5gCpbnIdYdsLQaqW';

        try {
            $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
            $idTokenString  = $signInResult->idToken(); // to verify firebase token

            try {
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                $uid = $signInResult->firebaseUserId(); // to get the user id
                

                $_SESSION['verified_user_id'] = $uid;
                $_SESSION['idTokenString'] = $idTokenString; //store ID token into session

                $_SESSION['status'] = "Logged in Succesfuly";
                //header('Location: index.php');
                //exit();
                
            } catch (Exception $e) {
                echo 'The token is invalid: '.$e->getMessage();
                
            }catch(\InvalidArgumentException $e) {
                echo 'The token could not be parsed: '.$e->getMessage();
            }

        } catch(Exception $e) {
            $_SESSION['status'] = "Login Failed: Please enter correct password";
            header('Location: adminLogin.php');
            exit();
        }

    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        // echo $e->getMessage();
        $_SESSION['status'] = "Login Failed: Please enter correct email";
        header('Location: adminLogin.php');
        exit();
    }

}
else {
    retNoEmailPass();
}

?>

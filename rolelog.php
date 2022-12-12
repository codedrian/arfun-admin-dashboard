<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
    $sessionItem = $_POST["name"];

    if ($sessionItem == null) {
        $sessionItem = '';
    }

    $_SESSION['status'] = $sessionItem;

    if ($sessionItem == 'Logged in Succesfuly') {
        // get all other fields here
        $cred = $_POST["cred"];

        //store ID token into session and role
        $_SESSION['verified_user_id'] = $cred['uid'];
        $_SESSION['idTokenString'] = $cred['idTokenString'];
        $_SESSION['role'] = $cred['role'];
        $_SESSION['dispName'] = $cred['displayName'];

        echo json_encode(["location" => 'index.php']);
        exit();
    }

    echo json_encode(["location" => 'adminLogin.php']);
    exit();
}
?>
<?php
session_start();

unset($_SESSION['verified_user_id']);
unset($_SESSION['idTokenString']);


if(isset($_SESSION['expiry_status'])) {
    $_SESSION['status'] = "Session expired";
}
else {
    $_SESSION['status'] = "Logged out successfuly";
}

$_SESSION['status'] = "Logged out successfuly";
header('Location: adminLogint.php');
exit();
?>
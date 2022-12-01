<?php 
session_start(); 
include('dbcon.php'); //for database connection

//METHOD to add user to database using Firebase User Management
if(isset($_POST['register_button'])) {
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userProperties = [
    'email' => $email,
    'emailVerified' => false,
    'password' => $password,
    'displayName' => $fullName,
    'phoneNumber' => '+63'.$phone,
];
$createdUser = $auth->createUser($userProperties);

if ($createdUser) {
    $_SESSION['status'] = "User Added Successfully";
    header('Location: register.php'); 
    exit();
}
else {
    $_SESSION['status'] = "User Not Added";
    header('Location: register.php'); 
    exit();
}
}



//METHOD to delete student 
if(isset($_POST['delete_button'])) {
    $delete_id = $_POST['delete_button'];

    $ref_table = 'students/'.$delete_id;
    $deleteQuery_Result = $database->getReference($ref_table)->remove();

    if($deleteQuery_Result) {
    $_SESSION['status'] = "Student deleted succesfully!";
    header('Location: index.php');
}else {
    $_SESSION['status'] = "Unsuccessful to delete";
    header('Location: index.php');
    }

}




//METHOD: Method to update the student records
if(isset($_POST['updateStudent'])) {
    $key = $_POST['key'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $section = $_POST['section'];
    $lrn_number = $_POST['lrn_number'];

$updateData = [
    'fname' => $first_name,
    'lname' => $last_name,
    'email' => $email,
    'section' => $section,
    'lrn_number' => $lrn_number
];

$ref_table = 'students/'.$key;
$updateQuery_result = $database->getReference($ref_table)->update($updateData);

if($updateQuery_result) {
    $_SESSION['status'] = "Student updated succesfully!";
    header('Location: index.php');
}else {
    $_SESSION['status'] = "Unsuccessful to update, try again later!";
    header('Location: index.php');
}

}

//METHOD to delete user record
if (isset($_POST['delete_user_button'])) {
    $uid = $_POST['delete_user_button'];

    try {
        $auth->deleteUser($uid);
        $_SESSION['status'] = "User deleted succesfully!";
        header('Location: user-list.php');
        exit();

    } catch(exception $e) {
        $_SESSION['status'] = "User not found!";
        header('Location: user-list.php');
        exit();
    }

}



//METHOD to disable/enable user
if (isset($_POST['enable_disable_user'])) {

    $disable_enable = $_POST['select_disable_enable'];
    $uid = $_POST['ena_dis_user_id'];

    if ($disable_enable == "disable") {
        $updatedUser = $auth->disableUser($uid);
        $msg = "Account disabled";
    } else {
        $updatedUser = $auth->enableUser($uid);
        $msg = "Account enabled";
    }

    if($updatedUser) {
    $_SESSION['status'] = "Something went wrong";
    header('Location: user-list.php');
    exit();
    }   else {
    $_SESSION['status'] = $msg;
    header('Location: user-list.php');
    exit();
    }
}



//METHOD: Method to update the user records
if(isset($_POST['update_user_button'])) {
    $displayname = $_POST['fullName'];
    $phone = $_POST['phone'];
    

$uid = $_POST['user_id'];
$properties = [
    'displayName' => $displayname,
    'phoneNumber' => $phone,
];

$updatedUser = $auth->updateUser($uid, $properties);


if($updatedUser) {
    $_SESSION['status'] = "User updated succesfully!";
    header('Location: user-list.php');
    exit();
}else {
    $_SESSION['status'] = "Unsuccessful to update, try again later!";
    header('Location: user-list.php');
    exit();
}

}


//function to check if submit button is clicked
if(isset($_POST['save'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $section = $_POST['section'];
    $lrn_number = $_POST['lrn_number'];

    $postData = [
    'fname' => $first_name,
    'lname' => $last_name,
    'email' => $email,
    'section' => $section,
    'lrn_number' => $lrn_number,

];

$ref_table = "students"; //this variable will be pushed into getReference and pushed whats data in $postData
$postRef_result = $database->getReference($ref_table)->push($postData);

if($postRef_result) {
    $_SESSION['status'] = "Student added succesfully!";
    header('Location: index.php');
}else {
    $_SESSION['status'] = "Unsuccessful to add, try again later!";
    header('Location: index.php');
}
//insert data into database

}
?>
<?php 
session_start(); 
include('dbcon.php'); //for database connection

//METHOD to add user to database using Firebase User Management
if(isset($_POST['register_button'])) {
    $first_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userProperties = [
    'email' => $email,
    'emailVerified' => false,
    'password' => $password,
    'firstName' => $first_name,
    'lastName' => $last_name,
    'disabled' => false,
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
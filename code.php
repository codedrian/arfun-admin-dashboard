<?php 
session_start(); 
include('dbcon.php'); //for database connection

if(isset($_POST['updateStudent'])) {
    $key = $_POST['key'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

$updateData = [
    'fname' => $first_name,
    'lname' => $last_name,
    'email' => $email,
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

    $postData = [
    'fname' => $first_name,
    'lname' => $last_name,
    'email' => $email,

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
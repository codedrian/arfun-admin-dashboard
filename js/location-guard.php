<?php

session_start();

function checkLocation($location, $checkList)
{
    if (!isset($_SESSION['oldLoc'])) {
        $_SESSION['oldLoc'] = 'index.php';
    }

    // check link if accessible
    if (!in_array($location, $checkList)) {
        // redirect 
        echo json_encode(["state" => true, "location" => $_SESSION['oldLoc']]);

    } else {
        $_SESSION['oldLoc'] = $location;
        echo json_encode(["state" => false, "location" => $_SESSION['oldLoc']]);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['location'])) {
    $location = $_POST["location"];

    $role = $_SESSION['role'];

    // $adminExPaths = array("lesson.php", "create-quiz.php");
    $adminExPaths = array("index.php", "register.php", "student-list.php", "add-teacher.php", "user-list.php", "archive.php");
    // $teacherExPaths = array("register.php", "add-teacher.php", "user-list.php");
    $teacherExPaths = array("index.php", "add-student.php", "lesson.php", "create-quiz.php", "quiz-edit.php", "archive.php");

    if ($role == 'admin') {
        checkLocation($location, $adminExPaths);
    } else if ($role == 'teacher') {
        checkLocation($location, $teacherExPaths);
    }

    exit();
}
?>
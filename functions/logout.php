<?php
session_start();
require "./database.php";
date_default_timezone_set('Asia/Manila');

try {
    //code...
    $t = date('Y-m-d H:i:s');
    $connection = connect();
    $id = $_GET['id'];
    $sql = "INSERT INTO student_logout VALUES (0,'$t', $id)";
    mysqli_query($connection, $sql);
    if (isset($_GET['id'])) {
        unset($_SESSION['student_id']);
        unset($_SESSION['password']);
        unset($_SESSION['email']);
        header("location: /project/project-system/login.php");
    }
} catch (\Throwable $th) {
    unset($_SESSION['student_id']);
    unset($_SESSION['password']);
    unset($_SESSION['email']);
    header("location: /project/project-system/login.php");
}
?>
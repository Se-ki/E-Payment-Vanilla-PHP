<?php
session_start();
require "./database.php";
date_default_timezone_set('Asia/Manila');
$t = date('Y-m-d H:i:s');
$connection = connect();
$id = $_SESSION['student_id'];
$sql = "INSERT INTO student_logout VALUES (0,'$t', $id)";
mysqli_query($connection, $sql);
if (session_destroy()) {
    header("location: /project/project-system/login.php");
}
?>
<?php
session_start();
require "./database.php";
function Login($result, $email, $password)
{
    $rows = mysqli_fetch_assoc($result);
    if ($email != $rows['student_email'] || $password != $rows['student_password']) {
        header("location: /project/project-system/login.php?err=ksnvisne982323kf");
    } else {
        $_SESSION['student_id'] = $rows['student_id'];
        $_SESSION['firstname'] = $rows['student_fname'];
        $_SESSION['lastname'] = $rows['student_lname'];
        $_SESSION['school_id'] = $rows['student_schoolid'];
        $_SESSION['program'] = $rows['student_program'];
        $_SESSION['yearlevel'] = $rows['student_yearlevel'];
        $_SESSION['mobilenumber'] = $rows['student_mobilenumber'];
        $_SESSION['address'] = $rows['student_address'];
        $_SESSION['email'] = $rows['student_email'];
        $_SESSION['password'] = $rows['student_password'];
        $_SESSION['profile_picture'] = $rows['profile_picture'];
        date_default_timezone_set('Asia/Manila');
        $t = date('Y-m-d H:i:s');
        $connection = connect();
        $id = $rows['student_id'];
        $sql = "INSERT INTO student_login VALUES(0, '$t', $id)";
        mysqli_query($connection, $sql);
        header("location: /project/project-system/bills.php");
    }
}
try {
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $connection = connect();
        $stmt = $connection->prepare("SELECT * FROM student_signup WHERE student_email=?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        Login($result, $email, $password);
    }
} catch (\Throwable $th) {
    echo '<script>alert($th)</script>';
}
?>
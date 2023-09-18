<?php
session_start();
require "database.php";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connection = connect();
    $stmt = $connection->prepare("SELECT * FROM student_signup WHERE student_email=?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_assoc();
    Login($result, $rows, $password);
}
function Login($result, $rows, $password)
{
    if ($result->num_rows) {
        $verify_password = $rows['student_password'];
        verifyPassword($password, $verify_password, $rows);
    } else {
        $_SESSION['error'] = "Incorrect username or password.";
        $_SESSION['user_attempts'] += 1;
        header("location: login.php");
    }
}
function isLocked($session_locked)
{
    if (isset($session_locked)) {
        $time = time() - $session_locked;
        if ($time > 10) {
            unset($_SESSION['locked']);
            unset($_SESSION['user_attempts']);
        }
    }
}
function verifyPassword($password, $verify_pass, $rows)
{
    if ($password != $verify_pass) {
        $_SESSION['error'] = "Incorrect username or password.";
        $_SESSION['user_attempts'] += 1;
        header("location: /login.php");
    } else {
        if ($password != $verify_pass) {
            $_SESSION['error'] = "Incorrect username or password.";
            $_SESSION['user_attempts'] += 1;
            header("location: /login.php");
        } else {
            $_SESSION['student_id'] = $rows['student_id'];
            $_SESSION['email'] = $rows['student_email'];
            $_SESSION['password'] = $rows['student_password'];
            $_SESSION['firstname'] = $rows['student_fname'];
            $_SESSION['lastname'] = $rows['student_lname'];
            $_SESSION['schoolid'] = $rows['student_schoolid'];
            $_SESSION['program'] = $rows['student_program'];
            $_SESSION['mobilenumber'] = $rows['student_mobilenumber'];
            $_SESSION['yearlevel'] = $rows['student_yearlevel'];
            $_SESSION['gender'] = $rows['student_gender'];
            $_SESSION['address'] = $rows['student_address'];
            header("location: bills.php");
        }
    }
}
?>
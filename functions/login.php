<?php
session_start();
require "database.php";
function Login($result, $rows, $password)
{
    if ($result->num_rows) {
        $verify_password = $rows['student_password'];
        verifyPassword($password, $verify_password);
    } else {
        $_SESSION['error'] = "Incorrect username or password.";
        $_SESSION['user_attempts'] += 1;
        header("location: /project/project-system/login.php");
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
function verifyPassword($password, $verify_pass)
{
    if ($password != $verify_pass) {
        $_SESSION['error'] = "Incorrect username or password.";
        $_SESSION['user_attempts'] += 1;
        header("location: /project/project-system/login.php");
    }
}
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
?>
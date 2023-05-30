<?php
session_start();
require "./database.php";
function Login($result, $username, $password)
{
    $rows = mysqli_fetch_assoc($result);
    if ($username != $rows['username'] || $password != $rows['password']) {
        header("location: /project/project-system/login.php?err=ksnvisne982323kf");
    } else {
        $_SESSION['school_id'] = $rows['school_id'];
        $_SESSION['email'] = $rows['email'];
        $_SESSION['password'] = $rows['password'];
        $_SESSION['username'] = $rows['username'];
        $_SESSION['firstname'] = $rows['firstname'];
        $_SESSION['lastname'] = $rows['lastname'];
        $_SESSION['address'] = $rows['address'];
        $_SESSION['mobilenumber'] = $rows['mobilenumber'];
        $_SESSION['yearlevel'] = $rows['yearlevel'];
        $_SESSION['program'] = $rows['program'];
        header("location: /project/project-system/bills.php");
    }
}
try {
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $connection = connect();
        $stmt = $connection->prepare("SELECT * FROM user_info WHERE username=? OR password=?");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        Login($result, $username, $password);
    }
} catch (\Throwable $th) {
    echo '<script> alert($th)</script>';
}
?>
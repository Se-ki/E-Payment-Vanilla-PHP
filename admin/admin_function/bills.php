<?php
session_start();
require "../../functions/database.php";
function description($connection, $description)
{
    $sql = "SELECT * FROM bills WHERE bill_description = '$description'";
    $query = mysqli_query($connection, $sql);
    if (mysqli_num_rows($query)) {
        echo '<script>alert("Bill already exist!")</script>';
        header('location: /project/project-system/admin/bills.php?q=true');
    } else {
        return true;
    }
}
if (isset($_POST['save'])) {
    $description = $_POST['bill-description'];
    $amount = $_POST['bill-amount'];
    $date = $_POST['bill-publish'];
    $deadline = $_POST['bill-deadline'];
    $id = $_SESSION['admin_id'];
    $connection = connect();

    $sql = "SELECT * FROM student_signup";
    $student_q = mysqli_query($connection, $sql);
    while ($row_stdnt = $student_q->fetch_assoc()) {
        $student_id = $row_stdnt['student_id'];
        $sql = "INSERT INTO `bills`(`bill_description`, `bill_amount`, `bill_publish`, `bill_deadline`, `status`, `admin_id`, `student_id`) VALUES ('$description', $amount, '$date', '$deadline', 0, $id, $student_id)";
        mysqli_query($connection, $sql);
    }
}
header('location: /project/project-system/admin/bills.php');

?>
<?php
session_start();
require "../../functions/database.php";
// if button toggle in bill.php this function will work
function description($connection, $description)
{
    $_sql = "SELECT * FROM bills WHERE bill_description = '$description'";
    $query = mysqli_query($connection, $_sql);
    if (mysqli_num_rows($query)) {
        return false;
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
    if (description($connection, $description) == false) {
        ?>
        <script>alert("Bill already exist!")</script>;
        <script>window.location.href = "/project/project-system/admin/bills.php"</script>;
        <?php
    } else {
        $sql_stud = "SELECT * FROM student_signup";
        $student_q = mysqli_query($connection, $sql_stud);
        while ($row_stdnt = $student_q->fetch_assoc()) {
            $student_id = $row_stdnt['student_id'];
            $sql_bill = "INSERT INTO `bills`(`bill_description`, `bill_amount`, `bill_publish`, `bill_deadline`, `status`, `admin_id`, `student_id`) VALUES ('$description', $amount, '$date', '$deadline', 0, $id, $student_id)";
            mysqli_query($connection, $sql_bill);
        } ?>
        <script>alert("Bill added! <?php echo $description ?>")</script>
        <?php
        header('location: /project/project-system/admin/bills.php');
    }
}
?>
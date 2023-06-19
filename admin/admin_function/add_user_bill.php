<?php
session_start();
require "../../functions/database.php";
// if button toggle in bill.php this function will work
function description($connection, $description, $student_id)
{
    $_sql = "SELECT * FROM bills WHERE bill_description = '$description' AND student_id = $student_id";
    $query = mysqli_query($connection, $_sql);
    if (mysqli_num_rows($query)) {
        return false;
        // header('location: /project/project-system/admin/bills.php');
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
    $student_id = $_POST['id'];
    $connection = connect();
    if (description($connection, $description, $student_id) == false) {
        ?>
        <script>alert("Bill already exist!")</script>;
        <script>window.location.href = "/project/project-system/admin/users.php"</script>;
        <?php
    } else {
        $sql_bill = "INSERT INTO `bills`(`bill_description`, `bill_amount`, `bill_publish`, `bill_deadline`, `status`, `admin_id`, `student_id`) VALUES ('$description', $amount, '$date', '$deadline', 0, $id, $student_id)";
        mysqli_query($connection, $sql_bill);
        ?>
        <script>alert("Bill added! <?php echo $description ?>")</script>
        <?php
        header('location: /project/project-system/admin/users.php');
    }
}
?>
<?php
require "../project-system/functions/database.php";
$connection = connect();
$id = $_SESSION['student_id'];
$stmt = $connection->prepare("SELECT bills.bill_id, bills.bill_description, bills.bill_amount, bills.bill_publish, bills.bill_deadline, admin.admin_name FROM bills LEFT JOIN `admin` ON bills.admin_id = admin.admin_id WHERE student_id=$id AND `status`=0");
$stmt->execute();
$result = $stmt->get_result();
function view($result)
{
    return $result->fetch_assoc();
}
?>
<?php
require "../project-system/functions/database.php";
$connection = connect();
$id = $_SESSION['student_id'];
$stmt = $connection->prepare("SELECT bills.bill_id, bills.bill_description, bills.bill_amount, bills.bill_publish, bills.bill_deadline, admin.admin_name FROM bills LEFT JOIN `admin` ON bills.admin_id = admin.admin_id WHERE student_id=$id AND `status`=0");
// $stmt = $connection->prepare("SELECT *
// FROM (SELECT `bill_id`, 
//             `bill_description`, 
//             `bill_amount`, 
//             `bill_publish`,
//             `bill_deadline`,
//             `status`,
//             admin.admin_name, 
//             `student_id`,
//             ROW_NUMBER() OVER(PARTITION BY `bill_description` ORDER BY `bill_id` DESC) rn
//             FROM `bills`
//             LEFT JOIN `admin` ON bills.admin_id = admin.admin_id 
//             WHERE `bill_description` LIKE 'College Fee%' AND student_id = $id AND status = 0) a WHERE rn = 1"); 
$stmt->execute();
$result = $stmt->get_result();
function view($result)
{
    return $result->fetch_assoc();
}
?>
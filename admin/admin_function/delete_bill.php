<?php
require "../../functions/database.php";
$description = $_GET['desc'];
$connection = connect();
// $sql = "DELETE FROM `bills` WHERE bill_description = '$description'";
$sql = "
SET FOREIGN_KEY_CHECKS = 0;

DELETE FROM transactions
WHERE (bill_id, student_id) IN (
    SELECT bill_id, student_id
    FROM bills
    WHERE bill_description = '$description'
);

DELETE FROM bills
WHERE bill_description = '$description';

SET FOREIGN_KEY_CHECKS = 1;
";
mysqli_multi_query($connection, $sql); // multi-line query is that for example you have  multiple query in a single statements 

header('location: /project/project-system/admin/bills.php');
?>
<!-- SET FOREIGN_KEY_CHECKS = 0;

DELETE FROM transactions
WHERE (bill_id, student_id) IN (
    SELECT bill_id, student_id
    FROM bills
    WHERE bill_description = 'College Fee'
);

DELETE FROM bills
WHERE bill_description = 'College Fee';

SET FOREIGN_KEY_CHECKS = 1;
 -->
<?php
require "../functions/database.php";
$num = 0;
$sort = 'DESC';
$column = 'bill_publish';
if (isset($_GET['column']) && isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    $column = $_GET['column'];
    if ($sort == 'ASC') {
        $sort = 'DESC';
    } else {
        $sort = 'ASC';
    }
}
function total_List($column, $sort)
{
    $sql = "SELECT *
FROM (SELECT `bill_id`, 
            `bill_description`, 
            `bill_amount`, 
            `bill_publish`,
            `bill_deadline`,
            `status`,
            `admin_id`, 
            `student_id`,
            ROW_NUMBER() OVER(PARTITION BY `bill_description`) rn
            FROM `bills`
            WHERE `bill_description` LIKE '%') a WHERE rn = 1 ORDER BY $column $sort";
    $connection = connect();
    return $connection->query($sql);
}
function viewBills($total_List)
{
    $query = $total_List;
    return $query->fetch_assoc();
}
$total_List = total_List($column, $sort);
?>
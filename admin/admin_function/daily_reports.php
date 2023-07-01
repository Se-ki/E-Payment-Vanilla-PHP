<?php
require "../functions/database.php";
$start = '';
$end = '';
$num = 0;

if (isset($_GET['view'])) {
    $start = $_GET['start'];
    $end = $_GET['end'];
    queryTransaction($start, $end);
}
function queryTransaction($start, $end)
{
    $connection = connect();
    if (!empty($start) && !empty($end)) {
        $sql = "SELECT * FROM transactions 
        JOIN student_signup ON transactions.student_id = student_signup.student_id 
        WHERE transaction_datepaid >= '$start' AND transaction_datepaid <= '$end'";
    } else {
        $sql = "SELECT * FROM transactions 
        JOIN student_signup ON transactions.student_id = student_signup.student_id ORDER BY transaction_datepaid DESC";
    }
    return $connection->query($sql);
}
$qt = queryTransaction($start, $end);
function transactions($qt)
{
    return $qt->fetch_assoc();
}
?>
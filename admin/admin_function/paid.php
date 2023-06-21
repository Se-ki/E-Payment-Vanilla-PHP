<?php
require "../functions/database.php";
$num = 0;
function getTransaction()
{
    $connection = connect();
    $sql = "SELECT *
FROM `transactions`
JOIN student_signup ON transactions.student_id = student_signup.student_id
ORDER BY transaction_datepaid ASC";
    return $connection->query($sql);
}
$transactions = getTransaction();
function listOfTransactions($transactions)
{
    return $transactions->fetch_assoc();
}
?>
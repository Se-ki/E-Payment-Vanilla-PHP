<?php
require "../functions/database.php";
$connection = connect();
function totalUser($connection)
{
    $sql = "SELECT * from student_signup";
    $result = $connection->query($sql);
    $count = 0;
    if ($result->num_rows > 0) {
        while ($result->fetch_assoc()) {

            $count = $count + 1;
        }
    }
    return $count;
}
function totalAmount($connection)
{
    $sql = "SELECT * from `transactions`";
    $result = $connection->query($sql);
    $count = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $count = $count + $row['transaction_amount'];
        }
    }
    return $count;
}
function totalBills($connection)
{
    $sql = "SELECT DISTINCT bill_description from `bills`";
    $result = $connection->query($sql);
    $count = 0;
    if ($result->num_rows > 0) {
        while ($result->fetch_assoc()) {
            $count = $count + 1;
        }
    }
    return $count;
}
function totalUserPaid($connection)
{
    $sql = "SELECT * from transactions";
    $result = $connection->query($sql);
    $count = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $count = $count + 1;
        }
    }
    return $count;
}
?>
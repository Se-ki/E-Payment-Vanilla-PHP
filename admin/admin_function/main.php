<?php
require "../functions/database.php";

if (isset($_GET['submit-admin'])) {
    $description = $_GET['description'];
    $amount = $_GET['amount'];
    $connection = connect();
    $stmt = $connection->prepare("INSERT INTO bills VALUES(0,?,?)");
    $stmt->bind_param('ss', $description, $amount);
    $stmt->execute();
}

$rows = "";
if (isset($_GET['submit-search'])) {
    $connection = connect();
    $search_value = $_GET['search'];
    $stmt = $connection->prepare("SELECT * FROM user_info WHERE school_id=?");
    $stmt->bind_param("s", $search_value);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_fetch_assoc($result);
}
?>
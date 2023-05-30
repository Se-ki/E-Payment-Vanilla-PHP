<?php
require "../project-system/functions/database.php";
$connection = connect();
$stmt = $connection->prepare("SELECT * FROM bills");
$stmt->execute();
$result = $stmt->get_result();
function view($result)
{
    return mysqli_fetch_assoc($result);
}
?>
<?php
require "../../functions/database.php";
$description = $_GET['desc'];
$connection = connect();
$sql = "DELETE FROM `bills` WHERE bill_description = '$description'";
mysqli_query($connection, $sql);
header('location: /project/project-system/admin/bills.php');
?>
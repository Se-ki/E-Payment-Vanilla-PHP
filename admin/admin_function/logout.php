<?php
require "../../functions/database.php";
session_start();
date_default_timezone_set('Asia/Manila');
$t = date('Y-d-m H:i:s');
$id = $_GET['admin_id'];
$connection = connect();
$sql = "INSERT INTO admin_logout VALUES(0, '$t', $id)";
mysqli_query($connection, $sql);
if (isset($_GET['admin_id'])) {
    unset($_SESSION['pin']);
    header("location: /project/project-system/admin/login.php");
}
?>
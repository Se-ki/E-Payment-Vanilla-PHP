<?php
session_start();
require "../../functions/database.php";
if (isset($_POST['login-admin'])) {
    $pin = $_POST['pinCode'];
    $connection = connect();
    $stmt = $connection->prepare("SELECT * FROM admin WHERE admin_pass=?");
    $stmt->bind_param('i', $pin);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    Pin($row, $pin);
}
function Pin($row, $pin)
{
    if ($pin == $row['admin_pass']) {
        $_SESSION['pin'] = $row['admin_pass'];
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_name'] = $row['admin_name'];
        date_default_timezone_set('Asia/Manila');
        $t = date('Y-d-m H:i:s');
        $connection = connect();
        $id = $row['admin_id'];
        $sql = "INSERT INTO admin_login VALUES(0, '$t', $id)";
        mysqli_query($connection, $sql);
        header('location: /project/project-system/admin/main.php');
    } else {
        header('location: /project/project-system/admin/login.php?err=tru');
    }
}
?>
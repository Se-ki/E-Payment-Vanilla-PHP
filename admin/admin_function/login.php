<?php
session_start();
require "../../functions/database.php";
if (isset($_POST['login-admin'])) {
    $pin = $_POST['pinCode'];
    $connection = connect();
    $stmt = $connection->prepare("SELECT * FROM admin WHERE pin=?");
    $stmt->bind_param('i', $pin);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    Pin($row, $pin);
}
function Pin($row, $pin)
{
    if ($pin == $row['pin']) {
        $_SESSION['pin'] = $row['pin'];
        header('location: /project/project-system/admin/main.php');
    } else {
        header('location: /project/project-system/admin/login.php?err=tru');
    }
}
?>
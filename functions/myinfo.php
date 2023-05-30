<?php
session_start();
require "./database.php";

function passwordNotEmpty($changepass)
{
    if (empty($changepass)) {
        header('location: /project/project-system/myinfo.php');
    } else {
        $connection = connect();
        $stmt = $connection->prepare("UPDATE user_info SET password=? WHERE school_id=?");
        $stmt->bind_param('ss', $changepass, $_SESSION['school_id']);
        $stmt->execute();
        header('location: /project/project-system/myinfo.php');
    }
}

if (isset($_POST['submit-changepass'])) {
    $changepass = $_POST['password'];
    passwordNotEmpty($changepass);
}
?>
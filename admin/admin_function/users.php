<?php
require "../functions/database.php";
$num = 0;
function getUserData()
{
    $connection = connect();
    $sql = "SELECT * FROM student_signup ORDER BY student_created DESC";
    return $connection->query($sql);
}
$getUser = getUserData();
function listOfUsers($getUser)
{
    return $getUser->fetch_assoc();
}
?>
<?php
session_start();
require "database.php";
$id = $_SESSION['student_id'];
function getInfoStudent($id)
{
    $connection = connect();
    $sql = "SELECT profile_picture FROM student_signup WHERE student_id=$id";
    return $connection->query($sql);
}
$student_info = getInfoStudent($id);
function listOfInfoStudent($student_info)
{
    return $student_info->fetch_assoc();
}
//if user is put a profile picture
if (isset($_POST['save'])) {
    $connection = connect();
    $pic = $_POST['picture'];
    $sql_s = "UPDATE student_signup SET profile_picture='$pic' WHERE student_id=$id";
    $connection->query($sql_s);
    ?>
    <script>alert("Added a Profile Picture!")</script>
    <script>window.location.href = "/project/project-system/myinfo.php"</script>
    <?php
}

//when user changes his/er password
function passwordNotEmpty($changepass)
{
    if (empty($changepass)) {
        header('location: /project/project-system/myinfo.php');
    } else {
        $connection = connect();
        $stmt = $connection->prepare("UPDATE student_signup SET student_password=? WHERE student_schoolid=?");
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
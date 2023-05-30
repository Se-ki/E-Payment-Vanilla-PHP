<?php
require "./database.php";

function isCreated($school_id, $mobilenumber, $email)
{
    $connection = connect();
    $stmt = $connection->prepare("SELECT * FROM user_info WHERE school_id=? OR mobilenumber=? OR email=?");
    $stmt->bind_param('sss', $school_id, $mobilenumber, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_fetch_assoc($result);
    if ($school_id == $rows['school_id'] && $mobilenumber == $rows['mobilenumber'] && $email == $rows['email']) {
        header("location: /project/project-system/signup.php?err_feedback=Account already existed.&err_sid=The school id you've inputted already existed.&err_mober=The mobile number you've inputted already existed.&err_email=The email address you've inputted already existed.");
        return true;
    } else if ($school_id == $rows['school_id']) {
        header("location: /project/project-system/signup.php?err_sid=The school id you've inputted already existed.");
        return true;
    } else if ($email == $rows['email']) {
        header("location: /project/project-system/signup.php?err_email=The email address you've inputted already existed.");
        return true;
    }
    return false;
}
function userInfoInserted($school_id, $firstname, $lastname, $sex, $program, $yearLevel, $mobilenumber, $address, $email, $password)
{
    //this function isCreated when it false it will automaticaly diritso og function gikan anang $connection = connect(); hangtod pa ubos
    isCreated($school_id, $mobilenumber, $email);
    $connection = connect();
    $stmt = $connection->prepare("INSERT INTO user_info VALUES(0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssss', $school_id, $firstname, $lastname, $sex, $program, $yearLevel, $mobilenumber, $address, $email, $password);
    $stmt->execute();
    header('location: /project/project-system/signup.php?feedback=Successfully Registered!');
}
if (isset($_POST['submit-button'])) {
    $school_id = $_POST['school_ID'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $sex = $_POST['sex'];
    $program = $_POST['course'];
    $yearLevel = $_POST['yearLevel'];
    $mobilenumber = $_POST['mobilenumber'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    userInfoInserted($school_id, $firstname, $lastname, $sex, $program, $yearLevel, $mobilenumber, $address, $email, $password);
}
?>
<?php
require "./database.php";
// function isCreated($school_id, $mobilenumber, $email)
// {
//     $connection = connect();
//     $stmt = $connection->prepare("SELECT * FROM student_signup WHERE student_schoolid=? OR student_mobilenumber=? OR student_email=?");
//     $stmt->bind_param('sss', $school_id, $mobilenumber, $email);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $rows = mysqli_fetch_assoc($result);
//     if ($school_id == $rows['student_schoolid'] && $mobilenumber == $rows['student_mobilenumber'] && $email == $rows['student_email']) {
//         header("location: /project/project-system/signup.php?err_feedback=Account already existed.&err_sid=The school id you've inputted already existed.&err_mober=The mobile number you've inputted already existed.&err_email=The email address you've inputted already existed.");
//         return true;
//     } else if ($school_id == $rows['student_schoolid']) {
//         header("location: /project/project-system/signup.php?err_sid=The school id you've inputted already existed.");
//         return true;
//     } else if ($email == $rows['student_email']) {
//         header("location: /project/project-system/signup.php?err_email=The email address you've inputted already existed.");
//         return true;
//     }
//     return false;
// }
function userInfoInserted($school_id, $firstname, $lastname, $sex, $program, $yearLevel, $mobilenumber, $address, $email, $password, $t)
{
    //this function isCreated when it false it will automaticaly diritso og function gikan anang $connection = connect(); hangtod pa ubos
    // isCreated($school_id, $mobilenumber, $email);
    // $connection = connect();

    $connection = connect();
    $stmt = $connection->prepare("SELECT * FROM student_signup WHERE student_schoolid=? OR student_email=? OR student_mobilenumber=?");
    $stmt->bind_param('sss', $school_id, $email, $mobilenumber);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = mysqli_fetch_assoc($result);
    echo $rows['student_email'];
    echo $rows['student_mobilenumber'];
    echo $mobilenumber;
    if ($school_id == $rows['student_schoolid'] && $mobilenumber == $rows['student_mobilenumber'] && $email == $rows['student_email']) {
        header("location: /project/project-system/signup.php?err_feedback=Account already existed.&err_sid=The school id you've inputted already existed.&err_mober=The mobile number you've inputted already existed.&err_email=The email address you've inputted already existed.");
    } else if ($school_id == $rows['student_schoolid']) {
        header("location: /project/project-system/signup.php?err_sid=The school id you've inputted already existed.");
    } else if ($email == $rows['student_email']) {
        header("location: /project/project-system/signup.php?err_email=The email address you've inputted already existed.");
    } else if ($mobilenumber == $rows['student_mobilenumber']) {
        header("location: /project/project-system/signup.php?err_num=The mobile number you've inputted already existed.");
    } else {
        $stmt = $connection->prepare("INSERT INTO student_signup VALUES(0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,null)");
        $stmt->bind_param('sssssssssss', $firstname, $lastname, $school_id, $program, $yearLevel, $sex, $address, $email, $password, $t, $mobilenumber);
        $stmt->execute();
        header('location: /project/project-system/signup.php?feedback=Successfully Registered!');
    }
}
if (isset($_POST['submit-button'])) {
    $school_id = $_POST['school_ID'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $sex = $_POST['sex'];
    $program = $_POST['course'];
    $yearLevel = $_POST['yearlevel'];
    $mobilenumber = $_POST['mobilenumber'];
    $address = $_POST['address'];
    // on this email you may add a function that user will not enter @csucc.edu.ph
    $email = $_POST['email'];
    $password = $_POST['password'];
    date_default_timezone_set('Asia/Manila');
    $t = date('Y-m-d H:i:s');
    userInfoInserted($school_id, $firstname, $lastname, $sex, $program, $yearLevel, $mobilenumber, $address, $email, $password, $t);
}
?>
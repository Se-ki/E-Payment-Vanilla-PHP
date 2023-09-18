<?php
session_start();
require "./database.php";
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
    if ($school_id == $rows['student_schoolid'] && $mobilenumber == $rows['student_mobilenumber'] && $email == $rows['student_email']) {
        $_SESSION['data_exist'] = "Account already existed";
        $_SESSION['err_sid'] = "The school id you've inputted already existed.";
        $_SESSION['err_num'] = "The mobile number you've inputted already existed.";
        $_SESSION['err_email'] = "The email address you've inputted already existed.";
        header("location: signup.php");
    } else if ($school_id == $rows['student_schoolid']) {
        $_SESSION['err_sid'] = "The school id you've inputted already existed.";
        header("location: signup.php");
    } else if ($email == $rows['student_email']) {
        $_SESSION['err_email'] = "The email address you've inputted already existed.";
        header("location: signup.php");
    } else if ($mobilenumber == $rows['student_mobilenumber']) {
        $_SESSION['err_num'] = "The mobile number you've inputted already existed.";
        header("location: signup.php");
    } else {
        $stmt = $connection->prepare("INSERT INTO student_signup VALUES(0, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, ?, ?,null)");
        $stmt->bind_param('sssssssssss', $firstname, $lastname, $school_id, $program, $yearLevel, $sex, $address, $email, $password, $t, $mobilenumber);
        $stmt->execute();
        $SESSION['success'] = "Login Success!";
        ?>
                    <script>
                        alert("Successfully Registered!")
                        window.location.href = "login.php"
                    </script>
        <?php
        // header('location: /project/project-system/signup.php?feedback=Successfully Registered!');
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
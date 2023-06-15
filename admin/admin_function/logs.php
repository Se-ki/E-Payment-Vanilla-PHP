<?php
$i = 0;
$x = 0;
$connection = connect();

// To fetch login data
$sql_login = "SELECT student_signup.student_lname, student_signup.student_fname, login_date FROM student_login 
JOIN student_signup ON student_login.student_id = student_signup.student_id ORDER BY login_date DESC";
$query_login = $connection->query($sql_login);

// to fecth logout data
$sql_logout = "SELECT student_signup.student_lname, student_signup.student_fname, logout_date FROM student_logout 
JOIN student_signup ON student_logout.student_id = student_signup.student_id ORDER BY logout_date DESC";
$query_logout = $connection->query($sql_logout);
?>
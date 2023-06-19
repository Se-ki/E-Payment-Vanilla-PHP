<?php
session_start();
require "../../functions/database.php";
$connection = connect();
$id = $_GET['id'];
$sql = "
SET FOREIGN_KEY_CHECKS = 0;

DELETE FROM transactions WHERE (student_id) IN (
    SELECT student_id FROM student_signup WHERE student_id = $id    
);

DELETE FROM bills WHERE student_id IN (
    SELECT student_id FROM student_signup 
    WHERE student_id = $id
);
DELETE FROM student_login WHERE student_id = $id;
DELETE FROM student_logout WHERE student_id = $id;
DELETE FROM student_signup WHERE student_id = $id;

SET FOREIGN_KEY_CHECKS = 1; 
";
$connection->multi_query($sql);
?>
<script>alert("Deleted!")</script>
<script>window.location.href = "/project/project-system/admin/users.php"</script>
<!-- 
 SET FOREIGN_KEY_CHECKS = 0;

DELETE FROM transactions WHERE (student_id) IN (
    SELECT student_id FROM student_signup WHERE student_id = 2    
);

DELETE FROM bills WHERE student_id IN (
    SELECT student_id FROM student_signup 
    WHERE student_id = 2
);
DELETE FROM student_login WHERE student_id = 2;
DELETE FROM student_logout WHERE student_id = 2;
DELETE FROM student_signup WHERE student_id = 2;

SET FOREIGN_KEY_CHECKS = 1; 
 -->
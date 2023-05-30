<?php
session_start();
if (session_destroy()) {
    header("location: /project/project-system/login.php");
}
?>
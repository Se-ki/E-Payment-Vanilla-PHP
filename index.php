<?php
session_start();
if (!empty($_SESSION['email'])) {
    header('location: /project/project-system/bills.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrapV5.3.0/bootstrap.min.css">
    <title>Welcome to CEITt E-Payment</title>
    <link rel="stylesheet" href="./css/index.css">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar bg-body-tertiary navbar-expand-sm w-100 p-3 position-absolute top-0 start-0">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1"><img src="./img/logo.jpg" width="120px" height="50px" alt=""
                        srcset=""></span>
            </div>
        </nav>
        <div class="card">
            <div class="card-body">
                <ul>
                    <li><a class="btn" id="student" href="./login.php">Student</a></li>
                    <li><a class="btn" href="./admin/login.php">Administrator</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>
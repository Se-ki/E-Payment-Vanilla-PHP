<?php
require "../functions/database.php";
session_start();
if (empty($_SESSION['pin'])) {
    header("location: login.php");
}
require "./admin_function/logs.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Logs</title>
    <link rel="stylesheet" href="../css/bootstrapV5.3.0/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />
    <!-- sidebar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/bills.css">
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <img src="../img/ava3.png" width="25px" height=25px"></img><span class="nav_logo-name">ADMIN
                    </span>
                    <!-- <img src="../img/logo.jpg" width="12%" height="80%" alt=""> -->
                </a>
                <a href="./main.php" class="nav_link">
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Main</span>
                </a>
                <div class="nav_list">
                    <a href="./bills.php" class="nav_link">
                        <i class='bx bx-list-plus nav_icon'></i>
                        <span class="nav_name">Bills</span>
                    </a>
                    <a href="./users.php" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Users</span>
                    </a>
                    <a href="./paid.php" class="nav_link">
                        <i class='bx bxs-user-check nav_icon'></i>
                        <span class="nav_name">Paid</span>
                    </a>
                    <a href="./logs.php" class="nav_link active">
                        <i class='bx bx-group nav_icon'></i>
                        <span class="nav_name">Logs</span>
                    </a>
                </div>
            </div> <a href="./admin_function/logout.php?id=<?php echo $_SESSION['admin_id'] ?>" class="nav_link"> <i
                    class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">Logout</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="">
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Login | Logout
                </a>

                <!-- Pills navs -->
                <ul class="dropdown-menu" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="dropdown-item" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                            aria-controls="pills-login" aria-selected="true">List of User
                            Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="dropdown-item" id="tab-register" data-mdb-toggle="pill" href="#pills-register"
                            role="tab" aria-controls="pills-register" aria-selected="false">List
                            of User Logout</a>
                    </li>
                </ul>
                <!-- Pills navs -->


            </div>


            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <h1>Login</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Firstname</th>
                                <th scope="col">Login Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row_login = $query_login->fetch_assoc()) { ?>
                            <tr>
                                <th scope="row">
                                        <?php echo $i = $i + 1 ?>
                                </th>
                                <td>
                                        <?php echo $row_login['student_lname'] ?>
                                </td>
                                <td>
                                        <?php echo $row_login['student_fname'] ?>
                                </td>
                                <td>
                                    <p>🟢
                                            <?php
                                            date_default_timezone_set('Asia/Manila');
                                            $format = date_create($row_login['login_date']);
                                            echo $datepaid = date_format($format, "F d, Y h:i:s a");
                                            ?>
                                    </p>

                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                    <h1>Logout</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Firstname</th>
                                <th scope="col">Logout Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row_logout = $query_logout->fetch_assoc()) { ?>
                            <tr>
                                <th scope="row">
                                        <?php echo $x = $x + 1 ?>
                                </th>
                                <td>
                                        <?php echo $row_logout['student_lname'] ?>
                                </td>
                                <td>
                                        <?php echo $row_logout['student_fname'] ?>
                                </td>
                                <td>
                                    <p>🔴
                                            <?php
                                            date_default_timezone_set('Asia/Manila');
                                            $format = date_create($row_logout['logout_date']);
                                            echo $datepaid = date_format($format, "F d, Y h:i:s a");
                                            ?>

                                        </p>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Pills content -->
        </div>
    </div>
    <!--Container Main end-->
</body>
<script src="../js/bootstrapV5.3.0/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)

            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    // show navbar
                    nav.classList.toggle('show-l-navbar')
                    // change icon
                    toggle.classList.toggle('bx-x')
                    // add padding to body
                    bodypd.classList.toggle('body-pd')
                    // add padding to header
                    headerpd.classList.toggle('body-pd')
                })
            }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
            if (linkColor) {
                linkColor.forEach(l => l.classList.remove('active'))
                this.classList.add('active')
            }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready
    });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>

</html>
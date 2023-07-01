<?php
session_start();
if (empty($_SESSION['pin'])) {
    header("location: login.php");
}
require "./admin_function/daily_reports.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!-- Google Fonts -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- main.php resources -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin |
        <?php echo $_SESSION['admin_name'] ?>
    </title>
    <link rel="stylesheet" href="./css/dr.css">
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <p class="header-admin">Admin |
            <?php echo $_SESSION['admin_name'] ?>
        </p>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <img src="../img/ava3.png" width="25px" height=25px"></img><span class="nav_logo-name">ADMIN
                    </span>
                </a>
                <div class="nav_list">
                    <a href="./main.php" class="nav_link">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Main</span>
                    </a>
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
                    <a href="./logs.php" class="nav_link">
                        <i class='bx bx-group nav_icon'></i>
                        <span class="nav_name">Logs</span>
                    </a>
                    <a href="./daily_reports.php" class="nav_link active">
                        <i class='bx bxs-report nav_icon'></i>
                        <span class="nav_name">Daily Reports</span>
                    </a>
                </div>
            </div>
            <a href="./admin_function/logout.php?id=<?php echo $_SESSION['admin_id'] ?>" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">Logout</span>
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h3 style="color:#2C3E50">Daily Reports</h3>
        <table class="table">
            <div class="row and mx-auto col-10 col-md-8 col-lg-6">
                <form action="" method="GET">
                    <div class="form-floating col-6">
                        <input type="date" name="start" class="form-control input-sm" id="floatingstart"
                            placeholder="Start Date" required>
                        <label for="floatingstart">Start Date</label>
                    </div>
                    <div class="form-floating col-6">
                        <input type="date" name="end" class="form-control input-sm" id="floatingend"
                            placeholder="End Date" required>
                        <label for="floatingend">End Date</label>
                    </div>
                    <input type="submit" value="View" name="view"
                        class="btn btn-primary m-4 mx-auto col-10 col-md-8 col-lg-6" />
                    <a href="./daily_reports.php" class="btn btn-danger m-4 mx-auto col-10 col-md-8 col-lg-6">
                        Clear Search
                    </a>
                </form>
            </div>
            <thead>
                <tr>
                    <th scope="col" class="row-header">#</th>
                    <th scope="col" class="row-header">School ID</th>
                    <th scope="col" class="row-header">Name</th>
                    <th scope="col" class="row-header">Date Paid</th>
                    <th scope="col" class="row-header">Description</th>
                    <th scope="col" class="row-header">Amount</th>
                    <th scope="col" class="row-header">Reference Number</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = transactions($qt)) { ?>
                <tbody>
                    <tr>
                        <td scope="row">
                            <?php echo $num = $num + 1 ?>
                        </td>
                        <td>
                            <?php echo $row['student_schoolid'] ?>
                        </td>
                        <td class="row-description">
                            <?php echo $row['student_fname'] . " " . $row['student_lname'] ?>
                        </td>
                        <td>
                            <?php echo $row['transaction_datepaid'] ?>
                        </td>
                        <td class="row-description">
                            <?php echo $row['transaction_description'] ?>
                        </td>
                        <td>
                            <?php echo '₱ ' . number_format($row['transaction_amount'], 2) ?>
                        </td>
                        <td>
                            <?php echo $row["transaction_referenceno"] ?>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!--Container Main end-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
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
</body>

</html>
<?php
session_start();
require "./functions/bills.php";
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
    header("location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrapV5.0.2/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Bills</title>
    <link rel="stylesheet" href="./css/bills.css">
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="" role="button"
            data-bs-toggle="dropdown" data-mdb-toggle="dropdown" aria-expanded="false">
            <span>
                Christian Kyle,
            </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="./myinfo.php">My info</a></li>
            <li><a class="dropdown-item" href="./functions/logout.php">Logout</a></li>
        </ul>

    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <!-- <i class='bi bi-cash-stack nav_logo-icon'>C</i> -->
                    <img src="./img/icon.jpg" width="25px" height="25px" alt="">
                    <span class="nav_logo-name" style="font:bolder">CEIT E-PAYMENT
                    </span>
                </a>
                <div class="nav_list">
                    <a href="./bills.php" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Bills</span>
                    </a>
                    <!-- <a href="#" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Users</span>
                    </a> -->
                </div>
            </div> <a href="./functions/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                    class="nav_name">Logout</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Bills</h4>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Description</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col">Payment</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <th scope="row">1</th>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                    </tr> -->

                    <?php while ($rows = view($result)) { ?>
                        <tr scope="row">
                            <td>
                                <?php echo $rows['description'] ?>
                            </td>
                            <td>
                                <?php echo $rows['amount'] ?>
                            </td>
                            <td>
                                March 14, 2003
                            </td>
                            <td>
                                <a href="./payment.php?id=<?php echo $rows['bills_id'] ?>" class="btn btn-primary">
                                    Pay
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--Container Main end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./js/bills.js"></script>
</body>

</html>
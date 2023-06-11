<?php
session_start();
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
    header("location: login.php");
}
require "../project-system/functions/database.php";
$bills_id = $_GET['id'];
$connection = connect();
$stmt = $connection->prepare("SELECT * FROM bills WHERE bills_id=?");
$stmt->bind_param('i', $bills_id);
$stmt->execute();
$result = $stmt->get_result();
$rows = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Payment</title>
    <link rel="stylesheet" href="./css/bills.css">
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <li class="nav-item dropdown" style="list-style-type:none; cursor: pointer;">
            <a class="dropdown-toggle" data-bs-toggle="dropdown">
                <?php echo $_SESSION['firstname'] ?>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./myinfo.php">My info</a></li>
                <li><a class="dropdown-item" href="./functions/logout.php">Logout</a></li>
            </ul>
        </li>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <img src="./img/icon.jpg" width="25px" height="25px" alt="">
                    <span class="nav_logo-name">CEIT E-PAYMENT
                    </span>
                </a>
                <div class="nav_list">
                    <a href="./bills.php" class="nav_link">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Bills</span>
                    </a>
                    <!-- <a href="#" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Users</span>
                    </a> -->
                </div>
            </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                    class="nav_name">Logout</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4 style="margin-bottom: 2rem">Payment Method</h4>
        <form class="row g-3" action="./functions/payment.php" method="post">
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentmethod" id="click-hide" value="gcash"
                        checked>
                    <label class="form-check-label" for="gridRadios2">
                        <img src="./img/gcash.png" alt="gcash" width="95px" height="33px"
                            style="position:relative; bottom: 4px;">
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="fname" value="<?php echo $_SESSION['firstname'] ?>" class="form-control"
                        id="">
                    <label for="" class="form-label">Firstname</label>
                </div>
                <div class="col">
                    <input type="text" name="lname" value="<?php echo $_SESSION['lastname'] ?>" class="form-control"
                        id="">
                    <label for="" class="form-label">Lastname</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="descript" value="<?php echo $rows['description'] ?>" class="form-control"
                        id="" disabled>
                    <label for="" class="form-label">Description</label>
                </div>
                <div class="col">
                    <input type="text" name="descript" value="<?php echo $rows['amount'] ?>" class="form-control" id=""
                        disabled>
                    <label for="" class="form-label">Amount</label>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="text" name="descript" value="<?php
                    date_default_timezone_set('Asia/Manila');
                    $t = date('M-d-Y h:i:s a');
                    echo $t;
                    ?>" class="form-control" id="" disabled>
                    <label for="" class="form-label">Date Paid</label>
                </div>
                <div class="col">
                    <input type="text" name="referenceno" class="form-control" id="inputgcash">
                    <label for="inputgcash" id="gcashlabel" class="form-label">Reference No. (for Gcash
                        Payment
                        only)</label>
                </div>
            </div>
            <input type="hidden" name="publish" value="<?php ?>">
            <input type="hidden" name="bills_id" value="<?php echo $rows['bills_id'] ?>">
            <div class="">
                <button style="display: block; justify-content:center; margin: auto; width: 300px;" type="submit"
                    name="payment" class="btn btn-primary">Pay</button>
            </div>
        </form>
        <!--Container Main end-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./js/bills.js"></script>
</body>

</html>
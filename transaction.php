<?php
session_start();
if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
    header("location: login.php");
}
require "../project-system/functions/database.php";
$connection = connect();
$id = $_SESSION['student_id'];
$stmt = $connection->prepare("SELECT transactions.transaction_id, bills.bill_description, bills.bill_amount, bills.bill_publish, bills.bill_deadline, transaction_datepaid, transaction_referenceno, transaction_paymentmethod FROM `transactions`
JOIN bills ON transactions.bill_id = bills.bill_id WHERE transactions.student_id=$id ORDER BY transaction_datepaid ASC");
$stmt->execute();
$result = $stmt->get_result();
function view($result)
{
    return mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- transaction resources -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- sidebar resources -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Transaction</title>
    <!-- <link rel="stylesheet" href="./css/transaction.css"> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato&family=Poppins&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box
        }

        body {
            background-color: #777;
            font-family: 'Poppins', sans-serif
        }

        .wrapper {
            /* background-color: #222; */
            background-color: #333;
            min-height: 100px;
            max-width: 800px;
            margin: 10px auto;
            padding: 10px 30px
        }

        .dark,
        .input:focus {
            background-color: #333
        }

        .navbar {
            padding: 0.5rem 0rem
        }

        .navbar .navbar-brand {
            font-size: 30px
        }

        #income {
            border-right: 1px solid #bbb
        }

        .notify {
            display: none
        }

        .nav-item .nav-link .fa-bell-o,
        .fa-long-arrow-down,
        .fa-long-arrow-up {
            padding: 10px 10px;
            background-color: #444;
            border-radius: 50%;
            position: relative;
            font-size: 18px
        }

        .nav-item .nav-link .fa-bell-o::after {
            content: '';
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background-color: #ffc0cb;
            right: 10px;
            top: 10px
        }

        .nav-item input {
            border: none;
            outline: none;
            box-shadow: none;
            padding: 3px 8px;
            width: 75%;
            color: #eee
        }

        .nav-item .fa-search {
            font-size: 18px;
            color: #bbb;
            cursor: pointer
        }

        .navbar-nav:last-child {
            display: flex;
            align-items: center;
            width: 40%
        }

        .navbar-nav .nav-item {
            padding: 0px 0px 0px 10px
        }

        .navbar-brand p {
            display: block;
            font-size: 14px;
            margin-bottom: 3px
        }

        .text {
            color: #bbb
        }

        .money {
            font-family: 'Lato', sans-serif
        }

        .fa-long-arrow-down,
        .fa-long-arrow-up {
            padding-left: 12px;
            padding-top: 8px;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            font-size: 1rem;
            font-weight: 100;
            color: #28df99
        }

        .fa-long-arrow-up {
            color: #ffa500
        }

        .nav.nav-tabs {
            border: none
        }

        .nav.nav-tabs .nav-item .nav-link {
            color: #bbb;
            border: none
        }

        .nav.nav-tabs .nav-link.active {
            background-color: #222;
            border: none;
            color: #fff;
            border-bottom: 4px solid #fff
        }

        .nav.nav-tabs .nav-item .nav-link:hover {
            border: none;
            color: #eee
        }

        .nav.nav-tabs .nav-item .nav-link.active:hover {
            border-bottom: 4px solid #fff
        }

        .nav.nav-tabs .nav-item .nav-link:focus {
            border-bottom: 4px solid #fff;
            color: #fff
        }

        .table-dark {
            /* background-color: #222; */
            background-color: #333;
        }

        .table thead th {
            text-transform: uppercase;
            color: #bbb;
            font-size: 12px
        }

        .table thead th,
        .table td,
        .table th {
            border: none;
            overflow: auto auto
        }

        td .fa-briefcase,
        td .fa-bed,
        td .fa-exchange,
        td .fa-cutlery {
            color: #ff6347;
            background-color: #444;
            padding: 5px;
            border-radius: 50%
        }

        td .fa-bed,
        td .fa-cutlery {
            color: #40a8c4
        }

        td .fa-exchange {
            color: #b15ac7
        }

        tbody tr td .fa-cc-mastercard,
        tbody tr td .fa-cc-visa {
            color: #bbb
        }

        tbody tr td.text-muted {
            font-family: 'Lato', sans-serif
        }

        tbody tr td .fa-long-arrow-up,
        tbody tr td .fa-long-arrow-down {
            font-size: 12px;
            padding-left: 7px;
            padding-top: 3px;
            height: 20px;
            width: 20px
        }

        .results span {
            color: #bbb;
            font-size: 12px
        }

        .results span b {
            font-family: 'Lato', sans-serif
        }

        .pagination .page-item .page-link {
            background-color: #444;
            color: #fff;
            padding: 0.3rem .75rem;
            border: none;
            border-radius: 0
        }

        .pagination .page-item .page-link span {
            font-size: 16px
        }

        .pagination .page-item.disabled .page-link {
            background-color: #333;
            color: #eee;
            cursor: crosshair
        }

        @media(min-width:768px) and (max-width: 991px) {
            .wrapper {
                margin: auto
            }

            .navbar-nav:last-child {
                display: flex;
                align-items: start;
                justify-content: center;
                width: 100%
            }

            .notify {
                display: inline
            }

            .nav-item .fa-search {
                padding-left: 10px
            }

            .navbar-nav .nav-item {
                padding: 0px
            }
        }

        @media(min-width: 300px) and (max-width: 767px) {
            .wrapper {
                margin: auto
            }

            .navbar-nav:last-child {
                display: flex;
                align-items: start;
                justify-content: center;
                width: 100%
            }

            .notify {
                display: inline
            }

            .nav-item .fa-search {
                padding-left: 10px
            }

            .navbar-nav .nav-item {
                padding: 0px
            }

            #income {
                border: none
            }
        }

        @media(max-width: 400px) {
            .wrapper {
                padding: 10px 15px;
                margin: auto
            }

            .btn {
                font-size: 12px;
                padding: 10px
            }

            .nav.nav-tabs .nav-link {
                padding: 10px
            }
        }

        /* navbar side bar */
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

        :root {
            --header-height: 3rem;
            --nav-width: 68px;
            --first-color: black;
            --first-color-light: #AFA5D9;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box
        }

        body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s
        }

        a {
            text-decoration: none
        }

        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s
        }

        .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer
        }

        .header_img {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden
        }

        .header_img img {
            width: 40px
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--first-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed)
        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden
        }

        .nav_logo,
        .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem
        }

        .nav_logo {
            margin-bottom: 2rem
        }

        .nav_logo-icon {
            font-size: 1.25rem;
            color: var(--white-color)
        }

        .nav_logo-name {
            color: var(--white-color);
            font-weight: 700
        }

        .nav_link {
            position: relative;
            color: var(--first-color-light);
            margin-bottom: 1.5rem;
            transition: .3s
        }

        .nav_link:hover {
            color: var(--white-color)
        }

        .nav_icon {
            font-size: 1.25rem
        }

        .show-l-navbar {
            left: 0
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 1rem)
        }

        .active {
            color: var(--white-color)
        }

        .active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: var(--white-color)
        }

        .height-100 {
            height: 100vh
        }

        @media screen and (min-width: 768px) {
            body {
                margin: calc(var(--header-height) + 1rem) 0 0 0;
                padding-left: calc(var(--nav-width) + 2rem)
            }

            .header {
                height: calc(var(--header-height) + 1rem);
                padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
            }

            .header_img {
                width: 40px;
                height: 40px
            }

            .header_img img {
                width: 45px
            }

            .l-navbar {
                left: 0;
                padding: 1rem 1rem 0 0
            }

            .show-l-navbar {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
            }
        }

        .nav-item {
            list-style-type: none;
            cursor: pointer;
        }

        /* .bx{
    width: 100px;
} */
    </style>
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
                    <!-- <i class='bi bi-cash-stack nav_logo-icon'>C</i> -->
                    <img src="./img/icon.jpg" width="25px" height="25px" alt="">
                    <span class="nav_logo-name" style="font:bolder">CEIT E-PAYMENT
                    </span>
                </a>
                <div class="nav_list">
                    <a href="./bills.php" class="nav_link">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Bills</span>
                    </a>
                    <a href="./transaction.php" class="nav_link active">
                        <i class='bx bx-list-ol nav_icon'></i>
                        <span class="nav_name">Transaction</span>
                    </a>
                </div>
            </div> <a href="./functions/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                    class="nav_name">Logout</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="wrapper rounded">
        <nav class="navbar navbar-expand-lg navbar-dark dark d-lg-flex align-items-lg-start m-4"> <a
                class="navbar-brand" href="#">Transactions <p class="text-muted pl-1">Welcome to your transactions
                </p> </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span
                    class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <!-- <li class="nav-item"> <a class="nav-link" href="#"><span
                                    class="fa fa-bell-o font-weight-bold"></span> <span 
                                    class="notify">Notifications</span> </a> </li> -->
                    <li class="nav-item "> <a href="#"><span class="fa fa-search"></span></a> <input type="search"
                            class="dark" placeholder="Search"> </li>
                </ul>
            </div>
        </nav>
        <!-- <div class="row mt-2 pt-2">
                <div class="d-flex justify-content-start align-items-center">
                    <p class="text mx-3">Total</p>
                    <p class="text-white ml-4 money"></p>
                </div>
            </div> -->
        <div class="table-responsive mt-3">
            <table class="table table-dark table-borderless">
                <thead>
                    <tr>
                        <th scope="col">Activity</th>
                        <th scope="col">Mode</th>
                        <th scope="col">Date Paid</th>
                        <th scope="col" class="text-right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = view($result)) { ?>
                    <tr>
                        <td scope="row"> <span class="fa fa-briefcase mr-1"></span>
                                <?php echo $row['bill_description'] ?>
                        </td>
                        <td><span class="">
                                    <?php echo $row['transaction_paymentmethod'] ?>
                            </span></td>
                        <td class="text-muted">
                                <?php
                                $date = date_create($row['transaction_datepaid']);
                                echo date_format($date, "F d, Y h:i:s a");
                                ?>
                        </td>
                        <td class="d-flex justify-content-end align-items-center"><span class="">₱</span>
                                <?php echo $row['bill_amount'] ?>
                        </td>

                        <td>
                            <a href="#myModal" data-bs-toggle="modal" data-bs-target="#myModal" id="custId"
                                data-id="<?php echo $row['transaction_id'] ?>">
                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php if (!$result->num_rows) { ?>
            <center>
                <p class="text-muted pl-1">No transaction has been made.</p>
            </center>
            <?php } ?>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Transaction Details</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- //Here Will show the Data -->
                        <div class="fetched-data">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->
</body>
<script src="./js/bootstrapV5.3.0/bootstrap.bundle.min.js"></script>
<!-- <script src="./js/bills.js"></script> -->
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

    // modal
    $(document).ready(function () {
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'post',
                url: 'functions/transaction.php', //Here you will fetch records 
                data: 'rowid=' + rowid, //Pass $id
                success: function (data) {
                    $('.fetched-data').html(data);//Show fetched data from database
                }
            });
        });
    });
</script>

</html>
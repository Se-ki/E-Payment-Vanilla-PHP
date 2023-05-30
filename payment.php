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
    <title>Document</title>
    <style>
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

        .show {
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

            .show {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
            }
        }
    </style>
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
                    <i class='bi bi-cash-stack nav_logo-icon'>C</i>
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
                            nav.classList.toggle('show')
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
<?php
require "./admin_function/main.php";
session_start();
if (empty($_SESSION['pin'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- main.php resources -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin |
        <?php echo $_SESSION['admin_name'] ?>
    </title>
    <!-- <link rel="stylesheet" href="./css/main.css"> -->
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

            .icon-card {
                font-size: 70px;
            }
        }

        /*********** admin dashboard styling **********/
        .card {
            background-color: #AFA5D9;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 8px 5px 5px #3B3131;
        }

        /* added */
        .header-admin {
            width: 100%;
            height: var(--header-height);
            /* position: fixed; */
            top: 0;
            left: 0;
            display: flex;
            align-items: flex-end;
            justify-content: end;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s
        }
    </style>
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
                    <a href="./main.php" class="nav_link active">
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
                    <a href="./daily_reports.php" class="nav_link">
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
        <h4>Main</h4>
        <div id="main-content" class="container allContent-section py-4">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <i class="icon-card fa fa-users  mb-2"></i>
                        <h4 style="color:white;">Total Users</h4>
                        <h5 style="color:white;">
                            <?php echo totalUser($connection); ?>
                        </h5>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <i class='icon-card bx bxs-wallet mb-2'></i>
                        <h4 style="color:white;">Total Amount</h4>
                        <h5 style="color:white;">
                            <?php echo '₱ ' . number_format(totalAmount($connection), 2); ?>
                        </h5>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <i class="icon-card fa fa-list mb-2"></i>
                        <h4 style="color:white;">Total Bills</h4>
                        <h5 style="color:white;">
                            <?php echo totalBills($connection); ?>
                        </h5>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <i class='icon-card bx bx-money-withdraw mb-2'></i>
                        <h4 style="color:white;">Total User Paid</h4>
                        <h5 style="color:white;">
                            <?php echo totalUserPaid($connection); ?>
                        </h5>
                    </div>
                </div>
            </div>

        </div>

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
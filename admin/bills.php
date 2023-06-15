<?php
require "../functions/database.php";
session_start();
if (empty($_SESSION['pin'])) {
    header("location: login.php");
}
// fetched data
$num = 0;
$sort = 'DESC';
$column = 'bill_publish';
if (isset($_GET['column']) && isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    $column = $_GET['column'];
    if ($sort == 'ASC') {
        $sort = 'DESC';
    } else {
        $sort = 'ASC';
    }
}
$sql = "SELECT DISTINCT bill_description, bill_amount, bill_publish, bill_deadline FROM bills ORDER BY $column $sort";
$connection = connect();
$query = mysqli_query($connection, $sql);
function viewBills($query)
{
    return $query->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Admin | Bills</title>
    <!-- <link rel="stylesheet" href="./css/bills.css"> -->
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
        }

        .table-header {
            color: black;
            font-weight: bolder;
        }

        .letter-capz {
            text-transform: capitalize;
        }
    </style>
</head>

<body id="body-pd">
    <div>
        <header class="header" id="header">
            <div class="header_toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Bill
            </button>
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
                        <a href="./bills.php" class="nav_link active">
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
                    </div>
                </div> <a href="./admin_function/logout.php?id=<?php echo $_SESSION['admin_id'] ?>" class="nav_link"> <i
                        class='bx bx-log-out nav_icon'></i>
                    <span class="nav_name">Logout</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <h4>Bills</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><a class="table-header"
                                    href="?column=bill_id&sort=<?php echo $sort ?>">#</a></th>
                            <th scope="col"><a class="table-header"
                                    href="?column=bill_description&sort=<?php echo $sort ?>">Description</a>
                            </th>
                            <th scope="col"><a class="table-header"
                                    href="?column=bill_amount&sort=<?php echo $sort ?>">Amount</a></th>
                            <th scope="col"><a class="table-header"
                                    href="?column=bill_publish&sort=<?php echo $sort ?>">Publish</a></th>
                            <th scope="col"><a class="table-header"
                                    href="?column=bill_deadline&sort=<?php echo $sort ?>">Deadline</a></th>
                            <th scope="col" class="table-header">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td>
                                    <?php echo $num = $num + 1; ?>
                                </td>
                                <td class="letter-capz">
                                    <?php echo $row['bill_description'] ?>
                                </td>
                                <td>
                                    <?php echo '₱ ' . number_format($row['bill_amount'], 2) ?>
                                </td>
                                <td>
                                    <?php
                                    date_default_timezone_set('Asia/Manila');
                                    $format = date_create($row['bill_publish']);
                                    echo $datepublish = date_format($format, "F d, Y h:i:s a");
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    date_default_timezone_set('Asia/Manila');
                                    $format = date_create($row['bill_deadline']);
                                    echo $deadline = date_format($format, "F d, Y");
                                    ?>
                                </td>
                                <td>
                                    <a
                                        href="./admin_function/delete_bill.php?desc=<?php echo $row['bill_description'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Billing Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./admin_function/add_bill.php" method="post">
                        <!-- <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Bill Type</label>
                        </div> -->
                        <div class="form-floating mb-3">
                            <input type="text" name="bill-description" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Bill Description</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name=bill-amount class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Bill Amount</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="bill-publish" value="<?php date_default_timezone_set('Asia/Manila');
                            $t = date('Y-m-d H:i:s');
                            echo $t ?>" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Bill Date</label>
                        </div>
                        <div class="form-floating">
                            <input type="date" name="bill-deadline" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Bill Deadline</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="save" class="btn btn-primary" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->
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
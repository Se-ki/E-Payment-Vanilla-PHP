<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrapV5.3.0/bootstrap.min.css">
    <title>Welcome to CEIT E-Payment</title>
    <!-- <link rel="stylesheet" href="./css/index.css"> -->
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #658354;


        }

        .card {
            border-top-left-radius: 9px;
            border-top-right-radius: 9px;
            border-bottom-left-radius: 9px;
            border-bottom-right-radius: 9px;
            width: 15rem;
            margin: 0 auto;
            float: none;
            margin-bottom: 10px;
            position: relative;
            display: flex;
            justify-content: center;
            top: 16rem;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .card-body {
            border-top-left-radius: 9px;
            border-top-right-radius: 9px;
            border-bottom-left-radius: 9px;
            border-bottom-right-radius: 9px;
            padding-top: 1px;
            padding-bottom: 1px;
            background-color: #fdfdfd;
        }

        .card-body li {
            margin: 30px;
            text-align: center;
        }

        li {
            text-align: center;
            list-style-type: none;
            position: relative;
            right: 20px;
        }

        .btn {
            color: #fdfdfd;
            background-color: #090d16;
            transition: font-size .4s;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .btn:hover {
            background-color: #32612d;
            color: #fdfdfd;
        }

        a:hover {
            font-size: 20px;
            padding-left: 10%;
        }

        #student {
            text-align: center;
            padding-left: 33px;
            padding-right: 33px;
        }

        ul {
            position: relative;
            justify-content: center;
        }

        .carousel-item {
            left: 45%;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm w-100 p-3 position-absolute top-0 start-0">
            <div class="container-fluid">
                <a href="#" class="navbar-brand d-flex ms-auto"><span><img src="./img/logo-no-bg.png" width="120px"
                            height="50px" alt="" srcset=""></span></a>
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
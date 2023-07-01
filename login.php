<?php
// session_start();
require "./functions/login.php";
if (isset($_SESSION['locked'])) {
    $session_locked = $_SESSION['locked'];
    isLocked($session_locked);
}
// $session_locked = $_SESSION['locked'];
// if (isset($_SESSION['locked'])) {
//     $time = time() - $_SESSION['locked'];
//     if ($time > 10) {
//         unset($_SESSION['locked']);
//         unset($_SESSION['user_attempts']);
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Login</title>
    <link rel="stylesheet" href="./css/bootstrapV4.0.0/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrapV5.3.0/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./css/login.css" type="text/css"> -->
    <style>
        body {
            color: #fff;
            font-family: 'Roboto', sans-serif;
            background-color: #19aa8d;
        }

        .form-control {
            font-size: 15px;
        }

        .form-control,
        .form-control:focus,
        .input-group-text {
            border-color: #e1e1e1;
        }

        .form-control,
        .btn {
            border-radius: 3px;
        }

        .login-form {
            /* to move form */
            width: 400px;
            margin: 0 auto;
            padding: 118px 0;
        }

        .login-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background-color: #333;
            box-shadow: 0px 2px 2px rgba(3, 4, 2, 2.5);
            padding: 30px;
        }

        .login-form h2 {
            color: #fff;
            font-weight: bold;
            margin-top: 0;
        }

        .login-form hr {
            margin: 0 -30px 20px;
        }

        .login-form .form-group {
            margin-bottom: 20px;
        }

        .login-form label {
            font-weight: normal;
            font-size: 15px;
        }

        .login-form .form-control {
            min-height: 38px;
            box-shadow: none !important;
        }

        .login-form .input-group-addon {
            max-width: 42px;
            text-align: center;
        }

        .login-form .btn,
        .login-form .btn:active {
            font-size: 16px;
            font-weight: bold;
            background: #19aa8d !important;
            border: none;
            padding-left: 150px;
            padding-right: 150px;

        }

        .login-form .btn:hover,
        .login-form .btn:focus {
            background: #179b81 !important;
        }

        .login-form a {
            color: #fff;
            text-decoration: underline;
        }

        .login-form a:hover {
            text-decoration: none;
            background-color: #e1e1e1;
            color: #333;
        }

        .login-form form a {
            color: #19aa8d;
            text-decoration: none;
        }

        .login-form form a:hover {
            text-decoration: underline;
        }

        .login-form .fa {
            font-size: 21px;
        }

        .login-form .fa-paper-plane {
            font-size: 18px;
        }

        .login-form .fa-check {
            color: #fff;
            left: 17px;
            top: 18px;
            font-size: 7px;
            position: absolute;
        }
    </style>
</head>

<body>
    <div class="login-form">
        <form action="./functions/login.php" method="post" class="needs-validation" novalidate>
            <?php if (isset($_SESSION['error'])) { ?>
                <div id='err_feedback' class="alert alert-warning" role="alert">
                    <?php echo $_SESSION['error'] ?>
                </div>
                <?php unset($_SESSION['error']);
            } ?>
            <h2>Login</h2>
            <p>Please fill in this form to proceed!</p>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="bi bi-envelope-at">
                                <img src="./img/inbox.svg">
                            </i>
                        </span>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="user-email" value="@csucc.edu.ph" name="email"
                            placeholder="name@example.com" required="">
                        <label for="user-email">Email</label>
                    </div>
                </div>
                <span id="fdbck-err-email" style="color: #dc3545"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="bi bi-key"><img src="./img/key.svg"></i>
                        </span>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="user-password" name="password"
                            placeholder="Password" required="">
                        <label for="user-password">Password</label>
                    </div>
                </div>
                <span id="fdbck-err-pass" style="color: #dc3545"></span>
            </div>
            <?php
            $user_attempts = 0;
            if (!empty($_SESSION['user_attempts'])) {
                $user_attempts = $_SESSION['user_attempts'];
            }
            if ($user_attempts > 2) {
                $_SESSION['locked'] = time();
                ?>
                <p id="countdown">Please wait for 10 seconds</p>
                <?php
            } else {
                ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg" name="submit" id="submit-login">Login</button>
                </div>
            <?php } ?>
        </form>
        <div class="text-center">You don't have account? <a href="./signup.php">Sign Up</a></div>
    </div>
    <!-- <script src="./js/login.js"></script> -->
    <script>
        var timeleft = 10;
        var downloadTimer = setInterval(() => {
            if (timeleft <= 0) {
                clearInterval(downloadTimer);
                document.getElementById("countdown").innerHTML = "Done";
                document.location.reload();
            } else {
                document.getElementById("countdown").innerHTML = "Please wait for " + timeleft + " seconds ";
            }
            timeleft -= 1;
        }, 1000);
        const email = document.getElementById('user-email');
        const password = document.getElementById('user-password');

        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        const submitLogin = document.getElementById('submit-login').addEventListener('click', () => {
            console.log('click');
            if (email.value == "") {
                document.getElementById('fdbck-err-email').innerHTML = "Please enter your email address.";
            }
            if (password.value == "") {
                document.getElementById('fdbck-err-pass').innerHTML = "Please enter your password.";
            }
        });

        email.addEventListener('input', () => {
            if (email.value != "") {
                document.getElementById('fdbck-err-email').innerHTML = "";
                email.style.borderColor = "#198754";
            }
            else {
                document.getElementById('fdbck-err-email').innerHTML = "Please enter your email address.";
            }
        });
        password.addEventListener('input', () => {
            if (password.value != "") {
                document.getElementById('fdbck-err-pass').innerHTML = "";
                document.getElementById('fdbck-err-pass').style.borderColor = "#198754";
            } else {
                document.getElementById('fdbck-err-pass').innerHTML = "Please enter your password.";
            }
        });
    </script>
</body>

</html>
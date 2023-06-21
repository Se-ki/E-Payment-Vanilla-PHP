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
            background-image: url('./img/loginbg.jpg');
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
            position: relative;
            right: 300px;
            top: 70px;
        }

        .login-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;

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
            <?php if (isset($_GET['err'])) { ?>
                <div id='err_feedback' class="alert alert-warning" role="alert">
                    Incorrect email and password!
                </div>
            <?php } ?>
            <h2>Login</h2>
            <p>Please fill in this form to proceed!</p>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="bi bi-envelope-at">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-envelope-at" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                    <path
                                        d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                </svg>
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
                            <i class="bi bi-key"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                    <path
                                        d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg></i>
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
            <!-- <div class="form-group">
                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a
                        href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div> -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" name="submit" id="submit-login">Login</button>
            </div>
        </form>
        <div class="text-center">You don't have account? <a href="./signup.php">Sign Up</a></div>
    </div>
    <script src="./js/login.js"></script>
</body>

</html>
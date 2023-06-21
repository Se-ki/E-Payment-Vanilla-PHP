<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrapV5.3.0/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Administrator</title>
</head>

<body>
    <nav class="navbar bg-body-tertiary navbar-expand-sm w-100 p-2 position-absolute top-0 start-0">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><img src="../img/logo.jpg" width="120px" height="50px" alt=""></span>
        </div>
    </nav>
    <?php if ($_GET['err']) { ?>
        <script>
            alert("Incorrect pin or empty!");
        </script>
    <?php } ?>
    <div class="card">
        <div class="card-box">
            <form action="./admin_function/login.php" method="POST" class="card-body p-5 text-center">
                <h2 id="text-admin">
                    Admin <br style="margin-bottom:4px"> Login</h2>
                <div class="form-outline form-white mb-4">
                    <input type="password" id="typePasswordX" name="pinCode" class="form-control form-control-lg"
                        placeholder="P I N" required="" />
                </div>
                <button class="btn btn-primary btn-lg px-5" type="submit" name="login-admin">Login </button>
            </form>
        </div>
    </div>
    <script>
        //admin login
        const pin = document.getElementById("typePasswordX");
        pin.addEventListener('mouseover', () => {
            if (pin.value == "") {
                pin.style.width = "240px";
            } else if (pin.value != "") {
                isValidPin();
            } else {
                pin.style.width = "10px";
            }
        });
        document.getElementById("typePasswordX");
        pin.addEventListener('click', () => {
            if (pin.value == "") {
                pin.style.width = "240px";
            } else if (pin.value != "") {
                isValidPin();
            } else {
                pin.style.width = "10px";
            }
        });
        function isValidPin() {
            const regex = new RegExp("[-0-9]");
            pin.addEventListener('beforeinput', (event) => {
                console.log(pin.value)
                if (event.data != null && !regex.test(event.data)) {
                    event.preventDefault();
                } else if (pin.value != "") {
                    pin.style.width = "240px";
                } else {
                    pin.style.width = "10px";
                }
            });
        }
        pin.addEventListener('mouseout', () => {
            if (pin.value == "") {
                pin.style.width = "10px";
            }
            isValidPin();
        });

    </script>
    <!-- <script src="../js/admin.js"></script> -->

    <body>

</html>
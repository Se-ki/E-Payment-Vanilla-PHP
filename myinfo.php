<?php
require "./functions/myinfo.php";
if (empty($_SESSION['email']) && $_SESSION['email']) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrapV5.3.0/bootstrap.min.css">
    <title>My info</title>
    <link rel="stylesheet" href="./css/myinfo.css">
</head>

<body>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="./bills.php">Home</a></li>
                            <!-- <li class="breadcrumb-item"><a href="#">User</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page">My info</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center p-4">
                            <?php
                            $row = listOfInfoStudent($student_info);
                            if (empty($row['profile_picture']) || $row['profile_picture'] == null) { ?>
                                <a href="" data-bs-toggle="modal" data-bs-target="#changeprofile">
                                    <img src="./img/no-image.jpeg" alt="avatar" class="rounded-circle img-fluid"
                                        style="width: 150px; padding-top: 11px;">
                                </a>
                            <?php } else { ?>
                                <a href="" data-bs-toggle="modal" data-bs-target="#changeprofile">
                                    <img src="./img/<?php echo $row['profile_picture'] ?>" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px; padding-top: 11px;"
                                        accept=".jpg, .jpeg, .png">
                                </a>
                            <?php } ?>
                            <!-- Modal -->
                            <div class="modal fade" id="changeprofile" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Profile</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post">
                                                <input type="file" name="picture" id="">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="save" id=""
                                                class="btn btn-primary">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="my-2" style="text-transform: capitalize;">
                                <?php echo $_SESSION['firstname'] ?>
                            </h4>
                            <p class="text-muted mb-1">
                                <?php echo $_SESSION['program'] ?>
                            </p>
                            <p class="text-muted mb-4">
                                <?php echo $_SESSION['yearlevel']; ?>
                            </p>
                            <!-- <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-outline-primary ms-1">Edit</button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">School ID</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $_SESSION['school_id']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9" style="text-transform: capitalize;">
                                    <p class="text-muted mb-0">
                                        <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $_SESSION['email']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Course</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $_SESSION['program']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Year Level</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $_SESSION['yearlevel']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $_SESSION['mobilenumber'] ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9" style="text-transform: capitalize;">
                                    <p class="text-muted mb-0">
                                        <?php echo $_SESSION['address']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p id="changeinput">
                                        Password</p>
                                </div>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-outline-danger ml-5" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Change</button>
                                </div>
                            </div>
                            <!-- modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class=" modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Change Password</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="password"
                                                        id="newpass" placeholder="name@example.com">
                                                    <label for="newpass">New Password</label>
                                                </div>
                                                <div class="form-floating">
                                                    <input type="password" class="form-control" id="repeatpass"
                                                        placeholder="Password">
                                                    <label for="repeatpass">Repeat Password</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <input type="submit" id="changepass" value="Change Password"
                                                        name="submit-changepass" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->
                    </div>
                </div>
            </div>
    </section>
    <script src="./js/bootstrapV5.3.0/bootstrap.bundle.min.js"></script>
    <script>
        const modal = document.querySelector("div.modal");
        const password = document.querySelector("input#newpass");
        const confirm_password = document.querySelector("input#repeatpass");
        const submit = document.querySelector("input#changepass");
        submit.addEventListener("click", (e) => {
            if (password.value == "" && confirm_password.value == "") {
                e.preventDefault();
                modal.classList.add("apply-shake");
                document.querySelector('h5.modal-title').innerHTML = "Empty form!"
            } else if (password.value != confirm_password.value) {
                e.preventDefault();
                modal.classList.add("apply-shake");
                document.querySelector('h5.modal-title').innerHTML = "Password Unmatched!"
            }
        });

        modal.addEventListener("animationend", (e) => {
            modal.classList.remove("apply-shake");
        });
    </script>
</body>

</html>
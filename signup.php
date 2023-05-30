    <?php
    session_start();
    if (!empty($_SESSION['email'])) {
        header('location: /project/project-system/home.php');
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
        <title>Sign Up</title>
        <link rel="stylesheet" href="./css/bootstrapV4.0.0/bootstrap.min.css">
        <link rel="stylesheet" href="./css/bootstrapV5.0.2/bootstrap.min.css">
        <link rel="stylesheet" href="./css/sign-up.css">
    </head>

    <body>
        <div class="signup-form">
            <form id="signUpForm" action="./functions/signup.php" method="POST" name="registerForm" class="needs-validation"
                novalidate>
                <h2>Register</h2>
                <p class=" hint-text">Create your account.</p>
                <div class="form-group">
                    <?php if (isset($_GET['feedback'])) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $_GET['feedback']; ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET['err_feedback'])) { ?>
                        <div id='err_feedback' class="alert alert-warning" role="alert">
                            <?php echo $_GET['err_feedback']; ?>
                        </div>
                    <?php } ?>
                    <div class="form-floating mb-1">
                        <input type=" text" class="form-control" id="school_ID" name="school_ID" placeholder="School ID"
                            required="">
                        <label class="form-label" for="floatingInput">ID No.</label>
                        <?php if (isset($_GET['err_sid'])) { ?>
                            <div id="err_sid" style="font-size: .875em; color: #dc3545;">
                                <?php echo $_GET['err_sid']; ?>
                            </div>
                        <?php } ?>
                        <div id="sid-invalid" style="font-size: .875em; color: #dc3545;">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row-fullname row">
                        <div class="col">
                            <div class="form-firstname form-floating">
                                <input type="text" id="firstname" class="form-control" name="first_name"
                                    placeholder="First Name" required="">
                                <label for="floatingInput" id="label-firstname">Firstname</label>
                                <div class="invalid-feedback" style="position:relative; right: 10px">
                                    Please enter your firstname.
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-lastname form-floating">
                                <input type="text" id="lastname" class="form-control" name="last_name"
                                    placeholder="Last Name" required="" style="width:185px;">
                                <label for="floatingInput" style="margin-left: 8px;">Lastname</label>
                                <div id="error-lastname" class="invalid-feedback">
                                    Please enter your lastname.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <div id="female-border" class="form-control">
                                <!-- <label for="Female" id="female">Female</label> -->
                                <label class="form-check-label" for="female_sex" id="female">Female</label>
                                <input class="form-check-input" type="radio" name="sex" value="Female" id="female_sex"
                                    style="margin-left: 90px;" required="">
                            </div>
                        </div>
                        <div class="col">
                            <div id="male-border" class="form-control">
                                <label for="male_sex" id="male">Male</label>
                                <input class="form-check-input" type="radio" name="sex" value="Male" id="male_sex"
                                    style="margin-left: 109px;" required="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <!-- <div class="form-floating"> -->
                    <select class="form-select" name="" id="floatingSelect" aria-describedby="validationServer04Feedback"
                        style="color: black;" required="">
                        <option selected disabled value="">Program / Course</option>
                        <option value="Bachelor of Science in Information Technology" id="opt_bsit">Bachelor of Science in
                            Information
                            Technology</option>
                        <option value="Diploma in Computer Technology" id="opt_dct">Diploma in Computer Technology</option>
                        <option value="Bachelor of Science in Computer Engineering" id="opt_bcpe">Bachelor of Science in
                            Computer Engineering</option>
                        <option value="Bachelor of Science in Electrical Engineering" id="opt_bsee">Bachelor of Science in
                            Electrical Engineering</option>
                        <option value="Bachelor of Science in Electrical Engineering Technology" id="opt_bseet">Bachelor of
                            Science in Electrical Engineering Technology
                        </option>
                    </select>
                    <div class="invalid-feedback">
                        Please select your course.
                    </div>
                    <!-- <label for="floatingSelect">Program/Course</label> -->
                    <!-- </div> -->
                </div>
                <div class="form-group">
                    <!-- <div class="form-floating"> -->
                    <select class="form-select" name="yearlevel" id="floatingSelect"
                        aria-describedby="validationServer04Feedback" style="color: black;" required="">
                        <option selected disabled value="">Year Level</option>
                        <option value="1st Year" id="opt_bsit">1st Year</option>
                        <option value="2nd Year" id="opt_dct">2nd Year</option>
                        <option value="3rd Year" id="opt_bcpe">3rd Year</option>
                        <option value="4th Year" id="opt_bsee">4th Year</option>
                        <option value="5th Year" id="opt_bseet">5th Year</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select your course.
                    </div>
                    <!-- <label for="floatingSelect">Program/Course</label> -->
                    <!-- </div> -->
                </div>
                <div class="form-group">
                    <div class="form-floating">
                        <input type="text" id="mobile_number" class="form-control" name="mobilenumber"
                            placeholder="Mobile Number" required="">
                        <label for="floatingInput">Mobile Number</label>
                        <div id="mbn-invalid" style="font-size: .875em;"></div>
                        <?php if (isset($_GET['err_mober'])) { ?>
                            <div id='err_mober' style="font-size: .875em; color: #dc3545;">
                                <?php echo $_GET['err_mober']; ?>
                            </div>
                        <?php } ?>
                        <!-- <div id="mbn-invalid" class="invalid-feedback">
                            Please enter your mobile number.
                        </div> -->
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-floating">
                        <p id="address_guide" style="margin-bottom:auto"><span> </span></p>
                        <input type="text" id="location" class="form-control" name="address" placeholder="Address"
                            required="">
                        <label for="floatInput" id="address-label">Address</label>
                        <div class="invalid-feedback">
                            Please enter your address.
                        </div>
                        <!-- <p id="error_address" style="color: red; font-size:small;"></p> -->
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-floating">
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" required="">
                        <label for="floatInput">Email</label>
                        <div class="invalid-feedback">
                            Please enter your csucc email. </br> Example:
                            jeon.jungkook@csucc.edu.ph
                        </div>
                        <?php if (isset($_GET['err_email'])) { ?>
                            <div id="err_email" style="font-size: .875em; color: #dc3545;">
                                <?php echo $_GET['err_email']; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-floating">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password"
                            required="">
                        <label for="floatInput">Password (6 characters min.)</label>
                        <!-- <div class="invalid-feedback">
                            Please enter a valid password.
                        </div> -->
                        <div id="pwd_invalid" style="font-size: .875em; color: #dc3545;"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-floating">
                        <input type="password" id="confirm_password" class="form-control" name="confirm_password"
                            placeholder="Confirm Password" required="">
                        <label for="floatInput">Confirm Password</label>
                        <div id="cnfrmpwd_invalid" style="font-size: .875em; color: #dc3545;"></div>
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label class="form-check-label"><input type="checkbox" required=""> I accept the <a
                            href="./terms&condition.html">Terms of Use</a> &amp; <a href="./privacypolicy.html">Privacy
                            Policy</a></label> -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            I accept the <a href="./terms&condition.html">Terms of Use</a> &amp; <a
                                href="./privacypolicy.html">Privacy
                                Policy</a>
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit-button" class="btn btn-primary btn-block mb-4" id="submit">Create
                        Account</button>
                </div>
                <div class="text-center">Already have an account? <a href="./login.php">Sign in</a></div>
            </form>
        </div>
        <!-- <script src="./js/signup.js"></script> -->
        <script>
            const signUpPage = document.getElementById('submit');

            const schoolID = document.getElementById("school_ID");

            const femaleSex = document.getElementById("female_sex");
            const femaleLabel = document.getElementById("female");
            const maleSex = document.getElementById("male_sex");
            const maleLabel = document.getElementById("male");
            const femaleBorder = document.getElementById("female-border");
            const maleBorder = document.getElementById("male-border");

            const mobileNumber = document.getElementById("mobile_number");
            const mbnFeedBack = document.getElementById("mbn-invalid");

            const password = document.getElementById("password");
            const confirmPassword = document.getElementById("confirm_password");
            const pwd_feedback = document.getElementById("pwd_invalid");
            const cnfrmpwd_feedback = document.getElementById("cnfrmpwd_invalid");

            const selectProgram = document.getElementById("floatingSelect");
            const optionBsit = document.getElementById('opt_bsit');
            const optionDct = document.getElementById("opt_dct");
            const optionBcpe = document.getElementById("opt_bcpe");
            const optionBsee = document.getElementById("opt_bsee");
            const optionBseet = document.getElementById('opt_bseet');
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

            const female_sex = femaleSex.addEventListener('click', () => {
                if (!maleSex.checked) {
                    maleLabel.style.color = "";
                }
                console.log(femaleSex.checked);
                femaleLabel.style.color = "black";
                femaleBorder.style.borderColor = "#198754";
                maleBorder.style.borderColor = "#198754";
            });

            maleSex.addEventListener('click', () => {
                if (!femaleSex.checked) {
                    femaleLabel.style.color = "";
                }
                console.log(maleSex.value);
                maleLabel.style.color = "black";
                femaleBorder.style.borderColor = "#198754";
                maleBorder.style.borderColor = "#198754";
            });

            const regex = new RegExp("[-0-9]");
            mobileNumber.addEventListener("beforeinput", (event) => {
                if (event.data != null && !regex.test(event.data)) {
                    mbnFeedBack.style.color = "#dc3545";
                    mbnFeedBack.innerHTML = "Mobile numbers contains numerical numbers only."
                    event.preventDefault();
                } else {
                    console.log(mobileNumber.value.length);
                    if (mobileNumber.value.length > 10 || mobileNumber.value.length < 10) {
                        console.log("Invalid Number!");
                        mobileNumber.style.borderColor = "#dc3545";
                        mbnFeedBack.innerHTML = "Please enter a valid mobile number."
                        mbnFeedBack.style.color = "#dc3545";
                        document.getElementById('err_mober').innerHTML = "";
                        document.getElementById('err_feedback').innerHTML = "";
                        document.getElementsByClassName('alert-warning').backgroundColor = '';
                    } else {
                        mobileNumber.style.borderColor = "#198754";
                        mbnFeedBack.style.color = "#198754";
                        mbnFeedBack.innerHTML = ""
                    }
                }
            });
            function isMaleSexChecked() {
                if (maleSex.checked || femaleSex.checked) {
                    femaleBorder.style.borderColor = "#198754";
                    maleBorder.style.borderColor = "#198754";
                } else {
                    maleBorder.style.borderColor = '#dc3545';
                    femaleBorder.style.borderColor = "#dc3545";
                }
            }
            function isMobileNumvalid(mobileNumber) {
                if (mobileNumber.value.length < 11 || mobileNumber.value.length > 11) {
                    mbnFeedBack.innerHTML = "Mobile number contain 11 numbers.";
                } else if (mobileNumber.value == "") {
                    mbnFeedBack.style.color = "#dc3545";
                    mbnFeedBack.innerHTML = "Please enter your mobile number.";
                }
            }
            function isPasswordValid(password, confirmPassword) {
                if (!password.value) {
                    pwd_feedback.innerHTML = "Please enter you password.";
                } else if (password.value.length < 8) {
                    password.style.borderColor = "#dc3545";
                    pwd_feedback.innerHTML = "Password must at least eight characters."
                } else if (password.value != confirmPassword.value) {
                    password.style.borderColor = "#dc3545";
                    confirmPassword.style.borderColor = "#dc3545";
                    cnfrmpwd_feedback.innerHTML = "Password unmatched!"
                    event.preventDefault();
                } else {
                    confirmPassword.style.borderColor = "";
                    password.style.borderColor = "";
                    cnfrmpwd_feedback.innerHTML = "";
                    pwd_feedback.innerHTML = "";
                }
            }

            function isSchoolIdNull(schoolID) {
                if (!schoolID.value) {
                    schoolID.style.borderColor = "#dc3545"
                    document.getElementById("sid-invalid").innerHTML = "Please enter a valid school id number. Example: 2023-1234"
                } else {
                    document.getElementById("sid-invalid").innerHTML = "";
                    document.getElementById("err_sid").innerHTML = "";
                    document.getElementById('err_feedback').innerHTML = "";
                }
            }
            signUpPage.addEventListener('click', () => {
                console.log("click");
                //sex
                isMaleSexChecked();
                //mobilenumber
                isMobileNumvalid(mobileNumber);
                //password
                isPasswordValid(password, confirmPassword);
                //school id
                isSchoolIdNull(schoolID);
            });

            schoolID.addEventListener('beforeinput', (event) => {
                if (event.data != null && !regex.test(event.data)) {
                    event.preventDefault();
                    schoolID.style.borderColor = "#dc3545";
                    document.getElementById("sid-invalid").innerHTML = "Please enter a valid school id number. Example: 2023-1234";
                } else {
                    schoolID.style.borderColor = "#198754";
                    document.getElementById("sid-invalid").innerHTML = "";
                }
            });
            schoolID.addEventListener('input', () => {
                isSchoolIdNull(schoolID);
            });

            function isPasswordEqual(e, password, confirmPassword) {
                if (password.value) {
                    password.style.borderColor = "#198754";
                    e.preventDefault();
                }
            }
            function isCnfrmPassEqual(password, confirmPassword) {
                if (confirmPassword.value == password.value) {
                    confirmPassword.style.borderColor = "#198754";
                    password.style.borderColor = "#198754";
                    cnfrmpwd_feedback.innerHTML = "";
                } else {
                    confirmPassword.style.borderColor = "#dc3545";
                    password.style.borderColor = "#dc3545";
                    cnfrmpwd_feedback.innerHTML = "Password not match."
                }
            }
            password.addEventListener("input", (event) => {
                console.log(password.value);
                pwd_feedback.innerHTML = "";
                if (password.value.length >= 8) {
                    isPasswordEqual(event, password, confirmPassword);
                } else {
                    password.style.borderColor = "#dc3545";
                    pwd_feedback.innerHTML = "Password must at least twelve characters."
                }
                if (confirmPassword.value) {
                    isCnfrmPassEqual(password, confirmPassword);
                }
            });
            confirmPassword.addEventListener('input', (event) => {
                console.log(confirmPassword.value);
                if (password.value.length >= 8) {
                    isCnfrmPassEqual(password, confirmPassword);
                } else {
                    confirmPassword.style.borderColor = "#dc3545";
                    password.style.borderColor = "#dc3545";
                }
            });

            document.getElementById('email').addEventListener('input', () => {
                document.getElementById('err_email').innerHTML = "";
                document.getElementById('err_feedback').innerHTML = "";
            });

    // selectProgram.addEventListener('mouseover', () => {
    //     selectProgram.style.cursor = "pointer";
    //     var sel = selectProgram.options.length;
    //     selectProgram.size = sel;
    //     optionBsit.addEventListener('mouseover', () => {
    //         optionBsit.style.backgroundColor = "#999";
    //         optionBsit.addEventListener('click', () => {
    //             selectProgram.size = 0;
    //             selectProgram.style.color = "black";
    //         });
    //         optionBsit.addEventListener('mouseout', () => {
    //             optionBsit.style.backgroundColor = "";
    //         });
    //     });
    //     optionDct.addEventListener('mouseover', () => {
    //         optionDct.style.backgroundColor = "#999";
    //         optionDct.addEventListener('click', () => {
    //             selectProgram.size = 0;
    //             selectProgram.style.color = "black";
    //         });
    //         optionDct.addEventListener('mouseout', () => {
    //             optionDct.style.backgroundColor = "";
    //         });
    //     });
    //     optionBcpe.addEventListener('mouseover', () => {
    //         optionBcpe.style.backgroundColor = "#999";
    //         optionBcpe.addEventListener("click", () => {
    //             selectProgram.size = 0;
    //             selectProgram.style.color = "black";
    //         });
    //         optionBcpe.addEventListener('mouseout', () => {
    //             optionBcpe.style.backgroundColor = "";
    //         });
    //     });
    //     optionBsee.addEventListener('mouseover', () => {
    //         optionBsee.style.backgroundColor = "#999";
    //         optionBsee.addEventListener('click', () => {
    //             selectProgram.size = 0;
    //             selectProgram.style.color = "black";
    //         });
    //         optionBsee.addEventListener('mouseout', () => {
    //             optionBsee.style.backgroundColor = "";
    //         });
    //     });
    //     optionBseet.addEventListener('mouseover', () => {
    //         optionBseet.style.backgroundColor = "#999";
    //         optionBseet.addEventListener('click', () => {
    //             console.log("clicked eet")
    //             selectProgram.size = 0;
    //             selectProgram.style.color = "black";
    //         });
    //         optionBseet.addEventListener('mouseout', () => {
    //             optionBseet.style.backgroundColor = "";
    //         });
    //     });
    // });
    // selectProgram.addEventListener('mouseout', () => {
    //     selectProgram.size = 1;
    //     if (selectProgram.value == "") {
    //         selectProgram.style.color = "#969fa4";
    //     };
    // });
        </script>
    </body>

    </html>
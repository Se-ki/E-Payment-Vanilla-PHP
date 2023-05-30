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
    <script src="./js/signup.js"></script>
</body>

</html>
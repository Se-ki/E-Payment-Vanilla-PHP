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
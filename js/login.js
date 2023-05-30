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
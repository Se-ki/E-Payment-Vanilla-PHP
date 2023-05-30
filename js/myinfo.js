const modal = document.querySelector("div.modal");
const password = document.querySelector("input#newpass");
const confirm_password = document.querySelector("input#repeatpass");
const submit = document.querySelector("button#changepass");
submit.addEventListener("click", (e) => {
    e.preventDefault();
    if (password.value == "" && confirm_password.value == "") {
        modal.classList.add("apply-shake");
        document.querySelector('h5.modal-title').innerHTML = "Empty form!"
    } else if (password.value != confirm_password.value) {
        modal.classList.add("apply-shake");
        document.querySelector('h5.modal-title').innerHTML = "Password Unmatched!"
    }
});

modal.addEventListener("animationend", (e) => {
    modal.classList.remove("apply-shake");
});
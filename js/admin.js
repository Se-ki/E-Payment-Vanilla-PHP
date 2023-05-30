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

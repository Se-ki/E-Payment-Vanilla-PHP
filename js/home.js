$(document).ready(function () {
    $("#creditcard").click(function () {
        $(".collapse").collapse('show');
    });
    $("#click-hide").click(function () {
        $(".collapse").collapse('hide');
    });
    $("#sidebarmenu").click(function () {
        $(".collapse").collapse('show');
    });
    $("#sidebarmenu").click(function () {
        $(".collapse").collapse('hide');
    });
});
const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))
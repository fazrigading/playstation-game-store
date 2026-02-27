//Dark Mode
const modeGelap = document.getElementById("modegelap");


$(modeGelap).click(function () {
    document.body.classList.toggle("dark-mode");
});

$(document).ready(function () {
    $('#dtBasicExample').DataTable();
});
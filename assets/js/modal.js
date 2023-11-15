var emp_modal = document.getElementById("emp_modal");
var emp_add = document.getElementById("emp_add");
var emp_close = document.getElementById("emp_close");

emp_add.onclick = function () {
    emp_modal.style.display = 'flex';
    setTimeout(() => {emp_modal.style.transition = "0.7s";emp_modal.style.opacity = "1"}, 1);
}
emp_close.onclick = function () {
    emp_modal.style.transition = "0.7s";
    emp_modal.style.opacity = "0";
    setTimeout(() => {emp_modal.style.display = 'none'}, 500);

}

var work_modal = document.getElementById("work_modal");
var work_add = document.getElementById("work_add");
var work_close = document.getElementById("work_close");

work_add.onclick = function () {
    work_modal.style.display = 'flex';
    setTimeout(() => {work_modal.style.transition = "0.7s";work_modal.style.opacity = "1"}, 1);
}
work_close.onclick = function () {
    work_modal.style.transition = "0.7s";
    work_modal.style.opacity = "0";
    setTimeout(() => {work_modal.style.display = 'none'}, 500);

}
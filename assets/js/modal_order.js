var order_modal = document.getElementById("order_modal");
var order_add = document.getElementById("order_add");
var order_close = document.getElementById("order_close");

order_add.onclick = function () {
    order_modal.style.display = 'flex';
    setTimeout(() => {order_modal.style.transition = "0.7s";order_modal.style.opacity = "1"}, 1);
}
order_close.onclick = function () {
    order_modal.style.transition = "0.7s";
    order_modal.style.opacity = "0";
    setTimeout(() => {order_modal.style.display = 'none'}, 500);

}
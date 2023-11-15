<?php
require_once "inc/connect.php";

$user_id = $_COOKIE['user_id'];

$workss = mysqli_query($connect,"SELECT `work_id`, `name`, `price` FROM `work`");

$ord_result = mysqli_query($connect,
    "SELECT order_info.order_id, date, name, price, full_name, email
            FROM `work`
            JOIN
            (SELECT `order`.order_id, `order`.date, order_work.work_id
            FROM `order`JOIN order_work ON `order`.order_id = order_work.order_id
            WHERE `order`.user_id = '$user_id') as order_info
            ON `work`.work_id = order_info.work_id
            JOIN
            (SELECT emp_order.order_id, employee.full_name, employee.email
            FROM emp_order JOIN employee ON emp_order.emp_id = employee.emp_id) as emp_info
            ON order_info.order_id = emp_info.order_id"
);

$sql = mysqli_fetch_assoc(mysqli_query($connect,"SELECT `order_id` AS `order_id` FROM `order` WHERE `user_id` = '$user_id'"));
$order_id = $sql['order_id'];


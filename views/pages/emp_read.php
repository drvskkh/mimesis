<?php
require_once "inc/connect.php";

$user_id = $_COOKIE['emp_id'];

$ord_result = mysqli_query($connect,
    "SELECT t1.emp_id,t1.date, t4.name, t4.price, t2.`full_name`,t2.`email`
            FROM 
            (SELECT emp_order.emp_id,`order`.date, `order`.order_id, `order`.user_id
            FROM emp_order
            JOIN `order`
            ON `order`.order_id = emp_order.order_id WHERE emp_id = '$user_id') as t1
            JOIN 
            (SELECT `user`.user_id,`user`.`full_name`, `user`.`email`
            FROM `user`) as t2
            ON t1.user_id = t2.user_id 
            JOIN 
            (SELECT `order_work`.order_id,`order_work`.work_id
            FROM `order_work`) as t3
            ON t1.order_id = t3.order_id
            JOIN 
            (SELECT `work`.work_id,`work`.name, `work`.price
            FROM `work`) as t4
            ON t3.work_id = t4.work_id"
);

$sql = mysqli_fetch_assoc(mysqli_query($connect,"SELECT `order_id` AS `order_id` FROM `order` WHERE `user_id` = '$user_id'"));
$order_id = $sql['order_id'];


<?php
require_once "inc/connect.php";

$flag = $_GET['flag'];
$id = $_GET['delete_id'];

if ($flag == 1){
    if(isset($_GET['delete_id']))
    {
        $orders_id = mysqli_query($connect,"SELECT `order_id` FROM `emp_order` WHERE `emp_id` = '$id'");
        while ($order_id = mysqli_fetch_assoc($orders_id)) {
            $order = $order_id['order_id'];
            mysqli_query($connect,"DELETE FROM `order` WHERE `order_id` = '$order'");
        }

        $query = "DELETE FROM `employee` WHERE `emp_id` = '$id'";
        mysqli_query($connect, $query);

        header ("location: admin");
    }
}
else {
    if(isset($_GET['delete_id']))
    {
        $orders_id = mysqli_query($connect,"SELECT `order_id` FROM `order_work` WHERE `work_id` = '$id'");
        while ($order_id = mysqli_fetch_assoc($orders_id)) {
            $order = $order_id['order_id'];
            mysqli_query($connect,"DELETE FROM `order` WHERE `order_id` = '$order'");
        }

        $query = "DELETE FROM `work` WHERE `work_id` = '$id'";
        mysqli_query($connect, $query);

        header ("location: admin");
    }
}

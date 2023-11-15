<?php
session_start();
require_once "inc/connect.php";
$name = $_POST['name'];
$type = $_POST['type'];
$price = $_POST['price'];

$is_free = mysqli_query($connect, "SELECT * FROM `work` WHERE `name` = '$name'");

if (mysqli_num_rows($is_free) > 0) {
    header('location: admin');
}
else {
    mysqli_query($connect,"INSERT INTO `work` (`work_id`, `name`, `type`, `price`) VALUES (NULL, '$name', '$type', '$price')");
    header('location: admin');
}



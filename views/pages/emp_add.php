<?php
session_start();
require_once "inc/connect.php";
$full_name = $_POST['full_name'];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$role = $_POST['role'];

$is_free = mysqli_query($connect, "SELECT * FROM `employee` WHERE `login` = '$login'");

if (mysqli_num_rows($is_free) > 0) {
    header('location: admin');
}
else {
    $password = md5($password);
    mysqli_query($connect,"INSERT INTO `employee` (`emp_id`, `full_name`, `login`, `email`, `password`, `role`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$role')");
    header('location: admin');
}



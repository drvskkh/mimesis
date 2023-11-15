<?php
require_once "inc/connect.php";

$des_result = mysqli_query($connect,"SELECT `emp_id`, `full_name`, `email` FROM `emp_design`");
$pr_result = mysqli_query($connect,"SELECT `emp_id`, `full_name`, `email` FROM `emp_program`");
$w_des_result = mysqli_query($connect,"SELECT `work_id`, `name`, `price` FROM `work_design`");
$w_pr_result = mysqli_query($connect,"SELECT `work_id`, `name`, `price` FROM `work_program`");



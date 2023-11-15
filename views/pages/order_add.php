<?php
require_once "inc/connect.php";


$user_id = $_COOKIE['user_id'];
$user_email = $_COOKIE['email'];

$work_id = $_POST['sel_work'];
$desc = htmlspecialchars($_POST['desc']);
$date = date("d.m.Y");

//
// СОЗДАНИЕ ЗАКАЗА
//

// создание заказа
mysqli_query($connect,"INSERT INTO `order` (`order_id`, `date`, `user_id`) VALUES (NULL, '$date', '$user_id')");

// поиск id заказа
$sql = mysqli_fetch_assoc(mysqli_query($connect,"SELECT MAX(`order_id`) AS `order_id` FROM `order` WHERE `user_id` = '$user_id'"));
$order_id = $sql['order_id'];

// заполнение заказа
mysqli_query($connect,"INSERT INTO `order_work` (`order_id`, `work_id`) VALUES ('$order_id', '$work_id')");

//
// ПОИСК РАБОТНИКА
//

// определение типа работы
$sql = mysqli_fetch_assoc(mysqli_query($connect,"SELECT `type` FROM `work` WHERE `work_id` = '$work_id'"));
$type = $sql['type'];

// свободный дизайнер
if ($type == 1) {
    $sql = mysqli_fetch_assoc(mysqli_query($connect,"SELECT `emp_id` FROM `free_design` LIMIT 1"));
    $emp_id = $sql['emp_id'];
}
// свободный программист
else {
    $sql = mysqli_fetch_assoc(mysqli_query($connect,"SELECT `emp_id` FROM `free_program` LIMIT 1"));
    $emp_id = $sql['emp_id'];
}

//
// ДОБАВЛЕНИЕ РАБОТНИКА К ЗАКАЗУ
//

mysqli_query($connect,"INSERT INTO `emp_order` (`emp_id`, `order_id`) VALUES ('$emp_id', '$order_id')");

//
// ОТПРАВКА ОПИСАНИЯ НА ПОЧТУ РАБОТНИКУ
//

// получение почты работника
$sql = mysqli_fetch_assoc(mysqli_query($connect,"SELECT `email` FROM `employee` WHERE `emp_id` = '$emp_id'"));
$emp_email = $sql['email'];

$subject = 'Поступил новый заказ от ' . $user_email . ' (id=' . $work_id . ')';
$from = $user_email;
$to = $emp_email;

$message = urldecode($desc);
$message = trim($message);

//$headers = "From: $from" . "\r\n" .
//    "Reply-To: $from" . "\r\n" .
//    "X-Mailer: PHP/" . phpversion();

mail($to, $subject, $message);
header('location: user');

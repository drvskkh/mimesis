<?php
    session_start();
    require_once "inc/connect.php";
    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_conf = $_POST['password_conf'];
    $email = $_POST['email'];

    $is_free = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login'");

    if (mysqli_num_rows($is_free) > 0) {
        $_SESSION['msg_err'] = 'логин занят';
        header('location: register');
    }
    else {
        if ($password === $password_conf) {
            $password = md5($password);
            mysqli_query($connect,"INSERT INTO `user` (`user_id`, `full_name`, `login`, `email`, `password`) VALUES (NULL, '$full_name', '$login', '$email', '$password')");
            $_SESSION['msg_conf'] = 'регистрация прошла успешно';
            header('location: login');
        }
        else {
            $_SESSION['msg_err'] = 'пароли не совпадают';
            header('location: register');
        }
    }



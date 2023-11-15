<?php
    session_start();
    require_once "inc/connect.php";

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_admin = mysqli_query($connect, "SELECT * FROM `admin` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_admin) > 0) {

        $user = $check_admin->fetch_assoc();
        setcookie('admin_id', $user['admin_id'], time() + 3600, "/");
        setcookie('full_name', $user['full_name'], time() + 3600, "/");
        setcookie('email', $user['email'], time() + 3600, "/");
        setcookie('role', 'admin', time() + 3600, "/");

        header('location: admin');
    }
    else {
        $check_employee = mysqli_query($connect, "SELECT * FROM `employee` WHERE `login` = '$login' AND `password` = '$password'");
        if (mysqli_num_rows($check_employee) > 0) {

            $user = $check_employee->fetch_assoc();
            setcookie('emp_id', $user['emp_id'], time() + 3600, "/");
            setcookie('full_name', $user['full_name'], time() + 3600, "/");
            setcookie('email', $user['email'], time() + 3600, "/");
            setcookie('role', 'employee', time() + 3600, "/");

            header('location: employee');
        }
        else {
            $check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'");
            if (mysqli_num_rows($check_user) > 0) {

                $user = $check_user->fetch_assoc();
                setcookie('user_id', $user['user_id'], time() + 3600, "/");
                setcookie('full_name', $user['full_name'], time() + 3600, "/");
                setcookie('email', $user['email'], time() + 3600, "/");
                setcookie('role', 'user', time() + 3600, "/");

                header('location: user');
            }
            else {
                $_SESSION['msg_err'] = 'неверный логин или пароль';
                header('location: login');
            }
        }
    }

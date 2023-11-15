<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>mimesis - register</title>
</head>

<body>
<?php if ($_COOKIE['role'] == 'admin') : header('location: admin'); endif;?>
<?php if ($_COOKIE['role'] == 'employee') : header('location: employee'); endif;?>
<?php if ($_COOKIE['role'] == 'user') : header('location: user');?>

<?php else: ?>
<div id="log_block">
    <img class="logo3" id="logo3" src="assets/img/mimesis.png">
    <form action="signup" method="post">
        <label for="full_name">полное имя *</label>
        <input class="log_input" id="full_name" name="full_name"></input>
        <label for="login">логин *</label>
        <input class="log_input" id="login" name="login"></input>
        <label for="password">пароль *</label>
        <input class="log_input" id="password" type="password" name="password"></input>
        <label for="password_conf">подтверждение пароля *</label>
        <input class="log_input" id="password_conf" type="password" name="password_conf"></input>
        <label for="email">адрес эл.почты *</label>
        <input class="log_input" id="email" name="email"></input>
        </br>
        <button class="log_but" id="reg" type="submit">зарегестрироваться</button>
        <p>
            у вас есть аккаунт? - <a href="login">авторизируйтесь</a>
        </p>
    </form>
    <?php
    if ($_SESSION['msg_err']) {
        echo '<p class="msg" id="msg_err">' . $_SESSION['msg_err'] . '</p>';
    }
    unset($_SESSION['msg_err']);
    ?>
</div>
    <?php include 'inc/fade.php'?>
<?php endif;?>

</body>

</html>
<?php
    session_start()
?>

<!DOCTYPE html>

<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>mimesis - auth</title>
</head>

<body>
<?php if ($_COOKIE['role'] == 'admin') : header('location: admin'); endif;?>
<?php if ($_COOKIE['role'] == 'employee') : header('location: employee'); endif;?>
<?php if ($_COOKIE['role'] == 'user') : header('location: user');?>

<?php else: ?>
<div id="log_block">
    <img class="logo3" id="logo3" src="assets/img/mimesis.png">
    <form action="signin" method="post">
        <label for="login">логин</label>
        <input class="log_input" id="login" name="login"></input>
        <label for="password">пароль</label>
        <input class="log_input" id="password" type="password" name="password"></input>
        </br>
        <button class="log_but" id="auth" type="submit">вход</button>
    </form>
        <span id="or">или</span>
    <form action="register" method="post">
        <button class="log_but" id="reg">регистрация</button>
    </form>
    <?php
    if ($_SESSION['msg_err']) {
        echo '<p class="msg" id="msg_err">' . $_SESSION['msg_err'] . '</p>';
    }
    unset($_SESSION['msg_err']);
    if ($_SESSION['msg_conf']) {
        echo '<p class="msg" id="msg_conf">' . $_SESSION['msg_conf'] . '</p>';
    }
    unset($_SESSION['msg_conf']);
    ?>
</div>
    <?php include 'inc/fade.php'?>
<?php endif;?>

</body>

</html>